<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
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
<body>
   
   <div class="container-fluid " style="width:60rem;">
    <a href="ambientes_dashboard.php" class="btn btn-outline-dark mt-5" style="">Voltar</a>
  <div class="shadow p-2 mt-3">

   <form id="editar" class="p-3">
     
  <div class="row d-flex">
                    <ul class="list-group list-group-flush">
     <li class="list-group-item">Dados do Ambiente</li>

<div class="input-group input-group-sm mb-1">
  <span class="input-group-text" id="inputGroup-sizing-sm"  >Nome</span>
  <input type="text" class="form-control"  required placeholder="Recepção">
</div>

<div class="mb-3">
   <label class="form-label">Bloco</label>
    <select id="selectBloco" class="form-select" required onchange="carregarAmbientes(this.value)">
    <option value="">Bloco Administrativo</option>
     </select>
      </div>



<a href="ambientes_dashboard.php" type="submit" class="btn btn-success mt-3" style="max-width:5rem;">Salvar</a>
</div>
</form>

</div>

</div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>



</body>
</html>