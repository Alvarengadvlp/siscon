@extends('layout.app')

@section('estilos')
<style>
    .btn{

    }
    .pesquisar{
        margin-top:1.7rem;
    }
    .seletorSexo{
        margin-top: 2rem;
        padding-right: 1.5rem;
        margin-top:1.7rem;
    }
    .endCentralizado > label{
        color:blue;
        text-align: center;


    }
    .form-control{
        border-radius:10px 10px;
    }
    .titulocadastro{
        margin:0 auto;
        margin-top:2rem;
        width:80rem;
    }
    .naveg{
        float: left;
    }
    .navegacao{
        text-align:right ;
        float: right;

    }
    a{
        color: white;
    }
    .titulocadastro{
        text-align: center;
        margin-top: 1.5rem;
        width: 80%;
    }
    .dadosForm{
        margin-top: 1rem;
    }

    legend{
        margin-top: 1rem;
    }
    .ttt{

        margin:0;
    }

</style>
@endsection


@section('conteudo')

        <h4 class="titulocadastro">Cadastro de Laboratório</h4>
@endsection
@section('navegação')


@endsection

@section('tela')


<div class="container corpo">
{!! Form::open(['route' => 'laboratorio.create','method ' => 'post',]) !!}
 @csrf

     <div class="form-group ">
        <div class="form-group navegacao ttt">
                <div class="col">
                  <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
             <!--     <a  class="btn btn-outline-secondary"   href="{{route('convenio.listar')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>-->
                  <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
                  <a  class="btn btn-outline-secondary"   href="{{route('laboratorio.listar')}}"    data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
            </div>


          <h3 class="titulocadastro">Cadastro de Laboratório</strong></h3>
        </div>

        <fieldset class="form-group dadosForm">
        <legend aling="center">Dados do Laboratório </legend>

        <div class="row">

        <div class="col-xl-2 col-lg-4 col-md-4   mb-3">
            <div class="form-group">
        
                <label for="nome">Id</label>
                <input type="text" maxlength="13" name="id" id="id" class = "form-control {{$errors->has('id') ? 'is-invalid': '' }}" required  value = {{old('id')}}>
                 @if($errors->has('id'))
                        <div class="invalid-feedback">
                            {{$errors->first('id')}}
                        </div>
                     @endif
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-8  mb-3">
            <div class="form-group">
        
                <label for="nome">Nome do Laboratório</label>
                <input type="text"maxlength="50" name="nome" id="id "class = "form-control {{$errors->has('nome') ? 'is-invalid': '' }}" required value =   {{old('nome')}}>
                @if($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{$errors->first('nome')}}
                        </div>
                     @endif
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3  mb-3">
            <div class="form-group">
        
                <label for="selectbasic">Código do Procedimento <h11></h11></label>
                    <input type="number" maxlength="8" name="id_procedimento" class = "form-control {{$errors->has('id_procedimento') ? 'is-invalid': '' }}"value =   {{old('id_procedimento')}}>
                    
                     @if($errors->has('id_procedimento'))
                        <div class="invalid-feedback">
                            {{$errors->first('id_procedimento')}}
                        </div>
                     @endif
            </div>
        </div>           

    </div>
    </fieldset>
    <hr>
       {!! Form::close() !!}
</div><!-- container -->

    @endsection
