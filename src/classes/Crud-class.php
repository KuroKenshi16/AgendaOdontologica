<?php 
/**
* Easy Crud  -  This class kinda works like ORM. Just created for fun :) 
*
* @author		Author: Vivek Wicky Aswal. (https://twitter.com/#!/VivekWickyAswal)
* @version      0.1a
*/
require_once('Conection-class.php');
// define('URLROOT', '');
class Crud {

	private $db;

	public $variables;

	public function __construct($data = array()) {
		$this->db =  new DB();	
		$this->variables  = $data;
	}

	public function __set($name,$value){
		if(strtolower($name) === $this->pk) {
			$this->variables[$this->pk] = $value;
		}
		else {
			$this->variables[$name] = $value;
		}
	}

	public function __get($name)
	{	
		if(is_array($this->variables)) {
			if(array_key_exists($name,$this->variables)) {
				return $this->variables[$name];
			}
		}

		return null;
	}


	public function save($id = "0") {
		$this->variables[$this->pk] = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];

		$fieldsvals = '';
		$columns = array_keys($this->variables);

		foreach($columns as $column)
		{
			if($column !== $this->pk)
			$fieldsvals .= $column . " = :". $column . ",";
		}

		$fieldsvals = substr_replace($fieldsvals , '', -1);

		if(count($columns) > 1 ) {

			$sql = "UPDATE " . $this->table .  " SET " . $fieldsvals . " WHERE " . $this->pk . "= :" . $this->pk;
			if($id === "0" && $this->variables[$this->pk] === "0") { 
				unset($this->variables[$this->pk]);
				$sql = "UPDATE " . $this->table .  " SET " . $fieldsvals;
			}

			return $this->exec($sql);
		}

		return null;
	}

	public function create() { 
		$bindings   	= $this->variables;
		if(!empty($bindings)) {
			$fields     =  array_keys($bindings);
			$fieldsvals =  array(implode(",",$fields),":" . implode(", :",$fields));
			$sql 		= "INSERT INTO ".$this->table." (".$fieldsvals[0].") VALUES (".$fieldsvals[1].")";
		}
		else {
			$sql 		= "INSERT INTO ".$this->table." () VALUES ()";
		}

		return $this->exec($sql);
	}

	public function delete($id = "") {
		$id = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];

		if(!empty($id)) {
			$sql = "DELETE FROM " . $this->table . " WHERE " . $this->pk . "= :" . $this->pk. " LIMIT 1" ;
		}

		return $this->exec($sql, array($this->pk=>$id));
	}

	public function find($id = "") {
		$id = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];

		if(!empty($id)) {
			$sql = "SELECT * FROM " . $this->table ." WHERE " . $this->pk . "= :" . $this->pk . " LIMIT 1";	
			
			$result = $this->db->row($sql, array($this->pk=>$id));
			$this->variables = ($result != false) ? $result : null;
		}
	}
	/**
	* @param array $select.
	* @param array $fields.
	* @param array $sort.
	* @return array of Collection.
	* Example: $user = new User;
	* $found_user_array = $user->search(array('sex' => 'Male', 'age' => '18'), array('dob' => 'DESC'));
	* // Will produce: SELECT * FROM {$this->table_name} WHERE sex = :sex AND age = :age ORDER BY dob DESC;
	* // And rest is binding those params with the Query. Which will return an array.
	* // Now we can use for each on $found_user_array.
	* Other functionalities ex: Support for LIKE, >, <, >=, <= ... Are not yet supported.
	* TODO: Criar parâmetro para pegar valores específicos no sql SELECT (substituir o '*')
	* TODO: Adicionar suporta para outras funcionalidades (LIKE, != <, >, =>, ...)
	*/
	public function search($select = array(), $fields = array(), $sort = array()) { // * Variável criada: $select que conterá o que devemos buscar
		$bindings = empty($fields) ? $this->variables : $fields;
		$itens = empty($select) ? '*' : $select;
		
		$sql = "SELECT ";

		// * Verificando se tem que buscar tudo ou apenas algo específico
		if ($itens != '*') {
			$itensvals = array();
			foreach ($itens as $index => $value) {
				$itensvals[] = $value;
			}
			$sql .= implode(", ", $itensvals);
		} else {
			$sql .= $itens;
		}

		$sql .= " FROM " . $this->table;

		if (!empty($bindings)) {
			$fieldsvals = array();
			foreach($bindings as $keys => $column) {
				if(gettype($keys) == 'integer') {
					$fieldsvals [] = $column;
					continue;
				}
				$fieldsvals [] = $keys . " = ". $column;
			}
			$sql .= " WHERE " . implode(" AND ", $fieldsvals);
		}
		
		if (!empty($sort)) {
			$sortvals = array();
			foreach ($sort as $key => $value) {
				$sortvals[] = $key . " " . $value;
			}
			$sql .= " ORDER BY " . implode(", ", $sortvals);
		}
		return $this->exec($sql);
	}

	public function searchLike($requestDatas){
		return $this->db->allLike("SELECT * FROM " . $this->table .' WHERE STATUS=1 ', $requestDatas, $this->colunsSearch);
	}

	public function all(){
		return $this->db->query("SELECT * FROM " . $this->table .' WHERE STATUS=1 ');
	}


	public function dataTable($requestDatas){
		return $this->db->listDataTables("SELECT * FROM " . $this->table .' WHERE DELETADO=1 ', $requestDatas, $this->colunsSearch);
	}

	public function lastId(){
		return $this->db->lastInsertId();
	}
	
	public function min($field)  {
		if($field)
		return $this->db->single("SELECT min(" . $field . ")" . " FROM " . $this->table);
	}

	public function max($field)  {
		if($field)
		return $this->db->single("SELECT max(" . $field . ")" . " FROM " . $this->table);
	}

	public function avg($field)  {
		if($field)
		return $this->db->single("SELECT avg(" . $field . ")" . " FROM " . $this->table);
	}

	public function sum($field)  {
		if($field)
		return $this->db->single("SELECT sum(" . $field . ")" . " FROM " . $this->table);
	}

	public function count($field)  {
		if($field)
		return $this->db->single("SELECT count(" . $field . ")" . " FROM " . $this->table);
	}	
	

	private function exec($sql, $array = null) {
		
		if($array !== null) {
			// Get result with the DB object
			$result =  $this->db->query($sql, $array);	
		}
		else {
			// Get result with the DB object
			$result =  $this->db->query($sql, $this->variables);	
		}
		
		// Empty bindings
		$this->variables = array();

		return $result;
	}

	public function CamposObrigatorios($requisicao){
		foreach($this->cp_obrigatorio as $key => $value){
			if(empty($requisicao[$value])){
				$dados = array(
					'tipo' => "error",
					'mensagem' => "Existe(m) campo(s) obrigatório(s) não preenchido(s) corretamente" 
				);
				return $dados;
			}
	}

	return true;

}

public function findNotStatus($id = "") {
	$id = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];

	if(!empty($id)) {
		$sql = "SELECT * FROM " . $this->table ." WHERE " . $this->pk . "= :" . $this->pk . " LIMIT 1";    
		
		$result = $this->db->row($sql, array($this->pk=>$id));
		$this->variables = ($result != false) ? $result : null;
	}
}

	public function salvarImagem($arquivos){
		
		//Pasta onde o arquivo vai ser salvo
		$_UP['pasta'] = $this->pastaimg;
		
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = $this->tamanhoimg; //5mb
		
		//Array com a extensões permitidas
		$_UP['extensoes'] = $this->extensoesimg;
		
		//Renomeiar
		$_UP['renomeia'] = false;
		
		//Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		
		//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
		if($arquivos['arquivo']['error'] != 0){
			$dados = array(
				'tipo' => 'error',
				'mensagem' => "Não foi possivel salvar a imagem. Erro: ". $_UP['erros'][$arquivos['arquivo']['error']]
			);
			return $dados;
			die();
		}
		
		//Faz a verificação da extensao do arquivo
		$extensao = strtolower(end(explode('.', $arquivos['arquivo']['name'])));
		if(array_search($extensao, $_UP['extensoes'])=== false){		
			$dados = array(
				'tipo' => 'error',
				'mensagem' => "Extensão da imagem invalida."
			);
			return $dados;
			die();
		}
		
		//Faz a verificação do tamanho do arquivo
		else if ($_UP['tamanho'] < $arquivos['arquivo']['size']){
			$dados = array(
				'tipo' => 'error',
				'mensagem' => "Imagem muito grande."
			);
			return $dados;
			die();
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
		else{
			//Primeiro verifica se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
				$nome_final = md5(time()).'.jpg';
			}else{
				//mantem o nome original do arquivo
				$nome_final = $arquivos['arquivo']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($arquivos['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
				//Upload efetuado com sucesso, exibe a mensagem
				return $nome_final;
			}else{
				//Upload não efetuado com sucesso, exibe a mensagem
				$dados = array(
					'tipo' => 'error',
					'mensagem' => "Erro ao salvar a imagem."
				);
				return $dados;
				die();
			}
		}
	}

	public function salvarMutiplasImagens($arquivos, $c){

		//Pasta onde o arquivo vai ser salvo
		$_UP['pasta'] = $this->pastaimg;
		
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = $this->tamanhoimg; //5mb
		
		//Array com a extensões permitidas
		$_UP['extensoes'] = $this->extensoesimg;
		
		//Renomeiar
		$_UP['renomeia'] = $this->renomeiaimg;
		
		//Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		
		//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
		if($arquivos['error'][$c] != 0){
			$dados = array(
				'tipo' => 'error',
				'mensagem' => "Não foi possivel salvar a imagem. Erro: ". $_UP['erros'][$arquivos['error'][$c]]
			);
			return $dados;
			die();
		}
		
		//Faz a verificação da extensao do arquivo
		$extensao = strtolower(end(explode('.', $arquivos['name'][$c])));
		if(array_search($extensao, $_UP['extensoes'])=== false){		
			$dados = array(
				'tipo' => 'error',
				'mensagem' => "Extensão da imagem invalida."
			);
			return $dados;
			die();
		}
		
		//Faz a verificação do tamanho do arquivo
		else if ($_UP['tamanho'] < $arquivos['size'][$c]){
			$dados = array(
				'tipo' => 'error',
				'mensagem' => "Imagem muito grande."
			);
			return $dados;
			die();
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
		else{
			//Primeiro verifica se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
				$nome_final = md5($c+time()) .'.jpg';
			}else{
				//mantem o nome original do arquivo
				$nome_final = $arquivos['name'][$c];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($arquivos['tmp_name'][$c], $_UP['pasta']. $nome_final)){
				//Upload efetuado com sucesso, exibe a mensagem
				$dados = array(
					'tipo' => 'sucesso',
					'nome' => $nome_final
				);
				return $dados;
			}else{
				//Upload não efetuado com sucesso, exibe a mensagem
				$dados = array(
					'tipo' => 'error',
					'mensagem' => "Erro ao salvar a imagem."
				);
				return $dados;
				die();
			}
		}
	
	}

	public function deleteImgServicos($IMG){
		if(!empty($IMG)){
			$imagem = $this->pastaimg ."/$IMG";
	
			// Apagar a imagem
			if(file_exists($imagem)){
				unlink($imagem);
				return true;
			}
			}
			return false;
		}

}