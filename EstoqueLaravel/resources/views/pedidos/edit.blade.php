@extends('layouts.default')
@include('sweetalert::alert')
@include('layouts.spinner')
@section('content')
<link rel="stylesheet" type="text/css" href="../css/default-template.css">
  <div id="div_create">
    <div class="card">
      <div class="card-header" style="background: rgb(52, 58, 64)">
        <h3 style="color:rgb(255, 255, 255)"><strong>Editando Pedido</strong></h3>
      </div>

      <tbody>
        <div class="card-body" id="card_crud">
        {!! Form::open(['route'=> ["pedidos.update", 'id'=>$pedido->id], 'method'=>'put']) !!}

        <div class="form-row">
          <div class="col-md-2">
            {!! Form::label('data_pedido', 'Data do Pedido') !!}
            {!! Form::date('data_pedido', $pedido->data_pedido, ['class' => 'form-control', 'required']) !!}
          </div>
          <div class="col-md-4">
            {!! Form::label('fornecedor_id', 'Fornecedor') !!}
            {!! Form::select('fornecedor_id', \App\Fornecedor::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(), 
                                                $pedido->fornecedor_id, ['class'=>'form-control', 'id'=>'teste','required']) !!}
          </div>
        </div>
        
        <button class="add_field_button btn btn-padrao1" style="margin-bottom: 10px;!important; margin-top: 10px;!important">Cadastrar itens<i class="fa fa-plus" aria-hidden="true"></i> </button>
        <div class="input_fields_wrap"></div>

        <div class="form-group">
          {!! Form::submit('Salvar', ['class'=>'btn btn-padrao1']) !!}
          <a href="{{ route('pedidos', []) }}" class="btn btn-padrao2">Cancelar</a>
        </div>
        {!! Form::close() !!} <!-- id do campo de entrada deve ter o mesmo nome no banco de dados ex: 'nome' --> 
      </div>
    </tbody>
  </div>
</div>
@stop
<script>
  $(document).ready(function() {
    var cont_inputs = null;
    $.ajax({
      type: "GET",
      url: "{{ URL('pedidos/getPedidos') }}" + "/" + '{{ $pedido->id }}',
      dataType: "json",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        $.each(data.items, function(i, json) {
          cont_inputs = data.items.length;
          var output = '<div style="margin-bottom: 10px;!important"><div style="width:80%; float:left">';
          output += '<div class="form-row"><div class="col"><input type="text" value='+json.produto+' class="form-control id="uaheuah" edit-dynamic-prod" name="produtos[]" placeholder="Produto" required/></div>';
          output += '<div class="col"><input type="text" class="form-control" value='+json.quantidade+' name="quantidades[]" placeholder="Quantidade" required/></div>';
          output += '</div></div><button type="button" class="remove_field btn btn-padrao2 btn-circle" style="margin-left: 10px;!important"><i class="fa fa-times"></button></div>';
          $(wrapper).append(output);
        });
      },
      error: function(response) {
        swal.fire("Ocorreu um erro ao processar os dados, contate o suporte.");
      }
    });

    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");
    var x = 0;
    $(add_button).click(function(e) {
      x++;
      cont_inputs++;
      e.preventDefault();
      var output = '<div style="margin-bottom: 10px;!important"><div style="width:80%; float:left">';
      output += '<div class="form-row"><div class="col"><input type="text" class="form-control" name="produtos[]" placeholder="Produto" required/></div>';
      output += '<div class="col"><input type="text" class="form-control" name="quantidades[]" placeholder="Quantidade" required/></div>';
      output += '</div></div><button type="button" class="remove_field btn btn-padrao2 btn-circle" style="margin-left: 10px;!important"><i class="fa fa-times"></button></div>';
      $(wrapper).append(output);
    });

    $(wrapper).on("click", ".remove_field", function(e) {
      var exclui_input = cont_inputs - 1;
      if (exclui_input >= 1) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        cont_inputs--;
      }
    });
  });
</script>
