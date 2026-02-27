<?php
session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

$sql = "SELECT caminho_arquivo, tipo_anexo 
        FROM chamados_anexos"
         ;

 $res=$conn->query($sql);
    $dados=$res->fetch_all(MYSQLI_ASSOC);
    echo json_encode($dados);
