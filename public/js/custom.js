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

function print_notifications(notifications) {
    notifications_html = '<div class="list-group-separator"></div>';
    notifications.forEach(notification => {

        notifications_html += getNotificationHTML(notification);
        notifications_html += '<div class="list-group-separator"></div>';
        
    });

    $(".Notifications-area .list-group").html(notifications_html);
    $(".Notifications-area .list-group").fadeIn(500);
    $("#notifications_title").html("Notificationes");
}

function getNotificationHTML(notification) {

    icon_class = "zmdi-alert-octagon";
    color_class = "red";

    switch(notification.type) {
        case 'normal':
            icon_class = "zmdi-alert-octagon";
            color_class = "red";
            break;
    }

    notification_html = '<div class="list-group-item" data-id="' + notification.id + '" data-has-been-read="' + notification.has_been_read + '">';
        notification_html += '<div class="row-action-primary">';
            notification_html += '<i class="zmdi ' + icon_class + ' ' + color_class + '"></i>';
        notification_html += '</div>';
        notification_html += '<div class="row-content">';
            notification_html += '<div class="least-content">15m</div>';
            notification_html += '<h4 class="list-group-item-heading">' + notification.title + '</h4>';
            notification_html += '<p class="list-group-item-text">' + notification.description + '</p>';
        notification_html += '</div>';
    notification_html += '</div>';

    return notification_html;
}

function getNewNotificationsNumber(notifications) {
    number_of_new_notifications = 0;

    notifications.forEach(notification => {

        if(notification.has_been_read == 0) {
            number_of_new_notifications++;
        }

    });

    return number_of_new_notifications;
}

function countCurrentNotifications() {
    currentNotifications = $(".Notifications-area .list-group .list-group-item");
    return currentNotifications.length;
}

function getNewNotificationsIds() {
    currentNotifications = $(".Notifications-area .list-group .list-group-item");
    new_notifications_ids = [];


    if(currentNotifications.length > 0) {

        $.each(currentNotifications, function(i, notification) {
            if(notification.getAttribute('data-has-been-read') == 0) {
                new_notifications_ids.push(notification.getAttribute('data-id'));
            }
        })

    }

    return new_notifications_ids;
}

function setHasBeenRead() {
    currentNotifications = $(".Notifications-area .list-group .list-group-item");

    if(currentNotifications.length > 0) {

        $.each(currentNotifications, function(i, notification) {
            if(notification.getAttribute('data-has-been-read') == 0) {
                notification.setAttribute('data-has-been-read', '1');
            }
        })

    }
}

$('#avatar_img').on('click', function(){
    $('#change_image_modal').modal('show');
});

$("#change_image_form").submit(function(e) {

    e.preventDefault();

    var fd = new FormData();
    var files = $("#image_file")[0].files[0];

    if(files !== undefined) {
        fd.append('image', files);
        fd.append('user_id', user_id);
    
        $.ajax({    
            url: "/change-user-image",
            type: "post",
            data: fd,
            contentType: false,
            processData: false,
        })
        .done(function( data ) {
    
            response = JSON.parse(data);
    
            if(response.status == true) {
                $("#avatar_img").attr("src", "http://local.api-office-lunch" + response.src);
            }
            else {
                alert("Ocurrió un problema, acude al administrador");
            }
    
            $("#change_image_modal").modal("hide");
            
        });
    }

});





cronNotifications();

window.setInterval(cronNotifications, 60000);




//-------------------------------------------------

function cronNotifications() {
    
    $.ajax({
        url: "/get-notifications",
        type: "get",
        data: {
            user_id: user_id
        }
    }).done( function( data ) {

        notifications = JSON.parse(data);
        if(notifications.length > 0) {

            number_of_new_notifications = getNewNotificationsNumber(notifications);
            current_notifications = countCurrentNotifications();

            if(number_of_new_notifications > 0 && number_of_new_notifications != $("#notifications_number").html()) {
                $("#notifications_number").html(number_of_new_notifications);
                $("#notifications_number").fadeIn(500);
            }
            if(current_notifications < notifications.length) {
                print_notifications(notifications);
            }

        }

    });
}


$("#notifications_btn").click(function() {
    new_notifications_ids = getNewNotificationsIds();

    if(new_notifications_ids.length > 0) {

        new_notifications_ids = JSON.stringify(new_notifications_ids);

        $.ajax({
            url: "/update-notifications",
            type: "post",
            data: {
                ids: new_notifications_ids
            }
        }).done( function( data ) {
    
            $("#notifications_number").fadeOut(500);
            setHasBeenRead();
    
        });

    }
});
