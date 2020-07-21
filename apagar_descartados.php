
<?php
    session_start();
    include("banco.php");
    
    // marcando todos os registros de materiais descartados
    //com "Sim" para serem apagados/ocultados
    $sql = "UPDATE registro SET ocultar='X' WHERE estatus='Sim'";
    if(mysqli_query($conexao,$sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro(s) apagado(s) com sucesso!');
        window.location.href='registro.php';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Registro(s) não foi(ram) apagado(s)!');
        window.location.href='registro.php';
        </script>";
    }
    mysqli_close($conexao);
?>

