<?php

return [
    'title' => 'Uluworks RestPOS Kurulum Sihirbazı',
    'next'  => 'Sonraki Adım',

    'welcome' => [
        'templateTitle' => 'Hoş Geldiniz',
        'title'         => 'Uluworks RestPOS Kurulum Sihirbazı',
        'message'       => 'Kolay kurulum ve yapılandırma sihirbazı.',
        'next'          => 'Gereksinimleri Kontrol Et',
    ],

    'requirement' => [
        'templateTitle' => 'Adım 1 | Sunucu Gereksinimleri',
        'title'         => 'Sunucu Gereksinimleri',
        'next'          => 'İzinleri Kontrol Et',
        'version'       => 'sürüm',
        'required'      => 'gerekli',
    ],

    'permission' => [
        'templateTitle'       => 'Adım 2 | İzinler',
        'title'               => 'İzinler',
        'next'                => 'Lisans Kurulumu',
        'permission_checking' => 'İzin Kontrolü',
    ],

    'license' => [
        'templateTitle'  => 'Adım 3 | Lisans',
        'title'          => 'Lisans Kurulumu',
        'next'           => 'Site Kurulumu',
        'active_process' => 'Aktivasyon İşlemi',
        'label'          => [
            'license_key'  => 'Lisans Anahtarı',
            'license_code' => 'Lisans Kodu',
        ],
    ],

    'site' => [
        'templateTitle' => 'Adım 4 | Site Kurulumu',
        'title'         => 'Site Kurulumu',
        'next'          => 'Veritabanı Kurulumu',
        'label'         => [
            'app_name' => 'Uygulama Adı',
            'app_url'  => 'Uygulama URL',
        ],
    ],

    'database' => [
        'templateTitle' => 'Adım 5 | Veritabanı Kurulumu',
        'title'         => 'Veritabanı Kurulumu',
        'next'          => 'Son Kurulum',
        'fail_message'  => 'Veritabanına bağlanılamadı.',
        'label'         => [
            'database_connection' => 'Veritabanı Bağlantısı',
            'database_host'       => 'Veritabanı Sunucusu',
            'database_port'       => 'Veritabanı Portu',
            'database_name'       => 'Veritabanı Adı',
            'database_username'   => 'Veritabanı Kullanıcı Adı',
            'database_password'   => 'Veritabanı Şifresi',
        ],
    ],

    'final' => [
        'templateTitle'   => 'Adım 6 | Son Kurulum',
        'title'           => 'Son Kurulum',
        'success_message' => 'Uygulama başarıyla kuruldu.',
        'login_info'      => 'Giriş Bilgileri',
        'email'           => 'E-posta',
        'password'        => 'Şifre',
        'email_info'      => 'admin@example.com',
        'password_info'   => '123456',
        'next'            => 'Bitir',
    ],

    'installed' => [
        'success_log_message' => 'Uluworks RestPOS kurulum işlemi başarıyla TAMAMLANDI: ',
        'update_log_message'  => 'Uluworks RestPOS kurulum güncellemesi başarıyla TAMAMLANDI: ',
    ],
];
