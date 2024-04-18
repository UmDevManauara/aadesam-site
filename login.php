<?php
var_dump($_REQUEST);
session_start();
//isset = determina se a variavel foi declarada e não é Null
//empty = Determinar se uma variável está vazia
// a exclamação ( ! ) é usado para inverter o sinal do resultado
  if (isset($_POST) && (!empty($_POST["email"]) && (!empty($_POST["senha"])))) {
      // print "<script>location.href='index.php';</script>";
      print "Não logado";
    } 
   include('config.php');
   $email = $_POST["email"];
   $senha = $_POST["senha"];
   $sql = "SELECT * FROM acessousuarios
         WHERE email = '{$email}'
         AND senha = '".md5($senha)."'";

    $res = $conexao->query($sql) or die($conexao->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;

 if ($qtd > 0) {
    $_SESSION["email"] =  $row->email;
    $_SESSION["senha"] = $row->senha;
    $_SESSION["nome"] = $row->nome  ;
    $_SESSION["tipo"] = $row->tipo;
     print
             "<script>location.href='usuario-dashboard.php';</script>";
 } else {
     print "Email ou nome não encontrado";
//         "<script>alert('Email ou senha incorreto(s)');</script>";
//     print
//         "<script>location.href='index.php';
//     </script>";
}
?>

<p class= "footer">Site desenvolvido por Matheus Alves Um Dev Manauara</p>