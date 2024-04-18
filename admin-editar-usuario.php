<h1>Editar Usuários</h1>
<?php 
 $sql = "SELECT * FROM acessousuarios WHERE id=".$_REQUEST["id"];

 $resultado = $conexao->query($sql);
 $row = $resultado->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name = "acao" value="editar">
    <input type="hidden" name="id" value="<?= $row->id; ?>">

    <div class="mb-3">
        <label for="Nome">Nome</label>
        <input type="text" name="nome" id="inome" value="<?= $row->nome; ?>" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="iemail" value="<?= $row->email; ?>" class="form-control" disabled>
    </div>
   
    <div class="input-group mb-3">
            <label class="input-group-text" for="estado">Estado</label>
            <select class="form-select" id="estado" name="estado">
                <option selected value="<?= $row->estado; ?>">Deseja mudar?...</option>
                <option value="Amazonas">Amazonas</option>
                <option value="Pará">Pará</option>
                <option value="São Paulo">São Paulo</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="concurso">Concuso</label>
            <select class="form-select" id="concurso" name="concurso">
                <option selected value="<?= $row->concurso; ?>">Deseja mudar?...</option>
                <option value="PSS Sala Digital">PSS Sala Digital</option>
                <option value="AADESAM Concurso Amazonas">AADESAM Concurso Amazonas</option>
                <option value="AADESAM Concurso Sao Paulo">AADESAM Concurso Sao Paulo</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="vaga">Vaga</label>
            <select class="form-select" id="vaga" name="vaga">
                <option selected value="<?= $row->vaga; ?>">Deseja mudar?...</option>
                <option value="Médico">Médico</option>
                <option value="Analista de Sistema">Analista de Sistema</option>
                <option value="Programador">Programador</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="tipo">tipo</label>
            <select class="form-select" id="tipo" name="tipo">
                <option selected value="<?= $row->tipo; ?>">Deseja mudar?...</option>
                <option value="1">Administrador</option>
                <option value="2">Usuário</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="pontos">Pontuação</label>
        <input type="number" name="pontos" id="ipontos" value= "<?= $row->contador; ?>" required class="form-control">
    </div>
    <input type="submit" value="Enviar" class="btn btn-primary">
</form>