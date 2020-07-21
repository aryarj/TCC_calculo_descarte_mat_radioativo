<!DOCTYPE html>
<html align="center"><font size='4'>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<h1>Calculadora de data para descarte de Material Radioativo</h1>
<hr/>
<div align="center">

    <?php
                    session_start();
                    include("banco.php");
                    $user = $_SESSION["user"];
                    echo "Nome do usuário: ";
                    echo $user;
                    // Se não houver usuário, volta-se a página de login com o método "header"
                    if(!isset($user))
                    {
                        session_destroy();
                        header('location:index.php');
                    }
                    echo "&nbsp;&nbsp;";
                    echo "<a href='entrada.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Liquidos/Gasosos&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='entrada2.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sólidos&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='opcoes.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Início&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
                    
    ?>
</div>
<hr/>
<h2 align="center">Registros</h2>
<?php 

    echo '<p align=center>Remover todos os radionuclídeos descartados: <a href="apagar_descartados_pergunta.php">clique aqui</a></p>';
    echo '<p align=center>Lixeira/resgatar registros removidos: <a href="lixeira.php">clique aqui</a></p>';
    
    // Mostrando os dados dos materiais radioativos
    $dados1 = mysqli_query($conexao,"SELECT * FROM registro where ocultar='' ORDER BY id_reg DESC") or die(mysqli_error($conexao));
    echo "<table align=center border='1'>";
            
            echo '<tr align=center>';
                echo '<th>Código</th>';
                echo '<th>Usuário</th>';
                echo '<th>Radionuclídeo</th>';
                echo '<th>Estado</th>';
                echo '<th>Atividade medida<br>(Liq/gas:Bq/m3)<br>(Solid:kBq/Kg)</th>';
                echo '<th>Data da<br>medida</th>';
                echo '<th>Atividade<br>para descarte<br>(Liq/gas:Bq/m3)<br>(Solid:kBq/Kg)</th>';
                echo '<th>Meia-vida<br>utilizada*<br>(dias)</th>';
                echo '<th>Número de dias <br> para o descarte</th>';
                echo '<th>Data para<br>descarte</th>';
                echo '<th>Descartado?</th>';
                echo '</tr>';
           while($dados2 = mysqli_fetch_array($dados1)){
                $id=$dados2['id_reg'];
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
                echo '<td><a href="estatus.php?id_reg='.$id.'">Sim/Não</a></td>';
                echo '<td><a href="apagar_pergunta.php?id_reg='.$id.'">Apagar</a></td>';
                echo '</tr>';
                }
        echo '</table>';
        mysqli_close($conexao);
?>
