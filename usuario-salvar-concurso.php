<?php
 if (empty($_SESSION)) {
    print "<script>alert('Acesso não autorizado');</script>";
    print "<script>location.href='index.php';</script>";
}
?>
<!-- <button onclick="javascript:history.go(-1)">Voltar</button> -->
<?php
include("config.php");
switch ($_REQUEST["acao"]){
    case 'cadastrar':
        
        //NÃO PONTUA
        $nome =  $_SESSION["nome"];
        $estado = $_POST["estado"];
        $concurso = $_POST["concurso"];
        $vaga = $_POST["vaga"];
        

        echo "<p>O estado dele é $estado</p>";
        echo "<p>O concurso dele é $concurso</p>";
        echo "<p>A vaga que ele se inscreveu é $vaga</p>";

        //SISTEMA DE PONTUAÇÃO
        $conta = 0;
        $resultado = $conta;
        //TRABALHOU?
        if(empty($_POST["trabalhou"])){echo "<p>NÃO TRABALHOU</p>";}
        else{++$resultado; echo "<p>ELE TRABALHOU</p>";}
        //FACULDADE?        
        if(empty($_POST["faculdade"])){echo "<p>NÃO TEM FACULDADE</p>";}
        else{++$resultado; echo "<p>TEM FACULDADE</p>"; }
        //DOUTORADO?
        if(empty($_POST["doutorado"])){echo "<p>NÃO TEM DOUTORADO</p>";}
        else{++$resultado; echo "<p> TEM DOUTORADO";}
        //RESULTADO
        echo "<br><br><p>O RESULTADO FINAL É ". $resultado."</p>";

        //CONEXAO AO  BANCO DE DADOS
        //comando da query(pedido SQL com os valores)
            $sql = "UPDATE acessousuarios SET 
                    estado='{$estado}',
                    concurso='{$concurso}',
                    vaga='{$vaga}',
                    contador='{$resultado}'
                    WHERE nome = '{$nome}'";

        $res = $conexao->query($sql);

        //REGRA: se o resultado for verdadeiro o dado foi inserido 
        if($res==true){
            print "<script>alert('Inscrição concluida com sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>";

        }else{//SE NÃO, o dado não foi inserido.
            print "<script>alert('Não foi possivel acessar a tabela');</script>";
            print "<script>location.href='?page=listar'listar;</script>";
        }
    

        //CODIGO ANTIGO
        // $sql = "INSERT INTO teste (nome, estado, concurso, vaga, contador) VALUE ('{$nomeForm}','{$estado}','{$concurso}','{$vaga}','{$resultado}')";
        //variavel com resultado da conexão e do pedido
        // $nome = $_POST["nome"];
        // $email = $_POST["email"];
        // $senha = md5($_POST["senha"]);
        // $data_nasc = $_POST["data_nasc"];
        // $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUE ('{$nome}','{$email}','{$senha}','{$data_nasc}')";
        // $res = $conexao->query($sql);
        // if($res==true){
        //     print "<script>alert('cadastro com sucesso');</script>";
        //     // print "<script>location.href='?page=listar'listar;</script>";
        // }else{
        //     print "<script>alert('Não foi possivel cadastrar');</script>";
        //     print "<script>location.href='?page=listar'listar;</script>";
        // }
        break;
    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET 
                        nome='{$nome}',
                        email='{$email}',
                        senha='{$senha}',
                        data_nasc='{$data_nasc}'
                WHERE id =". $_REQUEST["id"];
        

        $res = $conexao->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar'</script>";
        }else{
            print "<script>alert('Não foi possivel editar');</script>";
            print "<script>location.href='?page=listar'</script>";
        }
        break;
    case 'excluir':
            //confirmado que o Usuario se inscreveu antes prosseguindo
            $nome =  $_SESSION["nome"];
            $estado = '';
            $concurso = "";
            $vaga = "";
            $resultado = "";
            $sql = "UPDATE acessousuarios SET 
                    estado='{$estado}',
                    concurso='{$concurso}',
                    vaga='{$vaga}',
                    contador='{$resultado}'
                    WHERE nome = '{$nome}'";
        // $sql = "DELETE FROM acessousuarios WHERE id=".$_REQUEST["id"];
         $res = $conexao->query($sql);
         if($res==true){
             print "<script>alert('Excluido com sucesso');</script>";
             print "<script>location.href='?page=listar'</script>";
         }else{
            print "<script>alert('Não foi possivel excluir');</script>";
           print "<script>location.href='?page=listar'</script>";
         }
        break;
    default:
        # code...
        break;
}
?>