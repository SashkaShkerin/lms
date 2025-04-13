@extends('layouts.master')
@section('page_title', 'Занятия')

@section('header_rigth')

<a href="{{ route('subjects.create') }}" type="submit" class="btn btn-primary">Добавить</a>

@endsection


@section('content')

    <div class="card">
      
        <table class="table datatable-button-html5-columns">
            <thead>
            <tr>
                <th>Название</th>
                <th>Короткое название</th>
                <th>Группа</th>
                <th>Учитель</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }} </td>
                    <td>{{ $subject->slug }} </td>
                    <td>{{ $subject->my_class->name }}</td>
                    <td>{{ $subject->teacher->name }}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left">
                                    {{--edit--}}
                                    @if(Qs::userIsTeamSA())
                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                    @endif
                                    {{--Delete--}}
                                    @if(Qs::userIsSuperAdmin())
                                        <a id="{{ $subject->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                        <form method="post" id="item-delete-{{ $subject->id }}" action="{{ route('subjects.destroy', $subject->id) }}" class="hidden">@csrf @method('delete')</form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@endsection
