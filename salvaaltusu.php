<!DOCTYPE html>
<html lang="pt-br">
    <head>
         <meta charset="utf-8" />
         <title>Salva alteração</title>
    </head>
    <body>
        <?php
        include "conectar.php";
        $cod=$_POST['id_usuario'];
        $sql="select * from usuario where id_usuario='$cod'";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        if ($qtde > 0)
        {
        for ($cont=0; $cont < $qtde; $cont++)
        {
        $linha=pg_fetch_array($resultado);
            $nomel=$linha['nome'];
            $emaill=$linha['email'];
            $sexo=$linha['sexo'];
            $telefonel=$linha['telefone'];
            $estadol=$linha['estado'];
            $cidadel=$linha['cidade'];
            $senhal=$linha['senha'];
            $senhal = md5($senhal);
        }

        }
        ?>
        
         <?php
            session_start();
            if(empty($_POST['nome']))
            {
                $nome=$nomel;
            }
            else
                $nome=$_POST['nome'];
        
            if(empty($_POST['email']))
            {
                $email=$emaill;
            }
            else
                $email=$_POST['email'];
        
            if(empty($_POST['tel']))
            {
                $telefone=$telefonel;
            }
            else
                $telefone=$_POST['tel'];
        
            if(empty($_POST['senha']))
            {
                $senha=$senhal;
            }
            else
                $senha=$_POST['senha'];
            
            if(empty($_POST['estado1']))
            {
                $estado=$estadol;
            }
            else
                $estado=$_POST['estado1'];
        
            if(empty($_POST['cidade1']))
            {
                $cidade=$cidadel;
            }
            else
                $cidade=$_POST['cidade1'];

            $sexo=$_POST['optsexo'];
            $situacao='t';
            $id_usuario=$_SESSION["id_usuario"];
            include "conectar.php";
            $sql="update usuario set
            id_usuario='$cod',
            nome='$nome',
            email='$email',
            sexo='$sexo',
            telefone='$telefone',
            estado='$estado',
            cidade='$cidade',
            senha='$senha',
            situacao='t'
            where id_usuario='$cod'";

            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            if ($linhas > 1)
                echo "Erro na alteração!";
            else
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=usuarios.php'>";
            pg_close($conecta);
        ?>
    </body>
</html>