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
                    echo "<a href='opcoes2.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Voltar para cálculo&nbsp;</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='sair.php' style='text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
    ?>
</div>
<hr/>

<!--Inserindo o código de rastreamento-->
<br/>
<section align="center"><font size='5'>
    <form action="rastreamento.php" method="POST">
        <fieldset>
            <label>Digite um código de rastreamento de sua preferência</label>
            <input type="text" name="ratreamento"/>
            <button align="right"  type="submit">Registrar</button><br>
        </fieldset>
    </form>
</section>
<hr/>

</body>
</html>