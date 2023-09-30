<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/ConceptoPago.php';
require_once './modelo/CtaContable.php';

class CtrlConceptoPago extends Controlador {
    public function index(){
        # echo "Hola ConceptoPago";
        $obj = new ConceptoPago;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('conceptosPago/mostrar.php',$datos,true);
        $datos= [
            'titulo'=>'Conceptos de Pago',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];

        $this->mostrar('./plantilla/home.php',$datos);
    }

    public function eliminar(){
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new ConceptoPago ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        $datos= [
            'titulo'=>'Nuevo conceptosPago',
            'contenido'=>$this->mostrar('conceptosPago/formulario.php',null,true),
            'menu'=>$_SESSION['menu']
        ];
        $this->mostrar('./plantilla/home.php',$datos);
    }
    public function editar(){
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new ConceptoPago($id);
        $data = $obj->editar();
        # Recuperamos los datos las Cuentas Contables
        $obj = new CtaContable();
        $dataCta = $obj->getTodo();

        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data'][0],
            'ctasContables'=>$dataCta['data']
        ];
        $home = $this->mostrar('conceptosPago/formulario.php',$datos,true);

        $datos= [
           'titulo'=>'Editar Concepto Pago',
           'contenido'=>$home,
           'menu'=>$_SESSION['menu']
       ];
        $this->mostrar('./plantilla/home.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $monto = $_POST['monto'];
        $idCta = $_POST['idCta'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new ConceptoPago ($id, $nombre,$monto,$idCta);

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