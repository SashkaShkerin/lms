<?php

namespace App\Repositories;

use App\Models\Subject;

class SubjectRepo
{

    public function all()
    {
        return Subject::orderBy('name', 'asc')->with(['my_class', 'teacher'])->get();
    }


    public function find($id)
    {
        return Subject::find($id);
    }

    public function create($data)
    {
        return Subject::create($data);
    }

    public function update($id, $data)
    {
        return Subject::find($id)->update($data);
    }

    public function delete($id)
    {
        return Subject::destroy($id);
    }


    public function findByClass($class_id, $order_by = 'name')
    {
        return Subject::where(['my_class_id'=> $class_id])->orderBy($order_by)->get();
    }

    public function findSubjectByTeacher($teacher_id, $order_by = 'name')
    {
        return Subject::where(['teacher_id'=> $teacher_id])->orderBy($order_by)->get();
    }

}