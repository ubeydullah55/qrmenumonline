<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CallController extends Controller
{
    public function get_calls()
    {
        $db = \Config\Database::connect();
        $lastId = $this->request->getGet('lastId') ?? 0;

        $query = $db->table('call_waiter')
                    ->where('id >', $lastId)
                    ->orderBy('id', 'ASC')
                    ->get();

        return $this->response->setJSON($query->getResult());
    }
}
