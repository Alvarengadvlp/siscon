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
        text-aling:center;
        
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
    }

</style>
@endsection


@section('conteudo')

        <h4 class="titulocadastro">Cadastro Usuario</h4>   
@endsection
@section('navegação')

<div class="form-group navegacao">
        <div class="col-8">
          <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
          <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
        </div>
      </div>

@endsection

@section('tela')

<div class = "row">
<form action="">

<div class="col-3">
<div class="form-group">
  <label for="cpf">Cpf</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf"   @if(isset($func)) value = {{$func->getCpf}} @else value = "" @endif>
  <small id="cpf" class="text-muted">Hl</small>
</div>
</div><!--col -->

<div class="col-2">
<div class="form-group">
  <label for="senha">Senha</label>
  <input type="password" name="senha" id="" class="form-control" placeholder="senha">
  <small id="senha" class="text-muted">Hl</small>
</div>
</div><!--col -->
</form>

<div class="col-2">
<div class="form-group">
  <label for="dicaSenha">Dica</label>
  <input type="text" name="senha" id="" class="form-control" placeholder="dica da senha">
  <small id="dicaSenha" class="text-muted">Hl</small>
</div>
</div><!--col -->
</form>
</div>
@endsection