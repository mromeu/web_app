@extends('utils.layout.base')

@section('title', 'Editar '. $controller_title)

@section('content')
    @include('utils.partials.header')
    @include('utils.partials.notification')

    @php $metodo = 'Editar' @endphp

    <x-forms.form.permissao :model="$model" :permissoes="$permissoes" :usuarios="$usuarios" :perfis="$perfis"/>

@endsection
