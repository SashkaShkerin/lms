@php

    $list = [
        'columns' => [
//            'avatar' => ['title' => 'Фото'],
            'name' => ['title' => 'Имя'],
            'email' => ['title' => 'Почта'],
            'actions' => ['title' => 'Действия'],
        ],
        'items' => [],
    ];

        foreach($class->student_record as $student_record) {
            $user = $student_record->user;

            $list['items'][] = [
//                'avatar' => [
//                    'value' => '<img class="rounded-circle" style="height: 40px; width: 40px;" src="'. $user->photo .'" alt="photo">',
//                ],
                'name' => [
                    'value' => $user->name,
                ],
                'email' => [
                    'value' => $user->email,
                ],
                'actions' => [
                    'show' => [
                        'route' => [
                            'students.show', Qs::hash($student_record->id)
                        ]
                    ],
                    'edit' => [
                        'route' => [
                            'students.edit', Qs::hash($student_record->id)
                        ]
                    ],
                ],
            ];
        }
@endphp



@include('components.list', ['list' => $list])
