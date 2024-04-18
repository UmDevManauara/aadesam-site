<?php
session_start();
if (empty($_SESSION)) {
    print "<script>alert('Acesso não autorizado');</script>";
    print "<script>location.href='index.html';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin-dashboard.php">ADMNISTRADOR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin-dashboard.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=listar">Listar Usúarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contato">Contato</a>
                    </li>

                    
            </div>
            <?php 
            print"Olá, ". $_SESSION['nome'];
            print "<a href='logout.php' class='btn btn-dander'>Sair</a>";
            
            ?>
        </div>
    </nav>


    <div class="container">
    <div class="row">
      <div class="col mt-5">
          <?php
          include("config.php");
          switch (@$_REQUEST["page"]) {
            // case "novo":
            //   include("novo-usuario.php");
            // break;
            case "listar":
              include ("admin-listar-usuario.php");
            break;
            case "salvar";
              include("admin-salvar-usuario.php");
              break;

            case "editar";
              include("admin-editar-usuario.php");
              break;
            case "contato";
            include("contato.php");
            break;

            default:
              print "<h1>Bem Vindo!</h1>";
          }
          ?>
      </div>
    </div>
  </div>
</body>

</html>