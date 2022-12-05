<?php
session_start();

// requirindo a classe perfil
require("../../classes/Acess-class.php");

$requestData = $_REQUEST;

$ACAO = $_REQUEST['operacao'];

// instanciando um objeto da classe perfil

$acess = new Acess();

//  Recebendo os valores dos campos e verificando se não estão vazios antes de criar definir o atributo

empty($_REQUEST['ID_Credencial']) ?: $acess->ID_Crerdencial = $_REQUEST['ID_Credencial'];
empty($_REQUEST['email']) ?: $acess->CRED_TX_EMAIL = $_REQUEST['email'];
empty($_REQUEST['password']) ?: $acess->CRED_TX_SENHA = $_REQUEST['passowrd'];
empty($_REQUEST['TIPO']) ?: $acess->CRED_ID_TIPO = $_REQUEST['TIPO'];



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


if($ACAO == 'LOGIN'){
    session_destroy();
    $db->bind('login', $requestData['email']);
    $db->bind('senha', md5($requestData['password']));

    $dadosUsuario = $db->query("SELECT U., count(U.ID_Credencial) as achou FROM Credencial U WHERE U.CRED_TX_EMAIL = :login AND U.CRED_TX_SENHA = :senha");
    // $dadosUsuario = $db->query("SELECT U., count(U.ID) as achou FROM USUARIO U, ASSINANTE A, ASSINATURA AA WHERE U.STATUS=1  AND U.LOGIN = :login AND U.SENHA = :senha AND A.USUARIO_ID = U.ID AND AA.ASSINANTE_ID =A.ID AND AA.DATA_FIM > '$dataLocal' ");
    // print_r($dadosUsuario);
    if($dadosUsuario[0]['achou'] == 1){
        if($dadosUsuario[0]){
            session_start();
        $_SESSION['ID_Credencial'] = $dadosUsuario[0]['ID_Credencial'];
            $_SESSION['email'] = $dadosUsuario[0]['email'];
            $_SESSION['TIPO'] = $dadosUsuario[0]['TIPO'];

            $dados = array(
                'tipo' => 'success',
                'mensagem' => 'Login correto!',
                'tipo_usuario' => $dadosUsuario[0]['TIPO'],
                'ID' => $dadosUsuario[0]['ID_Credencial']
            );
        }else{
            $dados = array(
                'tipo' => 'error',
                'mensagem' => 'Usuario desativado, verifique a fatura.'
            );
        }

    }else{
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Nome de usuário ou senha incorreto(s).'
        );
    }
}



echo json_encode($dados);