<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table      = 'settings';

    protected $allowedFields = ['id','firma_id', 'logo_url', 'favIcon_url', 'companyName', 'instagramUrl', 'twitterUrl', 'facebookUrl', 'location','location_url', 'phone', 'mail', 'hakkimizda', 'haftaIci', 'haftaSonu'];
}