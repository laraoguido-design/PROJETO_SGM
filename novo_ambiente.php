<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class="container-fluid mt- " style="width:50rem">
              <a href="ambientes_dashboard.php" class="btn btn-outline-dark mt-5" style="">Voltar</a>


   <form id="formChamado" class="shadow p-2 mt-4">
                
                    <div class="input-group input-group-sm mb-1">
  <span class="input-group-text" id="inputGroup-sizing-sm"  >Nome</span>
  <input type="text" class="form-control"  required placeholder="Ex: recepção">
</div>
                            
                        </select>
                      <div class="mb-3">
                        <label class="form-label">Bloco</label>
                        <select id="selectBloco" class="form-select" required onchange="carregarAmbientes(this.value)">
                            <option value="">Selecione o Bloco...</option>
                        </select>
                    </div>
                     <button type="submit" class="btn btn-primary w-40">Registrar Ambiente</button>
                    </div>
                   
                   
                </form>
</div>
</main>
</body>





</html>