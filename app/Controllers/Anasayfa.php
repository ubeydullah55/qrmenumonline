<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Anasayfa extends Controller
{

  public function index()
  {
    $firma = session()->get('firma');
      $modelSettings = new \App\Models\SettingsModel();
    $data['settings'] = $modelSettings->findAll()[0]; // tek satır olduğu varsayımıyla [0]

    // diğer modeller
    $modelcategories = new \App\Models\UserModel();
    $data['category'] = $modelcategories->findAll();

    $modelproducts = new \App\Models\ProductsModel();
    $data['products'] = $modelproducts->where('is_active', 1)->findAll();

    $modelStatus = new \App\Models\StatusModel();
    $data['status'] = $modelStatus->findAll();
  
    return view('templates/' . $firma->template,$data);
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
