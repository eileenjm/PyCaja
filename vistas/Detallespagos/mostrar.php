

    <div class="content">
        <div class="row">
            <div class="col">
                <h3>Estudiante: <?=$estudiante?></h3>
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
                                <th>Descripcion</th>
                                <th>monto</th>
                               
                            </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (is_array($datos))
                    foreach ($datos as $d):
                    ?>
                    
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
                                <?=$d['nombre']?>
                            </td>
                            <td>
                                <?=$d['monto']?>
                            </td>
                            

                            <td><button type="button" id="addPpto" class="btn btn-outline-info" disabled>Agregar</button></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3>
                    Monto a Pagar
                    <button class="btn btn-primary" id="generarPpto">Generar Pago</button>
                </h3>
                

                <table id="miPresupuesto" class="table">
                    <thead>
                    <tr>
                            <th>Id</th>
                            <th>Descripcion</th>
                            <th align="right">Monto</th>
                            <th width="100" align="center">cantidad</th>
                            <th align="right">Total</th>
                            <th></th>
                        </tr>
                        

                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr id="totalPpto">
                            <td colspan="4" align="right">
                                <b>    Total Pago: </b>
                                </td>
                            <td align="right">
                                <span id="total"></span>
                            </td>
                            
                        </tr>
                    </tfoot>
                </table>
                <button id="btnPagar" class="btn btn-success">Pagar</button>
                <button id="btnCancelar" class="btn btn-danger">Cancelar</button>
                <button id="btnImprimirPresupuesto" class="btn btn-secondary">Imprimir Boleta</button>
            </div>
        </div>
    </div>
    

    <script>
        let suma = 0.00;
$(document).ready(function (){	
    
    $("[id*='chk']").click(function(e) {
       // event.preventDefault()
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
            let monto=trSel.children().eq(4);
            let Descripcion=trSel.children().eq(3);
            var cantidad = trSel.find('input[type="number"]').val();

            agregarFila(id.text(),Descripcion.text(),monto.text(),cantidad)

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

function agregarFila(id,Descripcion,monto,cantidad){
    let p = parseFloat(monto).toFixed(2)
    let total = p * cantidad
    total = total.toFixed(2);
    var nuevaFila = '<tr id="ppto">'+
        '<td>' + id + '</td>'+
        '<td>' + Descripcion + '</td>'+
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
    alert("Pago realizado. por: "+ $('#total').html() )
});
    </script>
    <script>
        $(document).ready(function () {
    // ...

    $('#btnPagar').on('click', function () {
        // Lógica para realizar el pago
        alert('Pago realizado por: ' + $('#total').html());
    });

    $('#btnCancelar').on('click', function () {
        // Lógica para cancelar el pago
        // Puedes reiniciar la tabla de presupuesto o realizar otras acciones necesarias
        $('#miPresupuesto tbody').empty();
        $('#total').html('0.00');
    });

/*     $('#btnImprimirBoleta').on('click', function () {
        // Lógica para imprimir la boleta
        // Aquí puedes abrir una nueva ventana con la boleta o realizar otras acciones necesarias
        imprimirBoleta();
    });

    function imprimirBoleta() {
        $(document).ready(function () {
    // ... Otro código ...
 */
    $('#btnImprimirPresupuesto').on('click', function () {
        imprimirPresupuesto();
    });

    function imprimirPresupuesto() {
        // Crear un nuevo documento con el contenido que se va a imprimir
        var ventanaImpresion = window.open('', '_blank');
        var contenidoImpresion = '<html><head><title>Boleta</title>';
        contenidoImpresion += '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">';
        contenidoImpresion += '</head><body>';
        contenidoImpresion += '<h3>Boleta</h3>';
        contenidoImpresion += '<table class="table">';
        contenidoImpresion += $('#miPresupuesto thead').html(); // Incluir la cabecera de la tabla
        contenidoImpresion += '<tbody>';
        $('#miPresupuesto tbody tr').each(function () {
            contenidoImpresion += $(this).html(); // Incluir cada fila de la tabla
        });
        contenidoImpresion += '</tbody>';
        contenidoImpresion += '<tfoot>';
        contenidoImpresion += $('#totalPpto').html(); // Incluir el pie de la tabla con el total
        contenidoImpresion += '</tfoot>';
        contenidoImpresion += '</table>';
        contenidoImpresion += '</body></html>';

        // Escribir el contenido en la nueva ventana
        ventanaImpresion.document.write(contenidoImpresion);

        // Imprimir el contenido
        ventanaImpresion.document.close();
        ventanaImpresion.print();
    }

    // ... Otro código ...
});
  /*   }

    // ...
}); */

    </script>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <style>
        tr.resaltar td {
            background: yellow;
        }
        tr.agregado td {
            background: greenyellow;
        }
    </style>
    </body>
    </html>


    <a href="?">Retornar</a>