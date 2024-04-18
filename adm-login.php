<?php
session_start();
//isset = determina se a variavel foi declarada e não é Null
//empty = Determinar se uma variável está vazia
// a exclamação ( ! ) é usado para inverter o sinal do resultado
  if (empty($_POST) or (empty($_POST["email-login"]) or (empty($_POST["senha-login"])))) {
  print "<br><p><b style = \"color: red\">dados do formulario não recebido!</b> preencha o formulário.</p>";
  
  }else{
  print "<br><p><b style = \"color: green\">dados do formulario recebido!</b></p>";
  }
   include('config.php');
    $email = $_POST["email-login"];
    $senha = $_POST["senha-login"];
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
     print "Email e nome encontrado";
     if($_SESSION["tipo"] == 1){
      print "<script>alert('Nivel de Acesso autorizado');</script>";
    
      print "<script>location.href='admin-dashboard.php';</script>";
      
     }else{ 
      print "<br><p><b style = \"color: red\">Nivel de Acesso não autorizado</b></p>";
      print "<script>alert('Nivel de Acesso não autorizado');</script>";
      print "<script>location.href='admin.html';</script>";
      
    }
    
  } else {
      print "Email ou nome não encontrado";
      print "<script>alert('Email ou senha incorreto(s)');</script>";
      print"<script>location.href='admin.html';</script>";
 }
?>

<p class="footer">Site desenvolvido por Matheus Alves <a href="https://github.com/UmDevManauara" target="_blank">Um Dev Manauara</a></p>