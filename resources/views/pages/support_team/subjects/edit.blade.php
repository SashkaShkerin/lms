@extends('layouts.master')

@section('page_title', $subject->id ? 'Изменить занятие' : 'Добавить занятие')

@section('content')
  
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-update" method="post" action="{{ $subject->id ? route('subjects.update', $subject->id) : route('subjects.store') }}">
                        @csrf @method('PUT')
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Название <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $subject->name }}" required type="text" class="form-control" placeholder="Название">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Короткое название</label>
                            <div class="col-lg-9">
                                <input name="slug" value="{{ $subject->slug }}"  type="text" class="form-control" placeholder="Короткое название">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Группа <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required data-placeholder="Select Class" class="form-control select" name="my_class_id" id="my_class_id">
                                    @foreach($my_classes as $c)
                                        <option {{ $subject->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Учитель</label>
                            <div class="col-lg-9">
                                <select data-placeholder="Select Teacher" class="form-control select-search" name="teacher_id" id="teacher_id">
                                    <option value=""></option>
                                    @foreach($teachers as $t)
                                        <option {{ $subject->teacher_id == $t->id ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--subject Edit Ends--}}

@endsection
