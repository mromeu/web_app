@extends('utils.layout.login')
@section('title', 'Login')
@push('sign_form')
    <link rel="stylesheet" href="{{ asset('assets/css/sign-form.css') }}">
@endpush

@section('content')

    <main class="form-signin">
        <x-forms.form.sign-in/>
    </main>

@endsection
