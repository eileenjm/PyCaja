<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nuevo Tipo de Pago
</a>
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
    <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombre="<?=$d["tipo"]?>" href="#" class="btn btn-danger eliminar">
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