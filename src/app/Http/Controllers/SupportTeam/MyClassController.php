<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Models\MyClass;
use App\Http\Requests\MyClass\ClassCreate;
use App\Http\Requests\MyClass\ClassUpdate;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;

class MyClassController extends Controller
{
    protected $my_class, $user;

    public function __construct(MyClassRepo $my_class, UserRepo $user)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
    }

    public function index()
    {
        $list = [
            'columns' => [
                'id' => ['title' => 'ID'],
                'name' => ['title' => 'Название'],
                'actions' => ['title' => 'Действия'],
            ],
            'items' => [],
        ];

        foreach($this->my_class->all() as $my_class) {
            $list['items'][] = [
                'id' => [
                    'value' => $my_class->id,
                ],
                'name' => [
                    'value' => $my_class->name,
                ],
                'actions' => [
                    'edit' => [
                        'route' => [
                            'classes.edit', $my_class->id
                        ]
                    ],
                    'show' => [
                        'route' => [
                            'classes.show', $my_class->id
                        ]
                    ],
                ],
            ];
        }

        return view('pages.entity.list')
            ->with('title', 'Группы')
            ->with('actions', [
                [
                    'route_name' => 'classes.create',
                    'text' => 'Добавить',
                ]
            ])
            ->with('list', $list);
    }

    public function create()
    {
        $class = new MyClass();

        return view('pages.support_team.classes.edit')
            ->with('class', $class);
    }

    public function store(ClassCreate $req)
    {
        $data = $req->all();
        $mc = $this->my_class->create($data);
//
//        // Create Default Section
//        $s =['my_class_id' => $mc->id,
//            'name' => 'A',
//            'active' => 1,
//            'teacher_id' => NULL,
//        ];
//
//        $this->my_class->createSection($s);

        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['class'] = $c = $this->my_class->find($id);

        return is_null($c) ? Qs::goWithDanger('classes.index') : view('pages.support_team.classes.edit', $d) ;
    }

    public function update(ClassUpdate $req, $id)
    {
        $data = $req->only(['name']);
        $this->my_class->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function show($id)
    {
        $class = $this->my_class->find($id);

        return view('pages.support_team.classes.show')
            ->with('class', $class);
    }

    public function destroy($id)
    {
        $this->my_class->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
