<!DOCTYPE html>
<html lang="pt-br">
 <head>
 <meta charset="utf-8" />
 <title>Conecta com BD PostgreSQL</title>
 </head>
 <body>
 <?php
 //Conecta com o PostgreSQL
 $conecta = pg_connect("host=localhost port=5432 dbname=desafio user=postgres password=postgres");
     if (!$conecta)
     {
        exit;
     }
     
     
     
?>
       
        
 </body>
</html>