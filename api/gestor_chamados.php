<?php
session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

$sql = "SELECT chamados.id_chamado, descricao_problema, chamados.prioridade, usuarios.nome as solicitante_nome, tipos_servico.nome as tipo,  
        ambientes.nome as ambiente_nome, id_tecnico, status, tipos_servico.id_tipo as tipos_servico, blocos.nome as bloco_nome
        FROM chamados inner join usuarios ON chamados.id_solicitante=usuarios.id_usuario join ambientes on ambientes.id_ambiente=chamados.id_ambiente
join blocos on ambientes.id_bloco=blocos.id_bloco join tipos_servico on tipos_servico.id_tipo=chamados.id_tipo_servico ;
        ";


 $res=$conn->query($sql);
    $dados=$res->fetch_all(MYSQLI_ASSOC);
    echo json_encode($dados);
