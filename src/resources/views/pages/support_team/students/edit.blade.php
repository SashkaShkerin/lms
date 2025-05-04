@extends('layouts.master')
@section('page_title', $sr?->user?->name ?? 'Ученик')

@section('header_right')
    <button type="submit" form="form" class="btn btn-primary">Сохранить</button>
@endsection

@section('content.card')
    @if($sr->id)
        <form id="form" class="ajax-update" method="post" action="{{ route('students.update', Qs::hash($sr->id)) }}">
            @method('PUT')

    @else
        <form id="form" class="ajax-update" method="post" action="{{ route('students.store') }}">
    @endif

        @csrf

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">ФИО</label>
                    <div class="col-lg-9">
                        <input value="{{ $sr?->user?->name }}" required type="text" name="name" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Email</label>
                    <div class="col-lg-9">
                        <input value="{{ $sr?->user?->email  }}" type="email" name="email" class="form-control" placeholder="your@email.com">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Телефон</label>
                    <div class="col-lg-9">
                        <input value="{{ $sr?->user?->phone  }}" type="text" name="phone" class="form-control" placeholder="" >
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">День рожденья</label>
                    <div class="col-lg-9">
                        <input name="dob" value="{{ $sr?->user?->dob  }}" type="text" class="form-control date-pick" placeholder="Выбрать">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Фото</label>
                    <div class="col-lg-9">
                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Класс</label>
                    <div class="col-lg-9">
                        <select onchange="getClassSections(this.value)" name="my_class_id" required id="my_class_id" class="form-control select-search" data-placeholder="Выбрать">
                            <option value=""></option>
                            @foreach($my_classes as $c)
                                <option {{ $sr?->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Родитель</label>
                    <div class="col-lg-9">
                        <select data-placeholder="Выбрать"  name="my_parent_id" id="my_parent_id" class="select-search form-control">
                            <option  value=""></option>
                            @foreach($parents as $p)
                                <option {{ (Qs::hash($sr?->parent_id) == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Дата зачисления</label>
                    <div class="col-lg-9">
                        <select name="year_admitted" data-placeholder="Выбрать" id="year_admitted" class="select-search form-control">
                            <option value=""></option>
                            @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++)
                                <option {{ ($sr?->year_admitted == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </form>
@endsection
