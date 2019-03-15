<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
        <form action="enviar_email.php" method="post">
          <div class="form-group">
                <br><br><label for="email">Digite seu endereço de e-mail:</label>
                <input type="email" class="form-control" id="campo" placeholder="Email" name="email" required="required">
          </div>
               
                <input type="submit" value="Enviar" class="btn btn-primary" align="center">
        </form> 
                
    </div>
   
</body>