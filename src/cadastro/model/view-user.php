<?php

//Incluindo nossa conexão com o banco de dados 
include_once('../../conn/config.php');

//Recepção do id do banco de dados 
$ID = $_REQUEST['ID_Pessoa'];

//Gerar nossa consulta sql no banco de dados
$sql = "SELECT * FROM Pessoa WHERE ID_Pessoa = $ID";

//Executar a nossa consulta querie de consulta ao banco de dados
$resultado = $pdo->query($sql);

//Testar a nossa consulta ao baco de dados 
if($resultado){
    $result = array();
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $result = array_map('utf8_encode', $row);
    }
    $dados = array(
        'tipo' => 'success',
        'mensagem' => '',
        'dados' => $result
    );
}else{
    $dados = array(
        'tipo'=> 'error',
        'mensagem' => 'Não foi possivel obter o registro solicitado.',
        'dados' => array()
    );
}

echo json_encode($dados);