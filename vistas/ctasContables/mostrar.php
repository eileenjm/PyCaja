<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nueva Cuenta Contable
</a>

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
    <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombre="<?=$d["cuenta"]?>" href="#" class="btn btn-danger eliminar">
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