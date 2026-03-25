<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $firma;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // 2. ADIM: Değişkeni burada bir kez doldur

        $this->firma = session()->get('firma');


        $session = session();

        // Giriş kontrolü
        if (!$session->get('ad')) {
            $session->setFlashdata('danger', 'Lütfen giriş yapınız');

            // BURASI ÖNEMLİ
            header('Location: ' . base_url('login'));
            exit;
        }
    }



    public function index() {}


    public function panel()
    {
        $modelcategories = new \App\Models\CategoryModel;
        $modelproducts = new \App\Models\ProductsModel;
        $modelEmploye = new \App\Models\KullaniciModel;
        $modelSettings = new \App\Models\SettingsModel();  // ekledik
        $data['category'] = $modelcategories->where('firma_id', $this->firma->firma_id)->findAll();
        $data['product'] = $modelproducts->where('firma_id', $this->firma->firma_id)->findAll();
        $data['activeProductCount'] = $modelproducts
            ->where('firma_id', $this->firma->firma_id)
            ->where('is_active', 1)
            ->countAllResults();

        $data['pasiveProductCount'] = $modelproducts
            ->where('firma_id', $this->firma->firma_id)
            ->where('is_active', 0)
            ->countAllResults();
        $data['employe'] = $modelEmploye->where('firma_id', $this->firma->firma_id)->findAll();
        $data['categoryCount'] = count($data['category']);
        $data['productCount'] = count($data['product']);
        $data['employeCount'] =  count($data['employe']);

        $data['settings'] = $modelSettings->where('firma_id', $this->firma->firma_id)->first(); // **settings ekledik**

        return view('backend/panel', $data);
    }


    public function category()
    {
        $modelcategories = new \App\Models\CategoryModel;
        $data['category'] = $modelcategories->where('firma_id', $this->firma->firma_id)->findAll();
        return view('backend/category', $data);
    }

    public function category_insert()
    {

        $modelcategories = new \App\Models\CategoryModel;
        $categoryName = $this->request->getPost('category');
        $categoryRule = array(
            'firma_id' => $this->firma->firma_id,
            'name' => $categoryName
        );
        if (!empty($categoryName)) {
            $categortyInsert = $modelcategories->insert($categoryRule);
            if (!empty($categortyInsert)) {
                $session = session();
                session()->setFlashdata('success', 'Kategori başarılı bir şekilde eklendi');
                return redirect()->to('panel/category');
            } else {
                $session = session();
                session()->setFlashdata('danger', '-HATA-Kategori eklenirken bir hata oluştu....');
                return redirect()->to('panel/category');
            }
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA-Lütfen kategori ismi giriniz...');
            return redirect()->to('panel/category');
        }
    }
    public function categoryDelete($id)
    {

        $modelcategories = new \App\Models\CategoryModel;
        $modelproducts = new \App\Models\ProductsModel;
        $categorydeleted = $modelcategories->delete($id);
        $data['deleteProductsList'] = $modelproducts->where('categories_id', $id)->where('firma_id', $this->firma->firma_id)->findAll();

        foreach ($data['deleteProductsList'] as $row) {
            $path = './img/product/' . $row['img'];
            unlink($path);
            $productsdeleted = $modelproducts->delete($row['id']);
        }

        $session = session();
        session()->setFlashdata('success', 'Kategori silme başarılı');
        return redirect()->to('panel/category');
    }
    public function categoryEditView($id)
    {
        $modelcategories = new \App\Models\CategoryModel;
        $data = $modelcategories->where('id', $id)->where('firma_id', $this->firma->firma_id)->first();
        $data['categoryName'] = $data['name'];
        $data['categoryId'] = $id;

        return view('backend/categoryEditView', $data);
    }
    public function categoryEdit($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $modelcategories = new \App\Models\CategoryModel;
        $categoryName = $this->request->getPost('category');
        $categoryUpdate = $modelcategories->where('id', $id)->where('firma_id', $this->firma->firma_id)->set('name', $categoryName)->update();
        if ($categoryUpdate) {
            $session = session();
            session()->setFlashdata('success', '-BAŞARILI-Kategori düzenleme işlemi yapılmıştır');
            return redirect()->to('panel/category');
        }
    }

    public function urun()
    {
        $modelproducts = new \App\Models\ProductsModel;

        $data['productsActive'] = $modelproducts->where('is_Active', 1)->where('firma_id', $this->firma->firma_id)->findAll();
        $data['productsPassive'] = $modelproducts->where('is_Active', 0)->where('firma_id', $this->firma->firma_id)->findAll();
        $data['productsAll'] = $modelproducts->where('firma_id', $this->firma->firma_id)->where('firma_id', $this->firma->firma_id)->findAll();
        return view('backend/urun', $data);
    }

    public function productsInfo($id, $info)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $data['product'] = $modelproducts->find($id);
        if ($info == 1) {
            $productPassive = $modelproducts->where('id', $id)->where('firma_id', $this->firma->firma_id)->set('is_active', 0)->update();
            if ($productPassive) {
                $session = session();
                session()->setFlashdata('success', 'BAŞARILI Ürün Pasif hale getirildi...');
                return redirect()->to('panel/product');
            }
        }
        if ($info == 0) {
            $productActive = $modelproducts->where('id', $id)->where('firma_id', $this->firma->firma_id)->set('is_active', 1)->update();
            if ($productActive) {
                $session = session();
                session()->setFlashdata('success', 'BAŞARILI Ürün Aktif hale getirildi...');
                return redirect()->to('panel/product');
            }
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
            return redirect()->to('panel/product');
        }
    }

    public function productsDelete($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $data['product'] = $modelproducts->find($id);
        if (!empty($data['product'])) {
            $path = './img/product/' . $data['product']['img'];
            if (file_exists($path)) {
                unlink($path);
            }
            $productDelete = $modelproducts->where('id', $id)->where('firma_id', $this->firma->firma_id)->delete();
            if ($productDelete) {
                $session = session();
                session()->setFlashdata('success', '-BAŞARILI-Ürün veritabanından silindi...');
                return redirect()->to('panel/product');
            }
        }
        $session = session();
        session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
        return redirect()->to('panel/product');
    }

    public function productsEditView($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $modelcategories = new \App\Models\CategoryModel;
        $data['category'] = $modelcategories->where('firma_id', $this->firma->firma_id)->findAll();
        $data['product'] = $modelproducts->where('id', $id)->where('firma_id', $this->firma->firma_id)->find($id);
        $data['productCategory'] = $modelcategories->where('id', $data['product']['categories_id'])->where('firma_id', $this->firma->firma_id)->first();
        if ($data['product']) {

            return view('backend/productEditView', $data);
        }

        $session = session();
        session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
        return redirect()->to('panel/product');
    }


    public function productEdit($id)
    {
        $modelproducts = new \App\Models\ProductsModel;

        $product = $modelproducts->where('firma_id', $this->firma->firma_id)->find($id);
        if (!$product) {
            session()->setFlashdata('danger', 'Ürün bulunamadı');
            return redirect()->to('panel/product');
        }

        // POST verileri
        $name = $this->request->getPost('product_name');
        $info = $this->request->getPost('product_info');
        $price = $this->request->getPost('product_price');
        $categoryId = $this->request->getPost('category');
        $img = $this->request->getFile('product_img');

        // Validation
        if (empty($name)) {
            session()->setFlashdata('danger', 'Ürün ismi boş bırakılamaz');
            return redirect()->to('panel/product');
        }

        if (empty($categoryId)) {
            session()->setFlashdata('danger', 'Kategori seçimi boş bırakılamaz');
            return redirect()->to('panel/product');
        }

        $updateData = [
            'categories_id' => $categoryId,
            'name' => $name,
            'info' => $info,
            'price' => $price,
            'is_active' => 1
        ];

        // Eğer resim seçilmişse
        if ($img && $img->isValid()) {
            // Eski resmi sil
            $oldPath = './img/product/' . $this->firma->firma_id . '/' . $product['img'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imgName = $img->getRandomName();
            $img->move('img/product/' . $this->firma->firma_id . '/', $imgName);
            $updateData['img'] = $imgName;
        } else {
            // Resim değişmediyse eski resmi bırak
            $updateData['img'] = $product['img'];
        }

        $updated = $modelproducts->where('id', $id)->where('firma_id', $this->firma->firma_id)->set($updateData)->update();

        if ($updated) {
            session()->setFlashdata('success', 'Ürün güncelleme başarılı');
        } else {
            session()->setFlashdata('danger', 'Ürün güncellenirken bir hata oluştu');
        }

        return redirect()->to('panel/product');
    }







    public function insertProduct()
    {
        $modelproducts = new \App\Models\ProductsModel;

        $name = $this->request->getPost('product_name');
        $info = $this->request->getPost('product_info');
        $price = $this->request->getPost('product_price');
        $categoryId = $this->request->getPost('category');
        $img = $this->request->getFile('product_img');

        // VALIDATION
        if (empty($name)) {
            session()->setFlashdata('danger', 'Ürün ismi boş bırakılamaz');
            return redirect()->to('panel/productInsertView');
        }

        if (empty($categoryId)) {
            session()->setFlashdata('danger', 'Kategori seçimi boş bırakılamaz');
            return redirect()->to('panel/productInsertView');
        }

        // Aynı isim kontrol
        $nameControl = $modelproducts->where('name', $name)->where('firma_id', $this->firma->firma_id)->first();
        if ($nameControl) {
            session()->setFlashdata('danger', 'Bu isimde bir ürün zaten mevcuttur');
            return redirect()->to('panel/productInsertView');
        }

        // Resim kontrol
        if (!$img || !$img->isValid()) {
            session()->setFlashdata('danger', 'Ürün resmi seçilmedi');
            return redirect()->to('panel/productInsertView');
        }

        // RESİM YÜKLE
        $imgName = $img->getRandomName();
        $firmaId = $this->firma->firma_id;

        // klasör yoksa oluştur
        $path = 'img/product/' . $firmaId;
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // dosyayı taşı
        $img->move($path, $imgName);

        // INSERT
        $insertData = [
            'categories_id' => $categoryId,
            'firma_id' => $this->firma->firma_id,
            'img' => $imgName,
            'name' => $name,
            'info' => $info,
            'price' => $price,
            'is_active' => 1
        ];

        if ($modelproducts->insert($insertData)) {
            session()->setFlashdata('success', 'Ürün ekleme başarılı');
            return redirect()->to('panel/product');
        }

        // fallback
        session()->setFlashdata('danger', 'Ürün eklerken bir hata oluştu');
        return redirect()->to('panel/productInsertView');
    }



    public function call_view()
    {
        $modelcall = new \App\Models\CallWaiterModel;
        $call = $modelcall->orderBy('id', 'DESC')->where('firma_id', $this->firma->firma_id)->findAll(); // id'yi azalan sırada sıralar
        $data['veriler'] = $call;
        return view('backend/callView', $data);
    }

    public function callDelete($id)
    {
        $modelcall = new \App\Models\CallWaiterModel;
        $callDelete = $modelcall->where('firma_id', $this->firma->firma_id)->delete($id);
        if (isset($callDelete)) {
            $session = session();
            session()->setFlashdata('success', '-BAŞARILI-Veri silinmiştir....');
            return redirect()->to('panel/callView');
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA-Silme işlemi gerçekleştirilemedi....');
            return redirect()->to('panel/callView');
        }
    }

    public function employeInsert()
    {
        $modelKullanici = new \App\Models\KullaniciModel;

        $employeName = $this->request->getPost('employeName');
        $employeSurName = $this->request->getPost('employeSurName');
        $employeNumber = $this->request->getPost('employeNumber');
        $employePassword = $this->request->getPost('employePassword');
        $employePassword = md5($employePassword);
        $unvan = $this->request->getPost('unvan');
        $unvanNo = 2;
        if ($unvan == "GARSON") {
            $unvanNo = 2;
        }
        if ($unvan == "KULLANICI") {
            $unvanNo = 1;
        }
        if ($unvan == "YÖNETİCİ") {
            $unvanNo = 0;
        }
        $data = array(
            'k_adi' => $employeNumber,
            'k_sifre' => $employePassword,
            'ad' => $employeName,
            'soyad' => $employeSurName,
            'unvan' => $unvan,
            'yetki' => $unvanNo,
            'firma_id' => $this->firma->firma_id
        );

        $employeInsert = $modelKullanici->insert($data);
        if (!empty($employeInsert)) {
            $session = session();
            session()->setFlashdata('success', 'Personel başarılı bir şekilde eklendi');
            return redirect()->to('panel/employeAddView');
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA-Personel eklenirken bir hata oluştu....');
            return redirect()->to('panel/employeAddView');
        }
    }

    public function employeDelete($id)
    {
        $modelKullanici = new \App\Models\KullaniciModel;
        $data['employe'] = $modelKullanici->find($id);
        $employeDelete = $modelKullanici->where('id', $id)->where('firma_id', $this->firma->firma_id)->delete();
        if (!empty($employeDelete)) {
            $session = session();
            session()->setFlashdata('success', '-BAŞARILI-Personel veritabanından silindi...');
            return redirect()->to('panel/employeAddView');;
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
            return redirect()->to('panel/employeAddView');
        }
    }
    public function settingsView()
    {
        $modelSettings = new \App\Models\SettingsModel();
        $data['settings'] = $modelSettings->where('firma_id', $this->firma->firma_id)->first(); // tek satır çekiyoruz
        return view('backend/settingsView', $data);
    }

    public function settingsInsert($id)
    {
        $changeLogoControl = 0;
        $changeFavIconControl = 0;
        $modelSettings = new \App\Models\SettingsModel;
        $img = $this->request->getFile('logo_img');
        if ($img->isValid()) {
            $imgName = $img->getRandomName();
            $img->move('img/settings/', $imgName);
            $changeLogoControl = 1;
        }
        $imgFavIcon = $this->request->getFile('favIcon_img');
        if ($imgFavIcon->isValid()) {
            $imgName2 = $imgFavIcon->getRandomName();
            $imgFavIcon->move('img/settings/', $imgName2);
            $changeFavIconControl = 1;
        }
        $companyName = $this->request->getPost('CompanyName');
        $instagramUrl = $this->request->getPost('instagramUrl');
        $twitterUrl = $this->request->getPost('twitterUrl');
        $facebookUrl = $this->request->getPost('facebookUrl');
        $location = $this->request->getPost('location');
        $locationUrl = $this->request->getPost('locationUrl');
        $phone = $this->request->getPost('phone');
        $mail = $this->request->getPost('mail');
        $hakkimizda = $this->request->getPost('hakkimizda');
        $haftaIci = $this->request->getPost('haftaIci');
        $haftaSonu = $this->request->getPost('haftaSonu');


        if ($id > 0) //veritabanında bir kayıt varsa
        {
            if ($changeFavIconControl == 1) {
                $settingsUpdate = $modelSettings->where('id', $id)->where('firma_id', $this->firma->firma_id)->set('favIcon_url', $imgName2)->update();
            }
            if ($changeLogoControl == 1) {
                $settingsUpdate = $modelSettings->where('id', $id)->where('firma_id', $this->firma->firma_id)->set('logo_url', $imgName)->update();
            }
            if ($changeFavIconControl == 1 && $changeLogoControl == 1) {
                $settingsUpdate = $modelSettings->where('id', $id)->where('firma_id', $this->firma->firma_id)->set('logo_url', $imgName, 'favIcon_url', $imgName2)->update();
            }
            $changeGroup = array(
                'companyName' => $companyName,
                'instagramUrl' => $instagramUrl,
                'twitterUrl' => $twitterUrl,
                'facebookUrl' => $facebookUrl,
                'location' => $location,
                'location_url' => $locationUrl,
                'phone' => $phone,
                'mail' => $mail,
                'hakkimizda' => $hakkimizda,
                'haftaIci' => $haftaIci,
                'haftaSonu' => $haftaSonu,
                'firma_id' => $this->firma->firma_id,
            );
            $settingsUpdate = $modelSettings->where('id', $id)->where('firma_id', $this->firma->firma_id)->set($changeGroup)->update();
            if ($settingsUpdate) {
                $session = session();
                session()->setFlashdata('success', '-BAŞARILI-Ayar güncelleme işlemi yapılmıştır');
                return redirect()->to('panel/settingsView');
            }
        } else //veritabanında kayıt yoksa insert yapılacak
        {
            $changeGroup = array(
                'companyName' => $companyName,
                'instagramUrl' => $instagramUrl,
                'twitterUrl' => $twitterUrl,
                'facebookUrl' => $facebookUrl,
                'location' => $location,
                'location_url' => $locationUrl,
                'phone' => $phone,
                'mail' => $mail,
                'hakkimizda' => $hakkimizda,
                'haftaIci' => $haftaIci,
                'haftaSonu' => $haftaSonu,
                'logo_url' => $imgName,
                'favIcon_url' => $imgName2,
                'firma_id' => $this->firma->firma_id,
            );
            $settingsInsert = $modelSettings->insert($changeGroup);
            if ($settingsInsert) {
                $session = session();
                session()->setFlashdata('success', '-BAŞARILI-Ayar ekleme işlemi yapılmıştır');
                return redirect()->to('panel/settingsView');
            }
        }
    }
    public function statusView()
    {
        $modelStatus = new \App\Models\StatusModel();
        $data['status'] = $modelStatus->where('firma_id', $this->firma->firma_id)->first();
        return view('backend/statusView', $data);
    }
    public function updateStatus()
    {
        $statusModel = new \App\Models\StatusModel();

        $data = [
            // 'garson_cagir' => intval($this->request->getPost('garson_cagir')),
            'fiyat' => intval($this->request->getPost('fiyat')),
            'aciklama' => intval($this->request->getPost('aciklama')),
            'resim' => intval($this->request->getPost('resim')),
        ];
        $statusModel
            ->where('firma_id', $this->firma->firma_id)
            ->set($data)
            ->update();
        return redirect()->back()->with('success', 'Durum başarıyla güncellendi.');
    }

    public function qrcode()
    {
        // QR kütüphanesini include et
        require_once APPPATH . 'qr/qrlib.php';

        // Kaydedilecek geçici dosya
        $tempFile = WRITEPATH . 'temp_qr.png';

        // QR kod üret
        \QRcode::png(base_url(), $tempFile, 'L', 5, 2);

        // Base64 olarak view'a gönder
        $qrData = base64_encode(file_get_contents($tempFile));
        $data['qrcode'] = 'data:image/png;base64,' . $qrData;

        return view('backend/qrcode', $data);
    }

    public function employeAddView()
    {
        $modelPersonel = new \App\Models\KullaniciModel;
        $data['personel'] = $modelPersonel->where('firma_id', $this->firma->firma_id)->findAll();
        return view('backend/employeAddView', $data);
    }

    public function productInsertView()
    {
        $modelcategories = new \App\Models\CategoryModel;
        $data['category'] = $modelcategories->where('firma_id', $this->firma->firma_id)->findAll();
        return view('/backend/productInsertView', $data);
    }

    public function firmalistView()
    {
        $modelFirmalar = new \App\Models\FirmalarModel;
        $firma_id = $this->firma->firma_id;
        if($firma_id==1) {
            $data['firmalar'] = $modelFirmalar->findAll();
            return view('/backend/firmalistView', $data);
        } else {
            return view('/backend/panel'); // Diğer firmalar sadece paneli görebilir, firma listesine erişemezler
        }
       
    }

    public function firmadelete($id)
    {
        $modelFirmalar = new \App\Models\FirmalarModel;
        $modelKullanici = new \App\Models\KullaniciModel;
        $modelSettings = new \App\Models\SettingsModel;
        $modelStatus = new \App\Models\StatusModel;
        $modelproducts = new \App\Models\ProductsModel;
        $modelcategories = new \App\Models\CategoryModel();

        // Firma sil
        $modelFirmalar->delete($id);

        // İlgili kullanıcıları sil
        $modelKullanici->where('firma_id', $id)->delete();

        // İlgili ayarları sil
        $modelSettings->where('firma_id', $id)->delete();

        // İlgili durumları sil
        $modelStatus->where('firma_id', $id)->delete();
        $modelproducts->where('firma_id', $id)->delete();
        $modelcategories->where('firma_id', $id)->delete();

        session()->setFlashdata('success', 'Firma ve ilişkili veriler başarıyla silindi');
        return redirect()->to('panel/firmalistView');
    }

    public function firmaEkleView()
    {
        $template = new \App\Models\TemplateModel();
        $data['template'] = $template->findAll();

        return view('/backend/firmaEkleView', $data);
    }

    public function firmaKaydet()
    {
        $modelFirmalar = new \App\Models\FirmalarModel;
        $modelKullanici = new \App\Models\KullaniciModel;
        $modelSettings = new \App\Models\SettingsModel;
        $modelStatus = new \App\Models\StatusModel;
        $domain = $this->request->getPost('domain');
        $firmaAd = $this->request->getPost('firma_ad');
        $template = $this->request->getPost('template');
        $price = $this->request->getPost('price');
        $aciklama = $this->request->getPost('aciklama');
        $createddate = $this->request->getPost('creadet_date');
        $endate = $this->request->getPost('end_date');

        if (empty($domain) || empty($template) || empty($price)) {
            session()->setFlashdata('danger', 'Lütfen tüm zorunlu alanları doldurun');
            return redirect()->to('panel/firmaEkleView');
        }

        $data = [
            'firma_ad' => $domain,
            'template' => $template,
            'price' => $price,
            'aciklama' => $aciklama,
            'creadet_date' => $createddate,
            'end_date' => $endate,
            'creadet_user' => session()->get('id')
        ];

        // 🔹 Firma ekle
        if ($modelFirmalar->insert($data)) {

            $firma_id = $modelFirmalar->insertID(); // 🔥 kritik nokta

            // 🔹 Kullanıcı ekle (Admin)
            $modelKullanici->insert([
                'firma_id' => $firma_id,
                'k_adi' => '1',
                'k_sifre' => md5('samsun55'), // evet kanka bu MD5
                'ad' => 'admin',
                'soyad' => 'admin',
                'unvan' => 'YÖNETİCİ',
                'yetki' => 0
            ]);

            // 🔹 Settings ekle
            $modelSettings->insert([
                'firma_id' => $firma_id,
                'logo_url' => '1758468374_6863422b3a2d4011d926.png',
                'favIcon_url' => '1739714703_4735cdce5d63da4c1b4e.png',
                'companyName' => $firmaAd
            ]);

            $modelStatus->insert([
                'firma_id' => $firma_id,
                'garson_cagir' => 0,
                'fiyat' => 1,
                'aciklama' => 1,
                'resim' => 1,
            ]);

            session()->setFlashdata('success', 'Firma + Admin kullanıcı oluşturuldu');
            return redirect()->to('panel/firmalistView');
        } else {
            session()->setFlashdata('danger', 'Firma kaydedilirken hata oluştu');
            return redirect()->to('panel/firmaEkleView');
        }
    }

    public function quit()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}
