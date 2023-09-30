<?php
$id = isset($datos['id'])?$datos['id']:'';
$tipo = isset($datos['tipo'])?$datos['tipo']:'';
$banco = isset($datos['banco'])?$datos['banco']:'';
$nroCuenta = isset($datos['nroCuenta'])?$datos['nroCuenta']:'';
$esNuevo = isset($datos['id'])?0:1;
$titulo = $esNuevo==1?'Nuevo Tipo de Pago':'Editando Tipo de Pago';
?>
    <form action="?ctrl=CtrlTipospagos&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Tipo:
        <input class="form-control" type="text" name="tipo" value="<?=$tipo?>">
        <br>
        Banco:
        <input class="form-control" type="text" name="banco" value="<?=$banco?>">
        <br>
        Numero de Cuenta:
        <input class="form-control" type="text" name="nroCuenta" value="<?=$nroCuenta?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlTipospagos">Retornar</a>