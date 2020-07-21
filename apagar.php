
<?php
    session_start();
    include("banco.php");
    $id_reg = $_GET['id_reg'];

   // marcando um registro para ser apagado/ocultado
   $sql = "UPDATE registro SET ocultar='X' WHERE id_reg='$id_reg'";
    if(mysqli_query($conexao,$sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro apagado com sucesso!');
        window.location.href='registro.php';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro não apagado!');
        window.location.href='registro.php';
        </script>";
    }
    mysqli_close($conexao);
?>

