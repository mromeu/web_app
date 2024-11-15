<h2 class="text-capitalize">
    {{ $controller_title }}
</h2>
<hr>

@if( request()->route()->getActionMethod() == 'index')
    @if(auth()->user()->hasPermission($controller_name.'.fa') || auth()->user()->hasPermission('global'))
        <div class="col-12 my-3">
            <a class="btn btn-success btn-sm" href="{{route($controller_name.'.create')}}" role="button">Adicionar {{ $controller_title }}</a>
        </div>
    @endif
@endif
