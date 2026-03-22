<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = 'status'; // Tablonun adı
    protected $primaryKey = 'id'; // Primary key alanı
    protected $allowedFields = ['firma_id','garson_cagir', 'fiyat', 'aciklama', 'resim']; // Güncellenebilir alanlar
    protected $useTimestamps = false; // Zaman damgası alanlarını kullanmıyoruz

    /**
     * Belirli ID'ye sahip satırı günceller
     *
     * @param int $id Güncellenecek satırın ID'si
     * @param array $data Güncellenecek veriler
     * @return bool
     */
    public function updateStatusById(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Formdan gelen verilerle güncelleme yapar
     *
     * @param \CodeIgniter\HTTP\IncomingRequest $request
     * @param int $id Güncellenecek satırın ID'si
     * @return bool
     */
    public function updateFromRequest($request, int $id)
    {
        $data = [
            'garson_cagir' => $request->getPost('garson_cagir') ?? 0,
            'fiyat' => $request->getPost('fiyat') ?? 0,
            'aciklama' => $request->getPost('aciklama') ?? '',
            'resim' => $request->getPost('resim') ?? '',
        ];

        return $this->updateStatusById($id, $data);
    }
}