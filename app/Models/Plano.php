<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    //
    protected $table = "sis_plano";
    public $timestamps = false;


    protected $fillable = array(

        'convenio_id',
        'carteira',
        'indicacao',
        'situacao',

        
       );


       public function convenio(){
        return $this->belongsTo('App\Models\Convenio','convenio_id', 'cnpj' );
    

    }

    public function pacientes(){

        return  $this->belongsToMany("App\Models\Paciente", 'sis_paciente_tem_plano','plano_id', 'paciente_id')->withPivot('indicacao', 'situacao')->withTimestamps();
;
   
       }

}
