<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Doğrulama Mesajları
    |--------------------------------------------------------------------------
    |
    | Bu satırlar doğrulayıcı tarafından kullanılan varsayılan hata mesajlarıdır.
    | İsterseniz bunları uygulamanızın ihtiyaçlarına göre özelleştirebilirsiniz.
    |
    */

    'accepted'             => ':attribute kabul edilmelidir.',
    'accepted_if'          => ':other :value olduğunda :attribute kabul edilmelidir.',
    'active_url'           => ':attribute geçerli bir URL olmalıdır.',
    'after'                => ':attribute :date tarihinden sonra bir tarih olmalıdır.',
    'after_or_equal'       => ':attribute :date tarihinden sonra veya eşit bir tarih olmalıdır.',
    'alpha'                => ':attribute yalnızca harf içermelidir.',
    'alpha_dash'           => ':attribute yalnızca harf, sayı, tire ve alt çizgi içerebilir.',
    'alpha_num'            => ':attribute yalnızca harf ve sayı içermelidir.',
    'array'                => ':attribute bir dizi (array) olmalıdır.',
    'before'               => ':attribute :date tarihinden önce bir tarih olmalıdır.',
    'before_or_equal'      => ':attribute :date tarihinden önce veya eşit bir tarih olmalıdır.',

    'between' => [
        'array'   => ':attribute :min ile :max arasında öğe içermelidir.',
        'file'    => ':attribute :min ile :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute :min ile :max arasında olmalıdır.',
        'string'  => ':attribute :min ile :max karakter arasında olmalıdır.',
    ],

    'boolean'             => ':attribute alanı doğru ya da yanlış olmalıdır.',
    'confirmed'           => ':attribute doğrulaması eşleşmiyor.',
    'current_password'    => 'Şifre hatalı.',
    'date'                => ':attribute geçerli bir tarih olmalıdır.',
    'date_equals'         => ':attribute :date tarihine eşit bir tarih olmalıdır.',
    'date_format'         => ':attribute :format formatı ile eşleşmiyor.',
    'declined'            => ':attribute reddedilmelidir.',
    'declined_if'         => ':other :value olduğunda :attribute reddedilmelidir.',
    'different'           => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits'              => ':attribute :digits basamak olmalıdır.',
    'digits_between'      => ':attribute :min ile :max basamak arasında olmalıdır.',
    'dimensions'          => ':attribute geçersiz görsel boyutlarına sahip.',
    'distinct'            => ':attribute alanında yinelenen bir değer var.',
    'doesnt_end_with'     => ':attribute şu değerlerden biriyle bitemez: :values.',
    'doesnt_start_with'   => ':attribute şu değerlerden biriyle başlayamaz: :values.',
    'email'               => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'ends_with'           => ':attribute şu değerlerden biriyle bitmelidir: :values.',
    'enum'                => 'Seçilen :attribute geçersiz.',
    'exists'              => 'Seçilen :attribute geçersiz.',
    'file'                => ':attribute bir dosya olmalıdır.',
    'filled'              => ':attribute alanı bir değer içermelidir.',

    'gt' => [
        'array'   => ':attribute :value öğeden fazla olmalıdır.',
        'file'    => ':attribute :value kilobayttan büyük olmalıdır.',
        'numeric' => ':attribute :value değerinden büyük olmalıdır.',
        'string'  => ':attribute :value karakterden uzun olmalıdır.',
    ],

    'gte' => [
        'array'   => ':attribute en az :value öğe içermelidir.',
        'file'    => ':attribute :value kilobayttan büyük veya eşit olmalıdır.',
        'numeric' => ':attribute :value değerinden büyük veya eşit olmalıdır.',
        'string'  => ':attribute :value karakterden uzun veya eşit olmalıdır.',
    ],

    'image'               => ':attribute bir resim dosyası olmalıdır.',
    'in'                  => 'Seçilen :attribute geçersiz.',
    'in_array'            => ':attribute alanı :other içinde bulunmuyor.',
    'integer'             => ':attribute bir tam sayı olmalıdır.',
    'ip'                  => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4'                => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json'                => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'lowercase'           => ':attribute küçük harf olmalıdır.',

    'lt' => [
        'array'   => ':attribute :value öğeden az olmalıdır.',
        'file'    => ':attribute :value kilobayttan küçük olmalıdır.',
        'numeric' => ':attribute :value değerinden küçük olmalıdır.',
        'string'  => ':attribute :value karakterden kısa olmalıdır.',
    ],

    'lte' => [
        'array'   => ':attribute :value öğeden fazla olmamalıdır.',
        'file'    => ':attribute :value kilobayttan küçük veya eşit olmalıdır.',
        'numeric' => ':attribute :value değerinden küçük veya eşit olmalıdır.',
        'string'  => ':attribute :value karakterden kısa veya eşit olmalıdır.',
    ],

    'mac_address'         => ':attribute geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'array'   => ':attribute :max öğeden fazla olamaz.',
        'file'    => ':attribute :max kilobayttan büyük olamaz.',
        'numeric' => ':attribute :max değerinden büyük olamaz.',
        'string'  => ':attribute :max karakterden uzun olamaz.',
    ],

    'max_digits'          => ':attribute en fazla :max basamak olmalıdır.',
    'mimes'               => ':attribute şu dosya türlerinden biri olmalıdır: :values.',
    'mimetypes'           => ':attribute şu dosya türlerinden biri olmalıdır: :values.',
    'min' => [
        'array'   => ':attribute en az :min öğe içermelidir.',
        'file'    => ':attribute en az :min kilobayt olmalıdır.',
        'numeric' => ':attribute en az :min olmalıdır.',
        'string'  => ':attribute en az :min karakter olmalıdır.',
    ],

    'min_digits'          => ':attribute en az :min basamak olmalıdır.',
    'multiple_of'         => ':attribute :value sayısının katı olmalıdır.',
    'not_in'              => 'Seçilen :attribute geçersiz.',
    'not_regex'           => ':attribute formatı geçersiz.',
    'numeric'             => ':attribute bir sayı olmalıdır.',

    'password' => [
        'letters'       => ':attribute en az bir harf içermelidir.',
        'mixed'         => ':attribute en az bir büyük ve bir küçük harf içermelidir.',
        'numbers'       => ':attribute en az bir rakam içermelidir.',
        'symbols'       => ':attribute en az bir sembol içermelidir.',
        'uncompromised' => 'Girilen :attribute bir veri sızıntısında tespit edilmiş. Lütfen farklı bir :attribute seçin.',
    ],

    'present'             => ':attribute alanı bulunmalıdır.',
    'prohibited'          => ':attribute alanı yasaktır.',
    'prohibited_if'       => ':other :value olduğunda :attribute alanı yasaktır.',
    'prohibited_unless'   => ':other :values içinde değilse :attribute alanı yasaktır.',
    'prohibits'           => ':attribute alanı :other alanının bulunmasını engelliyor.',
    'regex'               => ':attribute formatı geçersiz.',
    'required'            => ':attribute alanı zorunludur.',
    'required_array_keys' => ':attribute alanı şu girişleri içermelidir: :values.',
    'required_if'         => ':other :value olduğunda :attribute alanı zorunludur.',
    'required_if_accepted'=> ':other kabul edildiğinde :attribute alanı zorunludur.',
    'required_unless'     => ':other :values içinde değilse :attribute alanı zorunludur.',
    'required_with'       => ':values mevcut olduğunda :attribute alanı zorunludur.',
    'required_with_all'   => ':values mevcut olduğunda :attribute alanı zorunludur.',
    'required_without'    => ':values mevcut olmadığında :attribute alanı zorunludur.',
    'required_without_all'=> ':values hiçbiri mevcut değilse :attribute alanı zorunludur.',

    'same'                => ':attribute ile :other eşleşmelidir.',

    'size' => [
        'array'   => ':attribute :size öğe içermelidir.',
        'file'    => ':attribute :size kilobayt olmalıdır.',
        'numeric' => ':attribute :size olmalıdır.',
        'string'  => ':attribute :size karakter olmalıdır.',
    ],

    'starts_with' => ':attribute şu değerlerden biriyle başlamalıdır: :values.',
    'string'      => ':attribute bir metin olmalıdır.',
    'timezone'    => ':attribute geçerli bir zaman dilimi olmalıdır.',
    'unique'      => ':attribute zaten kullanılıyor.',
    'uploaded'    => ':attribute yüklenemedi.',
    'uppercase'   => ':attribute büyük harf olmalıdır.',
    'url'         => ':attribute geçerli bir URL olmalıdır.',
    'uuid'        => ':attribute geçerli bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Özel Doğrulama Mesajları
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'özel mesaj',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Özel Alan İsimleri
    |--------------------------------------------------------------------------
    |
    | Bu bölüm, hata mesajlarında görünen attribute isimlerini daha
    | anlaşılır hale getirmek için kullanılır.
    |
    */

    'attributes' => [],

];
