<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/CtaContable.php';
require_once './assets/Helper.php';

class CtrlCtaContable extends Controlador {
    public function index(){
                # echo "Hola CtaContable";
                Helper::verificarLogin();
                $obj = new CtaContable;
                $data = $obj->getTodo();
        
                # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('ctasContables/mostrar.php',$datos,true);
        $datos= [
            'titulo'=>'Cuentas Contables',
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
        $obj =new CtaContable ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
/*         $datos= [
            'titulo'=>'Nueva Cuenta Contable',
            'contenido'=>$this->mostrar('ctasContables/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ]; */
        $this->mostrar('ctasContables/formulario.php');
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new CtaContable($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data'][0]
        ];
        
/*         $home = $this->mostrar('ctasContables/formulario.php',$datos,true);
        $datos = [
            'titulo'=>'Editar Cta Contable',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ]; */
        $this->mostrar('ctasContables/formulario.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        Helper::verificarLogin();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new CtaContable ($id, $nombre,$descripcion);

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