@extends('utils.layout.base')

@section('title', $controller_title)

@section('content')
    @include('utils.partials.header')
    @include('utils.partials.notification')

    <table class="table table-borderless table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">E-MAIL</th>
            <th scope="col">CARGO</th>
            <th scope="col">SETOR</th>
            <th scope="col">PERFIL</th>
            <th scope="col">ID</th>
            <th class="text-end" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($user_rows as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->cargo?->cargo_nome }}</td>
                <td>{{ $row->setor?->setor_nome }}</td>
                <td>{{ $row->perfil?->perfil_nome }}</td>
                <td>{{ $row->id }}</td>
                <td class="text-end" scope="col">@include('utils.partials.action_list')</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
