<?php
// This code gets the 'id' from the URL (like '?id=1')
// and makes it available for your page.
$id = 0; // Default to 0 or handle error if ID is missing
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Convert the ID to a number
}
// Now the $id variable will be correctly set for the rest of your page.
?>

<!DOCTYPE html>
<html lang="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestor detalhes</title>
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

<main>

<div class="container-fluid">
    
<div class="container m-5">
    <a href="gestor_chamados.php" class="btn btn-outline-dark " style="">Voltar</a>
  <div class="row d-flex">
    <div class="col">

      <section class=" shadow mt-3  "style="max-width:50rem;">
 <div class="card" style="width: 50rem;">
  
  <!-- <ul class="list-group list-group-flush">
     <li class="list-group-item">Dados da Solicitação</li>
    <li class="list-group-item">Status:</li>
    <li class="list-group-item">Descrição:</li>
    <li class="list-group-item">Local:</li>
    <li class="list-group-item">Solicitante:</li>
    <li class="list-group-item">Abertura:</li>
    <li class="list-group-item">Evidência:</li>
  </ul>  
   <img src="img/conserto.jpg" class="card-img-top m-1" style="width:20rem;"alt="...">
  -->
   
      <form id="formAtribuir">

    <div class="card-header bg-white"><strong>Dados da solicitação</strong></div>
    <div id="detalhesChamado" class="card-body">Carregando...</div>
    <div id="areaFechamento"></div>
</div>
</form>
   <button type="submit" class="btn btn-warning m-4 " style="max-width:48rem;">Receber chamado</button>
</section>






    </div>
    <div class="col">
      <section style="max-width:40rem;">
    <div class="shadow rounded ">

   <form  class="shadow rounded p-1">
      
    <legend class="bg-primary p-1 text-light rounded">Triagem e atribuição</legend>




    <input type="hidden" id="id_chamado" value="<?=$id?>">

    <div class="mb-3">
      <label >Técnico Responsável  </label>
      <select id="selectTecnico" class="form-select" required></select>
      <option></option>
     </div>
    

    <div class="mb-3">
      <label >Prioridade </label>
      <select id="prioridade" class="form-select">
        <option>Alta</option>
        <option>Média</option>
        <option>Baixa</option>
        <option>Urgente</option>
      </select>
    </div>
    <div class="mb-3">
    <label>Data prevista</label>
    <input type="date" class="form-control" id="data_prevista" required>
    </div>
    
    
      <button type="submit" class="btn btn-primary m-4 " style="min-width:26rem;">Concluir atribuição</button>
     
    
   
</form>
</section>
    </div>
</div>










</div>
</div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
<script>
    
        function verFoto(url) {
            document.getElementById('imgModal').src = url;
            new bootstrap.Modal(document.getElementById('modalFoto')).show();
        }

        async function carregarDados() {
            // Carrega Técnicos
            const resTec = await fetch('api/usuarios.php');
            const tecnicos = await resTec.json();
            const select = document.getElementById('selectTecnico');
            select.innerHTML = '<option value="">Selecione um técnico...</option>';
            tecnicos.forEach(t => select.innerHTML += `<option value="${t.id_usuario}">${t.nome}</option>`);

            // Carrega Chamado
            const c = await (await fetch(`api/chamados.php?id=<?= $id ?>`)).json();
            document.getElementById('detalhesChamado').innerHTML = `
                <p><strong>Status:</strong> <span class="badge bg-secondary">${c.status.toUpperCase()}</span></p>
                <p><strong>Descrição:</strong> ${c.descricao_problema}</p>
                <p><strong>Local:</strong> ${c.bloco_nome} - ${c.ambiente_nome}</p>
                <p><strong>Solicitante:</strong> ${c.solicitante_nome}</p>
                <p><strong>Abertura:</strong> ${new Date(c.data_abertura).toLocaleString()}</p>
                <div id="fotosContainer"></div>
            `;

            if(c.id_tecnico) document.getElementById('selectTecnico').value = c.id_tecnico;
            if(c.prioridade) document.getElementById('prioridade').value = c.prioridade;
            if(c.data_previsao_conclusao) document.getElementById('data_prevista').value = c.data_previsao_conclusao;

            // Carrega Fotos
            const anexos = await (await fetch(`api/anexos.php?id_chamado=<?= $id ?>`)).json();
            if(anexos.length > 0) {
                let htmlFotos = '<hr><h6>Evidências:</h6><div class="row">';
                anexos.forEach(arq => {
                    htmlFotos += `
                        <div class="col-4 text-center mb-2">
                            <img src="${arq.caminho_arquivo}" class="thumb-img" onclick="verFoto('${arq.caminho_arquivo}')">
                            <small class="text-muted">${arq.tipo_anexo === 'abertura' ? 'Abertura' : 'Conclusão'}</small>
                        </div>`;
                });
                document.getElementById('fotosContainer').innerHTML = htmlFotos + '</div>';
            }

            // Botões de Status
            const area = document.getElementById('areaFechamento');
            if (c.status === 'concluido') {
                area.innerHTML = `<div class="alert alert-success">
                    <h6>Técnico finalizou:</h6><p>${c.solucao_tecnica || 'Sem descrição'}</p>
                    <button onclick="alterarStatusOS(<?= $id ?>, 'fechar')" class="btn btn-success w-100">Fechar O.S.</button>
                </div>`;
            } else if (c.status === 'fechado') {
                area.innerHTML = `<button onclick="alterarStatusOS(<?= $id ?>, 'reabrir')" class="btn btn-warning w-100">Reabrir Chamado</button>`;
            }
        }

        async function alterarStatusOS(id, acao) {
            if(!confirm("Confirmar alteração de status?")) return;
            const res = await fetch('api/gestor_acoes.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ id_chamado: id, acao: acao })
            });
            if((await res.json()).success) location.reload();
        }

        document.getElementById('formAtribuir').onsubmit = async (e) => {
            e.preventDefault();
            const res = await fetch('api/atribuir_chamado.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    id_chamado: <?= $id ?>,
                    id_tecnico: document.getElementById('selectTecnico').value,
                    prioridade: document.getElementById('prioridade').value,
                    data_prevista: document.getElementById('data_prevista').value
                })
            });
            if((await res.json()).success) window.location.href = 'gestor_chamados.php';
        };

        carregarDados();
    </script>
</body>