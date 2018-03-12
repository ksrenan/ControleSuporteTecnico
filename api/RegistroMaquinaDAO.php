<?php

/**
 * Classe DAO de Registro de Máquina
 * Programador: Renan
 * Date: 26/10/15
 * Time: 10:00
 */

include_once "RegistroMaquina.class.php"; // Classe de Entidade de Registro de Máquina
include_once "PDOConnectionFactory.class.php"; // Classe PDO de Conexão com o Banco

header('Content-Type: application/json; charset=utf-8');

class RegistroMaquinaDAO{

    public function insert($registroMaquina){
        try {
            $conexao_db = new PDOConnectionFactory();
            try {
                $stmt = $conexao_db->con->prepare("INSERT INTO controlesuporte(id, data, hora, etiqueta, local, problema_relatado, o_que_foi_feito, antivirus, so, utilizou_wds, os, tecnico) VALUES (NULL, CURDATE(), CURTIME(), ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1,$registroMaquina->getEtiqueta());
                $stmt->bindParam(2,$registroMaquina->getLocal());
                $stmt->bindParam(3,$registroMaquina->getProblemaRelatado());
                $stmt->bindParam(4,$registroMaquina->getOQueFoiFeito());
                $stmt->bindParam(5,$registroMaquina->getAntivirus());
                $stmt->bindParam(6,$registroMaquina->getSo());
                $stmt->bindParam(7,$registroMaquina->getUtilizouWds());
                $stmt->bindParam(8,$registroMaquina->getOs());
                $stmt->bindParam(9,$registroMaquina->getTecnico());
                $stmt->execute();

                return "Registro de Máquina efetuado com Sucesso!";

            }catch (PDOException $ex){
                return "Erro ao inserir registro de Máquina. Contate o administrador do sistema.";
            }

            $conexao_db->Close();

        }catch (PDOException $ex) {
            return "Problema de acesso a base de dados. Contate o administrador do sistema.";
        }
    }


// ------------------ UPDATE ------------------ UPDATE ----------------- UPDATE ----------------- UPDATE---


    public function update($registroMaquina){
        try {
            $conexao_db = new PDOConnectionFactory();
            try {
                $stmt = $conexao_db->con->prepare("UPDATE controlesuporte SET etiqueta=?, local=?, problema_relatado=?, o_que_foi_feito=?, antivirus=?, so=?, utilizou_wds=?, os=?, tecnico=? WHERE id = ?");
                $stmt->bindParam(1,$registroMaquina->getEtiqueta());
                $stmt->bindParam(2,$registroMaquina->getLocal());
                $stmt->bindParam(3,$registroMaquina->getProblemaRelatado());
                $stmt->bindParam(4,$registroMaquina->getOQueFoiFeito());
                $stmt->bindParam(5,$registroMaquina->getAntivirus());
                $stmt->bindParam(6,$registroMaquina->getSo());
                $stmt->bindParam(7,$registroMaquina->getUtilizouWds());
                $stmt->bindParam(8,$registroMaquina->getOs());
                $stmt->bindParam(9,$registroMaquina->getTecnico());
                $stmt->bindParam(10,$registroMaquina->getId());
                $stmt->execute();

                return "Registro da Máquina ".$registroMaquina->getEtiqueta()." atualizado com Sucesso!";

            }catch (PDOException $ex){
                return "Erro ao atualizar registro da máquina ".$registroMaquina->getEtiqueta().". Contate o administrador do sistema.";
            }

            $conexao_db->Close();

        }catch (PDOException $ex) {
            return "Problema de acesso a base de dados. Contate o administrador do sistema.";
        }
    }


// ------------------ SELECT ------------------ SELECT ----------------- SELECT ----------------- SELECT---

    public function select($etiquetaMaquina){
        try {
            $conexao_db = new PDOConnectionFactory();
            try {
                $stmt = $conexao_db->con->prepare("SELECT id, data, hora, etiqueta, local, problema_relatado, o_que_foi_feito, antivirus, so, utilizou_wds, os, tecnico FROM controlesuporte WHERE etiqueta = ?");
                $stmt->bindParam(1,$etiquetaMaquina);
                $stmt->execute();

                $arrayTodos = array();
                while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($arrayTodos, $result);
                }

                return json_encode( $arrayTodos, JSON_UNESCAPED_UNICODE);

            }catch (PDOException $ex){
                return "Erro ao selecionar registros da máquina. Contate o administrador do sistema.";
            }

            $conexao_db->Close();

        }catch (PDOException $ex) {
            return "Problema de acesso a base de dados. Contate o administrador do sistema.";
        }
    }


// -------------- SELECT ALL -------------- SELECT ALL ------------- SELECT ALL --------------- SELECT ALL ---


    public function selectAll(){
        try {
            $conexao_db = new PDOConnectionFactory();
            try {
                $stmt = $conexao_db->con->query("SELECT id, data, hora, etiqueta, local, problema_relatado, o_que_foi_feito, antivirus, so, utilizou_wds, os, tecnico FROM controlesuporte WHERE YEAR(data) = YEAR(CURDATE())");
                $stmt->execute();
                //$result = $stmt->fetchAll();

                $arrayTodos = array();
                while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($arrayTodos, $result);
                }

                return json_encode( $arrayTodos, JSON_UNESCAPED_UNICODE);

            }catch (PDOException $ex){
                return "Erro ao selecionar registros das Máquinas. Contate o administrador do sistema.";
            }

            $conexao_db->Close();

        }catch (PDOException $ex) {
            return "Problema de acesso a base de dados. Contate o administrador do sistema.";
        }
    }


// -------------- DELETE -------------- DELETE ------------- DELETE --------------- DELETE ---


    public function delete($idRegistro){
        try {
            $conexao_db = new PDOConnectionFactory();
            try {
                $stmt = $conexao_db->con->prepare("DELETE FROM controlesuporte WHERE id = ?");
                $stmt->bindParam(1,$idRegistro);
                $stmt->execute();

                return "Registro removido com sucesso!";

            }catch (PDOException $ex){
                return "Erro ao remover registro da máquina. Contate o administrador do sistema.";
            }

            $conexao_db->Close();

        }catch (PDOException $ex) {
            return "Problema de acesso a base de dados. Contate o administrador do sistema.";
        }
    }


// -------------- SELECT MÊS -------------- SELECT MÊS ------------- SELECT MÊS --------------- SELECT MÊS ---


    public function selectPorMes($mes, $ano){
        try {
            $conexao_db = new PDOConnectionFactory();
            try {
                $stmt = $conexao_db->con->query("SELECT id, data, hora, etiqueta, local, problema_relatado, o_que_foi_feito, antivirus, so, utilizou_wds, os, tecnico FROM controlesuporte WHERE YEAR(data) = ".$ano." AND MONTH(data) = ".$mes);
                $stmt->execute();
                //$result = $stmt->fetchAll();

                $arrayTodos = array();
                while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($arrayTodos, $result);
                }

                return json_encode( $arrayTodos, JSON_UNESCAPED_UNICODE);

            }catch (PDOException $ex){
                return "Erro ao selecionar registros das Máquinas neste período. Contate o administrador do sistema.";
            }

            $conexao_db->Close();

        }catch (PDOException $ex) {
            return "Problema de acesso a base de dados. Contate o administrador do sistema.";
        }
    }


} // Fim Slim