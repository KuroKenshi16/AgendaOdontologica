<?php 

// Carregar as credenciais do banco de dados
$hostname = "sql303.epizy.com";
$database = "epiz_31879297_bancodefinitivo_v2";
$user = "epiz_31879297";
$password = "oMPaw5wgIGsqqVo";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Conexão com o banco de dados '.$database.', foi realizado com sucesso!';

}catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();

}
