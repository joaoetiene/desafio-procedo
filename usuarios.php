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
    <title> Home </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script language="Javascript">
        function excluir(id)
        {
            var resp = confirm("Deseja remover esse registro?");
            
            if(resp == true)
                {
                    window.location.href="excluirusu.php?user="+id;
                    
                }
        }
    </script>
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
        <li class="active"><a href="usuarios.php">Usuários</a></li> 
        <li><a href="cadastro_usu.php">Cadastrar Usuário</a></li>
        <li><a href="cadastrocli.php">Cadastrar Clientes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
function filtronome() 
{ 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) 
  {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) 
    {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) 
      {
        tr[i].style.display = "";
      } else 
      {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
       
        <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Usuário</th>
      <th scope="col">E-mail</th>
      <th scope="col">Sexo</th>
      <th scope="col">Telefone</th>
      <th scope="col">Estado</th>      
      <th scope="col">Cidade</th>
      <th scope="col">Alterar &nbsp; Excluir</th>
    </tr>
    <tr>
         <th></th>
         
        <th><input type="text" id="myInput" class="form-control" onkeyup="filtronome()" placeholder="Procure pelo nome"></th>
        
        <th></th>
        
        <th></th>
        
        <th></th>
        
        <th></th>
        
        <th></th>
        <th></th>
        
    </tr>
  </thead>
  <tbody>
   <?php
      include "conectar.php";
        $sql="select * from usuario where situacao='t' order by id_usuario";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        if ($qtde > 1)
        {
        for ($cont=0; $cont < $qtde; $cont++)
        {
        $linha=pg_fetch_array($resultado);
            echo "<tr>
            <th scope='row'>".$linha['id_usuario']."</th>
            <td>".$linha['nome']."</td>
            <td>".$linha['email']."</td>
            <td>".$linha['sexo']."</td>
            <td>".$linha['telefone']."</td>
            <td>".$linha['estado']."</td>
            <td>".$linha['cidade']."</td>
            <td>"?> <a href='alterausu.php?user=<?php echo "".$linha['id_usuario']."";?>'>Alterar</a> &nbsp; &nbsp; <a id="click" onclick='excluir(<?php echo"".$linha['id_usuario']."";?>)'>Excluir</a>
    <?php
            "</td>
            </tr>";
            
        }
        }
        else
        echo "Não foi encontrado nenhum usuário!<br><br>";
 
   
    
    ?>
  </tbody>
  <td></td>
</table>
  <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
  <a href="cadastro_usu.php"><button class="btn btn-primary" align="center">Cadastrar Usuário</button>
  </a><br><br>
  
  <a href="cadastrocli.php"><button class="btn btn-primary" align="center">Cadastrar Cliente</button>
  </a>
  </div>

</body>