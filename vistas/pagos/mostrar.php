<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nuevo Pago
</a>
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
    <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombre="<?=$d["fecha"]?>" href="#" class="btn btn-danger eliminar">
          <i class="fa fa-trash"></i>  
          Eliminar
        </a>
    </td>
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>