<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<div align="center"><h1><b>Calculadora de data para descarte de Material Radioativo</b></h1></div>
<hr/>
<div align="center">
    <?php
                    session_start();
                    include("banco.php");
                    $user = $_SESSION["user"];
                    // Se não houver usuário, volta-se a página de login com o método "header"
                    if(!isset($user))
                    {
                        session_destroy();
                        header('location:index.php');
                    }
                    echo "Nome do usuário: ";
                    echo $user;
                    echo "&nbsp;&nbsp;";
                    echo "<a href='opcoes.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Início&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
    ?>
</div>
<hr/>
<h2 align="center">Selecione o estado físico do radonuclídeo (líquido, gasoso ou sólido)</h2>
</div>
<hr/>
<table align="center" size="5">
    <tr>
        <td>
            <a href='entrada.php' style='text-decoration:none; font-weight:bold; font-size="1";'><font size="6">Líquido ou gasoso</font></a><br><br>
            <a href='entrada2.php' style='text-decoration:none; font-weight:bold;'><font size="6">Sólido</font></a>
        </td>
    </tr>

</table>
<br/>


<hr/>

</body>
</html>