        <?php
            session_start();
            $cod=$_GET['user'];
            include "conectar.php";
            $sql="update usuario set situacao='f' where id_usuario='$cod'";

            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            
            if ($linhas > 1)
                echo "Erro ao excluir registro!<br><br>";
            else
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=usuarios.php'>";
            pg_close($conecta);
            
    
        ?>
