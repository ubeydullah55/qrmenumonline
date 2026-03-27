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
    $parts = explode('.', $host);

    if (count($parts) > 1) {
        // Subdomain var
        $slug = $parts[0];
    } else {
        // Subdomain yok → ana domain
        // İster landing yönlendir, ister $firma = null bırak
        $slug = null;
    }

    if ($slug) {
        $firma = $db->table('firmalar')
                    ->where('firma_ad', $slug)
                    ->get()
                    ->getRow();

        if (!$firma) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        session()->set('firma', $firma);
    } else {
        // Ana domain → yönlendirme
        //return redirect()->to('/'); // veya istediğin landing page
    }
}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}