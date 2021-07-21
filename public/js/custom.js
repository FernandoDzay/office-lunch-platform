$(".submit-button").click(function(e) {
    e.preventDefault();
    var current = $(this);
    current.toggleClass("is_active");
    setTimeout(function() {
        current.parent().submit();
    }, 1000);
    
})

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}


$(".make-order").click(function() {
    
    $.ajax({
        url: "/make-order",
        type: "get"
    })
    .done( function( data ) {

        orders_data = JSON.parse(data);

        var text = "";

        var one_execution = true;
        orders_data.orders.forEach(order => {
            if(one_execution && order.is_extra == 1) {
                text += '<br><p>---- Adicionales:</p>'
                one_execution = false;
            }

            if(order.short_name == "") text += '<p>' + order.quantity + ' ' + order.order_ + '</p>';
            else text += '<p>' + order.quantity + ' ' + order.short_name + '</p>';
        });

        text += "<br><p><strong>Total a pagar: $" + orders_data.total_to_pay + "</strong></p>";
        
        swal({
            title: 'La orden de hoy es:',
            confirmButtonText: '<i class="zmdi zmdi-copy"></i> Copiar',
            confirmButtonColor: '#03A9F4',
            showCancelButton: true,
            cancelButtonColor: '#F44336',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cerrar',
            html:   '<div style="text-align:left;" class="">'+
                        text +
                    '</div>'
        }).then(function () {
            

            clipboard.on('success', function(e) {
                clipboard.destroy();
                swal(
                    'Tu orden ha sido copiada!',
                    'Ya puedes mandar mensaje',
                    'success'
                );

            });

            clipboard.on('error', function(e) {
                swal(
                    'No hay ordenes todavía',
                    'O tal vez ocurrió algún error',
                    'error'
                );
            });
            

        });

        $(".swal2-confirm").attr('data-clipboard-text', orders_data.text);
        var clipboard = new ClipboardJS('.swal2-confirm');

    });
});

//console.log(orders_data);

/* var clipboard = new ClipboardJS('.make-order');

clipboard.on('success', function(e) {
    console.log("succes");

    e.clearSelection();
}); */

