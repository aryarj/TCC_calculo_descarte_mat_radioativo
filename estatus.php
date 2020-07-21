
<?php
    session_start();
    include("banco.php");
    $id = $_GET['id_reg'];
    $estatus = mysqli_query($conexao,"SELECT estatus FROM registro where id_reg=$id") or die(mysqli_error($conexao));
    
        // Alterando o status da coluna "Descartado?" para "Sim/Não"
        while($estatus2 = $estatus->fetch_assoc()) {
            
            if($estatus2['estatus']=='Não'){
                $sql = "UPDATE registro SET estatus='Sim' WHERE id_reg='$id'";
                if(mysqli_query($conexao,$sql)){
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Estatus alterado com sucesso!');
                    window.location.href='registro.php';
                    </script>";
              
                    }else{
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Estatus não foi alterado!');
                    window.location.href='registro.php';
                    </script>";
                    }
                }else{
                     $sql = "UPDATE registro SET estatus='Não' WHERE id_reg='$id'";
                     if(mysqli_query($conexao,$sql)){
                       echo "<script language='javascript' type='text/javascript'>
                       alert('Estatus alterado com sucesso!');
                       window.location.href='registro.php';
                       </script>";
              
                       }else{
                       echo "<script language='javascript' type='text/javascript'>
                       alert('Estatus não foi alterado!');
                       window.location.href='registro.php';
                       </script>";
            }
            }




        }
    
    
   mysqli_close($conexao);
    
    
   
?>

