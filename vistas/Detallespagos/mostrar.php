<a href="?ctrl=CtrlDetallespago&accion=nuevo">Nuevo Detalle Pago</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>cantidad</th>
            <th>monto</th>
            <th>subTotal</th>
            <th>idConcepto</th>
            <th>idPago</th>
            <th>descuento</th>
            <th>igv</th>
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
        <?=$d['cant']?>
    </td>
    <td>
        <?=$d['monto']?>
    </td>
    <td>
        <?=$d['subTotal']?>
    </td>
    <td>
        <?=$d['idConcepto']?>
    </td>
    <td>
        <?=$d['idPago']?>
    </td>
    <td>
        <?=$d['descuento']?>
    </td>
    <td>
        <?=$d['igv']?>
    </td>
    <td>
        <a href="?ctrl=CtrlDetallespago&accion=editar&id=<?=$d['id']?>">
            Editar
        </a>
        <a href="?ctrl=CtrlDetallespago&accion=eliminar&id=<?=$d['id']?>">Eliminar</a>
        
    </td>
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>