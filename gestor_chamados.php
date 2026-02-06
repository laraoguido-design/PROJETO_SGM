<!DOCTYPE html>
<html lang="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>solicitantestor dashboard</title>
</head>
<header>
        <nav class="navbar navbar-expand-lg bg-dark justify-content-center" style="max-height: 5rem;background-color:#32365a;">
            <h3 class="text-light">SGM| Solicitante</h4>
             <a href="api/logout.php" class="btn btn-outline-success m-5">Sair</a>
            
</header>
<body >
    
    <main>


        <div class="m-5">
        <button type="button" class="btn btn-outline-dark">Todos</button>
<button type="button" class="btn btn-outline-primary">Abertos</button>
<button type="button" class="btn btn-outline-warning">Em andamento</button>
<button type="button" class="btn btn-outline-danger">Concluídos</button>
</div>
        <div class="bg-primary m-5 w-10 text-light p-3 d-flex justify-content-center rounded " style="max-height: 5rem; max-width:100rem;">
        <h5>Todos os chamados<h5>
        </div>

<div class="container-fluid m-5 " style="max-width:90rem;">
 <table class="table bg-light shadow">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Foto</th>
      <th scope="col">Local</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>001</td>
      <td>Biblioteca</td>
      <td>Lâmpada quebrada</td>
        <td>01/02/2026</td>
      <td><div class="rounded bg-dark text-light p-1">Fechado</div></td>
       <td><div class="rounded bg-primary text-light p-1">Gerenciar</div></td>
     
    </tr>

  </tbody>
</table>
</div>
    

    </main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</body>