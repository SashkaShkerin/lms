@section('header_bottom')
    <ul class="nav">
        @foreach ($tabs as $tab)
            <li class="nav-item">
                <a href="#{{ $tab['id'] }}" class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                    {{ $tab['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

@section('content.card')
    <div class="tab-content">
        @foreach ($tabs as $tab)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $tab['id'] }}">
                {!! $tab['content'] !!}
            </div>
        @endforeach
    </div>
@endsection
