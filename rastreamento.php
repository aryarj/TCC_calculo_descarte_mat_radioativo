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

// Inserindo o código de rastramento na tabela "registro"
$rastreamento = $_POST['ratreamento'];
$_SESSION["rastreamento"] = $rastreamento;
if($rastreamento == "") {
    echo ("<script>alert('Código de rastreamento em branco!');</script>");
    echo ("<script>location.href='registro_rastreamento.php';</script>");
}
else {
    echo ("<script>location.href='registro.php';</script>");
    $sqlGravar="INSERT INTO registro(registro, user, radionucl, estado, ativinic, datamed, atividesc, hl, ndias, datadesc,estatus) 
    VALUES ('".$_SESSION['rastreamento']."','$user','".$_SESSION["nome"]."','".$_SESSION["estado2"]."',
    '".$_SESSION["ainicial2"]."','".$_SESSION["data_exibição"]."','".$_SESSION["adescarte"]."','".$_SESSION["hl"]."',
    '".$_SESSION["t2"]."','".$_SESSION["data_descarte"]."','Não')";
    if(mysqli_query($conexao, $sqlGravar))
    {
        echo "New record created successfully";
    }else
    {
        echo "Error: " . $sqlGravar . "<br>" . mysqli_error($conexao);
    }

}
mysqli_close($conn);
?> 
