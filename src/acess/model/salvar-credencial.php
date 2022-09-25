<?php 
if(isset($_POST['submit']))
{
    //print_r($_POST['nome']);
    //print_r($_POST['email']);

    include_once('../../conn/config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    

    $result = mysqli_query($conexao, "INSERT INTO Credencial(CRED_TX_EMAIL,CRED_TX_SENHA) VALUES ('$email','$password')");

    header('Location: ../view/acesso.html');
}
?>
