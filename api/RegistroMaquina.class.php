<?php
/**
 * Classe de Entidade de Registro de Máquina
 * Programador: Renan
 * Date: 23/10/15
 * Time: 14:14
 */
class RegistroMaquina
{
    private $id;
    private $data;
    private $hora;
    private $etiqueta;
    private $local;
    private $problema_relatado;
    private $o_que_foi_feito;
    private $antivirus;
    private $so;
    private $utilizou_wds;
    private $os;
    private $tecnico;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * @param mixed $etiqueta
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return mixed
     */
    public function getProblemaRelatado()
    {
        return $this->problema_relatado;
    }

    /**
     * @param mixed $problema_relatado
     */
    public function setProblemaRelatado($problema_relatado)
    {
        $this->problema_relatado = $problema_relatado;
    }

    /**
     * @return mixed
     */
    public function getOQueFoiFeito()
    {
        return $this->o_que_foi_feito;
    }

    /**
     * @param mixed $o_que_foi_feito
     */
    public function setOQueFoiFeito($o_que_foi_feito)
    {
        $this->o_que_foi_feito = $o_que_foi_feito;
    }

    /**
     * @return mixed
     */
    public function getAntivirus()
    {
        return $this->antivirus;
    }

    /**
     * @param mixed $antivirus
     */
    public function setAntivirus($antivirus)
    {
        $this->antivirus = $antivirus;
    }

    /**
     * @return mixed
     */
    public function getSo()
    {
        return $this->so;
    }

    /**
     * @param mixed $so
     */
    public function setSo($so)
    {
        $this->so = $so;
    }

    /**
     * @return mixed
     */
    public function getUtilizouWds()
    {
        return $this->utilizou_wds;
    }

    /**
     * @param mixed $utilizou_wds
     */
    public function setUtilizouWds($utilizou_wds)
    {
        $this->utilizou_wds = $utilizou_wds;
    }

    /**
     * @return mixed
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param mixed $os
     */
    public function setOs($os)
    {
        $this->os = $os;
    }

    /**
     * @return mixed
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * @param mixed $tecnico
     */
    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;
    }


}