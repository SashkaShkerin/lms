<table class="table table-bordered">
    <tbody>
    <tr>
        <td class="font-weight-bold">Занятие</td>
        <td>{{ $event->subject?->name }}</td>
    </tr>
    <tr>
        <td class="font-weight-bold">Преподаватель</td>
        <td>{{ $event->teacher?->name }}</td>
    </tr>
    <tr>
        <td class="font-weight-bold">Дата начала</td>
        <td>{{ $event->start_time }}</td>
    </tr>
    <tr>
        <td class="font-weight-bold">Дата окончания</td>
        <td>{{ $event->end_time }}</td>
    </tr>
    <tr>
        <td class="font-weight-bold">Описание</td>
        <td>{{ $event->description }}</td>
    </tr>
    </tbody>
</table>
