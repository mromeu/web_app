@extends('utils.layout.base')

@section('title', $controller_title)

@section('content')
    @include('utils.partials.header')
    @include('utils.partials.notification')

    <table class="table table-borderless table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">PERFIL</th>
            <th scope="col">USUÁRIO</th>
            <th scope="col">TIPO</th>
            <th scope="col">SLUG</th>
            <th scope="col">ID</th>
            <th class="text-end" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->perfil?->perfil_nome }}</td>
                <td>{{ $row->usuario?->name }}</td>
                <td>{{ $row->tipo_permissao?->name ?? 'N/A' }}</td>
                <td>{{ $row->permissao_slug }}</td>
                <td>{{ $row->id }}</td>
                <td class="text-end">@include('utils.partials.action_list')</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
