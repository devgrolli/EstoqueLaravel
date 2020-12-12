@extends('adminlte::page')

@section('content')
    <h3> Editando Tipo da Saída: {{ $tipo_saida->nome }} </h3>

    @if($errors->any()) <!-- existe algum erro neste array? -->
      <ul class="alert alert-danger"> 
        @foreach($errors-all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['route'=> ["tipo_saidas.update", 'id'=>$tipo_saida->id], 'method'=>'put']) !!}

        <div class="form-group">
          {!! Form::label('nome', 'Nome') !!}
          {!! Form::text('nome', $tipo_saida->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::text('descricao', $tipo_saida->descricao, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
          <a href="{{ route('tipo_saidas', []) }}" class="btn btn-danger">Cancelar</a>
        </div>
        
    {!! Form::close() !!} <!-- id do campo de entrada deve ter o mesmo nome no banco de dados ex: 'nome' --> 
@stop