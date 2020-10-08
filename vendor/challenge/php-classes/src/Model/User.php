<?php

namespace Challenge\Model;

use \Challenge\DB\Sql;
use \Challenge\Model;
use \Challenge\Mailer;

class User extends Model
{
	const SESSION = "";
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const SUCCESS = "UserSucesss";

	// Função responsável por contar quantos funcionários estão cadastrados
	public static function getTotFuncs(){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_funcionario");

		return count($results);
	}

	// Função responsável por contar quantas movimentações do tipo Entrada
	public static function getTotEntradas(){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_movimentacao WHERE tipo_movimentacao = 'entrada'");

		return count($results);
	}

	// Função responsável por contar quantas movimentações do tipo Saída
	public static function getTotSaidas(){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_movimentacao WHERE tipo_movimentacao = 'saida'");

		return count($results);
	}

	/* Cadastro de movimentações, cadastra na tabela tb_movimentacao e recebe o saldo do funcionário usando uma
	função especifica para alterar o saldo do mesmo
	*/
	public function cadMovimentacao($idfunc)
	{
		$sql = new Sql();
		
		$results = $sql->query("INSERT INTO tb_movimentacao (tipo_movimentacao, valor, observacao, funcionario_id, administrador_id) VALUES (:tipo_movimentacao,:valor,:observacao,:funcionario_id,:administrador_id)",array(
			":tipo_movimentacao" => $this->gettipo_movimentacao(),
			":valor" => $this->getvalor(),
			":observacao" => $this->getobservacao(),
			":funcionario_id" => $this->getfuncionario_id(),
			":administrador_id" => $this->getadministrador_id()
		));

		if($this->gettipo_movimentacao() == "entrada"){

			$results = $sql->select("SELECT saldo_atual FROM tb_funcionario WHERE id = :id", array(
				":id" => $idfunc
			));

			$user = new User();

			$Saldo = $results[0]['saldo_atual'];
			
			$moviADD = number_format($this->getvalor(),2,'.',',');

			$user->addToSaldo($Saldo,$moviADD, $idfunc);

		}else{
			$results = $sql->select("SELECT saldo_atual FROM tb_funcionario WHERE id = :id", array(
				":id" => $idfunc
			));

			$user = new User();

			$Saldo = $results[0]['saldo_atual'];
			
			$moviADD = number_format($this->getvalor(),2,'.',',');

			$user->removeToSaldo($Saldo,$moviADD, $idfunc);
		}

		return $results;
	}

	// Função para atualizar o saldo - Aumenta o saldo
	public function addToSaldo($saldo, $movimentacao,$idfunc){

		settype($movimentacao, "float");

		$saldo_atual = str_replace(',','',$saldo);

		settype($saldo_atual, "float");

		$carteira = $saldo_atual + $movimentacao;

		$sql = new Sql();

		$data = $sql->query("UPDATE tb_funcionario SET saldo_atual = :saldo WHERE id = :id",array(
			":saldo" => $carteira,
			"id" => $idfunc
		));

		return $data;

	}
	// Função para atualizar o saldo - Reduz o saldo
	public function removeToSaldo($saldo, $movimentacao, $idfunc){

		settype($movimentacao, "float");

		$saldo_atual = str_replace(',','',$saldo);

		settype($saldo_atual, "float");

		$carteira = $saldo_atual - $movimentacao;

		$sql = new Sql();

		$data = $sql->query("UPDATE tb_funcionario SET saldo_atual = :saldo WHERE id = :id",array(
			":saldo" => $carteira,
			"id" => $idfunc
		));

		return $data;

	}

	// Função exclusiva para o administrador efetuar o login, está função recebe o login -> E-mail e a senha
	public function login($login, $password)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_administrador WHERE login = :login AND senha = :senha", array(
			":login" => $login,
			":senha" => $password
		));

		if (count($results) === 0) {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];

		$user = new User();

		$data['nome_completo'] = utf8_encode($data['nome_completo']);

		$user->setData($data);

		$_SESSION[User::SESSION] = $user->getValues();

		$_SESSION['nome_completo'] = $user->getnome_completo();
		$_SESSION['id'] = $user->getid();

		return $user;
	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;
		session_destroy();
	}

	// Função utilizada para verificar se o administrador efetuou login
	public static function verifyLogin()
	{	
		if(!isset($_SESSION['id']) || $_SESSION['id'] == ""){
			header("Location: /admin/login");
			exit;
		}

	}
	
	// Função que busca todas as informações sobre o administrador
	public function getInfoAdmin($idadmin)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_administrador WHERE id = :id", array(
			":id" => $idadmin
		));

		return $this->setData($results[0]);
	}

	// Função responsável por cadastrar um novo funcionário caso ainda não seja cadastrado
	public function cadFuncionario()
	{

		$sql = new Sql();

		$data = $sql->select("SELECT login FROM tb_funcionario WHERE login = :LOGIN", array(
			":LOGIN" => $this->getlogin()
		));

		if(count($data) == 0){
			// 	echo json_encode($_POST);
			$results = $sql->select("INSERT INTO tb_funcionario (nome_completo,login,senha,saldo_atual,administrador_id) VALUES (:fullname, :login, :senha , :saldoAtual , :adminId)", array(
			":fullname" => $this->getnome_completo(),
			":login" => $this->getlogin(),
			":senha" => md5($this->getsenha()),
			":saldoAtual" => $this->getsaldo_atual(),
			":adminId" => $_SESSION['id']
		));

		return true;

		}else{
			return false;
		}
	}

	// Função responsável por cadastrar um novo administrador
	public function saveAdmin($fullname, $login, $password)
	{

		$sql = new Sql();

		$results = $sql->query("INSERT INTO tb_administrador (nome_completo,login,senha) VALUES (:fullname,:login,:senha)", array(
			":fullname" => $fullname,
			":login" => $login,
			":senha" => $password
		));

		return true;
	}

	// Função que busca todos os dados de um funcionário pelo seu id
	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_funcionario WHERE id = :id", array(
			":id" => $iduser
		));

		$data = $results[0];

		$data['nome_completo'] = utf8_encode($data['nome_completo']);


		$this->setData($data);
	}

	// Função que atualiza os dados do funcionário
	public function update($idfunc)
	{

		$sql = new Sql();

		date_default_timezone_set('America/Sao_Paulo');
		$dataLocal = date('Y/m/d H:i:s', time());

		$results = $sql->select("CALL sp_update_save(:idfunc, :nome_completo,:login,:saldo_atual, :dataUpdate)", array(
			":idfunc" => $idfunc,
			":nome_completo" => utf8_decode($this->getnome_completo()),
			":login" => $this->getlogin(),
			":saldo_atual" => $this->getsaldo_atual(),
			":dataUpdate" => $dataLocal
		));

		return $results;
	}

	// Função que deleta um funcionário pelo seu id
	public static function delete($idfunc)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_funcionario WHERE id = :idfunc", array(
			":idfunc" => $idfunc
		));

		return true;
	}

	// Paginação das movimentações de um funcionário específico
	public static function getPageExtractFromId($page = 1, $idfunc, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS 
		a.tipo_movimentacao, a.valor, a.observacao, a.funcionario_id, a.administrador_id, a.data_criacao, b.id, b.nome_completo, c.id
		FROM tb_movimentacao AS a
		INNER JOIN tb_funcionario AS b
		INNER JOIN tb_administrador AS c
        WHERE a.funcionario_id = $idfunc AND b.id = $idfunc
		ORDER BY data_criacao
		LIMIT $start, $itemsPerPage;");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => $results,
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}

	// Função que lista todos os extrados da tabela tb_movimentacao
	public static function getPageExtract($page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS 
		a.tipo_movimentacao, a.valor, a.observacao, a.funcionario_id, a.administrador_id, a.data_criacao, b.id, b.nome_completo, c.id
		FROM tb_movimentacao AS a
		INNER JOIN tb_funcionario AS b
		INNER JOIN tb_administrador AS c
        WHERE a.funcionario_id = b.id AND a.administrador_id = c.id
		ORDER BY a.data_criacao
		LIMIT $start, $itemsPerPage;");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => $results,
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}

	// função que lista todos os registros da tabela com base no filtro
	public static function getPageExtractSearch($tipo,$nome,$data, $page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS 
		a.tipo_movimentacao, a.valor, a.observacao, a.funcionario_id, a.administrador_id, a.data_criacao, b.id, b.nome_completo, c.id
		FROM tb_movimentacao AS a
		INNER JOIN tb_funcionario AS b
		INNER JOIN tb_administrador AS c
        ON a.funcionario_id = b.id AND a.administrador_id = c.id
		WHERE  a.tipo_movimentacao LIKE :tipo AND b.nome_completo LIKE :nome AND a.data_criacao LIKE :data
		ORDER BY a.data_criacao
		LIMIT $start, $itemsPerPage;
		",array(
			":tipo" => $tipo,
			":nome" => '%'.$nome.'%',
			":data" => '%'.$data.'%'
		));

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	// Função que salva a mensagem de erro
	public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;
	}

	// Função que pega a mensagem de erro
	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;
	}

	// Função que limpa a mensagem de erro
	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;
	}

	// Função que salva a mensagem de sucesso
	public static function setSuccess($msg)
	{

		$_SESSION[User::SUCCESS] = $msg;
	}
	// Função que pega a mensagem de sucesso
	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;
	}
	// Função que limpa a mensagem de sucesso
	public static function clearSuccess()
	{

		$_SESSION[User::SUCCESS] = NULL;
	}

	// Função que salva e registra a mensagem de erro
	public static function setErrorRegister($msg)
	{

		$_SESSION[User::ERROR_REGISTER] = $msg;
	}
	// Função que pega a mensagem de erro registrada
	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;
	}

	// Função que limpa a mensagem de erro registrada
	public static function clearErrorRegister()
	{

		$_SESSION[User::ERROR_REGISTER] = NULL;
	}

	// Paginação dos funcionários encontrados na tabela tb_funcionario
	public static function getPage($page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_funcionario  
			ORDER BY data_criacao
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => $results,
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}

	// Paginação que lista os funcionários aplicando um filtro
	public static function getPageSearch($search,$data ,$page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_funcionario
			WHERE nome_completo LIKE :search AND data_criacao LIKE :data_criacao
			ORDER BY data_criacao
			LIMIT $start, $itemsPerPage;
		", array(
			":search" => '%' . $search . '%',
			":data_criacao" => '%' . $data . '%'
		));

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => $results,
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}
}
