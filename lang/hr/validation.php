<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'accepted'             => 'Polje :attribute mora biti prihvaćeno.',
    'active_url'           => 'Polje :attribute nije valjana URL-adresa.',
    'after'                => 'Polje :attribute mora biti datum nakon :date.',
    'after_or_equal'       => 'Polje :attribute mora biti datum nakon ili jednak :date.',
    'alpha'                => 'Polje :attribute može sadržavati samo slova.',
    'alpha_dash'           => 'Polje :attribute može sadržavati samo slova, brojeve, crtice i podvlake.',
    'alpha_num'            => 'Polje :attribute može sadržavati samo slova i brojeve.',
    'array'                => 'Polje :attribute mora biti niz.',
    'before'               => 'Polje :attribute mora biti datum prije :date.',
    'before_or_equal'      => 'Polje :attribute mora biti datum prije ili jednak :date.',
    'between'              => [
        'numeric' => 'Polje :attribute mora biti između :min i :max.',
        'file'    => 'Datoteka :attribute mora biti veličine između :min i :max kilobajta.',
        'string'  => 'Polje :attribute mora imati između :min i :max znakova.',
        'array'   => 'Polje :attribute mora imati između :min i :max stavki.',
    ],
    'boolean'              => 'Polje :attribute mora biti istina ili laž.',
    'confirmed'            => 'Potvrda polja :attribute se ne poklapa.',
    'date'                 => 'Polje :attribute nije valjan datum.',
    'date_equals'          => 'Polje :attribute mora biti datum jednak :date.',
    'date_format'          => 'Polje :attribute ne odgovara formatu :format.',
    'different'            => 'Polje :attribute i :other moraju biti različiti.',
    'digits'               => 'Polje :attribute mora imati :digits znamenki.',
    'digits_between'       => 'Polje :attribute mora imati između :min i :max znamenki.',
    'dimensions'           => 'Slika :attribute ima nevažeće dimenzije.',
    'distinct'             => 'Polje :attribute ima duplu vrijednost.',
    'email'                => 'Polje :attribute mora biti valjana e-pošta.',
    'ends_with'            => 'Polje :attribute mora završavati jednim od sljedećeg: :values.',
    'exists'               => 'Odabrano polje :attribute je nevažeće.',
    'file'                 => 'Polje :attribute mora biti datoteka.',
    'filled'               => 'Polje :attribute mora imati vrijednost.',
    'gt'                   => [
        'numeric' => 'Polje :attribute mora biti veće od :value.',
        'file'    => 'Datoteka :attribute mora biti veća od :value kilobajta.',
        'string'  => 'Polje :attribute mora imati više od :value znakova.',
        'array'   => 'Polje :attribute mora imati više od :value stavki.',
    ],
    'gte'                  => [
        'numeric' => 'Polje :attribute mora biti veće ili jednako :value.',
        'file'    => 'Datoteka :attribute mora biti veća ili jednaka :value kilobajta.',
        'string'  => 'Polje :attribute mora imati najmanje :value znakova.',
        'array'   => 'Polje :attribute mora imati :value ili više stavki.',
    ],
    'image'                => 'Polje :attribute mora biti slika.',
    'in'                   => 'Odabrano polje :attribute je nevažeće.',
    'in_array'             => 'Polje :attribute ne postoji u :other.',
    'integer'              => 'Polje :attribute mora biti cijeli broj.',
    'ip'                   => 'Polje :attribute mora biti valjana IP-adresa.',
    'json'                 => 'Polje :attribute mora biti valjani JSON string.',
    'lt'                   => [
        'numeric' => 'Polje :attribute mora biti manje od :value.',
        'file'    => 'Datoteka :attribute mora biti manja od :value kilobajta.',
        'string'  => 'Polje :attribute mora imati manje od :value znakova.',
        'array'   => 'Polje :attribute mora imati manje od :value stavki.',
    ],
    'lte'                  => [
        'numeric' => 'Polje :attribute mora biti manje ili jednako :value.',
        'file'    => 'Datoteka :attribute mora biti manja ili jednaka :value kilobajta.',
        'string'  => 'Polje :attribute mora imati najviše :value znakova.',
        'array'   => 'Polje :attribute mora imati najviše :value stavki.',
    ],
    'max'                  => [
        'numeric' => 'Polje :attribute ne može biti veće od :max.',
        'file'    => 'Datoteka :attribute ne može biti veća od :max kilobajta.',
        'string'  => 'Polje :attribute ne može imati više od :max znakova.',
        'array'   => 'Polje :attribute ne može imati više od :max stavki.',
    ],
    'mimes'                => 'Polje :attribute mora biti datoteka tipa: :values.',
    'mimetypes'            => 'Polje :attribute mora biti datoteka tipa: :values.',
    'min'                  => [
        'numeric' => 'Polje :attribute mora biti najmanje :min.',
        'file'    => 'Datoteka :attribute mora biti najmanje :min kilobajta.',
        'string'  => 'Polje :attribute mora imati najmanje :min znakova.',
        'array'   => 'Polje :attribute mora imati najmanje :min stavki.',
    ],
    'not_in'               => 'Odabrano polje :attribute je nevažeće.',
    'not_regex'            => 'Format polja :attribute je nevažeći.',
    'numeric'              => 'Polje :attribute mora biti broj.',
    'present'              => 'Polje :attribute mora biti prisutno.',
    'regex'                => 'Format polja :attribute je nevažeći.',
    'required'             => 'Polje :attribute je obavezno.',
    'required_if'          => 'Polje :attribute je obavezno kad :other ima vrijednost :value.',
    'required_unless'      => 'Polje :attribute je obavezno, osim ako :other ima vrijednost :values.',
    'required_with'        => 'Polje :attribute je obavezno kad je prisutno :values.',
    'required_with_all'    => 'Polje :attribute je obavezno kad su prisutni :values.',
    'required_without'     => 'Polje :attribute je obavezno kad :values nisu prisutni.',
    'required_without_all' => 'Polje :attribute je obavezno kad nijedan od :values nije prisutan.',
    'same'                 => 'Polje :attribute i :other moraju se podudarati.',
    'size'                 => [
        'numeric' => 'Polje :attribute mora biti :size.',
        'file'    => 'Datoteka :attribute mora biti :size kilobajta.',
        'string'  => 'Polje :attribute mora imati :size znakova.',
        'array'   => 'Polje :attribute mora imati :size stavki.',
    ],
    'string'               => 'Polje :attribute mora biti string.',
    'timezone'             => 'Polje :attribute mora biti valjana zona.',
    'unique'               => 'Polje :attribute već postoji.',
    'uploaded'             => 'Polje :attribute nije uspjelo prilikom slanja.',
    'url'                  => 'Format polja :attribute nije valjan URL.',
    'uuid'                 => 'Polje :attribute mora biti valjani UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'Prilagođena poruka za pravilo :rule-name.',
        ],
        
          'pickup_time' => [
            'time_range' => 'Vrijeme preuzimanja mora biti između 11:00 i 17:00 sati.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [],

];
