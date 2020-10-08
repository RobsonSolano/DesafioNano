<?php 
session_start();
require_once("vendor/autoload.php");
require_once("functions.php");

$app = new Slim\Slim(); // Instância da classe SLIM

use \Challenge\PageAdmin;
use \Challenge\Model\User;

$app->config('debug', true); //Habilita verificação de erros

// Rota inícial

$app->get('/', function() {

	//Função responsável por verificar se o administrador está logado ou não
	User::verifyLogin();

	// Instancia da classe que recebe a classe TPL

	$page = new PageAdmin();

	// setTPL é responsável por desenhar a página
	$page->setTpl("index",[
		"funcionarios" => User::getTotFuncs(),
		"entradas" => User::getTotEntradas(),
		"saida" => User::getTotSaidas()
	]);

	exit;

});

// Rotas administrador


$app->get("/admin/login/", function(){

	$page = new PageAdmin([ 
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("login");

	exit;

});

$app->post("/admin/login/", function(){

	$user = new User();

	$login = trim($_POST['login']);
	$password = trim(strtolower(md5($_POST['password'])));
	
	if($user->login($login,$password)){
		header("location: /");
	}

	exit;

});


$app->get("/admin/logout/", function(){

	User::logout();

	header("Location: /admin/login/");
	exit;

});

$app->get("/admin/create/", function(){
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("admin-create");

	exit;
});

$app->post("/admin/create/",function(){

	User::verifyLogin();

	$user = new User();

	$fullname = trim($_POST['nome_completo']);
	$login = trim($_POST['login']);
	$password = trim(strtolower(md5($_POST['password'])));

	$user->saveAdmin($fullname,$login,$password);

	header("location: /admin/login/");

	exit;

});

$app->get("/admin/perfil/",function(){
	User::verifyLogin();

	$page = new PageAdmin();

	$user = new User();

	$user->getInfoAdmin((int)$_SESSION['id']);

	$page->setTpl("admin-perfil",[
		"admin"=>$user->getValues()
	]);

	exit;

});

// Fim das rotas do admin

// Início das rotas do funcionário

$app->get("/admin/funcionarios",function(){
	User::verifyLogin();

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$pagination = User::getPage($page);


	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/funcionarios?'.http_build_query([
				'page'=>$x+1
			]),
			'text'=>$x+1
		]);  

	}

	$page = new PageAdmin();

	$page->setTpl("funcionarios", array(
		"funcionarios"=>$pagination['data'],
		"pages"=>$pages
	));
	exit;
});

$app->post("/admin/funcionarios",function(){
	User::verifyLogin();

	$search = (isset($_POST['search'])) ? $_POST['search'] : "";
	$data = (isset($_POST['data_criacao'])) ? $_POST['data_criacao'] : "";
	$page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;


	$pagination = User::getPageSearch($search,$data, $page);

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/funcionarios?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'data' => $data
			]),
			'text'=>$x+1
		]);  

	}

	$page = new PageAdmin();

	$page->setTpl("funcionarios", array(
		"funcionarios"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
	exit;
});

$app->get('/admin/funcionario/create/', function() {
	User::verifyLogin();

	$msgError = "";

	if(isset($_GET['cad']) && $_GET['cad'] == "error"){
		$msgError = User::setError("Funcionário já cadastrado!");
	}
	$page = new PageAdmin();

	$page->setTpl("funcionarios-create",[
		"msgError" => User::getError()
	]);

	exit;
});

$app->post('/admin/funcionario/create/', function() {
	User::verifyLogin();

	$user = new User();

	$user->setData($_POST);

	if($user->cadFuncionario()){
		header("location: /admin/funcionarios");
	}else{
		header("location: /admin/funcionario/create/?cad=error");
	}
	
	exit;
});


$app->get("/admin/funcionario/:iduser/delete",function($idfunc){
	User::verifyLogin();

	User::delete((int)$idfunc);

	header("Location: /admin/funcionarios");

	exit;
});

$app->get("/admin/funcionario/:idfunc",function($idfunc){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$idfunc);

	$page = new PageAdmin();

	$page->setTpl("funcionario-update",[
		"funcionario"=>$user->getValues()
	]);

	exit;

});

$app->post("/admin/funcionario/:idfunc",function($idfunc){

	User::verifyLogin();

	$user = new User();

	$user->setData($_POST);

	$user->update($idfunc);

	header("Location: /admin/funcionarios");

	exit;

});


$app->get('/admin/funcionario/:iduser/extract', function($idfunc) {

	User::verifyLogin();

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$pagination = User::getPageExtractFromId($page,$idfunc);

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>"/admin/funcionario/".$idfunc."/extract".http_build_query([
				'page'=>$x+1,
			]),
			'text'=>$x+1
		]);  

	}

	$page = new PageAdmin();

	$page->setTpl("funcionario-extrato", array(
		'extract'=>$pagination['data'],
		'pages'=>$pages,
		'id_func'=>$idfunc
	));

	exit;
	
});

// Fim das rotas de funcionário

// Rotas de movimentação

$app->get("/admin/extracts/listagem",function(){
	
	User::verifyLogin();

	
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

		$pagination = User::getPageExtract($page);


	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/extracts/listagem'.http_build_query([
				'page'=>$x+1
			]),
			'text'=>$x+1
		]);  

	}

	$page = new PageAdmin();	

	$page->setTpl("extract-lista", array(
		'extratos'=>$pagination['data'],
		'pages'=>$pages
	));

	exit;
});

$app->post("/admin/extracts/listagem",function(){
	User::verifyLogin();

	$tipo = (isset($_POST['tipo_movimentacao'])) ? $_POST['tipo_movimentacao'] : "";
	$nome = (isset($_POST['nome_funcionario'])) ? $_POST['nome_funcionario'] : "";
	$data = (isset($_POST['data_criacao'])) ? $_POST['data_criacao'] : "";
	$page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;
	
	$pagination = User::getPageExtractSearch($tipo, $nome, $data, $page);

	$pages = [];
  
	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/extracts/listagem'.http_build_query([
				'page'=>$x+1,
				'tipo'=>$tipo,
				'nome' =>$nome,
				'data'=>$data
			]),
			'text'=>$x+1
		]);  

	}

	$page = new PageAdmin();

	$page->setTpl("extract-lista", array(
		'extratos'=>$pagination['data'],
		'pages'=>$pages
	));

	exit;

});

$app->get("/admin/extract/create/:idfunc",function($idfunc){
	User::verifyLogin();

	$msgSuccess = "";
	$msgError = "";

	if(isset($_GET['cad'])){
		if($_GET['cad'] == "success"){
			$msgSuccess = User::setSuccess("Cadastrado com sucesso!");
		}elseif($_GET['cad'] == "success"){
			$msgError = User::setSuccess("Falha ao cadastrar");
		}
	}

	$page = new PageAdmin([
		"footer" => false
	]);

	$page->setTpl("movimentacao-create",[
		'id_func' => $idfunc,
		'id_admin' => $_SESSION['id'],
		'msgSuccess' => User::getSuccess(),
		'msgError' => User::getError()
	]);

	exit;
});

$app->post("/admin/extract/create/:idfunc/post",function($idfunc){
	
	$user = new User();

	$user->setData($_POST);

	if($user->cadMovimentacao($idfunc)){
		header("Location: /admin/extract/create/$idfunc?cad=success");
	}else{
		header("Location: /admin/extract/create/$idfunc?cad=error");
	}

	exit;

});

// Fim das rotas

$app->run(); // App Run é responsável por executar a rota recebida

 ?>