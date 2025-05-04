<table class="table table-bordered">
    <tbody>
    <tr>
        <td class="font-weight-bold">Занятие</td>
        <td>{{ $event->subject?->name }}</td>
    </tr>
    <tr>
        <td class="font-weight-bold">Преподаватель</td>
{{--        <td>{{ $event->teacher?->name }}</td>--}}
        <td>{{ $event->subject?->teacher?->name }}</td>
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

    <tr>
        <td class="font-weight-bold">Файлы</td>
        <td>
            @foreach ($event->files as $file)
                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">
                    {{ $file->original_name }}
                </a><br>
            @endforeach
        </td>
    </tr>
    </tbody>
</table>
