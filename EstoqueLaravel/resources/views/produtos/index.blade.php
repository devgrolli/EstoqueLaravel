@extends('layouts.default')
@section('content')
    <h1>Produtos</h1>

    <link rel="stylesheet" type="text/css" href="css/default-template.css">
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar com grupos de botões">
        <div class="btn-group mr-2" role="group" aria-label="Primeiro grupo">
            <div class="float-sm-left">
                <a href="{{ route('produtos.create', []) }}" class="btn btn-padrao1">Cadastrar</a><br></br>
            </div>
        </div>

        {!! Form::open(['name' => 'form_name', 'route' => 'produtos']) !!}
        <div class="input-group mb-3">
            <input type="text" class="form-control-padrao1" name="desc_filtro" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-padrao1" type="submit" name="search" type="button" id="search-btn"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    @include('layouts.alerts')

    <table class="table table-hover" id="table">
        <thead>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Preço Unitário</th>
            <th>Marca</th>
            <td></td>
        </thead>

        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    @if ($produto->quantidade > 0)
                        <td><span class='badge badge-pill badge-success'>{{ $produto->quantidade }} </span></td>
                    @else
                        <td><span class='badge badge-pill badge-danger'>{{ 'SEM ESTOQUE' }}</span></td>
                    @endif
                    <td>R$ {{ number_format($produto->preco_un, 2, ',', '.') }}</td>
                    <td>{{ $produto->marca }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', ['id' => \Crypt::encrypt($produto->id)]) }}"
                            class="btn btn-padrao1-icons">
                            <i class="bi bi-pencil-square"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>

                        </a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $produto->id }})" class="btn btn-padrao2-icons">
                            <i class="bi bi-archive">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-archive" viewBox="0 0 16 16">
                                    <path
                                        d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $produtos->links() }}

@stop
@section('table-delete')
    "produtos"
@endsection
