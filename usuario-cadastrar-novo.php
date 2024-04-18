<?php
var_dump($_POST);
include("config.php");
//verificação do POST
if (empty($_POST) or (empty($_POST["nome-login"]) or (empty($_POST["email-login"]) or (empty($_POST["senha-login"]))))) {
    print "<br><p><b style = \"color: red\">dados do formulario não recebido!</b> preencha o formulário.</p>";
    
}else{
    print "<br><p><b style = \"color: green\">dados do formulario recebido!</b> preencha o formulário.</p>";
    
    $nomeLogin = $_POST["nome-login"];
    $emailLogin = $_POST["email-login"];
    $senhaLogin = md5($_POST["senha-login"]);
    $tipoLogin = 2;

    $sql = "SELECT * FROM acessousuarios
    WHERE email = '{$emailLogin}'";

    $res = $conexao->query($sql) or die($conexao->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;
    var_dump($qtd);
     if ($qtd > 0){
         print "<script>location.href='novo-usuario.php?page=existe';</script>";
     }else{
        $tipoLogin = 2;
        $sql = "INSERT INTO acessousuarios (nome, email, senha, tipo) VALUE ('{$nomeLogin}','{$emailLogin}','{$senhaLogin}','{$tipoLogin}')";
        $res = $conexao->query($sql);
         if ($res == true) {
            print "<script>alert('cadastro com sucesso');</script>";
            print "<script>location.href='index.html';</script>";
        } else {
             print "<script>alert('Não foi possivel cadastrar');</script>";
             // print "<script>location.href='?page=listar'listar;</script>";
         }

     }

}

