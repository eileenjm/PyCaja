<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nuevo Detalle Pago
</a>
<div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  01/01
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
</div>   
<table class="table">
        <tr>
        <th>seleccionar</th>
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
    <div class="icheck-primary">
            <input type="checkbox" value id="check1">
            <label for="check1">
            </label>
        </div>

    </td>
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
    <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombre="<?=$d["cant"]?>" href="#" class="btn btn-danger eliminar">
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