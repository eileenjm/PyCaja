<?php
require_once './core/Modelo.php';

class Tipospagos extends Modelo {
    private $id;
    private $tipo;
    private $banco;
    private $nroCuenta;
    private $_tabla='tipos_pago';

    public function __construct($id=null,$tipo=null,$banco=null,$nroCuenta=null){
        $this->id = $id;
        $this->tipo=$tipo;
        $this->banco=$banco;
        $this->nroCuenta=$nroCuenta;
        parent::__construct($this->_tabla);
    }
    public function getTodo(){
        return $this->getAll();
    }
    public function eliminar(){
        return $this->deleteById($this->id);
    }
    public function guardar(){
        $datos = [
            'id'=>$this->id,
            'tipo'=>"'$this->tipo'",
            'banco'=>"'$this->banco'",
            'nroCuenta'=>"'$this->nroCuenta'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'tipo'=>"'$this->tipo'",
            'banco'=>"'$this->banco'",
            'nroCuenta'=>"'$this->nroCuenta'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}