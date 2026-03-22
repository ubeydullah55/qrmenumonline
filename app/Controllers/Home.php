<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->guvenlik();
    }
    public function guvenlik()
    {
        $session = session();
        if (empty($session->get('ad'))) {
            echo view('login');
            $session = session();
            session()->setFlashdata('danger', 'Lütfen telefon numarasını ve şifrenizi girerek giriş yapmayı deneyiniz.....');
            die();
        }
    }

    public function index() {}


    public function panel()
    {
        $modelcategories = new \App\Models\UserModel;
        $modelproducts = new \App\Models\ProductsModel;
        $modelEmploye = new \App\Models\KullaniciModel;
        $modelSettings = new \App\Models\SettingsModel();  // ekledik

        $data['category'] = $modelcategories->findAll();
        $data['product'] = $modelproducts->findAll();
        $data['activeProductCount'] = $modelproducts->where('is_active', 1)->countAllResults();
        $data['pasiveProductCount'] = $modelproducts->where('is_active', 0)->countAllResults();
        $data['employe'] = $modelEmploye->findAll();
        $data['categoryCount'] = count($data['category']);
        $data['productCount'] = count($data['product']);
        $data['employeCount'] =  count($data['employe']);

        $data['settings'] = $modelSettings->first(); // **settings ekledik**

        return view('backend/panel', $data);
    }


    public function category()
    {
        $modelcategories = new \App\Models\UserModel;
        $data['category'] = $modelcategories->findAll();
        return view('backend/category', $data);
    }

    public function category_insert()
    {

        $modelcategories = new \App\Models\UserModel;
        $categoryName = $this->request->getPost('category');
        $categoryRule = array(
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

        $modelcategories = new \App\Models\UserModel;
        $modelproducts = new \App\Models\ProductsModel;
        $categorydeleted = $modelcategories->delete($id);
        $data['deleteProductsList'] = $modelproducts->where('categories_id', $id)->findAll();

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
        $modelcategories = new \App\Models\UserModel;
        $data = $modelcategories->where('id', $id)->first();
        $data['categoryName'] = $data['name'];
        $data['categoryId'] = $id;

        return view('backend/categoryEditView', $data);
    }
    public function categoryEdit($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $modelcategories = new \App\Models\UserModel;
        $categoryName = $this->request->getPost('category');
        $categoryUpdate = $modelcategories->where('id', $id)->set('name', $categoryName)->update();
        if ($categoryUpdate) {
            $session = session();
            session()->setFlashdata('success', '-BAŞARILI-Kategori düzenleme işlemi yapılmıştır');
            return redirect()->to('panel/category');
        }
    }

    public function urun()
    {
        $modelproducts = new \App\Models\ProductsModel;
        
        $data['productsActive'] = $modelproducts->where('is_Active', 1)->findAll();
        $data['productsPassive'] = $modelproducts->where('is_Active', 0)->findAll();
         $data['productsAll'] = $modelproducts->findAll();
        return view('backend/urun', $data);
    }

    public function productsInfo($id, $info)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $data['product'] = $modelproducts->find($id);
        if ($info == 1) {
            $productPassive = $modelproducts->where('id', $id)->set('is_active', 0)->update();
            if ($productPassive) {
                $session = session();
                session()->setFlashdata('success', 'BAŞARILI Ürün Pasif hale getirildi...');
                return redirect()->to('panel/product');
            }
        }
        if ($info == 0) {
            $productActive = $modelproducts->where('id', $id)->set('is_active', 1)->update();
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
            $productDelete = $modelproducts->where('id', $id)->delete();
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
        $modelcategories = new \App\Models\UserModel;
        $data['category'] = $modelcategories->findAll();
        $data['product'] = $modelproducts->find($id);
        $data['productCategory'] = $modelcategories->find($data['product']['categories_id']);
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

    $product = $modelproducts->find($id);
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
        $oldPath = './img/product/' . $product['img'];
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }

        $imgName = $img->getRandomName();
        $img->move('img/product/', $imgName);
        $updateData['img'] = $imgName;
    } else {
        // Resim değişmediyse eski resmi bırak
        $updateData['img'] = $product['img'];
    }

    $updated = $modelproducts->where('id', $id)->set($updateData)->update();

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
        $nameControl = $modelproducts->where('name', $name)->first();
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
        $img->move('img/product/', $imgName);

        // INSERT
        $insertData = [
            'categories_id' => $categoryId,
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
        $call = $modelcall->orderBy('id', 'DESC')->findAll(); // id'yi azalan sırada sıralar
        $data['veriler'] = $call;
        return view('backend/callView', $data);
    }

    public function callDelete($id)
    {
        $modelcall = new \App\Models\CallWaiterModel;
        $callDelete = $modelcall->delete($id);
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
            'yetki' => $unvanNo
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
        $employeDelete = $modelKullanici->where('id', $id)->delete();
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
        $data['settings'] = $modelSettings->first(); // tek satır çekiyoruz
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
                $settingsUpdate = $modelSettings->where('id', $id)->set('favIcon_url', $imgName2)->update();
            }
            if ($changeLogoControl == 1) {
                $settingsUpdate = $modelSettings->where('id', $id)->set('logo_url', $imgName)->update();
            }
            if ($changeFavIconControl == 1 && $changeLogoControl == 1) {
                $settingsUpdate = $modelSettings->where('id', $id)->set('logo_url', $imgName, 'favIcon_url', $imgName2)->update();
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
                'haftaSonu' => $haftaSonu
            );
            $settingsUpdate = $modelSettings->where('id', $id)->set($changeGroup)->update();
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
                'favIcon_url' => $imgName2
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
        $data['status'] = $modelStatus->first();
        return view('backend/statusView', $data);
    }
    public function updateStatus()
    {
        $statusModel = new \App\Models\StatusModel();

        $data = [
            'garson_cagir' => intval($this->request->getPost('garson_cagir')),
            'fiyat' => intval($this->request->getPost('fiyat')),
            'aciklama' => intval($this->request->getPost('aciklama')),
            'resim' => intval($this->request->getPost('resim')),
        ];
        $statusModel->updateStatus($data);
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



    public function quit()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}
