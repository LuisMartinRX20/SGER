$('#Inicio').click(function(){

    var esperar= 2000;
    $.ajax({

        url: "../PHP/prueba-reload.php",
        beforeSend: function(){
            $('#contenido_menu').text('Cargando...');
        } ,
        success: function(data){
            setTimeout(function(){
                $('#contenido_menu').html(data);
            },esperar
            );
        }
    })
});

$('#definir').click(function(){

    var esperar= 2000;
    $.ajax({

        url: "../PHP/prueba-reload.php",
        beforeSend: function(){
            $('#contenido_menu').text('Cargando...');
        } ,
        success: function(data){
            setTimeout(function(){
                $('#contenido_menu').html(data);
            },esperar
            );
        }
    })
});

