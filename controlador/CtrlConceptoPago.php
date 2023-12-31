<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/ConceptoPago.php';
require_once './modelo/CtaContable.php';
require_once './assets/Helper.php';

class CtrlConceptoPago extends Controlador {
    public function index(){
        # echo "Hola ConceptoPago";
        Helper::verificarLogin();
        $obj = new ConceptoPago;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('conceptosPago/mostrar.php',$datos,true);
        $datos= [
            'titulo'=>'Conceptos de Pago',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg,
            'datos'=>$data['data']
        ];

        $this->mostrar('./plantilla/home.php',$datos);
    }

    public function eliminar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new ConceptoPago ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        Helper::verificarLogin();
        $obj = new CtaContable;
        $dataCta = $obj->getTodo();
        $msg='';
        $datos = [
            // 'datos'=>$data['data'][0],
            'ctasContables'=>$dataCta['data']
        ];
/*         $msg=''; */
/*          $datos= [
            'titulo'=>'Nuevo conceptosPago',
            'contenido'=>$this->mostrar('conceptosPago/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ]; */
        $this->mostrar('conceptosPago/formulario.php',$datos);
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
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0],
            'ctasContables'=>$dataCta['data']
        ];
/*         $home = $this->mostrar('conceptosPago/formulario.php',$datos,true);

        $datos= [
           'titulo'=>'Editar Concepto Pago',
           'contenido'=>$home,
           'menu'=>$_SESSION['menu'],
           'msg'=>$msg
       ]; */
        $this->mostrar('conceptosPago/formulario.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        Helper::verificarLogin();
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