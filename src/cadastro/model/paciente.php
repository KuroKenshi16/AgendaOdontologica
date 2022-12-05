<?php
session_start();

// requirindo a classe perfil
require("../../classes/Acess-class.php");

$requestData = $_REQUEST;

$ACAO = $_REQUEST['operacao'];

// instanciando um objeto da classe perfil

$paciente = new Paciente();

//  Recebendo os valores dos campos e verificando se não estão vazios antes de criar definir o atributo

empty($_REQUEST['template']) ?: $paciente->ID_Paciente = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_TX_NOME = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_CD_CPF = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_NM_CELULAR = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_TX_LOGRADOURO = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_NM_CEP = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_TX_CIDADE = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_TX_BAIRRO = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->PACI_DT_DATA_NASC = $_REQUEST['template'];
empty($_REQUEST['template']) ?: $paciente->FK_ID_Credencial = $_SESSION['template'];


// definindo ações

// Definindo qual ação será executada
if($ACAO == 'INSERT'){
    $acess->Create();

    $dados = array(
        'tipo' => "success",
        'mensagem' => "Credencial cadastrada com sucesso."
    );
}

// if($ACAO == 'SELECT'){
//     $acess->Find(1);
//     $dados = array(
//         'tipo' => 'success',
//     );
// }

// if($ACAO == 'VALIDATE'){
//         $dados = array(
//             'tipo' => 'success',
//             'ID_Credencial' =>  $_SESSION['ID_Credencial'],
//             'email' =>  $_SESSION['email'],
//             'password' => $_SESSION['password'],
//         );
// }

echo json_encode($dados);