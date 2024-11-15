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
            <th scope="col">ADMINISTRADOR</th>
            <th scope="col">ID</th>
            <th class="text-end" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->perfil_nome }}</td>
                <td>{{ $row->perfil_admin == 1 ? 'Sim' : 'Não'}}</td>
                <td>{{ $row->id }}</td>
                <td class="text-end">@include('utils.partials.action_list')</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
