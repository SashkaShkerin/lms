<select class="select form-control" name="{{ $name ?? '' }}" >
    @foreach($options as $key => $value)
        <option {{ $selected == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>