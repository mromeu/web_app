@if(auth()->user()->hasPermission($controller_name.'.re') || auth()->user()->hasPermission('global'))
    <a class="btn btn-success btn-sm" href="{{ route($controller_name . '.edit', ['id' => $row->id]) }}" role="button"><i
                class="bi bi-pencil-fill"></i></a>
    @if($controller_name != 'permissao')
        <button type="button" id="b{{ $row->id }}" class="btn btn-sm btn-secondary ms-2"
                onclick="active_item({{ $row->active == 1 ? '0' : '1'}}, {{ $row->id }}, '{{ $controller_name }}', this)">
            <i id="toggle{{ $row->id }}" class="bi bi-toggle-{{ $row->active == 1 ? 'on': 'off'}}"></i>
        </button>
    @endif
@endif
@if(auth()->user()->hasPermission($controller_name.'.fa') || auth()->user()->hasPermission('global'))
    <button type="button" class="btn btn-sm btn-danger ms-2"
            onclick="delete_item({{ $row->id }}, '{{ $controller_name }}')">
        <i class="bi bi-trash"></i>
    </button>
    @if($controller_name == 'user')
        <button type="button" class="btn btn-sm btn-dark ms-2" data-bs-toggle="modal" data-bs-target="#passChange"><i
                    class="bi bi-shield-lock"></i></button>
        @include('utils.partials.change_password')
    @endif
@endif