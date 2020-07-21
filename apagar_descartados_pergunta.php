<!DOCTYPE html>
<html align="center">
<head>
    <meta charset="utf-8"/>
</head>
<body>
<h1>Calculadora de data para descarte de Material Radioativo</h1>
<hr/>
<div align="center">
<hr/>
<div align="center"><h1><b>Você tem certeza que deseja apagar esse registro?</b></h1></div>
<hr/>
<br/>
<section align="center"><font size='4'>
    <form method="POST">
    <fieldset>
           

    <?php 
    session_start();
    include("banco.php");
    
    echo '<a href="registro.php">Não</a>';
    echo "&nbsp;&nbsp;";
    echo '<a href="apagar_descartados.php">Sim</a>';

    // Mostrando os registros que serão apagados coletivamente
    $sql= "UPDATE registro SET marcar='' WHERE ocultar=''";
    $dados1 = mysqli_query($conexao,"SELECT * FROM registro where estatus='Sim' and ocultar=''") or die(mysqli_error($conexao));
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
                echo '</tr>';
           while($dados2 = mysqli_fetch_array($dados1)){
                //$id_desc=$dados2['id_reg'];
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