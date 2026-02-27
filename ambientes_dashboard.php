<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SGM - Gestão de Ambientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="gestor_dashboard.php">SGM Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="gestor_chamados.php">Chamados</a>
                <a class="nav-link" href="gestor_locais.php">Locais</a>
                <a class="nav-link" href="api/logout.php">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container ">
        <h2 class="mb-4 mt-5">Todos os Ambientes</h2>
           <a href="novo_ambiente.php" class="btn btn-outline-primary  w-20">+ Novo Ambiente</a>
           


        <div class="card shadow mt-3">
            <div class="table-responsive ">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Bloco</th>
                            <th></th>
                            <th></th>
                           
                        </tr>
                    </thead>
                    <tbody id="tabelaGeral">
                         <tr>
                         <th scope="row">1</th>
                         <td>Recepção</td>
                         <td>Bloco Administrativo</td>
                         <td>  <a href="editar_ambiente.php" class="btn btn-primary w-20">
                        <i class="bi bi-pencil-square"></i></i>    Editar</a></td>
                         <td>
<!-- Button trigger modal -->

<button type="button" class="bnt bg-dark rounded text-light mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="max-width:5rem;">Deletar</button></td>
                         </tr>

                         

                         
                        </tbody>
                </table>
            </div>
            
        </div>
    </div>


</div>

</body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja deletar ambiente?
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
        <button type="button" class="btn btn-success">Deletar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>

</html>
