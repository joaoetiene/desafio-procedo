<?php
    session_start();
    include "conectar.php";
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senha = md5($senha);
    $sql = "select * from usuario where email = '$email' and senha = '$senha' ";
    $res = pg_query($conecta, $sql);
        if (pg_num_rows($res) != 1)
        {
?>
            <script>alert("Login/Senha inválido(s)")</script>
<?php
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        else
        {
            
            $linha = pg_fetch_array($res);
            $_SESSION["logou"] = "s";
            $_SESSION["nome"] = $linha['nome'];
            $_SESSION["id_usuario"] = $linha['id_usuario'];
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
        }
?>
