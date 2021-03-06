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

        <h4 class="titulocadastro">Cadastro Funcionario</h4>
@endsection
@section('navegação')


@endsection

@section('tela')
<div class="container corpo">
    <form action="create" method="post">
    @csrf

      <div class="form-group navegacao">
                <div class="col-8">
                  <button id="Cadastrar"  class="btn btn-success" type="Submit">Cadastrar</button>
                  <a  class="btn btn-outline-secondary"   href="{{route('funcionario.listar')}}" role="button">Pesquisar</a>
                  <a  class="btn btn-outline-danger"  href="{{route('funcionario.novo')}}" role="button">Cancelar</a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
              </div>

            <fieldset class="form-group">
                    <legend aling="center">Dados Pessoais</legend>
    <div class="row">



    <div class="col-3">
    <div class="form-group">
      <label for="nome">Nome*</label>
      <input type="text" name="nome" id="" class="form-control" placeholder="nome">
      <small id="nome" class="text-muted">Nome Completo</small>
    </div>
    </div><!--col nome -->

    <div class="col-2">
    <div class="form-group">
      <label for="cpf">Cpf*</label>
      <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf" aria-describedby="helpId">
      <small id="cpf" class="text-muted">cpf</small>
    </div>
    </div><!--col cpf -->

    <div class="col-2">
            <div class="form-group">
              <label for="cpf">RG*</label>
              <input type="text" name="identidade" id="identidade" class="form-control" placeholder="identidade" aria-describedby="identidade">
              <small id="identidade" class="text-muted">identidade</small>
            </div>
            </div><!--col cpf -->

    <div class="col-2">
    <div class="form-group">
      <label for="data">Data Nascimento</label>
      <input type="date" name="dataDeNascimento" id="dataDeNascimento" class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
      <small id="dataDeNascimento" class="data">Data obrigatoria</small>
    </div>
    </div><!--col dt Nascimento-->

    <div class="col-2">
            <div class="form-group">

                <label for="selectbasic">Sexo <h11>*</h11></label>
                  <select required id="genero" name="sexo" class="form-control">
                  <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="N">Não declarado</option>
                    <option value="I">Indefinido</option>
                  </select>

            </div>
    </div><!--col genero-->

    <div class="col-2">
            <div class="form-group">

                <label for="selectbasic">Etnia <h11>*</h11></label>
                  <select required id="etnia" name="etnia" class="form-control">
                  <option value="B">Branco</option>
                    <option value="P">Pardo</option>
                    <option value="N">Negro</option>
                    <option value="I">Indigenas</option>
                  </select>

            </div>
        </div><!--  etinia-->

        <div class="col-3">
                <div class="form-group">

                    <label for="selectbasic">Escolaridade <h11>*</h11></label>


                      <select required id="escolaridade" name="escolaridade" class="form-control">
                        <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                        <option value="Fundamental Completo">Fundamental Completo</option>
                        <option value="Médio Incompleto">Médio Incompleto</option>
                        <option value="Médio Completo">Médio Completo</option>
                        <option value="Superior Incompleto">Superior Incompleto</option>
                        <option value="Superior Completo">Superior Completo</option>
                      </select>

                </div>
            </div>

            <div class="col-3">
                    <div class="form-group">
                      <label for="">Nacionalidade*</label>
                      <input type="text" name="nacionalidade" id="" class="form-control" placeholder="nacionalidade" value="Brasileiro">
                      <small id="nacionalidade" class="text-muted">informe o seu pais de origem</small>
                    </div>
            </div><!--col nacionalidade -->

            <div class="col-3">
                    <div class="form-group">
                      <label for="">Naturalidade*</label>
                      <input type="text" name="nacionalidade" id="" class="form-control" placeholder="naturalidade" value="">
                      <small id="nacionalidade" class="text-muted">cidade ou estado de nascimento</small>
                    </div>
            </div><!--col naturalidade -->

            <div class="col-3">
                    <div class="form-group">

                      <label for="profissao">Profissão</label>
                      <select required id="profissao" name="profissao" id="" class="form-control" >
                      <option value="A">Atendente</option>
                      </select>
                
                    </div>
            </div><!--col nacionalidade -->

            <div class="col-2">
                    <div class="form-group">

                        <label for="selectbasic">Status <h11>*</h11></label>
                          <select required id="status" name="status" class="form-control">
                          <option value="A">Ativo</option>
                            <option value="I">Inativo</option>
                          </select>

                    </div>
                </div><!--  etinia-->


    </div><!-- row -->
    </fieldset><!--Dados pessoas-->
    <hr>


            <fieldset class="form-group">
                    <legend aling="center">Endereço</legend>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                               <label for="cep">Cep</label>
                               <input type="text" class="form-control input-md" name="cep" id="cep" placeholder="Apenas numeros" maxlength="15"  > 
                            </div>
                        </div><!-- col cep -->

                          <div class="col-2">
                               <button type="submit" class="btn btn-outline-success pesquisar"  onclick="pesquisacep(cep.value)">
                                <strong>pesquisar</strong></button>
                          </div><!-- col CEP -->


                     <div class="col">
                      <span>Rua</span>
                          <div class="input-group">
                              <input type="text" name="rua" class="form-control" id="rua" >
                      </div>
                  </div><!-- col rua-->

                   <div class="col-2">
                    <span >Nº <h11>*</h11></span>
                    <div class="input-group">
                      <input id="numero" name="numero" class="form-control"placeholder="" required=""  type="text">
                    </div>

                  </div> <!-- col bumero-->


                  <div class="col-3">

                   <span>Bairro</span>
                    <div class="input-group">
                      <input id="bairro" name="bairro" placeholder="" required=""  class="form-control"type="text">
                    </div>

                    </div><!-- col bairro-->

                <div class="col-4">
                   <span>Cidade</span>
                    <div class="input-group">

                      <input id="cidade" name="cidade"  placeholder="" required=""  class="form-control" type="text">
                    </div>
                </div><!-- col cidade -->

                    <div class="col-2">
                    <span>Estado</span>
                    <div class="input-group">

                      <select id="estado" name="estado"  placeholder="" required=""   class="form-control"type="text">
                       <option value="Rio de Janeiro">Rio de Janeiro</option>
                       <option value="São Paulo">São Paulo</option>
                       <option value="Minas Gerais">Minas Gerais</option>
                       <option value="Espírito Santo">Espírito Santo</option>
                       </select>
                    </div>
                    </div>


        </div><!-- row endereco -->

    </fieldset><!--endereço-->
    <hr>

    <fieldset class="form-group">
            <legend aling="center">Contato</legend>
    <div class="row"><!-- contato -->

        <div class="col-3">
                <div class="form-group">
                    <label for="telefone">Telefone <h11>*</h11></label>
                        <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        OnKeyPress="formatar('## #####-####', this)">
                </div>
            </div>  <!-- col Telefone-->

            <div class="col-3">
                    <div class="form-group">
                        <label for="celular">Celular <h11>*</h11></label>
                            <input id="celular" name="celular" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                            OnKeyPress="formatar('## #####-####', this)">
                    </div>
                </div>  <!-- col Telefone-->


            <div class="col-4">
                <div class="form-group">
                       <label for="exampleFormControlInput2">Email address</label>
                       <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
                </div>


                </div> <!-- col Email -->


    </form>
    </div><!-- container -->

    @endsection

    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
        
    @endsection
