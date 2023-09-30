<?php
require_once './core/Modelo.php';

class Pago extends Modelo {
    private $id;
    private $fecha;
    private $total;
    private $numero;
    private $idTipo;
    private $idPersona;
    private $idCajero;
    private $_tabla='Pagos';

    public function __construct($id=null,$fecha=null,$total=null,$numero=null,$idTipo=null,$idPersona=null,$idCajero=null){
        $this->id = $id;
        $this->fecha=$fecha;
        $this->total=$total;
        $this->numero=$numero;
        $this->idTipo=$idTipo;
        $this->idPersona=$idPersona;
        $this->idCajero=$idCajero;
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
            'fecha'=>"'$this->fecha'",
            'total'=>"$this->total",
            'numero'=>"'$this->numero'",
            'idTipo'=>"$this->idTipo",
            'idPersona'=>"$this->idPersona",
            'idCajero'=>"$this->idCajero",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'fecha'=>"'$this->fecha'",
            'total'=>"'$this->total'",
            'numero'=>"'$this->numero'",
            'idTipo'=>"'$this->idTipo'",
            'idPersona'=>"'$this->idPersona'",
            'idCajero'=>"'$this->idCajero'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}