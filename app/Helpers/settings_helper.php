<?php



function settingsGet()
{
    $modelsettings = new \App\Models\SettingsModel();

    $firma = session()->get('firma');

    if (!$firma) {
        return [
            'settings' => []
        ];
    }

    $settings = $modelsettings
        ->where('firma_id', $firma->firma_id)
        ->first();

    if (!empty($settings)) {
        return [
            'settings' => [
                'id' => $settings['id'],
                'logo_url' => $settings['logo_url'],
                'favIcon_url' => $settings['favIcon_url'],
                'companyName' => $settings['companyName'],
                'instagramUrl' => $settings['instagramUrl'],
                'twitterUrl' => $settings['twitterUrl'],
                'facebookUrl' => $settings['facebookUrl'],
                'location' => $settings['location'],
                'phone' => $settings['phone'],
                'mail' => $settings['mail'],
                'hakkimizda' => $settings['hakkimizda'],
                'haftaIci' => $settings['haftaIci'],
                'haftaSonu' => $settings['haftaSonu'],
            ]
        ];
    }

    // boşsa default
    return [
        'settings' => [
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
        ]
    ];
}