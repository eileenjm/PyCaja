<a href="?ctrl=CtrlTipospagos&accion=nuevo">Nuevo Tipo de pago</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>banco</th>
            <th>nroCuenta</th>
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
        <?=$d['tipo']?>
    </td>
    <td>
        <?=$d['banco']?>
    </td>
    <td>
        <?=$d['nroCuenta']?>
    </td>
    <td>
        <a href="?ctrl=CtrlTipospagos&accion=editar&id=<?=$d['id']?>">
            Editar
        </a>
        <a href="?ctrl=CtrlTipospagos&accion=eliminar&id=<?=$d['id']?>">Eliminar</a>
        
    </td>
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>