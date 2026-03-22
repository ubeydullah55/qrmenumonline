<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
      helper('settings');
      if(!empty(settingsGet()['settings']))
      {
          $data['settings'] = settingsGet()['settings'];      
          session()->set('settings', $data['settings']);      
      }
        return view('login',$data);
    }

   public function kontrol()
{
    $model = new \App\Models\KullaniciModel();
    $session = session();

    if ($this->request->getMethod() === 'post') {
        $k_adi = $this->request->getPost('k_adi');
        $k_sifre = md5($this->request->getPost('k_sifre'));

        $user = $model->where('k_adi', $k_adi)->first();

        if (!$user) {
            $session->setFlashdata('danger', 'Telefon no bulunamadı.');
            return redirect()->to('/login');
        }

        if ($k_sifre === $user['k_sifre']) {
            // Kullanıcı bilgilerini session'a kaydet
            $session->set($user);

            // Settings verisini session'a ekle
            helper('settings');
            $settings = settingsGet()['settings'];
            $session->set('settings', $settings);

            return redirect()->to(base_url('panel'));
        } else {
            $session->setFlashdata('danger', 'Şifreniz yanlış.');
            return redirect()->to('/login');
        }
    }

    return redirect()->to('/login');
}


   
}