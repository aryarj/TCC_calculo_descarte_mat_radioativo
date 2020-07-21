
<?php
    session_start();
    include("banco.php");
    $id_reg = $_GET['id_reg'];
    
    // Se o registros selecionado foi ou não recuperado
    $sql = "UPDATE registro SET ocultar='' WHERE id_reg='$id_reg'";
    $sql2= "UPDATE registro SET marcar='' WHERE ocultar=''";
    if(mysqli_query($conexao,$sql)){
        mysqli_query($conexao,$sql2);
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro restaurado com sucesso!');
        window.location.href='lixeira.php';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro não restaurado!');
        window.location.href='lixeira.php';
        </script>";
    }
    mysqli_close($conexao);
?>

