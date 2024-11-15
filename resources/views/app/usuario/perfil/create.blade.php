@extends('utils.layout.base')

@section('title', $controller_title)

@section('content')
    @include('utils.partials.header')
    @include('utils.partials.notification')

    <x-forms.form.perfil :model="$model" metodo="store"/>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endsection
