<style>
    td{
        text-align: center;
    }
</style>
<?php
if (empty($_SESSION)) {
    print "<script>alert('Acesso não autorizado');</script>";
    print "<script>location.href='index.php';
    </script>";
}
?>
<?php
    $sql = "SELECT *FROM acessousuarios";
    $resultado = $conexao->query($sql);
    $quantidade = $resultado ->num_rows;
    if($quantidade > 0){
        print "<table class ='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>ID</th>";      
        print "<th>Nome</th>";
        print "<th>Email</th>";
        print "<th>Estado</th>";
        print "<th>Concurso</th>";
        print "<th>Vaga</th>";
        print "<th>Pontos</th>";
        print "<th style =\"text-align: center \">TIPO <br>(1= admin 2 = usuario)</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $resultado->fetch_object()){
            print "<tr>";
            print "<td>".$row ->id."</td>";      
            print "<td>".$row ->nome."</td>";
            print "<td>".$row ->email."</td>";
            print "<td>".$row ->estado."</td>";
            print "<td>".$row ->concurso."</td>";
            print "<td>".$row ->vaga."</td>";
            print "<td>".$row ->contador."</td>";
            print "<td>".$row ->tipo."</td>";
            print "<td>
                    <button onclick=\"location.href='?page=editar&id=".$row->id."'\"; class='btn btn-success'>Editar</button>
                    <button onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."'}else{false;}\"; class='btn btn-danger'>Excluir</button>";
            print "</tr>";

        }

    }else{
        print "<p class='alert-danger'>Não encontrou resultados!</p>";
    }

?>