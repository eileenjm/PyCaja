<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Pagos.php';
require_once './modelo/Tipospagos.php';
require_once './modelo/Persona.php';
require_once './modelo/Estudiante.php';
require_once './assets/Helper.php';

class CtrlPagos extends Controlador {
    public function index(){
        # echo "Hola Pago";
        Helper::verificarLogin();
        $obj = new Pago;
        $data = $obj->getTodo();

        # var_dump($data);exit;

        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('pagos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Pagos',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];
    $this->mostrar('./plantilla/home.php',$datos);

    }
    public function eliminar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new Pago ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        Helper::verificarLogin();
        $obj = NEW Tipospagos();
        $dataTp = $obj ->getTodo();

        $obj = NEW Persona();
        $dataPe = $obj ->getTodo();


        $datos = [
            //'datos'=> $data['data'][0],
            'Tipospagos' => $dataTp['data'],
            'Persona' => $dataPe['data']
        ];
        $home = $this->mostrar('pagos/formulario.php',$datos,true);

        $datos= [
            'titulo'=>'Nuevo Pago',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];
        $this->mostrar('./plantilla/home.php',$datos);
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Pago($id);
        $data = $obj->editar();
    # var_dump($data);exit;
        $obj = NEW Tipospagos();
        $dataTp = $obj ->getTodo();

        $obj = NEW Persona();
        $dataPe = $obj ->getTodo();


        $datos = [
            'datos'=>$data['data'][0],
            'Tipospagos' => $dataTp['data'],
            'Persona' => $dataPe['data']
        ];

        $home = $this->mostrar('pagos/formulario.php',$datos,true);
        $datos = [
            'titulo'=>'Editar Pago',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu']
        ];
        $this->mostrar('./plantilla/home.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        Helper::verificarLogin();
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $total = $_POST['total'];
        $numero = $_POST['numero'];
        $idTipo = $_POST['idTipo'];
        $idPersona = $_POST['idPersona'];
        $idCajero = $_POST['idCajero'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Pago ($id, $fecha, $total, $numero,$idTipo, $idPersona, $idCajero);

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