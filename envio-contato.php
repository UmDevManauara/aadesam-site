<?php 

$to = "matheussalvessconta@gmail.com"; //destinatario

$assunto = "Formuário do site";

$mensagem = $_POST['mensagem']. " - " . $_POST['nome'];

$email = $_POST['email']; //remetente


$status = mail ($to, $assunto, $mensagem,);


if($status==true){
   echo "Mensagem foi enviado com sucesso!";  


}else{
    echo "não foi possivel enviar";
}



?>