@extends('adminlte::page')

@section('content')
    @if($errors->any()) <!-- existe algum erro neste array? -->
    <ul class="alert alert-danger"> 
      @foreach($errors-all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
   @endif

   <div class="card">
    <div class="card-header" style="background: lightgrey">
        <h3>Cadastro Produtos</h3>
    </div>

    <div class="card-body">
      {!! Form::open(['route'=>'produtos.store']) !!}
        <div class="form-group">
          {!! Form::label('nome', 'Nome') !!}
          {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('preco_un', 'Preço unitário') !!}
          {!! Form::text('preco_un', null, ['class'=>'form-control', 'id'=>'valor', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('quantidade', 'Quantidade') !!}
            {!! Form::text('quantidade', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('marca', 'Marca') !!}
            {!! Form::text('marca', null, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpar campos', ['class'=>'btn btn-success']) !!}
          <a href="{{ route('produtos', []) }}" class="btn btn-danger">Voltar</a>
        </div>
      {!! Form::close() !!} <!-- id do campo de entrada deve ter o mesmo nome no banco de dados ex: 'nome' --> 
    </div>
  </div>
@stop