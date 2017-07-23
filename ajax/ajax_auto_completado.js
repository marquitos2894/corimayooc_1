//----------- AUTO COMPLETADO PROVEEDOR -----------

$(document).ready(function() { // PARA REPORTE OC, INSERTAR EMPLEADO Y  MODIFICAR EMPLEADO 

    $('#IdProveedor').autocomplete({
            source: function(request, response){
                    $.ajax({
                            url:"../../controlador/ocController.php",
                            dataType:"json",
                            data:{q:request.term},
                            success: function(data){
                                    response(data);
                            }

                    });
            },
            minLength: 1,
            select: function(event,ui){

            }


    });

});

//----------- AUTO COMPLETADO PROVEEDOR PARA PAGINA OC.PHP -----------

$(document).ready(function() {

    $('#idbuscaprovedor').autocomplete({
            source: function(request, response){
                    $.ajax({
                            url:"../controlador/ocController.php",
                            dataType:"json",
                            data:{q2:request.term},
                            success: function(data){
                                    response(data);
                            }

                    });
            },
            minLength: 1,
            select: function(event,ui){

            }


    });

});

 //----------- AUTO COMPLETADO EQUIPO DE OC.php  -----------
  
$(document).ready(function() {

    $('#IdEquipo2').autocomplete({
            source: function(request, response){
                    $.ajax({
                            url:"../controlador/ocController.php",
                            dataType:"json",
                            data:{autoEquipoocphp:request.term},
                            success: function(data){
                                    response(data);
                            }

                    });
            },
            minLength: 1,
            select: function(event,ui){

            }


    });

});



 //----------- AUTO COMPLETADO EQUIPO DE OC DETA  -----------
  
$(document).ready(function() {

    $('#IdEquipo').autocomplete({
            source: function(request, response){
                    $.ajax({
                            url:"../../controlador/ocController.php",
                            dataType:"json",
                            data:{autoEquipo:request.term},
                            success: function(data){
                                    response(data);
                            }

                    });
            },
            minLength: 1,
            select: function(event,ui){

            }


    });

});

 //----------- AUTO COMPLETADO EQUIPO DE OC POR ITEM DETALLE -----------
  
$(document).ready(function() {

    $('#IdEquipo_i_d').autocomplete({
            source: function(request, response){
                    $.ajax({
                            url:"../../controlador/ocController.php",
                            dataType:"json",
                            data:{autoEquipo:request.term},
                            success: function(data){
                                    response(data);
                            }

                    });
            },
            minLength: 1,
            select: function(event,ui){

            }


    });

});
