@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="css/default-template.css">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1 class="display-4">Precisa de uma ajuda?</h1>
                <p class="lead">Siga o passo a passo abaixo para entender sobre o gerencimaneto do estoque</p>
                <hr class="my-4">
                <p>Para continuar acesse os menus a sua esquerda, caso contrário, clique no botão abaixo para saber mais ou visualize o dashbaord </p>
              
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Fornecedor <i class="fas fa-angle-down"></i>
                          </button>
                        </h5>
                      </div>
                  
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body card-body-text">
                            Tudo começa com fornecedor dos produtos não é mesmo? Por primeiro, cadastre o fornecedor dos produtos/marcas que você está trabalhando
                            para então poder prosseguir com o processo do gerencimaneto de estoque.
                        </div>
                      </div>
                    </div>
            
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed btn-lg" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Produto <i class="fas fa-angle-down"></i>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body card-body-text">
                           Segundo processo do gerenciamento é o cadastro dos produtos fornecidos pelo fornecedor. Acesse a página de produto através do menu lateral
                           e cadastre os produtos. Sempre que um produto é cadastrado seu estoque está zerado, para conferir o status do estoque. Acesse a página "Estoque" no menu lateral. 
                        </div>
                      </div>
                    </div>
                    
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Entrada <i class="fas fa-angle-down"></i>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body card-body-text">
                            Inicialize sua movimentação de estoque nas entradas de produtos no estoque, também presente no menu lateral.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Saída <i class="fas fa-angle-down"></i>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body card-body-text">
                          Agora para movimentar o estoque, realize as saídas dos produtos de seu estoque acessando a página e realizando
                          as saídas dos produtos pelo cadastro. 
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
@endsection