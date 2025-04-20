<table class="table datatable-button-html5-columns">
    <thead>
    <tr>
        @foreach($list['columns'] as $column)
            <th>{{ $column['title'] }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($list['items'] as $items)
        <tr>
            @foreach($items as $code => $item)
                @if($code == 'actions')
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left">
                                    @foreach($item as $action_code => $action_item)

                                        @if($action_code == 'edit')
                                            @if(Qs::userIsTeamSA())
                                                <a href="{{ route(...$action_item['route']) }}"
                                                   class="dropdown-item"><i class="icon-pencil"></i> Редактировать</a>
                                            @endif

                                        @elseif($action_code == 'show')
                                            @if(Qs::userIsTeamSA())
                                                <a href="{{ route(...$action_item['route']) }}"
                                                   class="dropdown-item"><i class="icon-eye"></i> Посмотреть</a>
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
                    <td>{{ $item['value'] }} </td>
                    @endif
                    </td>

                    @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
