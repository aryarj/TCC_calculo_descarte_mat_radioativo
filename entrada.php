

<?php
include "banco.php";
// Deixando a primeira entrada (nome do radionuclídeo e demais)
//com uma informação qualquer, para não gerar erro
            $radio=array('nome'=>'qualquer',
                        'estado'=>3,
                        'atividade'=>'',
                        'unidade'=>100,
                        'data'=>''
                        );
            $data_descarte=''; // para não gerar erro no aparecimento do botão registro no template
            $erros_validacao=array();
            
    // retenção dos dados com método 'POST'
    if (isset($_POST['nome']) && $_POST['nome'] != '') {
            $radio = array();
            
            // nome do radionuclídeo
            $radio['nome']=$_POST['nome'];
                        
            //Estado do radionuclídeo           
            if (isset($_POST['estado']) && ($_POST['estado'])!= 3){
                $radio['estado']=$_POST['estado'];
            }else{
                
                $erros_validacao['estado']='O estado do radionuclídeo é obrigatório!';
                
                }

            // Atividade inicial
            if (isset($_POST['atividade']) && ($_POST['atividade'])!=''){
                $radio['atividade']=$_POST['atividade'];
            }else{
                
                $erros_validacao['atividade']='A atividade inicial é obrigatória!';
                
                }

            // Unidade da grandeza atividade
            if (isset($_POST['unidade']) && ($_POST['unidade'])!= 100)
            {
                $radio['unidade']=$_POST['unidade'];
            }else
            {
                $erros_validacao['unidade']='A unidade é obrigatória!';
            }
            
            // Data da medida da atividade
            if (isset($_POST['data']) && ($_POST['data'])!=''){
            $radio['data']=$_POST['data'];
            }else{
                $erros_validacao['data']='A data da medida é obrigatória!';
            }

            $SESSION[]=$radio;
            
        }
        
        
        $lista_radio[] = array();
        
        if(isset($SESSION)){
            $lista_radio = $SESSION;
        }else{
            $lista_radio=array();
        }
        
               
        include "calculo.php";
       


