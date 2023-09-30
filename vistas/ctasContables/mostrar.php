
<a href="?ctrl=CtrlCtaContable&accion=nuevo">Nueva Cta. Contable</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Cuenta</th>
            <th>Descripcion</th>
            <th>Opciones</th>
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
        <?=$d['cuenta']?>
    </td>
    <td>
        <?=$d['descripcion']?>
    </td>
    <td>
        <a href="?ctrl=CtrlCtaContable&accion=editar&id=<?=$d['id']?>">
            Editar
        </a>
        <a href="?ctrl=CtrlCtaContable&accion=eliminar&id=<?=$d['id']?>">Eliminar</a>
        
    </td>
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>