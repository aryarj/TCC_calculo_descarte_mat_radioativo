<html align="center"><font size='4'>

    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Descarte de Material Radioativo</title>
        <link rel="stylesheet" href="index.css" type="text/css" />
        <style>
        .erro{
			color: red;
			font-size: 20px}
        </style>
    </head>
        <body>
        <h1>Calculadora de data para descarte de Material Radioativo</h1>
        <hr/>
    <?php
                    session_start();
                    include("banco.php");
                    $user = $_SESSION["user"];
                    if(!isset($user))
                    {
                        session_destroy();
                        header('location:index.php');
                    }
                    echo "Nome do usuário: ";
                    echo $user;
                    echo "&nbsp;&nbsp;";
                    echo "<a href='entrada.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Líquido/Gasoso&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='registro.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Registro&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='opcoes.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Início&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
    ?>
<hr/>


            
            <h3>(Seguindo a norma <a target="_blank" href=http://appasp.cnen.gov.br/seguranca/normas/pdf/Nrm801.pdf>CNEN-8.01 Gerência de rejeitos de baixo e médio níveis de radiação)</a></h3>
            <!-- Entrada dos dados para o cálculo-->
            <form method='POST'>
            
                <fieldset id="contorno1" style="width:600px;height:200px; margin:auto"><font size='4'>
                    <!--Identificação do radionuclídeo-->
                    <label>Radionuclídeo:</label>
                    <select type="text" name="nome">
                    <option value="">Faça sua escolha</option>
                   <!--<input type="text" name="nome" placeholder="Nome do radionucídeo"/>-->
                   <?php
                        
                        $dados = mysqli_query($conexao, "SELECT * FROM radio where sol!=0 ORDER BY radionuclideo ASC");
                        while($dados2 = $dados->fetch_array()){
                            //echo '<option value='.$dados2['radionuclideo'].'>'.$dados2['radionuclideo'].'</option>';
                            echo '<option>'.$dados2['radionuclideo'].'</option>';
                            //mysqli_close(); 
                            
                             }
                             
                          
                    ?>
                    </select>
                    
                    </label><br><br>
                                          
                   <!--Estado do radionuclídeo-->
                    <label>
                    Estado: Sólido (< = 1000 kg)
                        
                    </label><br><br>

                 <!--Atividade-->
                 <label>
                    Atividade:
                    <input type="text" name="atividade" placeholder="Ex: 1234 ou 1.234e3"/>
                </label>
                <?php if(isset($erros_validacao['atividade'])):?>
                            <span class="erro" >
                <?php echo $erros_validacao['atividade'];?>
                            </span>
                <?php endif;?><br><br>
                    <!--Unidade da atividade-->
                    <label>Unidade da atividade:
                    <input type="radio" name="unidade" value="1"/>
                         kBq/kg

                        <input type="radio" name="unidade" value="2"/>
                         kCi/kg

                         <input type="radio" name="unidade" value="3"/>
                         mCi/kg

                         <input type="radio" name="unidade" value="4"/>
                         uCi/kg
                <?php if(isset($erros_validacao['unidade'])):?>
                            <span class="erro" >
                <?php echo $erros_validacao['unidade'];?>
                            </span>
                <?php endif;?>
                    </label><br><br>

                <!--Data da medida-->
                <label>
                    Data da medida:
                    <input type="date" name="data"/>
                  <?php if(isset($erros_validacao['data'])):?>
                            <span class="erro" >
                  <?php echo $erros_validacao['data'];?>
                            </span>
                  <?php endif;?>
                 </label>
                    <input type="submit" value="Calcular/ Zerar" /><br><br>

                </fieldset>
                </form>
                <br>



                <fieldset id="contorno1" style="width:1200px;height:100px; margin: auto">
                
                    <!--Tabela com os dados do material e o resultado do cálculo
                    do número de dias para o descarte e da data do descarte-->
                    <table align=center border="1" width="1000px">
                        <tr align=center>
                            <th>Radionuclídeo</th>
                            <th>Estado</th>
                            <th>Atividade medida<br>(kBq/kg)</th>
                            <th>Data da<br>medida</th>
                            <th>Atividade<br>para descarte<br>(kBq/kg)</th>
                            <th>Meia-vida<br>utilizada*<br>(dias)</th>
                            <th>Número de dias <br> para o descarte</th>
                            <th>Data para<br>descarte</th>
                        </tr>
                    
                        <tr align=center> 
                        <?php foreach ($lista_radio as $radio) : ?>
                            <td><?php echo $radio['nome']; ?></td>
                            <td><?php echo $estado2; ?></td>                            
                            <td><?php echo $ainicial2; ?></td>
                            <td><?php echo $data_exibição; ?></td>
                            <td><?php echo $adescarte; ?></td>
                            <td><?php echo $hl;?></td>
                            <td><?php echo $t2;?></td>
                            <td><?php echo $data_descarte;?></td>
                        </tr>
                        <?php endforeach;?>
                    </table><br><br>
                                
                </fieldset>
                <?php
                        if($data_descarte!='sem parâmetros' && $nome!='qualquer')
                        {
                           echo "<a href='registro_rastreamento.php' style='text-decoration:none; font-weight:bold;'><font size='4'>Caso deseje, Click aqui para registrar</font></a><br>";
                        
                       // session_start();
                        $_SESSION["nome"] = $radio['nome'];
                        $_SESSION["estado2"] = $estado2;
                        $_SESSION["ainicial2"] = $ainicial2;
                        $_SESSION["data_exibição"] = $data_exibição;
                        $_SESSION["adescarte"] = $adescarte;
                        $_SESSION["hl"] = $hl;
                        $_SESSION["t2"]= $t2;
                        $_SESSION["data_descarte"] = $data_descarte;
                        }
                    ?> 
               

<p align=left>* As meias-vidas foram obtidas do seguinte site da IAEA (Agência Internacional de Energia Atômica): <a target="_blank" href = https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html>https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html/<a><br>
Contato: Ary de Araújo Rodrigues Júnior; emails: aryarj@ig.com.br ou aryarjyy@yahoo.com.br</P>
                
                    
                    
        </body>

</html>
