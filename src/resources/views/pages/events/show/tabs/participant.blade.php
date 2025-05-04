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

        foreach($event->participants()->get() as $participant) {
            $user = $participant->fileable->user;

            $list['items'][] = [
                'id' => [
                    'value' => $user->id,
                ],
                'name' => [
                    'value' => $user->name,
                ],
                'email' => [
                    'value' => $user->email,
                ],
                'actions' => [
                    'edit' => [
                        'route' => [
                            'students.edit', Qs::hash($user->id)
                        ]
                    ],
                    'show' => [
                        'route' => [
                            'students.show', Qs::hash($user->id)
                        ]
                    ],
                ],
            ];
        }
@endphp



@include('components.list', ['list' => $list])
