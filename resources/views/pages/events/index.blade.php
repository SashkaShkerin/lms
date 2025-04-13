@extends('layouts.master')
@section('page_title', 'Главная')

@section('header_rigth')

<a href="{{ route('event') }}" type="submit" class="btn btn-primary">Добавить</a>

@endsection


@section('content')



<div id='calendar'></div>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        console.log()
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ru',
            firstDay: 1,
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: false
            },
            dayHeaderFormat: { weekday: 'long' },
            events: {!! json_encode($events) !!},
            // headerToolbar: {
            //     left: 'prev,next',
            //     center: 'title',
            //     right: 'dayGridWeek,dayGridDay' // user can switch between the two
            // }
        });
        calendar.render();
      });

    </script>


@endsection
