@extends('layouts.master')
@section('page_title', $class->id ? 'Изменить группу' : 'Добавить группу')

@section('header_right')
    <button type="submit" form="form" class="btn btn-primary">Сохранить</button>
@endsection

@section('content')

    <div class="card">


        <div class="card-body">
            <div class="row">
                <div class="col-md-8">

                    @if($class->id)
                        <form id="form" class="ajax-update" method="post" action="{{ route('classes.update', $class->id) }}">
                    @method('PUT')

                    @else
                        <form id="form" class="ajax-update" method="post" action="{{ route('classes.store') }}">
                    @endif

                    @csrf

                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Название</label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $class->name }}" required type="text" class="form-control">
                            </div>
                        </div>

                      {{--
                      <div class="form-group row mb-3">
                            <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher</label>
                            <div class="col-lg-9">
                                <select data-placeholder="Select Teacher" class="form-control select-search" name="teacher_id" id="teacher_id">
                                    <option value=""></option>
                                    @foreach($teachers as $t)
                                        <option {{ $class->teacher_id == $t->id ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      --}}

{{--                        <div class="form-group row mb-3">--}}
{{--                            <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Class Type</label>--}}
{{--                            <div class="col-lg-9">--}}
{{--                                <input class="form-control" disabled="disabled" value="{{ $class->class_type->name }}" title="Class Type" type="text">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Class Edit Ends--}}

@endsection
