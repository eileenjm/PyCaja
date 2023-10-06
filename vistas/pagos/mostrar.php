<a href="?ctrl=CtrlPagos&accion=nuevo">Nuevo Pago</a>    
    <table class="table">
        <tr>
            <th>Id</th>
            <th>fecha</th>
            <th>total</th>
            <th>numero</th>
            <th>idTipo</th>
            <th>idPersona</th>
            <th>idCajero</th>
        </tr>
<?php
if (is_array($datos))
foreach ($datos as $d) {
    ?>
<tr>
    <td>
        <?=$d['id']?>
    </td>
    <td>
        <?=$d['fecha']?>
    </td>
    <td>
        <?=$d['total']?>
    </td>
    <td>
        <?=$d['numero']?>
    </td>
    <td>
        <?=$d['idTipo']?>
    </td>
    <td>
        <?=$d['idPersona']?>
    </td>
    <td>
        <?=$d['idCajero']?>
    </td>
    <td>
        <a href="?ctrl=CtrlPagos&accion=editar&id=<?=$d['id']?>">
            Editar
        </a>
        <a href="?ctrl=CtrlPagos&accion=eliminar&id=<?=$d['id']?>">Eliminar</a>
        
    </td>
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>