<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Requests\Subject\SubjectCreate;
use App\Http\Requests\Subject\SubjectUpdate;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\SubjectRepo;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectController extends Controller
{
    protected $my_class, $user, $subject;

    public function __construct(MyClassRepo $my_class, SubjectRepo $subject, UserRepo $user)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->subject = $subject;
    }

    public function index()
    { 
        $list = [
            'columns' => [
                'id' => ['title' => 'ID'],
                'name' => ['title' => 'Название'],
                'slug' => ['title' => 'Короткое название'],
                'class' => ['title' => 'Группа'],
                'teacher' => ['title' => 'Учитель'],
                'actions' => ['title' => 'Действия'],
            ], 
            'items' => [],
        ];

        foreach($this->subject->all() as $subject) {
            $list['items'][] = [
                'id' => [
                    'value' => $subject->id,
                ],
                'name' => [
                    'value' => $subject->name,
                ],
                'slug' => [
                    'value' => $subject->slug,
                ],
                'class' => [
                    'value' => $subject->my_class->name,
                ],
                'teacher' => [
                    'value' => $subject->teacher->name,
                ],
                'actions' => [
                    'edit' => [
                        'route' => [
                            'subjects.edit', $subject->id
                        ]
                    ]
                ],
            ];
        }

        return view('pages.entity.list')
            ->with('title', 'Занятия')
            ->with('actions', [
                [
                    'route_name' => 'subjects.create',
                    'text' => 'Добавить',
                ]
            ])
            ->with('list', $list);
    }

    public function store(SubjectCreate $req)
    {
        $data = $req->all();
        $this->my_class->createSubject($data);

        return Qs::jsonStoreOk();
    }

    public function create()
    {
        return view('pages.support_team.subjects.edit')
            ->with('subject', new Subject)
            ->with('my_classes', $this->my_class->all())
            ->with('teachers', $this->user->getUserByType('teacher'));
    }

    public function edit($id)
    {
        $d['subject'] = $sub = $this->my_class->findSubject($id);
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->user->getUserByType('teacher');

        return is_null($sub) ? Qs::goWithDanger('subjects.index') : view('pages.support_team.subjects.edit', $d);
    }

    public function update(SubjectUpdate $req, $id)
    {
        $data = $req->all();
        $this->my_class->updateSubject($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $this->my_class->deleteSubject($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
