@extends('layouts.master')
@section('page_title', $event->id ? 'Изменить событие' : 'Добавить событие')

@section('header_right')
   <button type="submit" form="form" class="btn btn-primary">Сохранить</button>
@endsection

@section('content.card')


                @if($event->id)
                    <form id="form" class="ajax-update" enctype="multipart/form-data" method="post" action="{{ route('events.update', $event->id) }}">
                    @method('PUT')

                @else
                    <form id="form" class="ajax-update" enctype="multipart/form-data" method="post" action="{{ route('events.store') }}">
                @endif

                    @csrf

                    <div class="form-group row mb-3">
                        <label for="subject_id" class="col-lg-3 col-form-label font-weight-semibold">Предмет</label>
                        <div class="col-lg-9">
                            <select class=" select form-control" name="subject_id" id="subject_id">
                                <option value="0">Не указано</option>

                                @foreach($subjects as $subject)
                                    <option {{ $event->subject_id == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Преподаватель</label>
                        <div class="col-lg-9">
                            <select class=" select form-control" name="teacher_id" id="teacher_id">
                                <option value="0">Не указано</option>

                                @foreach($teachers as $teacher)
                                    <option {{ $event->teacher_id == $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="participant_class" class="col-lg-3 col-form-label font-weight-semibold">Группа</label>
                        <div class="col-lg-9">
                            <select class=" select form-control" name="participant_class" id="participant_class">
                                <option value="0">Не указано</option>

                                @foreach($classes as $class)
                                    <option {{ $event->class_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="subject_id" class="col-lg-3 col-form-label font-weight-semibold">Ученики</label>
                        <div class="col-lg-9">
                            <select class=" select form-control" multiple name="participant_students[]" id="subject_id">
                                @foreach($students as $student)
                                    <option {{ !!$event->participants->where('type', '=', 20)->where('fileable_id', '=', $student->id)->first() ? 'selected' : '' }} value="{{ $student->id }}">{{ $student->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--                        <select class=" select form-control" multiple data-coreui-search="true">--}}
                    {{--                            <option value="0" selected>Angular</option>--}}
                    {{--                            <option value="1">Bootstrap</option>--}}
                    {{--                            <option value="2">React.js</option>--}}
                    {{--                            <option value="3">Vue.js</option>--}}
                    {{--                            <optgroup label="backend">--}}
                    {{--                                <option value="4">Django</option>--}}
                    {{--                                <option value="5" selected>Laravel</option>--}}
                    {{--                                <option value="6">Node.js</option>--}}
                    {{--                            </optgroup>--}}
                    {{--                        </select>--}}


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



                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Файлы</label>
                        <div class="col-lg-9">
                            <input multiple type="file" name="files[]" class="form-input-styled" data-fouc>
                        </div>
                    </div>


                </form>


@endsection
