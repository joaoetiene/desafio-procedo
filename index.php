<!-- Desenvolvido por João Pedro Etiene de Azevedo - 09/03/2019 -->
<?php
 session_start();
    if (isset($_SESSION["logou"]))
    {
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<head>
    <link rel="icon" href="j.ico" />
    <meta charset="UTF-8">
    <title> Home </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
        <form action="checarlogin.php" method="post">
          <div class="form-group">
                <br><br><label for="email">Endereço de e-mail</label>
                <input type="email" class="form-control" id="campo" placeholder="Email" name="email" required="required">
          </div>
  
          <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" required="required" id="campo" placeholder="Senha" name="senha">
                <a href="redefinir.php" id="txtforgot">Esqueceu sua senha?</a><br><br>
                <a href="cadastro.php">Não tem uma conta? Cadastre-se</a>
          </div>
               
                <input type="submit" value="Enviar" class="btn btn-primary" align="center">
        </form> 
                
    </div>
   
</body>