                <?php
                      
                       $nome=$radio['nome'];
                        $teste = mysqli_query($conexao, "SELECT * FROM radio where radionuclideo = '$nome'");
                        while($teste2 = $teste->fetch_array())
                        {
                           
                            // Estado do radionuclídeo e se há essa informação
                            if (isset($_POST['estado']) && ($_POST['estado'])!= 3)
                            {
                                $estado = $radio['estado'];
                                if($estado == 1)
                                {
                                    $adescarte = $teste2['liquid'];
                                    $estado2='Liquido';
                                    
                                }
                                else
                                {
                                    $adescarte = $teste2['gas'];
                                    $estado2='Gasoso';
                                    
                                }
                            }else
                            {
                                $adescarte ='Especifique o estado';
                                $estado2 = "Sem informação";
                            }

                            //Atividade inicial e se há essa informação
                            if (isset($_POST['atividade']) && ($_POST['atividade'])!='')
                            {
                                $ainicial = $radio['atividade'];
                            }else
                            {
                                $ainicial ='Sem atividade inicial';
                            }
                            
                            //Unidade da atividade: Bq ou Ci e se há essa informação
                            if(isset($_POST['unidade']) && $_POST['unidade']!=100)
                            {
                                                                                 
                                $unidade = $radio['unidade'];
                                if($unidade == 1)
                                {
                                    $ainicial2 = $ainicial;
                                }
                                if($unidade == 2)
                                {
                                    $ainicial2 = $ainicial*3.7E10;
                                }
                                if($unidade == 3)
                                {
                                    $ainicial2 = $ainicial*3.7E7;
                                }
                                if($unidade == 4)
                                {
                                    $ainicial2 = $ainicial*3.7E4;
                                }
                            }else{
                                $ainicial2 = 'sem unidade';
                            }

                            //Verificando se há data digitada e se há essa informação
                            if(isset($_POST['data']) && $_POST['data']!=''){

                                /*Passando a data ano-mês-dia para uma string de exibição dia/mes/ano */
                                $data_medida=$radio['data'];
                                $data_explodida = explode("-", $data_medida);
                                $data_exibição="{$data_explodida[2]}/{$data_explodida[1]}/{$data_explodida[0]}";
                            }else{
                                $data_exibição='digite uma data';
                            }


                            /*Capturando a meia vida do radionuclideo*/
                            $hl=$teste2['hl'];

                            // verficando se há dados numéricos em todas as variáveis para efetuar o cálculo
                            if(isset($estado) && isset($adescarte) && $adescarte>=0 && isset($ainicial2) && $ainicial2>0 && isset($radio['data']))
                            {

                                //Verificação se a atividade do material já é menor do que a de descarte,
                                //antes de realizar o cálculo de dias para o descarte
                                if($ainicial2<=$adescarte){
                                    $t2='Descarte imediato';
                                    $data_descarte='Descarte imediato';
                                }
                                else
                                {
                                    // Efetuando o cálculo de dias para o descarte
                                    $t= (-$teste2['hl']/log(2))*(log($adescarte/$ainicial2));
                                    // Arredondando o número de dias
                                    $t2=round($t);
                                    // Determinando a data de descarte
                                    $data_descarte=date("d/m/Y", mktime(0, 0, 0, $data_explodida[1], $data_explodida[2]+$t2, $data_explodida[0]));
                                    
                                }
                            }else{
                                $t2='sem parâmetros';
                                $data_descarte='sem parâmetros';
                            }
                            
                            
                        }
                        
                        
                          include "template.php";
                                                   
                    ?>
                    
                    
