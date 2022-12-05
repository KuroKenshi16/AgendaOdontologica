<?php

//Incluindo nossa conexão com o banco de dados 
include_once('../../conn/config.php');

$ID = $_REQUEST['ID_Pessoa'];

$sql = "DELETE FROM Pessoa WHERE ID_Pessoa = $ID";

$resultado = $pdo->query($sql);

if($resultado){
    $dados = array(
        'tipo' => 'success',
        'mensagem' => 'Registro excluido com sucesso.'
    );
}else{
    $dados = array(
        'tipo' => 'error',
        'mensagem' => 'Não foi possivel excluir o registro selecionado.'
    );
}
echo json_encode ($dados);