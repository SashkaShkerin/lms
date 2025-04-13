@extends('layouts.master')
@section('page_title', $event->id ? 'Изменить событие' : 'Добавить событие')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="col-md-8">
                <form class="ajax-update" method="post" action="{{ route('event.update', $event->id) }}">
                    @csrf @method('PUT')

                    <div class="form-group row mb-3">
                        <label for="subject_id" class="col-lg-3 col-form-label font-weight-semibold">Занятие</label>
                        <div class="col-lg-9">
                            <select class=" select form-control" name="subject_id" id="subject_id">
                                @foreach($subjects as $subject)
                                    <option {{ $event->subject_id == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row mb-3">
                        <label  class="col-lg-3 col-form-label font-weight-semibold">Дата начала</label>
                        <div class="col-lg-3">
                            <input type="date" name="start_date" class="form-control" value="{{ (new \DateTime($event->start_time))->format('Y-m-d') }}">
                        </div>
                        <div class="col-lg-2">
                            <input type="time" name="start_time" class="form-control" value="{{ (new \DateTime($event->start_time))->format('H:i') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Дата конца</label>
                        <div class="col-lg-3">
                            <input type="date" name="end_date" class="form-control" value="{{ (new \DateTime($event->end_time))->format('Y-m-d') }}">
                        </div>
                        <div class="col-lg-2">
                            <input type="time" name="end_time" class="form-control" value="{{ (new \DateTime($event->end_time))->format('H:i') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Описание</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="description" rows="5">{{ $event->description }}</textarea>
                        </div>
                    </div>



                    <div class="text-right">
                        <button id="ajax-btn" type="submit" class="btn btn-primary">Сохранить <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    {{--TimeTable Edit Ends--}}

@endsection
