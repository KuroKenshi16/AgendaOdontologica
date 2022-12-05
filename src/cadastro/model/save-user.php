<?php



print_r($_POST['NOME']);
print_r($_POST['CPF']);
print_r($_POST['CEL']);
print_r($_POST['LOGRADOURO']);
print_r($_POST['CEP']);
print_r($_POST['CIDADE']);
print_r($_POST['BAIRRO']);
print_r($_POST['DATANSC']);
print_r($_SESSION['ID']);

if(isset($_POST['submit']))
{
    

    // include_once('../../conn/config.php');

    // $nome = $_POST['nome'];
    // $cpf = $_POST['cpf'];
    // $telefone = $_POST['cel'];
    // $celular = $_POST['cel'];
    // $logradouro = $_POST['logradouro'];
    // $cep = $_POST['cep'];
    // $cidade = $_POST['cidade'];
    // $bairro = $_POST['bairro'];
    // $datansc = $_POST['datansc'];
    // $idcredencial = $_SESSION['ID'];


    // $result = mysqli_query($conexao, "INSERT INTO Paciente (PACI_TX_NOME,PACI_CD_CPF,PACI_NM_TELEFONE,PACI_NM_CELULAR,PACI_TX_LOGRADOURO,PACI_NM_CEP,PACI_TX_CIDADE,PACI_TX_BAIRRO,PACI_DT_DATA_NASC,FK_ID_Credencial) VALUES ('$nome','$cpf','$telefone','$celular','$logradouro','$cep','$cidade','$bairro','$datansc','$idcredencial')");

    // header('Location: ../view/cadUser.html');
}

