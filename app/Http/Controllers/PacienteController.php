<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use App\Models\TipoConvenio;
use App\Models\Convenio;
use App\Models\PacienteHasConvenio;
use App\Models\Plano;
use App\Http\Requests\PacienteRequest;
class PacienteController extends Controller
{

    function indexjs(){
        return view('paciente.index');
    }


    function indexjson(){

        return Paciente::paginate(10);
    }


    public function shown($id) 
    {

    $id = Request::route('id');
    $paciente = Paciente::find($id);
    return view('detalhes')->with('paciente', $paciente);
    }

    
    public function listar()  
    {
        //  listar pacientes.

        //$pacientes = Paciente::where('nome', $nome)->get();
        $pacientes = Paciente::paginate(10);
        return view('paciente.listar' , compact('pacientes'));
        //testando
    } 

    // filtro da tabela listar
    public function buscar(Request $request){
        $buscar = $request->input('search');
        $pacientes = Paciente::where('nome', 'like', '%'.$buscar.'%')
        ->orWhere('cpf', 'like', '%'.$buscar.'%')
        ->orWhere('id', 'like', '%'.$buscar.'%')
        ->paginate(10);
        return view('paciente.listar' , compact('pacientes'));
       
      } 

    
    public function novo() 
    {
        //  form de um novo paciente
        $convenios = Convenio::all();
        $planos = Plano::all();
         //dd($convenio->tipoConvenios);

        
        return view('paciente.formulario' ,compact('convenios','planos'));
    }

    public function create(PacienteRequest $request){

        
        $paciente = Paciente::create($request->all());
        $paciente->planos()->attach($request['plano_id'], 
        [ 'indicacao'  => $request['indicacao'],
            'carteira'  => $request['carteira']]);

       

         return redirect()->route('paciente.listar')->withInput();

        
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);


    }

    public function edit( $id) 
    {
        //  form para editar infos de um paciente
       $p = Paciente::find($id);
      $plano = $p->planos()->where('situacao','ATIVO')->first();
       if ( !$plano == null) {
        $phc = $plano->pivot;
        $convenio = Convenio::where('cnpj', $plano->convenio_id)->first();
       } else {
           $plano =null; $phc =null; $convenio =null; 
       }
       
       //$phc = PacienteHasConvenio::where('paciente_id','=',$id,'and','plano_id','=',$plano->convenio_id )->first();

       //$convenioIsNull = (Convenio::where('cnpj', $plano->convenio_id)->first()) ?  $convenio = $convenioIsNull : $convenio = '' ;
      // $convenio = Convenio::where('cnpj', $plano->convenio_id)->first();
      
       $convenios = Convenio::all();
        return view('paciente.editar' , compact('p','convenio','convenios','plano','phc'));
    }
   

    public function update(Request $request, $id)
    {


   
     $paciente = Paciente::find($id)->planos()->where('situacao', 'ATIVO')->first();
       
        if($paciente !=null && $paciente->pivot['plano_id'] == $request['plano_id']){
       Paciente::find($id)->planos()->where('situacao', 'ATIVO')->update(
                [
                    'paciente_id'   => $id,
                    'indicacao'  => $request['indicacao'],
                    'carteira'   => $request['carteira'],
                    'situacao'  =>  $request['situacao']
                                            ]);
       
         }else{
             if($paciente != null)
                Paciente::find($id)->planos()->updateExistingPivot($paciente->pivot['plano_id'], ['situacao'=>'INATIVO']);

             Paciente::find($id)->planos()->attach($request['plano_id'], 
                [ 
                    'indicacao'  => $request['indicacao'],
                    'carteira'  => $request['carteira']
                                                            ]);

         }
         
         


            // dd($phc->where('paciente_id', '=',  $pacientePlano->id)->where('situacao','=','INATIVO' )->get());
            $paciente = Paciente::find($id);
            $paciente->update($request->all());





/*
        //  atualizar
        //dd($request);
        $paciente = Paciente::find($id);
        $ativos = $paciente->planos()->where('situacao','ATIVO')->get();
       
        if (!$ativos == null) { // se houver ativos
            
            PacienteHasConvenio::where('paciente_id', '=', $paciente->id)->where('situacao','=','ATIVO' )->orWhere('situacao','=','NULL')->update(['situacao'=>'INATIVO']);

               PacienteHasConvenio::updateOrCreate([
                'paciente_id' => $paciente->id,
                'plano_id'   => $request['plano_id'],
                'indicacao'  => $request['indicacao'],
              //  'carteira'   => $request['carteira'],
                'situacao' => 'ATIVO',
               ]);
        }

    /* if (!$inativos == null){
        $inativo = PacienteHasConvenio::where('paciente_id', '=', $paciente->id)
         ->where('plano_id','=', $request['plano_id'])
         ->Where('carteira','=',$request['carteira'])->update(['situacao'=> 'ATIVO']);
            
        } 
       // dd($phc->where('paciente_id', '=',  $pacientePlano->id)->where('situacao','=','INATIVO' )->get());

        $paciente->update($request->except([
            'convenio_id',
            'plano_id',
            'indicacao',
            'carteira',
            '_token']));
        
*/
        return redirect()->route('paciente.listar');
    }

   
    public function store(Request $request) 
    {
        //  recebe request , dos dados dos formularios

        $req = 'dados' . $request->input('nome'); // passado no form
        return reponse($req ,201);
    }
   
    public function destroy($id)
    {
        //  deletar

        $paciente = Paciente::find($id);
       // $paciente = Paciente::find($prontuario);
        $paciente->delete();
       //Paciente::destroy($prontuario);

       // DB::delete("delete from sis_paciente where prontuario = $prontuario");
        return back();
        //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
    }

         public function show($id)
    {
      
      $p = Paciente::find($id);
      $plano = $p->planos()->where('situacao','ATIVO')->first();
       if ( !$plano == null) {
        $phc = $plano->pivot;
        $convenio = Convenio::where('cnpj', $plano->convenio_id)->first();
       } else {
           $plano =null; $phc =null; $convenio =null; 
       }
       

      
       $convenios = Convenio::all();
        return view('paciente.show' , compact('p','convenio','convenios','plano','phc'));

    }
}
