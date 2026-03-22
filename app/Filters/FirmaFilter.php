<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FirmaFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $db = \Config\Database::connect();

        $host = $_SERVER['HTTP_HOST'];
        $slug = explode('.', $host)[0];

        $firma = $db->table('firmalar')
                    ->where('firma_ad', $slug)
                    ->get()
                    ->getRow();

        if (!$firma) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        session()->set('firma', $firma);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}