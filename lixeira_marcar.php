
<?php
    session_start();
    include("banco.php");
    $id_reg = $_GET['id_reg'];
    $marca = mysqli_query($conexao,"SELECT marcar FROM registro where id_reg=$id_reg") or die(mysqli_error($conexao));
    
    // Marcar ou desmarcar a coluna "Marcar" com a letra "R",
    //indicando que aquele registro deve voltar a aparecer na tabela registro
        while($marca2 = $marca->fetch_assoc()) {
            
            if($marca2['marcar']=='R')
            {
                $sql = "UPDATE registro SET marcar='' WHERE id_reg='$id_reg'";
                    if(mysqli_query($conexao,$sql)){
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Marcar alterada com sucesso!');
                    window.location.href='lixeira.php';
                    </script>";
              
                    }else{
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Marcar não foi alterada!');
                    window.location.href='lixeira.php';
                    </script>";
                    }
                }else{
                     $sql = "UPDATE registro SET marcar='R' WHERE id_reg='$id_reg'";
                       if(mysqli_query($conexao,$sql)){
                       echo "<script language='javascript' type='text/javascript'>
                       alert('Marcar alterada com sucesso!');
                       window.location.href='lixeira.php';
                       </script>";
              
                       }else{
                       echo "<script language='javascript' type='text/javascript'>
                       alert('Marcar não foi alterada!');
                       window.location.href='lixeira.php';
                       </script>";
            }
            }




        }
    
    
   mysqli_close($conexao);
    
    
   
?>

