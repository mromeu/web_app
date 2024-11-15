@extends('utils.layout.base')

@section('title', 'Editar '. $controller_title)

@section('content')
    @include('utils.partials.header')
    @include('utils.partials.notification')

    @php $metodo = 'Editar' @endphp

    <x-forms.form.cargo
            :model="$model"
            :setores="$setores"
            :perfis="$perfis"
            :cargos="$cargos"
    />

@endsection
