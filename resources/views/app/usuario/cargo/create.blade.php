@extends('utils.layout.base')

@section('title', $controller_title)

@section('content')
    @include('utils.partials.header')
    @include('utils.partials.notification')

    <x-forms.form.cargo
        :model="$model"
        :setores="$setores"
        :perfis="$perfis"
        :cargos="$cargos"
        metodo="store"/>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endsection
