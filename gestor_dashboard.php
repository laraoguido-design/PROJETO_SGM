<!DOCTYPE html>
<html lang="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestor dashboard</title>
</head>
<header>
        <nav class="navbar navbar-expand-lg bg-dark d-flex justify-content-center " style="max-height: 5rem;">
            <h3 class="text-light m-4">SGM| Gestão administrativa</h4>
            
            <a href="api/logout.php" class="btn btn-outline-success m-5">Sair</a>
            
</header>
<body>
<main>
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

    
    <button type="button" class="btn btn-outline-primary m-5 w-20">
        <i class="bi bi-gear"></i>    Configurar ambientes</button>
</div>
    
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</html>