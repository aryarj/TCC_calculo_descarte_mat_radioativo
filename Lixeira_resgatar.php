
<?php
    session_start();
    include("banco.php");
    
    // Se os registros marcados com "R" foram ou não recuperados
    $sql = "UPDATE registro SET ocultar='' WHERE marcar='R'";
    $sql2= "UPDATE registro SET marcar='' WHERE ocultar=''";
    
    if(mysqli_query($conexao,$sql)){
        mysqli_query($conexao,$sql2);
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro(s) restaurados(s) com sucesso!');
        window.location.href='lixeira.php';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro(s) não foi(ram) restaurado(s)!');
        window.location.href='lixeira.php';
        </script>";
    }
    
    mysqli_close($conexao);
?>

