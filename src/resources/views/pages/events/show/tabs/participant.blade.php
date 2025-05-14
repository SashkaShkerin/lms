@php

    use App\Helpers\Qs;

    $list = [
        'columns' => [
            'id' => ['title' => 'ID'],
            'name' => ['title' => 'Имя'],
//            'email' => ['title' => 'Почта'],
            'status' =>false  && Qs::userIsTeamSAT() ? ['title' => 'Статус'] : [],
            'actions' => ['title' => 'Действия'],
        ],
        'items' => [],
    ];

        foreach($event->participants()->get() as $participant) {
            $user = $participant->fileable->user;

            $item = [
                'id' => [
                    'value' => $user->id,
                ],
                'name' => [
                    'value' => $user->name,
                ],
//                'email' => [
//                    'value' => $user->email,
//                ],
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

            if (false && Qs::userIsTeamSAT()) {
               $item['status'] = [
                    'value' => view('pages.events.show.tabs.components.participant.select', [
                        'participant' => $participant,
                    ])
                ];
            }

            $list['items'][] = $item;
        }
@endphp


@include('components.list', ['list' => $list])
