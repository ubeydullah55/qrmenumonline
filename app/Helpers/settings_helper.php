<?php

function settingsGet()
{
    $modelsettings = new \App\Models\SettingsModel;
    $data['settings'] = $modelsettings->first();
    if(!empty($data['settings'])){
    $data['settings'] = array(
        'id' => $data['settings']['id'],
        'logo_url' => $data['settings']['logo_url'],
        'favIcon_url' => $data['settings']['favIcon_url'],
        'companyName' => $data['settings']['companyName'],
        'instagramUrl' => $data['settings']['instagramUrl'],
        'twitterUrl' => $data['settings']['twitterUrl'],
        'facebookUrl' => $data['settings']['facebookUrl'],
        'location' => $data['settings']['location'],
        'phone' => $data['settings']['phone'],
        'mail' => $data['settings']['mail'],
        'hakkimizda' => $data['settings']['hakkimizda'],
        'haftaIci' => $data['settings']['haftaIci'],
        'haftaSonu' => $data['settings']['haftaSonu'],
    );   
    }
    //eğer veritabanında kayıt yoksa
    else
    {
        $data['settings'] = array(
            'id' => 0,
            'logo_url' => "",
            'favIcon_url' => "",
            'companyName' => "",
            'instagramUrl' => "",
            'twitterUrl' => "",
            'facebookUrl' => "",
            'location' => "",
            'phone' => "",
            'mail' => "",
            'hakkimizda' => "",
            'haftaIci' => "",
            'haftaSonu' => "",
        ); 
    }
    return ($data);
    
}