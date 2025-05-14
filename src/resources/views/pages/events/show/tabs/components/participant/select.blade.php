@php
    use App\Repositories\Event\ParticipantRepo;

@endphp


<select class="select form-control" name="participant-select" participant="{{ $participant->id }}" oninput="console.log(123)">
    @foreach(ParticipantRepo::statusLabel() as $key => $value)
        <option {{ $participant->status == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>