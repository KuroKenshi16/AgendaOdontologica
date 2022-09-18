<?php 

// Carregar as credenciais do banco de dados
$hostname = "localhost";
$database = "u246662187_KgAgenda";
$user = "u246662187_AgendaTCC";
$password = "Agenda_IKMS@23";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Conexão com o banco de dados '.$database.', foi realizado com sucesso!';

}catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();

}
