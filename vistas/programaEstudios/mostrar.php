<a href="#" class="btn btn-success" id="imprimirPDF">
    <i class="fa fa-print"></i> 
    Imprimir 
</a>
<table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>logo</th>
            <th>Opciones</th>
        </tr>
<?php
if (is_array($data))
foreach ($data as $d) {
    ?>
    <tr>
        <td>
            <?=$d['id']?>
        </td>
        <td>
            <?=$d['nombre']?>
        </td>
        <td>
            <?=$d['logo']?>
        </td>
        <td>
            
        <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombre="<?=$d["nombre"]?>" href="#" class="btn btn-danger eliminar">
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