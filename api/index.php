<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

require 'vendor/autoload.php';

$app = new \Slim\Slim();
//$app->contentType('application/json');

$app->get('/', function (){
    echo "Bem vindo ao WebService do APP Machine Control! Consulte as URLs disponíveis para consumo de dados com o Administrador do sistema.";
});

// -------------------------------------------------------------------------------------------
// --------------------------- Bloco de CRUD de Máquinas -------------------------------------
// -------------------------------------------------------------------------------------------

$app->get('/registroDeMaquinas/:etiqueta', function ($etiqueta){
    include_once 'RegistroMaquinaDAO.php'; // Classe DAO de Registro de Máquinas
    $RegistroMaquinaDAO = new RegistroMaquinaDAO();
    echo $RegistroMaquinaDAO->select($etiqueta);
});

$app->get('/registroDeMaquinas', function (){
    include_once 'RegistroMaquinaDAO.php'; // Classe DAO de Registro de Máquinas
    $RegistroMaquinaDAO = new RegistroMaquinaDAO();
    echo $RegistroMaquinaDAO->selectAll();
});

$app->post('/registroDeMaquinas', function (){

    $request = \Slim\Slim::getInstance()->request(); // Pega a instancia da requisição
    $dataRegistro = json_decode($request->getBody()); // pega o cabeçalho da instancia da requisição

    include_once 'RegistroMaquina.class.php'; // Classe de Entidade de Registro de Máquinas
    $RegistroMaquina = new RegistroMaquina();

    $RegistroMaquina->setEtiqueta($dataRegistro->etiqueta);
    $RegistroMaquina->setLocal($dataRegistro->local);
    $RegistroMaquina->setProblemaRelatado($dataRegistro->problema_relatado);
    $RegistroMaquina->setOQueFoiFeito($dataRegistro->o_que_foi_feito);
    $RegistroMaquina->setAntivirus($dataRegistro->antivirus);
    $RegistroMaquina->setSo($dataRegistro->so);
    $RegistroMaquina->setUtilizouWds($dataRegistro->utilizou_wds);
    $RegistroMaquina->setOs($dataRegistro->os);
    $RegistroMaquina->setTecnico($dataRegistro->tecnico);

    include_once 'RegistroMaquinaDAO.php'; // Classe DAO de Registro de Máquinas
    $RegistroMaquinaDAO = new RegistroMaquinaDAO();

    echo $RegistroMaquinaDAO->insert($RegistroMaquina);
});

$app->put('/registroDeMaquinas/:id', function ($id){

    $request = \Slim\Slim::getInstance()->request(); // Pega a instancia da requisição
    $dataRegistro = json_decode($request->getBody()); // pega o cabeçalho da instancia da requisição

    include_once 'RegistroMaquina.class.php'; // Classe de Entidade de Registro de Máquinas
    $RegistroMaquina = new RegistroMaquina();

    $RegistroMaquina->setEtiqueta($dataRegistro->etiqueta);
    $RegistroMaquina->setLocal($dataRegistro->local);
    $RegistroMaquina->setProblemaRelatado($dataRegistro->problema_relatado);
    $RegistroMaquina->setOQueFoiFeito($dataRegistro->o_que_foi_feito);
    $RegistroMaquina->setAntivirus($dataRegistro->antivirus);
    $RegistroMaquina->setSo($dataRegistro->so);
    $RegistroMaquina->setUtilizouWds($dataRegistro->utilizou_wds);
    $RegistroMaquina->setOs($dataRegistro->os);
    $RegistroMaquina->setTecnico($dataRegistro->tecnico);
    $RegistroMaquina->setId($id);

    include_once 'RegistroMaquinaDAO.php'; // Classe DAO de Registro de Máquinas
    $RegistroMaquinaDAO = new RegistroMaquinaDAO();

    echo $RegistroMaquinaDAO->update($RegistroMaquina);
});

$app->delete('/registroDeMaquinas/:id', function ($id){
    include_once 'RegistroMaquinaDAO.php'; // Classe DAO de Registro de Máquinas
    $RegistroMaquinaDAO = new RegistroMaquinaDAO();
    echo $RegistroMaquinaDAO->delete($id);
});

// -------------------------------------------------------------------------------------------
// --------------------- Fim do Bloco de CRUD de Máquinas ------------------------------------
// -------------------------------------------------------------------------------------------

$app->get('/registroDeMaquinas/:mes/:ano', function ($mes, $ano){
    include_once 'RegistroMaquinaDAO.php'; // Classe DAO de Registro de Máquinas
    $RegistroMaquinaDAO = new RegistroMaquinaDAO();
    echo $RegistroMaquinaDAO->selectPorMes($mes,$ano);
});

$app->run();