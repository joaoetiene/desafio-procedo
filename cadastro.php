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
       
       
       
   
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
        <form action="cadastra_usu.php" method="post">
           <br><br><label>Cadastro</label><br><br>
      
            
             
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
                
                <br>
                <input type="submit" class="btn btn-primary" value="Cadastrar" align="center">
                
        </form>  
    </div>

   
   
        

</body>