<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Tipospagos.php';
require_once './assets/Helper.php';

class CtrlTipospagos extends Controlador {
    public function index(){
        # echo "Hola Tipospago";
        Helper::verificarLogin();
        $obj = new Tipospagos;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('Tipospagos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Tipos de Pagos',
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
        $obj =new Tipospagos ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        Helper::verificarLogin();
/*         $msg='';
        $datos= [
            'titulo'=>'Nuevo Tipospagos',
            'contenido'=>$this->mostrar('Tipospagos/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ]; */
        $this->mostrar('Tipospagos/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Tipospagos($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
/*         $home = $this->mostrar('pagos/formulario.php',$datos,true);
        $datos = [
            'titulo'=>'Editar tipo de Pago',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ]; */
        $this->mostrar('Tipospagos/formulario.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        Helper::verificarLogin();
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $banco = $_POST['banco'];
        $nroCuenta = $_POST['nroCuenta'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Tipospagos ($id, $tipo, $banco, $nroCuenta);

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