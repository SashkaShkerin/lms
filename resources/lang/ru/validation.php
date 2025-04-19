<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые строки для валидации
    |--------------------------------------------------------------------------
    |
    | Следующие строки содержат сообщения об ошибках, используемые
    | классом валидатора. Некоторые из этих правил имеют несколько версий,
    | например, правила размера. Не стесняйтесь изменять их под себя.
    |
    */

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute недействительный URL.',
    'after'                => ':attribute должен быть датой после :date.',
    'after_or_equal'       => ':attribute должен быть датой после или равной :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать только буквы, цифры, дефисы и подчёркивания.',
    'alpha_num'            => ':attribute может содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должен быть датой до :date.',
    'before_or_equal'      => ':attribute должен быть датой до или равной :date.',
    'between'              => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file'    => ':attribute должен быть от :min до :max килобайт.',
        'string'  => ':attribute должен содержать от :min до :max символов.',
        'array'   => ':attribute должен содержать от :min до :max элементов.',
    ],
    'boolean'              => 'Поле :attribute должно быть true или false.',
    'confirmed'            => 'Подтверждение :attribute не совпадает.',
    'date'                 => ':attribute не является корректной датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны отличаться.',
    'digits'               => ':attribute должен быть :digits цифрами.',
    'digits_between'       => ':attribute должен содержать от :min до :max цифр.',
    'dimensions'           => ':attribute имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле :attribute содержит повторяющееся значение.',
    'email'                => ':attribute должен быть корректным email-адресом.',
    'exists'               => 'Выбранный :attribute недействителен.',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => 'Поле :attribute обязательно для заполнения.',
    'gt'                   => [
        'numeric' => ':attribute должен быть больше :value.',
        'file'    => ':attribute должен быть больше :value килобайт.',
        'string'  => ':attribute должен быть длиннее :value символов.',
        'array'   => ':attribute должен содержать больше :value элементов.',
    ],
    'gte'                  => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file'    => ':attribute должен быть больше или равен :value килобайт.',
        'string'  => ':attribute должен быть не короче :value символов.',
        'array'   => ':attribute должен содержать :value элементов или больше.',
    ],
    'image'                => ':attribute должен быть изображением.',
    'in'                   => 'Выбранный :attribute недействителен.',
    'in_array'             => 'Поле :attribute не существует в :other.',
    'integer'              => ':attribute должен быть целым числом.',
    'ip'                   => ':attribute должен быть корректным IP-адресом.',
    'ipv4'                 => ':attribute должен быть корректным IPv4-адресом.',
    'ipv6'                 => ':attribute должен быть корректным IPv6-адресом.',
    'json'                 => ':attribute должен быть корректной JSON-строкой.',
    'lt'                   => [
        'numeric' => ':attribute должен быть меньше :value.',
        'file'    => ':attribute должен быть меньше :value килобайт.',
        'string'  => ':attribute должен быть короче :value символов.',
        'array'   => ':attribute должен содержать меньше :value элементов.',
    ],
    'lte'                  => [
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'file'    => ':attribute должен быть меньше или равен :value килобайт.',
        'string'  => ':attribute должен быть не длиннее :value символов.',
        'array'   => ':attribute не должен содержать больше :value элементов.',
    ],
    'max'                  => [
        'numeric' => ':attribute не должен быть больше :max.',
        'file'    => ':attribute не должен превышать :max килобайт.',
        'string'  => ':attribute не должен превышать :max символов.',
        'array'   => ':attribute не должен содержать более :max элементов.',
    ],
    'mimes'                => ':attribute должен быть файлом одного из следующих типов: :values.',
    'mimetypes'            => ':attribute должен быть файлом одного из следующих типов: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не меньше :min.',
        'file'    => ':attribute должен быть не менее :min килобайт.',
        'string'  => ':attribute должен содержать не менее :min символов.',
        'array'   => ':attribute должен содержать не менее :min элементов.',
    ],
    'not_in'               => 'Выбранный :attribute недействителен.',
    'not_regex'            => 'Формат :attribute недействителен.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => 'Поле :attribute должно быть присутствующим.',
    'regex'                => 'Формат поля :attribute недействителен.',
    'required'             => 'Поле :attribute обязательно для заполнения.',
    'required_if'          => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_unless'      => 'Поле :attribute обязательно, если :other не входит в :values.',
    'required_with'        => 'Поле :attribute обязательно, когда присутствует :values.',
    'required_with_all'    => '

