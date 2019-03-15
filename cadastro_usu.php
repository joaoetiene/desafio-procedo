<?php
session_start();
    if (!isset($_SESSION["logou"]))
    {
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        exit;
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title> Cadastro </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
    <script language="JavaScript" type="text/javascript" src="cidades-estados-1.4-utf8.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
        <a class="navbar-brand"><?php echo $_SESSION['nome']; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Clientes</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li class="active"><a href="cadastro_usu.php">Cadastrar Usuário</a></li>
        <li><a href="cadastrocli.php">Cadastrar Clientes</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>   
       
       
   
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
        <form action="cadastra_usuario.php" method="post">
           <label>Cadastro</label><br><br>
      
            
             
          <div class="form-group">
            <label id="objcts">Nome:</label>
            <input type="text" class="form-control" id="campo" name="nome" placeholder="Nome"><br>
            
            <label id="objcts">Email:</label>
            <input type="email" class="form-control" id="campo" name="email" placeholder="Email"><br>
            
            <label id="objcts">Senha:</label>
            <input type="password" class="form-control" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="campo" placeholder="Senha" name="senha">
            <div id="senha"> 
            Sua senha deve conter (no mínimo): <br>
            - Uma letra maiúscula <br>
            - Um caracter especial (*) <br>
            - Um número <br>
            - Uma letra minúscula 
            </div>
            <label>Sexo: &nbsp;&nbsp;</label>
            <label class="radio-inline"><input type="radio" name="optsexo" value="Feminino">Feminino</label>
            <label class="radio-inline"><input type="radio" name="optsexo" value="Masculino">Masculino</label><br><br>
            


            <label id="objcts">Telefone:</label>
            <input type="text" class="form-control" placeholder="Telefone" id="tel" name="tel" ><br> 
        
            <script type="text/javascript">
            $("#tel").mask("(00) 0000-0000");
            </script>
            
            <label id="objcts">Estado:</label>
            <select id="estado1" class="form-control" name="estado1"></select><br>
            
            <label id="objcts">Cidade:</label>
            <select id="cidade1" class="form-control" name="cidade1"></select>
            <script language="JavaScript" type="text/javascript" charset="utf-8">
            new dgCidadesEstados({
                cidade:         document.getElementById('cidade1'),
                estado:     document.getElementById('estado1')
            })
            </script>
          </div>
                
                <input type="submit" class="btn btn-primary" value="Cadastrar" align="center">
                
        </form>  
    </div>

   
   
        

</body>