<?php 
    // define('HOST', 'localhost');
    // define('USER', 'root');
    // define('PASS', '');
    // define('BASE', 'aadesam');
    // $conexao = new MySQLi(HOST,USER,PASS,BASE);
    //precisa ser nessa ordem!

$nomeServidor = "localhost";
$usuario =  "root";
$senha = "";
$bancodedados = "treino";



//declaro variavel que vai  conter minha conexao ou seja uma query (chamada com o servidor)
$conexao = new mysqli($nomeServidor, $usuario, $senha, $bancodedados);
    if($conexao ->connect_errno){
        echo "não foi possivel conectar";
    } else{
        echo "<p class = \"conectado\">Você esta conectado ao banco de dados</p> ";
    }
    echo "<p></p>";
//
?>