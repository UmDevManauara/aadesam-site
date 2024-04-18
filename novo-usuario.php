<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVO USUARIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="col-lg- 4 offset - 4">
            <h1>Cadastre-se</h1>
            <form action="usuario-cadastrar-novo.php" method="POST">
                <div class="mb-3">
                    <?php switch (@$_REQUEST["page"]) {
                        case "existe":
                          print"<p style = \"color: red\"> Email ja em uso</p>";
                        break;            
                        default:
                          
                      }?>
                    <label for="nome-login">Nome Completo</label>
                    <input type="text" name="nome-login" class="form-control" required minlength="4">
                </div>
                <div class="mb-3">
                    <label for="email-login">Email</label>
                    <input type="email" name="email-login" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha-login">Senha</label>
                    <input type="password" name="senha-login" class="form-control" minlength="8" required>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="index.html" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Voltar</a>
                    <button class="btn btn-primary me-md-2" type="submit">Enviar</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>