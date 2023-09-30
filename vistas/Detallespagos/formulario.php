<?php
$id = isset($datos['id'])?$datos['id']:'';
$cantidad = isset($datos['cant'])?$datos['cant']:'';
$monto = isset($datos['monto'])?$datos['monto']:'';
$subTotal = isset($datos['subTotal'])?$datos['subTotal']:'';
$idConcepto = isset($datos['idConcepto'])?$datos['idConcepto']:'';
$idPago = isset($datos['idPago'])?$datos['idPago']:'';
$descuento = isset($datos['descuento'])?$datos['descuento']:'';
$igv = isset($datos['igv'])?$datos['igv']:'';
$esNuevo = isset($datos['id'])?0:1;
$titulo = $esNuevo==1?'Nuevo Detallespagos':'Editando Detallespagos';
?>
    <form action="?ctrl=CtrlDetallespago&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        cantidad:
        <input class="form-control" type="text" name="cantidad" value="<?=$cantidad?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        monto:
        <input class="form-control" type="text" name="monto" value="<?=$monto?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        subTotal:
        <input class="form-control" type="text" name="subTotal" value="<?=$subTotal?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        idConcepto:
        <select class="form-control" name="idConcepto" id="">
        <?php
            $esSeleccionado=null;

            if (is_array ($ConceptoPago))
            foreach ($ConceptoPago as $cp) { 
                $esSeleccionado='';
                if($idConcepto==$cp['id'])
                    $esSeleccionado='selected';
            ?>
                
                <option <?=$esSeleccionado?> value="<?=$cp['id']?>"> <?=$cp['nombre']?></option>
            <?php
            }
            ?>
        </select>
        <!-- <input type="text" name="idCta" value="<?=$idConcepto?>"> -->
        <br>
        idPago:
        <select class="form-control" name="idPago" id="">
        <?php
            $esSeleccionado=null;
            if (is_array ($Pagos))
            foreach ($Pagos as $p) { 
                $esSeleccionado='';
                if($idPago==$p['id'])
                    $esSeleccionado='selected';
            ?>
                
                <option <?=$esSeleccionado?> value="<?=$p['id']?>"><?=$p['total']?></option>
            <?php
            }
            ?>
        </select>
        <!-- <input type="text" name="idCta" value="<?=$idPago?>"> -->
        <br>
        descuento:
        <input class="form-control" type="text" name="descuento" value="<?=$descuento?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        igv:
        <input class="form-control" type="text" name="igv" value="<?=$igv?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlDetallespago">Retornar</a>