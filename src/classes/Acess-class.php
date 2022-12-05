<?php

    require_once ("Crud-class.php");
	require_once('Conection-class.php');

class Acess extends Crud {

    # nome da tabela
    protected $table = 'Credencial';

    #chave primaria da tabela
    protected $pk = 'ID_Credencial';
}