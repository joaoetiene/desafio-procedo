<!DOCTYPE html>
<html lang="pt-br">
    <head>
         <meta charset="utf-8" />
         <title>Cadastra usuário</title>
    </head>
           <?php
            include "conectar.php";
            $email=$_POST['email'];
            $sql="select * from usuario where email='$email' and situacao='t'";
            $resultado= pg_query($conecta, $sql);
            $qtde=pg_num_rows($resultado);
            if ($qtde > 0)
            {
                    for ($cont=0; $cont < $qtde; $cont++)
                    {
                        $linha=pg_fetch_array($resultado);
                        $cod=$linha['id_usuario'];
                        $nomel=$linha['nome'];
                        $emaill=$linha['email'];
                        $senha=$linha['senha'];
                    }
                require_once("email/class.smtp.php");
                require_once("email/class.phpmailer.php");
                require_once("email/class.pop3.php");
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPDebug = 0; 
                $mail->SMTPAuth = true;	
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com'; 
                $mail->Port = 465;
                $mail->SMTPAuth = true; 
                $mail->Username = 'desafio.sistema@gmail.com';
                $mail->Password = 'desafio123';
                $mail->SetFrom('desafio.sistema@gmail.com','Desafio - Sistema'); 
                $mail->AddAddress($emaill); //Muda Aqui para as variaveis que vem do SELECT
                $mail->IsHTML(true); 
                $mail->CharSet = 'utf-8'; 
                $mail->Subject  = "Sistema - Redefinir Senha" ; // Assunto da mensagem
                $mail->Body = "
                <html>
                <h1>Bem vindo $nomel!</h1>
                <br><h2>Redefina sua senha: 'localhost/desafio/alterausu.php?user=$cod'</h2><br>
                </html>";
                $enviado = $mail->Send();
                $mail->ClearAllRecipients();
                $mail->ClearAttachments();
                if ($enviado) 
                {
                    echo "<script>alert('Uma mensagem foi enviada para seu e-mail com seus dados para login! Verifique sua caixa de entrada.');</script>";
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";

                } 
                else 
                {
                    echo "<script>alert('Problemas ao enviar email');</script>";
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=redefinir.php'>";
                }
            }

            else
                echo "<script>alert('Não foi encontrado nenhum e-mail!');</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
    



?>
</html>