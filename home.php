<?php
session_start();
    if (!isset($_SESSION["logou"]))
    {
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        exit;
    }
$id=$_SESSION["id_usuario"];
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title> Home </title>
    
    <script language="JavaScript" type="text/javascript" src="cidades-estados-1.4-utf8.js"></script>
    
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
                    window.location.href="excluir.php?user="+id;
                    
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
        <li class="active"><a href="home.php">Clientes</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="cadastro_usu.php">Cadastrar Usuário</a></li>
        <li><a href="cadastrocli.php">Cadastrar Clientes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav><br>
<script> 
    function filtrocod() 
{ 
  var input, filter, table, tr, th, i, txtValue;
  input = document.getElementById("mycod");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) 
  {
    th = tr[i].getElementsByTagName("th")[0];
    if (th) 
    {
      txtValue = th.textContent || th.innerText;
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
      <th scope="col">Cliente</th>
      <th scope="col">E-mail</th>
      <th scope="col">CNPJ</th>
      <th scope="col">Telefone</th>
      <th scope="col">Origem</th>
      <th scope="col">Estado</th>      
      <th scope="col">Cidade</th>
      <th scope="col">Alterar &nbsp; Excluir</th>
    </tr>
    <tr>
        <th></th>
         
        <th><input type="text" id="myInput" class="form-control" onkeyup="filtronome()" placeholder="Procure pelo cliente"></th>
        
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
        $sql="select * from cliente where situacao='t' and id_usuario='$id' order by codigo";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        if ($qtde > 0)
        {
        for ($cont=0; $cont < $qtde; $cont++)
        {
        $linha=pg_fetch_array($resultado);
            echo "<tr>
            <th scope='row'>".$linha['codigo']."</th>
            <td>".$linha['nome']."</td>
            <td>".$linha['email']."</td>
            <td>".$linha['doc']."</td>
            <td>".$linha['telefone']."</td>
            <td>".$linha['origem']."</td>
            <td>".$linha['estado']."</td>
            <td>".$linha['cidade']."</td>   
            <td>"?> <a href='altera.php?user=<?php echo "".$linha['codigo']."";?>'>Alterar</a> &nbsp; &nbsp; <a id="click" onclick='excluir(<?php echo"".$linha['codigo']."";?>)'>Excluir</a>
    <?php
            "</td>
            </tr>";
            
        }

        }
        else
        {
        ?>
        <center>
        <?php
        echo "Não foi encontrado nenhum cliente!<br><br>";
        }?></center>
        
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