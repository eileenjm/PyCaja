<?php
require_once './core/Modelo.php';

class Detallespagos extends Modelo {
    private $id;
    private $cantidad;
    private $monto;
    private $subTotal;
    private $idConcepto;
    private $idPago;
    private $descuento;
    private $igv;
    private $_tabla='detalles_pago';
    private $_vista='v_detalles_pago';

    public function __construct($id=null,$cantidad=null,$monto=null,$subTotal=null,$idConcepto=null,$idPago=null,$descuento=null,$igv=null){
        $this->id = $id;
        $this->cantidad=$cantidad;
        $this->monto=$monto;
        $this->subTotal=$subTotal;
        $this->idConcepto=$idConcepto;
        $this->idPago=$idPago;
        $this->descuento=$descuento;
        $this->igv=$igv;
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
            'cantidad'=>"'$this->cantidad'",
            'monto'=>"$this->monto",
            'subTotal'=>"'$this->subTotal'",
            'idConcepto'=>"$this->idConcepto",
            'idPago'=>"$this->idPago",
            'descuento'=>"$this->descuento",
            'igv'=>"$this->igv",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'cantidad'=>"'$this->cantidad'",
            'monto'=>"'$this->monto'",
            'subTotal'=>"'$this->subTotal'",
            'idConcepto'=>"'$this->idConcepto'",
            'idPago'=>"'$this->idPago'",
            'descuento'=>"'$this->descuento'",
            'igv'=>"$this->igv",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}