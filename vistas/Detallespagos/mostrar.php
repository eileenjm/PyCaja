<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nuevo Detalle Pago
</a>
<a href="#" class="btn btn-success" id="imprimirPDF">
    <i class="fa fa-print"></i> 
    Imprimir 
</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        tr.resaltar td {
            background: yellow;
        }
        tr.agregado td {
            background: greenyellow;
        }
      
    </style>
</head>
<body>
    <div class="content">
        <div class="row">
            <div class="col-8">
                <h3>Detalles Pagos</h3>
                <table id="miTabla" class="table">
                    <thead>
                        <tr>
                        <th width="100">
                            <div class="form-check form-switch">
                                <input type="checkbox" id="selTODOS" class="form-check-input" role="switch" title="Todos.."> 
                            </div>
                            
                        </th>
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
                    </thead>
                    <?php
                    if (is_array($datos))
                    foreach ($datos as $d) {
                    ?>
                    <tbody>
                        <tr id="miFila">
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="chk" class="form-check-input elemento" role="switch">
                                </div>
                            </td>
                            <td>
                                <?=$d['id']?>
                            </td>
                            <td>
                            <input type="number" value="1" class="form-control">
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

                            <td><button type="button" id="addPpto" class="btn btn-outline-info" disabled>Agregar</button></td>
                        </tr>
                        <tr id="miFila">
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="chk" class="form-check-input elemento" role="switch">
                                </div>
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                            <input type="number" value="1" class="form-control">
                            </td>
                            <td>
                                15.00
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
                            </td>
                            <td><button type="button" id="addPpto" class="btn btn-outline-info" disabled>Agregar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h3>
                    Mi Presupuesto
                    <button class="btn btn-primary" id="generarPpto">Generar Ppto</button>
                </h3>
                <table id="miPresupuesto" class="table">
                    <thead>
                        <tr>
                        <th></th>
                                <th>Id</th>
                                <th  align="right">monto</th>
                                <th width="100" align="center">cantidad</th>
                                <th align="right">Total</th>
                            </tr>
                        </tr>
                        

                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr id="totalPpto">
                            <td colspan="4" align="right">
                                <b>    Total Ppto: </b>
                                </td>
                            <td align="right">
                                <span id="total"></span>
                            </td>
            
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    
    
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

    <script>
        let suma = 0.00;
$(document).ready(function (){	
    
    $("[id*='chk']").click(function(e) {
		var trSel=$(this).closest("[id*='miFila']");
        let btn = trSel.find('button');		
		var chk = $(this).is(":checked");
		if(chk){				
			trSel.addClass('resaltar');
            btn.removeAttr('disabled')
		}else{
			trSel.removeClass('resaltar');
			trSel.removeClass('agregado');
            btn.attr('disabled',true)
		}
		

	});

    $("[id*='addPpto']").click(function(e) {
        var trSel=$(this).closest("[id*='miFila']");	
        var chk = trSel.find('input[type="checkbox"]').is(":checked");
        if (chk){
            /* alert('Esta habilitado') */
            let id=trSel.children().eq(1);
            let servicio=trSel.children().eq(2);
            let precio=trSel.children().eq(3);
            var cantidad = trSel.find('input[type="number"]').val();

            agregarFila(id.text(),servicio.text(),precio.text(),cantidad)

            trSel.addClass('agregado');
        }else{
            alert('Primero habilite para poder agregarlo')
        }
    });

    
    $("#selTODOS").click(function() {  
          
        $("[id*='chk']").click()
        $(".elemento").prop("checked", this.checked);
    });
   

});

function agregarFila(id,servicio,precio,cantidad){
    let p = parseFloat(precio).toFixed(2)
    let total = p * cantidad
    total = total.toFixed(2);
    var nuevaFila = '<tr id="ppto">'+
        '<td>' + id + '</td>'+
        '<td>' + servicio + '</td>'+
        '<td align="right">' + p + '</td>'+
        '<td align="center">' + cantidad + '</td>'+
        '<td class="subtotal" align="right">' + total + '</td>'+
        '<td> <button type="button" id="retirarPpto" class="btn btn-outline-danger" title="Retirar">-</button></td>'
      '</tr>';
      

   $('#miPresupuesto tbody').append(nuevaFila);
   
   let sum = 0
        $('.subtotal').each(function() {
            sum += parseFloat($(this).text());
        });

        $('#total').html(sum.toFixed(2)) 
        

   $("[id*='retirarPpto']").on('click',function() {

        var trSel=$(this).closest("[id*='ppto']");	
        /* var subTotal = trSel.children().eq(4);
        console.log(subTotal.text())
        suma -= parseFloat(subTotal.text()); */
        trSel.remove();
        let sum = 0
        $('.subtotal').each(function() {
            sum += parseFloat($(this).text());
        });

        $('#total').html(sum.toFixed(2))  
    });

}

$('#generarPpto').click(function (e) { 
    e.preventDefault();
    alert("generando ppto. por: "+ $('#total').html() )
});
    </script>
</body>
</html>
<!--     <td>
    <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombre="<?=$d["cant"]?>" href="#" class="btn btn-danger eliminar">
          <i class="fa fa-trash"></i>  
          Eliminar
        </a>
        
    </td> -->
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>