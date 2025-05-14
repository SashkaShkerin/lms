@php use Illuminate\Support\Arr; @endphp
<table class="table datatable-button-html5-columns">
    <thead>
    <tr>
        @foreach($list['columns'] as $column)
            @php
            if (!Arr::get($column, 'title')) continue;
            @endphp

            <th>{{ $column['title'] }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($list['items'] as $items)
        <tr>
            @foreach($list['columns'] as $column => $_)
                @php
                    $item = (array)Arr::get($items, $column);
                @endphp
                @if($column == 'actions')
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left">
                                    @foreach($item as $action_code => $action_item)

                                        @if($action_code == 'show')
                                            @if(Qs::userIsTeamSA())
                                                <a href="{{ route(...$action_item['route']) }}"
                                                   class="dropdown-item"><i class="icon-eye"></i> Посмотреть</a>
                                            @endif

                                        @elseif($action_code == 'edit')
                                            @if(Qs::userIsTeamSA())
                                                <a href="{{ route(...$action_item['route']) }}"
                                                   class="dropdown-item"><i class="icon-pencil"></i> Редактировать</a>
                                            @endif

                                        @elseif(false)
                                            {{--Delete--}}
                                            @if(Qs::userIsSuperAdmin())
                                                <a id="{{ $subject->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ $subject->id }}" action="{{ route('subjects.destroy', $subject->id) }}" class="hidden">@csrf @method('delete')</form>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                @else
                    <td>{{ Arr::get($item, 'value') }} </td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
