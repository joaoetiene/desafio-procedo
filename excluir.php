         <?php
            session_start();
            $cod=$_GET['user'];
            $id_usuario=$_SESSION["id_usuario"];
            include "conectar.php";
            $sql="update cliente set situacao='f' where codigo='$cod'";

            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            
            if ($linhas > 1)
                echo "Erro ao excluir cliente!<br><br>";
            else
                echo "Cliente Excluído<br><br>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
            pg_close($conecta);
            
    
        ?>
