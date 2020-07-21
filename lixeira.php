<!DOCTYPE html>
<html align="center">
<head>
    <meta charset="utf-8"/>
</head>
<body>
<h1>Calculadora de data para descarte de Material Radioativo</h1>
<!--<hr/>
<div align="center">
<hr/>
<div align="center"><h1><b>Você tem certeza que deseja apagar esse registro?</b></h1></div>
<hr/>-->
<br/>
<section align="center"><font size='4'>
    <form method="POST">
    <fieldset>
           

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
    echo "<a href='entrada.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Liquidos/Gasosos&nbsp;</a>";
    echo "&nbsp;&nbsp;";
    echo "<a href='entrada2.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sólidos&nbsp;</a>";
    echo "&nbsp;&nbsp;";
    echo "<a href='registro.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Voltar para Registros&nbsp;</a>";
    echo "&nbsp;&nbsp;";
    echo "<a href='opcoes.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Início&nbsp;</a>";
    echo "&nbsp;&nbsp;";
    echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
    
    ?>
    <hr/>
    <h2>Lixeira</h2>
    <h4>(Atenção: Somente os administradores tem permissão para apagar um registro definitivamente)</h4>
    <?php

    // Mostrando os registros enviados para a lixeira/ ocultados na tabela de registros
    echo "&nbsp;&nbsp;";
    echo '<a href="Lixeira_resgatar.php">Restaurar os registros marcados com "R"</a><br><br>';


    $dados1 = mysqli_query($conexao,"SELECT * FROM registro where ocultar='X' ORDER BY id_reg DESC") or die(mysqli_error($conexao));
    echo "<table align=center border='1'>";
            
            echo '<tr align=center>';
                echo '<th>Registro</th>';
                echo '<th>Usuário</th>';
                echo '<th>Radionuclídeo</th>';
                echo '<th>Estado</th>';
                echo '<th>Atividade medida<br>(Bq/m3)</th>';
                echo '<th>Data da<br>medida</th>';
                echo '<th>Atividade<br>para descarte<br>(Bq/m3)</th>';
                echo '<th>Meia-vida<br>utilizada*<br>(dias)</th>';
                echo '<th>Número de dias <br> para o descarte</th>';
                echo '<th>Data para<br>descarte</th>';
                echo '<th>Descartado?</th>';
                echo '<th>Marcar</th>';
                echo '</tr>';
           while($dados2 = mysqli_fetch_array($dados1)){
                $id_reg=$dados2['id_reg'];
                echo '<tr align=center>';
                echo '<td>'.$dados2['registro'].'</td>';
                echo '<td>'.$dados2['user'].'</td>';
                echo '<td>'.$dados2['radionucl'].'</td>';
                echo '<td>'.$dados2['estado'].'</td>';
                echo '<td>'.$dados2['ativinic'].'</td>';
                echo '<td>'.$dados2['datamed'].'</td>';
                echo '<td>'.$dados2['atividesc'].'</td>';
                echo '<td>'.$dados2['hl'].'</td>';
                echo '<td>'.$dados2['ndias'].'</td>';
                echo '<td>'.$dados2['datadesc'].'</td>';
                echo '<td>'.$dados2['estatus'].'</td>';
                echo '<td>'.$dados2['marcar'].'</td>';
                echo '<td><a href="lixeira_marcar.php?id_reg='.$id_reg.'">Marcar/Desmarcar</a></td>';
                echo '<td><a href="lixeira_restaurar.php?id_reg='.$id_reg.'">restaurar</a></td>';
                echo '<td><a href="lixeira_apagar.php?id_reg='.$id_reg.'">Apagar definitivamente</a></td>';
                echo '</tr>';
                }
        echo '</table>';
        mysqli_close($conexao);
?>    
                        
                    </label>
                </fieldset>
    </form>
</section>
<hr/>

</body>
</html>