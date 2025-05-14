@extends('layouts.master')

@section('page_title', $subject->id ? 'Изменить предмет' : 'Добавить предмет')

@section('header_right')
    <button type="submit" form="form" class="btn btn-primary">Сохранить</button>
@endsection

@section('content.card')

    @if($subject->id)
        <form id="form" class="ajax-update" method="post" action="{{ route('subjects.update', $subject->id) }}">
            @method('PUT')

    @else
        <form id="form" class="ajax-update" method="post" action="{{ route('subjects.store') }}">
    @endif

            @csrf

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

{{--                        <div class="form-group row mb-3">--}}
{{--                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Группа <span class="text-danger">*</span></label>--}}
{{--                            <div class="col-lg-9">--}}
{{--                                <select required data-placeholder="Select Class" class="form-control select" name="my_class_id" id="my_class_id">--}}
{{--                                    @foreach($my_classes as $c)--}}
{{--                                        <option {{ $subject->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="form-group row mb-3">--}}
{{--                            <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Преподаватель</label>--}}
{{--                            <div class="col-lg-9">--}}
{{--                                <select data-placeholder="Select Teacher" class="form-control select-search" name="teacher_id" id="teacher_id">--}}
{{--                                    <option value=""></option>--}}
{{--                                    @foreach($teachers as $t)--}}
{{--                                        <option {{ $subject->teacher_id == $t->id ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </form>

@endsection
