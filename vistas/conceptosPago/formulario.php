<?php
$id = isset($datos['id'])?$datos['id']:'';
$nombre = isset($datos['nombre'])?$datos['nombre']:'';
$monto = isset($datos['monto'])?$datos['monto']:'';
$idCta = isset($datos['idCta'])?$datos['idCta']:'';

$esNuevo = isset($datos['id'])?0:1;
$titulo = $esNuevo==1?'Nuevo Cargo':'Editando Cargo';
?>
    <form action="?ctrl=CtrlConceptoPago&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Nombre:
        <input class="form-control" type="text" name="nombre" value="<?=$nombre?>">
        <br>
        Monto:
        <input class="form-control" type="text" name="monto" value="<?=$monto?>">
        <br>
        Cuenta:
        <select class="form-control" name="idCta" id="">
            <?php
            $esSeleccionado=null;
            if (is_array ($ctasContables))
            foreach ($ctasContables as $c) { 
                $esSeleccionado='';
                if($idCta==$c['id'])
                    $esSeleccionado='selected';
            ?>
                
                <option <?=$esSeleccionado?> value="<?=$c['id']?>"> <?=$c['descripcion']?></option>
            <?php
            }
            ?>

        </select>
        <!-- <input type="text" name="idCta" value="<?=$idCta?>"> -->
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlConceptoPago">Retornar</a>
