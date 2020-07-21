
<?php
    session_start();
    $user = $_SESSION["user"];
    if(!isset($user))
     {
        session_destroy();
        header('location:index.php');
     }
    include("banco.php");
    $id_reg = $_GET['id_reg'];
    
    // Apagar definitivamente e individualmente um registro na lixeira
    //somente quando o usuário é um administrador
    $permission = mysqli_query($conexao, "SELECT * FROM usuario where login='$user'") or die("Erro ao selecionar!");
    $permission2 = $permission->fetch_array();
    if($permission2['admin']=="A"){
           $sql = "DELETE FROM registro WHERE id_reg='$id_reg'";
           if(mysqli_query($conexao,$sql)){
                echo "<script language='javascript' type='text/javascript'>
                alert('Registro apagado com sucesso!');
                window.location.href='lixeira.php';
                </script>";
            }else{
                echo "<script language='javascript' type='text/javascript'>
                alert('Registro não apagado!');
                window.location.href='lixeira.php';
                </script>";
            }
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Somente os administradores tem permissão para apagar registros definitivamente!');
        window.location.href='lixeira.php';
        </script>";
    }
    mysqli_close($conexao);
?>

