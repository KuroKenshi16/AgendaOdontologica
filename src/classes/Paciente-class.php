<?php

    require_once ("Crud-class.php");
	require_once('Conection-class.php');

class Paciente extends Crud {

    # nome da tabela
    protected $table = 'Paciente';

    #chave primaria da tabela
    protected $pk = 'ID_Paciente';
}