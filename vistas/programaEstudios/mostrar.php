
    <a href="?ctrl=CtrlProgramaEstudio&accion=nuevo">Nuevo Programa de Estudio</a>
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
            
           <a href="?ctrl=CtrlProgramaEstudio&accion=editar&id=<?=$d['id']?>"> Editar</a>

           <a href="?ctrl=CtrlProgramaEstudio&accion=eliminar&id=<?=$d['id']?>">Eliminar</a>
            
        </td>
    </tr>


    <?php
}
?>


    </table>

    <a href="?">Retornar</a>