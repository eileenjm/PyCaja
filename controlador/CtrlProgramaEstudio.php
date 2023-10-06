<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/ProgramaEstudio.php';
require_once './assets/Helper.php';


class CtrlProgramaEstudio extends Controlador {
    public function index(){
        Helper::verificarLogin();
        $obj = new ProgramaEstudio();
        $data = $obj->mostrar();

        # var_dump($data);exit;

        $datos = [
            'titulo'=>'Programa de Estudios',
            'data'=>$data['data']
        ];

        $home = $this->mostrar('programaEstudios/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Programa de Estudios',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];
    $this->mostrar('./plantilla/home.php',$datos);

    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        $obj = new ProgramaEstudio($id);
        $data = $obj->getRegistro();
        
        $datos = [
            'obj'=>$data['data'][0],
            
        ];
        $this->mostrar('./plantilla/home.php',$datos);
    }
    public function guardar(){
        Helper::verificarLogin();
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $logo=$_POST['logo'];

        $esNuevo=$_POST['esNuevo'];

        $obj = new ProgramaEstudio($id,$nombre,$logo);

        switch ($esNuevo) {
            case '0': # Editar
                $respuesta = $obj->actualizar();
                break;
            
            default:    #Nuevo
                $respuesta = $obj->guardar();
                break;
        }

        $this->index();

    }
    public function eliminar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        $obj = new ProgramaEstudio($id);
        $respuesta = $obj->eliminar();
        $this->index();

    }
}