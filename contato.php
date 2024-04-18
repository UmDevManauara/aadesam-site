<h1>Entraremos em contato</h1>
<form action="envio-contato.php" method="POST">
    <input type="hidden" name = "acao" value="cadastrar">
    <div class="mb-3">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="inome" class="form-control" placeholder="Digite seu nome">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="iemail" class="form-control" placeholder="digite seu email">
    </div>
    <div class="mb-3">
        <label for="mensagem">Mensagem</label>
        <textarea name="mensagem" id="mensagem" rows="3"  class="form-control" placeholder="digite sua mensagem"></textarea>
    </div>
    <input type="submit" value="Enviar" class="btn btn-primary">
</form>