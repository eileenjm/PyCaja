<?php
$id = isset($obj['id'])?$obj['id']:'';
$nombre = isset($obj['nombre'])?$obj['nombre']:'';
$logo = isset($obj['logo'])?$obj['logo']:'';
# var_dump($obj);exit;
$esNuevo = isset($obj['id'])?0:1; #0: No es Nuevo (Editar) / 1: Es nuevo
$titulo = ($esNuevo==1)?'Nuevo Programa de Estudios':'Editando Programa de Estudios';
?>
    <form action="?ctrl=CtrlProgramaEstudio&accion=guardar" method="post">

    id:
    <input class="form-control" type="text" name="id" value="<?=$id?>" readonly>
    <input class="form-control" type="hidden" name="esNuevo" value="<?=$esNuevo?>">
    <br>
    Programa de Estudio:
    <input class="form-control" type="text" name="nombre" value="<?=$nombre?>">
    <br>
    Logo:
    <input class="form-control" type="text" name="logo" value="<?=$logo?>">
    <br>
    <input class="btn btn-outline-primary btn-block" type="submit" value="Guardar">

    </form>
    <a href="?ctrl=CtrlProgramaEstudio">Retornar</a>