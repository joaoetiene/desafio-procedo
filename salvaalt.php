<!DOCTYPE html>
<html lang="pt-br">
    <head>
         <meta charset="utf-8" />
         <title>Salva alteração</title>
    </head>
    <body>
        <?php
        include "conectar.php";
        $cod=$_POST['cod'];
        $sql="select * from cliente where codigo='$cod'";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        if ($qtde > 0)
        {
        for ($cont=0; $cont < $qtde; $cont++)
        {
        $linha=pg_fetch_array($resultado);
            $nomel=$linha['nome'];
            $emaill=$linha['email'];
            $docl=$linha['doc'];
            $telefonel=$linha['telefone'];
            $origeml=$linha['origem'];
            $estadol=$linha['estado'];
            $cidadel=$linha['cidade'];
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
        
            if(empty($_POST['doc']))
            {
                $doc=$docl;
            }
            else
                $doc=$_POST['doc'];
        
            if(empty($_POST['tel']))
            {
                $telefone=$telefonel;
            }
            else
                $telefone=$_POST['tel'];
        
            if(empty($_POST['origem']))
            {
                $origem=$origeml;
            }
            else
                $origem=$_POST['origem'];
        
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

            $situacao='t';
            $id_usuario=$_SESSION["id_usuario"];
            include "conectar.php";
            $sql="update cliente set
            codigo='$cod',
            nome='$nome',
            email='$email',
            doc='$doc',
            telefone='$telefone',
            origem='$origem',
            estado='$estado',
            cidade='$cidade',
            situacao='t'
            where codigo='$cod'";

            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            if ($linhas > 1)
                echo "Erro na alteração!";
            else
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
            pg_close($conecta);
        ?>
    </body>
</html>