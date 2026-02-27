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
<body style="background-color:;">
    <main>
        <div class="bg-primary m-5 w-10 text-light p-3 d-flex justify-content-center rounded " style="max-height: 5rem; max-width:100rem;">
        <h5>Minhas solicitações<h5>
             <a href="solicitante_abrir_chamado.php" class="btn btn-light text-primary m-3">+ Nova solicitação</a>
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
        <td>Mark</td>
      <td>Otto</td>
     
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
        <td>Mark</td>
      <td>Otto</td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
        <td>Mark</td>
      <td>Otto</td>
    </tr>
  </tbody>
</table>
</div>
    

    </main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<script>
   function verFoto(url) {
            document.getElementById('imgModal').src = url;
            new bootstrap.Modal(document.getElementById('modalFoto')).show();
        }

        async function carregarChamados() {
            const chamados = await (await fetch('api/chamados.php')).json();
            const lista = document.getElementById('tabelaChamados');
            const cores = { 'aberto': 'bg-secondary', 'agendado': 'bg-info', 'em_execucao': 'bg-warning', 'concluido': 'bg-success', 'fechado': 'bg-dark' };

            lista.innerHTML = await Promise.all(chamados.map(async c => {
                // Busca se tem foto para mostrar miniatura na lista
                const anexos = await (await fetch(`api/anexos.php?id_chamado=${c.id_chamado}`)).json();
                const thumbHtml = anexos.length > 0 ?
                    `<img src="${anexos[0].caminho_arquivo}" class="mini-thumb" onclick="verFoto('${anexos[0].caminho_arquivo}')">` :
                    '<i class="bi bi-image text-muted"></i>';

                return `<tr>
                    <td>#${c.id_chamado}</td>
                    <td>${thumbHtml}</td>
                    <td>${c.bloco_nome} - ${c.ambiente_nome}</td>
                    <td>${c.descricao_problema.substring(0,30)}...</td>
                    <td>${new Date(c.data_abertura).toLocaleDateString()}</td>
                    <td><span class="badge ${cores[c.status]}">${c.status.toUpperCase()}</span></td>
                </tr>`;
            })).then(rows => rows.join(''));
        }
        carregarChamados();
</script>


  </body>