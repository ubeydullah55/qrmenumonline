<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Anasayfa extends Controller
{

  protected $firma;
  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    // 2. ADIM: Değişkeni burada bir kez doldur
    $this->firma = session()->get('firma');
  }

  public function index()
  {

    // Eğer firma yoksa (slug yoksa)
    if (!isset($this->firma) || !$this->firma) {
      // Ana domain için yönlendir
      return view('/index'); // veya istediğin ana sayfa
    }
    if ($this->firma->is_demo == 1) {
      $this->firma->firma_id = 1; // Demo firma ID'si
    }
    $modelSettings = new \App\Models\SettingsModel();
    $data['settings'] = $modelSettings->where('firma_id', $this->firma->firma_id)->first();
    // Tek satır olduğu için first() kullandık, [0] yerine

    $modelcategories = new \App\Models\CategoryModel();
    $data['category'] = $modelcategories->where('firma_id', $this->firma->firma_id)->where('is_active', 1)->findAll();

    $modelproducts = new \App\Models\ProductsModel();
    $data['products'] = $modelproducts
      ->where('firma_id', $this->firma->firma_id)
      ->where('is_active', 1)
      ->findAll();

    $modelStatus = new \App\Models\StatusModel();
    $data['status'] = $modelStatus->where('firma_id', $this->firma->firma_id)->findAll();

    return view('templates/' . $this->firma->template, $data);
  }



  public function call($table_no)
  {
    $modelcall = new \App\Models\CallWaiterModel;
    //qrcode ile girilmemişse table_no=null şartı koyup yönlendirme yapılacak
    /*
    if ($table_no == 9999) {
      $session = session();
      session()->setFlashdata('danger', '-HATA-Garson çarğırmak için qr cod ile giriş yapmalısınız...');
      return redirect()->to(base_url('/?id=' . $table_no));
    }
    */
    $rule = array(
      'table_no' => $table_no,
      'time' => date('H:i')
    );

    $callInsert = $modelcall->insert($rule);
    if (isset($callInsert)) {
      $session = session();
      session()->setFlashdata('info', '-BAŞARILI-Garson çağırma talebiniz alınmıştır....');
      return redirect()->to(base_url());
    } else {
      $session = session();
      session()->setFlashdata('danger', '-HATA-Garson çağırma talebiniz alınmadı....');
      return redirect()->to(base_url());
    }
  }
}
