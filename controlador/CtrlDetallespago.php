<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Detallespagos.php';
require_once './modelo/ConceptoPago.php';
require_once './modelo/Pagos.php';

class CtrlDetallespago extends Controlador {
    public function index(){
        # echo "Hola Detallespago";
        $obj = new Detallespagos;
        $data = $obj->getTodo();

        # var_dump($data);exit;

        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('Detallespagos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Detallespagos',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];
    $this->mostrar('./plantilla/home.php',$datos);

    }
    public function eliminar(){
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new Detallespagos($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";

        $obj = NEW ConceptoPago();
        $dataCp = $obj ->getTodo();

        $obj = NEW Pago();
        $datap = $obj ->getTodo();

        $datos = [
            //'datos'=> $data['data'][0],
            'ConceptoPago' => $dataCp['data'],
            'Pagos' => $datap['data']
        ];
        $home = $this->mostrar('Detallespagos/formulario.php',$datos,true);


        $datos= [
            'titulo'=>'Nuevo Detalle Pago',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];
        $this->mostrar('./plantilla/home.php',$datos);
        
    }
    public function editar(){
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Detallespagos($id);
        $data = $obj->editar();
        #var_dump($data);exit;
        $obj = NEW ConceptoPago();
        $dataCp = $obj ->getTodo();

        $obj = NEW Pago();
        $datap = $obj ->getTodo();

        $datos = [
            'datos'=> $data['data'][0],
            'ConceptoPago' => $dataCp['data'],
            'Pagos' => $datap['data']
        ];
        $home = $this->mostrar('Detallespagos/formulario.php',$datos,true);

        $datos= [
           'titulo'=>'Editar Detalles Pago',
           'contenido'=>$home,
           'menu'=>$_SESSION['menu']
       ];
        $this->mostrar('./plantilla/home.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $monto = $_POST['monto'];
        $subTotal = $_POST['subTotal'];
        $idConcepto = $_POST['idConcepto'];
        $idPago = $_POST['idPago'];
        $descuento = $_POST['descuento'];
        $igv = $_POST['igv'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Detallespagos ($id, $cantidad, $monto, $subTotal,$idConcepto, $idPago, $descuento, $igv);

        switch ($esNuevo) {
            case 0: # Editar
                $data=$obj->actualizar();
                break;
            
            default: # Nuevo
                $data=$obj->guardar();
                break;
        }

        
        # var_dump($data);exit;
        $this->index();

    }
}