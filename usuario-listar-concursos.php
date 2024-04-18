<?php
if (empty($_SESSION)) {
    print "<script>alert('Acesso não autorizado');</script>";
    print "<script>location.href='index.php';</script>";
}
?>
<div class="container-fluid">

    <?php
    //confirmando se o usuario se inscreveu primeiramente
    $emailUser =  $_SESSION["email"];
    $sql = "SELECT * FROM acessousuarios
    WHERE email = '{$emailUser}'";

    $res = $conexao->query($sql) or die($conexao->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        $estado_user =  $row->estado;
        $concurso_user = $row->concurso;
        $vaga_user = $row->vaga;
        $contador_user = $row->contador;
        //print "<script>alert('Usuario encontrado');</script>";
        print "<h1>Minha Inscrição</h1>";
        if (isset($estado_user) && (empty($concurso_user) && (empty($vaga_user)))) {
            print "<br><p><b style = \"color: red\">Inscrição não encontrada!</b> realize sua inscrição.</p>";
            
        }else{
            $sql = "SELECT * FROM acessousuarios
            WHERE email = '{$emailUser}'";
            $resultado = $conexao->query($sql);
            $quantidade = $resultado->num_rows;
        
            if ($quantidade > 0) {
                print "<table class ='table table-hover table-striped table-bordered'>";
                print "<tr>";
                //print "<th>#</th>";
                print "<th>Nome</th>";
                print "<th>Email</th>";
                print "<th>Estado</th>";
                print "<th>Concurso</th>";
                print "<th>Vaga</th>";
                //print "<th>Ponto(s)</th>";
                print "<th>Editar</th>";
                print "</tr>";
                while ($row = $resultado->fetch_object()) {
                    print "<tr>";
                    //print "<td>" . $row->id . "</td>";
                    print "<td>" . $row->nome . "</td>";
                    print "<td>" . $row->email . "</td>";
                    print "<td>" . $row->estado . "</td>";
                    print "<td>" . $row->concurso . "</td>";
                    print "<td>" . $row->vaga . "</td>";
                    //print "<td>" . $row->contador . "</td>";
                    // print "<td>
                    //      <button onclick=\"location.href='?page=editar&id=" . $row->id . "'\"; //class='btn btn-success'>Editar</button>
                    print " <td><button onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id . "'}else{false;}\"; class='btn btn-danger'>Excluir</button>";
                    print "</tr>";
                }
            }else{
            print "<p class='alert-danger'>Não encontramos nenhum resultado! Faça sua inscrição</p>";
            }
        }   
    } 
    else {
        print "<script>alert('Usuario não encontrado');</script>";
        print "<h1>Usuario não encontrado</h1>";
    }

    //CONDICIONAL SE OS CAMPOS ESTAO VAZIOS
    


    ?>
</div>