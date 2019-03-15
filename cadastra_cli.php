<!DOCTYPE html>
<html lang="pt-br">
    <head>
         <meta charset="utf-8" />
         <title>Cadastra cliente</title>
    </head>
    <body>
         <?php
            session_start();
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $doc=$_POST['doc'];
            $telefone=$_POST['tel'];
            $origem=$_POST['origem'];
            $estado=$_POST['estado1'];
            $cidade=$_POST['cidade1'];
            $situacao='t';
            $id_usuario=$_SESSION["id_usuario"];
            include "conectar.php";
            $sql="insert into cliente values('$id_usuario',default, '$nome','$email','$doc','$telefone','$origem','$estado','$cidade',TRUE)";

            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            if ($linhas > 1)
                echo "Erro no cadastro!<br><br>";
            else
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
            pg_close($conecta);
        ?>
    </body>
</html>