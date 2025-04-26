@php

    $list = [
        'columns' => [
            'id' => ['title' => 'ID'],
            'name' => ['title' => 'Имя'],
            'email' => ['title' => 'Почта'],
            'actions' => ['title' => 'Действия'],
        ],
        'items' => [],
    ];

//        foreach($class->student_record as $student_record) {
//            $user = $student_record->user;
//
//            $list['items'][] = [
//                'id' => [
//                    'value' => $user->id,
//                ],
//                'name' => [
//                    'value' => $user->name,
//                ],
//                'email' => [
//                    'value' => $user->email,
//                ],
//                'actions' => [
//                    'edit' => [
//                        'route' => [
//                            'students.edit', Qs::hash($user->id)
//                        ]
//                    ],
//                    'show' => [
//                        'route' => [
//                            'students.show', Qs::hash($user->id)
//                        ]
//                    ],
//                ],
//            ];
//        }
@endphp



@include('components.list', ['list' => $list])
