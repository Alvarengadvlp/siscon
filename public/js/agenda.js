/*$('#medico').change(function(){
    var medico = this.value;
    console.log(medico);
    horarios = getHorarios();
   for (let index = 0; index < horarios.length; index++) {
       $('tbody').append(
       '<tr>'+
        '<td id="hora">' +  horarios[index] + '</td>'+
        '<td>' + '</td>'+
        '<td>' +  '</td>'+
        '<td id="btnCad"><a class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-xl" title="cadastrar">'+
           '<i class="fas fa-plus-circle"></i></a>'+
        '</td>'+
        '</tr>')
   } 
    });

*/
    
$('#medico').change(function(){
    var medico = this.value;
    
    var date = document.getElementById('data').value;
    
    location.href = '/agd/medico/' + medico +'/' +date;
  
});
  
$('#especialidade').change(function(){
    let especialidade_id = this.value;
    console.log(especialidade_id);

    $.getJSON('get/med/' +especialidade_id , function(medicos){
        p = medicos;
        $('select[id=medicos]').empty();        
        $.each(p, function(key,value){
            $('select[id=medicos]').append('<option value=' + value.funcionario.matricula + '>' + value.funcionario.nome + '</option>')
        })
    })
})


$("#data").change(function(){
               var medico = document.getElementById('medico').value;
                var date = this.value;

         location.href = '/agd/medico/' + medico +'/' +date; 
     });


 $('#delete').on('show.bs.modal', function(event){
  console.log(id);
   var button = $(event.relatedTarget);
   var  id = button.data('catid');
   console.log(id);
   var modal = $(this);
   modal.find('.modal-body #id').val(id);



 });

    $(function(){
        $('#nome').autocomplete({
            appendTo: "body", 
            source: '/buscarName',
     
        });

    });

        $(function(){
        $('#cpf').autocomplete({
            appendTo: "body", 
            source: '/buscarCpf',
            
        });
        
    });
    $(document).ready(function(){
        $("#cpf").blur(function(){
           $.getJSON( '/cpf/' + this.value  , function(cpf){
               var funcionario = cpf;
                console.log(funcionario);
                console.log(funcionario[0]['dataDeNascimento']);
                var nome = $('input[name = nome]'); 
                   var telefone = $('input[name = telefone]'); 
                  var celular = $('input[name = celular]');   
                  var data = $('input[name = dataDeNascimento]');  
                  nome.val(funcionario[0]['nome']);
                  telefone.val(funcionario[0]['telefone']);
                  celular.val(funcionario[0]['celular']);
                data.val(funcionario[0]['dataDeNascimento']);
           });
         

     });
         $("#nome").blur(function(){
           $.getJSON( '/nome/' + this.value  , function(nome){
               var funcionario = nome;
                console.log(funcionario);
                console.log(funcionario[0]['dataDeNascimento']);
                var cpf = $('input[name = cpf]'); 
                   var telefone = $('input[name = telefone]'); 
                  var celular = $('input[name = celular]');   
                  var data = $('input[name = dataDeNascimento]');  
                  cpf.val(funcionario[0]['cpf']);
                  telefone.val(funcionario[0]['telefone']);
                  celular.val(funcionario[0]['celular']);
                data.val(funcionario[0]['dataDeNascimento']);
           });
           
            });
});
