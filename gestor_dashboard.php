<!DOCTYPE html>
<html lang="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestor dashboard</title>
</head>
<header>
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
            
</header>
<body>
<main>
  
<section>
  <div class="modal" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="btn-close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja mesmo sair?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sim</button>
        <button type="button" class="btn btn-primary">Não</button>
      </div>
    </div>
  </div>
</div>
</section>


    <div class="container d-flex m-5 shadow" style="max-width:90rem;min-height:10rem;background-color:;">
 

    <div class="card text-light bg-primary mb-3 m-5 " style="min-width: 23rem;">

  <div class="card-body">
    <h5 class="card-title">Novas solicitações</h5>
    <h4 class="card-text">0</h4>
  </div>
</div>
<div class="card text-light bg-warning mb-3 m-5 " style="min-width: 23rem;">
 
  <div class="card-body">
    <h5 class="card-title">Em andamento</h5>
    <h4 class="card-text">0</h4>
  </div>
</div>
<div class="card text-light bg-danger mb-3 m-5" style="min-width: 23rem;">
  
  <div class="card-body">
    <h5 class="card-title">Urgente</h5>
    <h4 class="card-text">0</h4>
  </div>
  
</div>

</main>
<div class="d-flex justify-content-center">
    <a href="gestor_chamados.php" class="btn btn-dark m-5 w-20">
        <i class="bi bi-list"></i>    Gerenciar todos os chamados</a>
      
     <a href="user_lista.php" class="btn btn-success m-5 w-20">
       <i class="bi bi-people-fill"></i>   Gerenciar Usuários</a>

    
    <a href ="ambientes_dashboard.php" type="button" class="btn btn-outline-primary m-5 w-20">
        <i class="bi bi-gear"></i>    Configurar ambientes</a>
      
    <a href ="blocos_dashboard.php" type="button" class="btn btn-outline-primary m-5 w-20">
        <i class="bi bi-gear"></i>    Configurar Blocos</a>
    
     <a href ="servicos_dashboard.php" type="button" class="btn btn-outline-primary m-5 w-20">
        <i class="bi bi-gear"></i>    Configurar Serviços</a>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</html>
