<?php
$id = isset($datos['id'])?$datos['id']:'';
$fecha = isset($datos['fecha'])?$datos['fecha']:'';
$total = isset($datos['total'])?$datos['total']:'';
$numero = isset($datos['numero'])?$datos['numero']:'';
$idTipo = isset($datos['idTipo'])?$datos['idTipo']:'';
$idPersona = isset($datos['idPersona'])?$datos['idPersona']:'';
$idCajero = isset($datos['idCajero'])?$datos['idCajero']:'';
$esNuevo = isset($datos['id'])?0:1;
$titulo = $esNuevo==1?'Nuevo Pagos':'Editando Pagos';
?>
    <form action="?ctrl=CtrlPagos&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        fecha:
        <input class="form-control" type="date" name="fecha" value="<?=$fecha?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        total:
        <input class="form-control" type="text" name="total" value="<?=$total?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        numero:
        <input class="form-control" type="text" name="numero" value="<?=$numero?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        idTipo:
        <select class="form-control" name="idTipo" id="">
        <?php
            $esSeleccionado=null;
            if (is_array ($Tipospagos))
            foreach ($Tipospagos as $Tp) { 
                $esSeleccionado='';
                if($idTipo==$Tp['id'])
                    $esSeleccionado='selected';
            ?>
                
                <option <?=$esSeleccionado?> value="<?=$Tp['id']?>"><?=$Tp['tipo']?></option>
            <?php
            }
            ?>
        </select>
        <!-- <input type="text" name="idCta" value="<?=$idTipo?>"> -->
        <br>
        idPersona:
        <select class="form-control" name="idPersona" id="">
        <?php
            $esSeleccionado=null;
            if (is_array ($Persona))
            foreach ($Persona as $Pe) { 
                $esSeleccionado='';
                if($idPersona==$Pe['id'])
                    $esSeleccionado='selected';
            ?>
                
                <option <?=$esSeleccionado?> value="<?=$Pe['id']?>"><?=$Pe['nombres']?></option>
            <?php
            }
            ?>
        </select>
        <!-- <input type="text" name="idCta" value="<?=$idPersona?>"> -->
        <br>
        idCajero:
        <input class="form-control" type="text" name="idCajero" value="<?=$idCajero?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlPagos">Retornar</a>