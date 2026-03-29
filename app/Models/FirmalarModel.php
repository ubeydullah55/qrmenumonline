<?php

namespace App\Models;

use CodeIgniter\Model;

class FirmalarModel extends Model
{
    protected $table      = 'firmalar';
    protected $primaryKey = 'firma_id';

    protected $allowedFields = [
        'firma_ad',
        'creadet_date',
        'end_date',
        'creadet_user',
        'template',
        'price',
        'aciklama',
        'is_demo',
    ];
}