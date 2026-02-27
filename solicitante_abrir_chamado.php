<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
        <nav class="navbar navbar-expand-lg bg-dark justify-content-center" style="max-height: 5rem;background-color:#32365a;">
            <h3 class="text-light">SGM| Solicitante</h4>
             <a href="api/logout.php" class="btn btn-outline-success m-5">Sair</a>
            
</header>
<body>
    <main>
        <div class="container-fluid mt-5 " style="width:50rem">


   <form id="formChamado">
                    <div class="mb-3">
                        <label class="form-label">Bloco</label>
                        <select id="selectBloco" class="form-select" required onchange="carregarAmbientes(this.value)">
                            <option value="">Selecione o Bloco...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ambiente / Sala</label>
                        <select id="selectAmbiente" class="form-select" required disabled>
                            <option value="">Selecione o Bloco primeiro...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Serviço</label>
                        <select id="selectTipo" class="form-select" required>
                            <option value="">Selecione o tipo...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição do Problema</label>
                        <textarea id="descricao" class="form-control" rows="4"
                         required placeholder="Ex: Lâmpada queimada ou vazamento..."></textarea>
                    </div>
                    <div class="mb-3">
            <label class="form-label">Foto da Ocorrência (Opcional)</label>
            <input type="file" id="foto" class="form-control" accept="image/*">
        </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar Solicitação</button>
                </form>
</div>
</main>
</body>

<script>
       // Carrega Blocos e Tipos ao iniciar
        async function iniciar() {
            // Blocos
            const resB = await fetch('api/localizacoes.php?acao=listar_blocos');
            const blocos = await resB.json();
            const selB = document.getElementById('selectBloco');
            blocos.forEach(b => selB.innerHTML += `<option value="${b.id_bloco}">${b.nome}</option>`);

            // Tipos
            const resT = await fetch('api/localizacoes.php?acao=listar_tipos');
            const tipos = await resT.json();
            const selT = document.getElementById('selectTipo');
            tipos.forEach(t => selT.innerHTML += `<option value="${t.id_tipo}">${t.nome}</option>`);
        }

        // Carrega Ambientes dinamicamente quando o Bloco muda
        async function carregarAmbientes(id_bloco) {
            const selA = document.getElementById('selectAmbiente');
            if (!id_bloco) { selA.disabled = true; return; }
           
            const res = await fetch(`api/localizacoes.php?acao=listar_ambientes&id_bloco=${id_bloco}`);
            const ambientes = await res.json();
           
            selA.innerHTML = '<option value="">Selecione a Sala...</option>';
            ambientes.forEach(a => selA.innerHTML += `<option value="${a.id_ambiente}">${a.nome}</option>`);
            selA.disabled = false;
        }

document.getElementById('formChamado').addEventListener('submit', async (e) => {
    e.preventDefault();
   
    const formData = new FormData();
    formData.append('id_ambiente', document.getElementById('selectAmbiente').value);
    formData.append('id_tipo', document.getElementById('selectTipo').value);
    formData.append('descricao', document.getElementById('descricao').value);
   
    const fotoFile = document.getElementById('foto').files[0];
    if (fotoFile) {
        formData.append('foto', fotoFile);
    }

    const response = await fetch('api/salvar_chamado.php', {
        method: 'POST',
         body: formData
    });

    const result = await response.json();
    if (result.success) {
        alert(result.message);
        window.location.href = 'solicitante_dashboard.php';
    } else {
        alert("Erro: " + result.message);
    }
});

        iniciar();
    </script>



</html>