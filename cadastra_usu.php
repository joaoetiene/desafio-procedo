<!DOCTYPE html>
<html lang="pt-br">
    <head>
         <meta charset="utf-8" />
         <title>Cadastra usuário</title>
    </head>
    <body>
         <?php
            session_start();
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $sexo=$_POST['optsexo'];
            $telefone=$_POST['tel'];
            $estado=$_POST['estado1'];
            $cidade=$_POST['cidade1'];
            $situacao='t';
            $senha=$_POST['senha'];
            $senha = md5($senha);
            include "conectar.php";
            $sql="insert into usuario values(default, '$nome','$email','$sexo','$telefone','$estado','$cidade',TRUE,'$senha')";

            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            if ($linhas > 1)
                echo "Erro no cadastro!<br><br>";
            else
                ?>
                <script>alert("Usuário cadastrado!")</script>
                <?php
            pg_close($conecta);
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        ?>
    </body>
</html>