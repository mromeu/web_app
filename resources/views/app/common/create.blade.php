@extends('utils.layout.base')

@section('title', $controller_title)

@section('content')
    @include('utils.partials.header')

    <x-forms.form.common :model="$model" metodo="store"/>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endsection
