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
                    // Se não houver usuário, volta-se a página de login com o método "Refresh"
                    /*if(!isset($user))
                        {session_destroy();
                        $url='index.php';
                        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';}*/
                    // Se não houver usuário, volta-se a página de login com o método "header"
                    if(!isset($user))
                    {
                        session_destroy();
                        header('location:index.php');
                    }
                    echo "Nome do usuário: ";
                    echo $user;
                    echo "&nbsp;&nbsp;";
                    echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
    ?>
</div>
<hr/>
<table align="center">
    <tr>
        <td>
            <a href='opcoes2.php' style='text-decoration:none; font-weight:bold;'><font size="6">para a tela de cálculo</font></a><br><br>
            <a href='registro.php' style='text-decoration:none; font-weight:bold;'><font size="6">para a tela de registro</font></a>
        </td>
    </tr>

</table>
<br/>


<hr/>

</body>
</html>