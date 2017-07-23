function ConstructorXMLHttpRequest()
{
    if(window.XMLHttpRequest) /*Vemos si el objeto window posee el metodo XMLHttpRequest(Navegadores como Mozilla y Safari).*/
    {
        return new XMLHttpRequest(); //Si lo tiene, crearemos el objeto
    }
   
    else if(window.ActiveXObject) /*Sino tenia el metodo anterior,deberia ser el Internet Exp.*/
    {
        var versionesObj = new Array(
                                    'Msxml2.XMLHTTP.5.0',
                                    'Msxml2.XMLHTTP.4.0',
                                    'Msxml2.XMLHTTP.3.0',
                                    'Msxml2.XMLHTTP',
                                    'Microsoft.XMLHTTP');
 
        for (var i = 0; i < versionesObj.length; i++)
        {
            try
                {
                    return new ActiveXObject(versionesObj[i]);
                }
                catch (errorControlado)
                {
                   
                }
        }
    }
    throw new Error("No se pudo crear el objeto XMLHttpRequest");
}

  
 

               


                          function Bus_oc_item_det(idmes,idano,compo,nparte,Equipo){ // para filtro de oc , se envian varios datos
                        var parametros2 = {
                                 "mesdet" : idmes,
                                "ano" : idano,
                                "compo" : compo,
                                "nparte" : nparte,
                                "equipo" : Equipo
                        };
                        $.ajax({
                                data:  parametros2,
                                url:   '../../controlador/ocController.php',
                                type:  'post',
                                beforeSend: function () {
                                        $("#ResultadoOc_x_item_det").html("Procesando, espere por favor...");
                                },
                                success:  function (response) {
                                        $("#ResultadoOc_x_item_det").html(response);
                                }
                        });
                }

                
                
                 //--------------------------
               
                        // ajax para busqueda Mi Empresa
      
                
                          
                
               // ------------------------------------
                //----------------------------------------
                
              function enviar_nombre_pro(){ // se enviara nombre de proveedor a ins_emp_provV.php
                var id_nom_emp = document.getElementById('idprove').value;

                var cadena = "id_nom=" + id_nom_emp ;

                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST', "../../controlador/Empleado_Controller.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                       
                    peticion.send(cadena);
 
                    var ruc =  document.getElementById('div_nom_prov').innerHTML = peticion.responseText;
                  document.getElementById('caja_busqueda').value=ruc;
                }
            }
     
    //////////////////////////////////////////////////////-
    
    
    
                  // ------------------------------------
                //----------------------------------------
                
              function enviar_nombre_proOC(){ // se enviara nombre de proveedor a OC.php , en el div nom_prov y se muestra en id_=caja_busqueda
                var id_nom_emp = document.getElementById('comboproveedor').value;

                var cadena = "id_nom=" + id_nom_emp ;

                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST', "../controlador/Empleado_Controller.php", false);
 
                    peticion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                       
                    peticion.send(cadena);
 
                    var ruc =  document.getElementById('div_nom_prov').innerHTML = peticion.responseText;
                  document.getElementById('caja_busqueda').value=ruc;
                }
            }
     
    //////////////////////////////////////////////////////-
    
                   // ------------------------------------
                //----------------------------------------
                
              function enviar_id_editaprov(){ // de modificar empleado, link editar, del txt edita_prove se enviara por ajax a recibe.php
                var id_prov_edita = document.getElementById('id_proveedor_editar').value;

                var cadena = "id_prov_edita=" + id_prov_edita ;

                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST', "../../controlador/Empleado_Controller.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               
                   
                    peticion.send(cadena);
 
                    var id =  document.getElementById('div_prov_edita').innerHTML = peticion.responseText;
                  document.getElementById('caja_busqueda').value=id;
                }
            }
     
    //////////////////////////////////////////////////////-
    
    
    
$(document).ready(function(){// Buscar MI EMPRESA

    var consulta;

    //hacemos focus al campo de bÃºsqueda
    $("#busquedaEmpresa").focus();

    //comprobamos si se pulsa una tecla
    $("#busquedaEmpresa").keyup(function(e){

    //obtenemos el texto introducido en el campo de busqueda
    consulta = $("#busquedaEmpresa").val();

    //hace la bÃºsqueda

    $.ajax({
    type: "POST",
    url: "../../controlador/EmpresaController.php",
    data: "b="+consulta,
    dataType: "html",

    error: function(){
    alert("error peticiÃ³n ajax");
    },
    success: function(data){                                                    
    $("#resultado").empty();
    $("#resultado").append(data);
    //$("#busqueda").val(consulta);

    }
    });


    });

    });             

$(document).ready(function(){// Buscar PROVEEDOR

    var consulta;     

    //hacemos focus al campo de bÃºsqueda
    $("#busquedaProvee").focus();

    //comprobamos si se pulsa una tecla
    $("#busquedaProvee").keyup(function(e){

    //obtenemos el texto introducido en el campo de bÃºsqueda
    consulta = $("#busquedaProvee").val();

    //hace la bÃºsqueda

    $.ajax({
    type: "POST",
    url: "../../controlador/ProveedorController.php",
    data: "b="+consulta,
    dataType: "html",
    beforeSend: function(){
      //imagen de carga
    $("#resultadoProvee").html("<p align='center'><img src='ajax-loader.gif' /></p>");
    },
    error: function(){
    alert("error peticiÃ³n ajax");
    },
    success: function(data){                                                    
    $("#resultadoProvee").empty();
    $("#resultadoProvee").append(data);
    //$("#busqueda").val(consulta);

    }
    });


    });

    });   
    
    //---------------------------------------------------------------------
    $(document).ready(function(){// Buscar EMPLEADO

    var consulta;     

    //hacemos focus al campo de bÃºsqueda
    $("#busqueda_Emp_Provee").focus();

    //comprobamos si se pulsa una tecla
    $("#busqueda_Emp_Provee").keyup(function(e){

    //obtenemos el texto introducido en el campo de bÃºsqueda
    consulta = $("#busqueda_Emp_Provee").val();

    //hace la bÃºsqueda

    $.ajax({
    type: "POST",
    url: "../../controlador/Empleado_Controller.php",
    data: "b="+consulta,
    dataType: "html",
    beforeSend: function(){
      //imagen de carga
    $("#resultado_Emp_Provee").html("<p align='center'><img src='ajax-loader.gif' /></p>");
    },
    error: function(){
    alert("error peticiÃ³n ajax");
    },
    success: function(data){                                                    
    $("#resultado_Emp_Provee").empty();
    $("#resultado_Emp_Provee").append(data);
    //$("#busqueda").val(consulta);

    }
    });


    });

    });             

  //-------------------------------------------------
  
  
  $(document).ready(function(){// BuscarORDEN COMPRA

    var consulta;

    //hacemos focus al campo de bÃºsqueda
    $("#busquedaOC").focus();

    //comprobamos si se pulsa una tecla
    $("#busquedaOC").keyup(function(e){

    //obtenemos el texto introducido en el campo de bÃºsqueda
    consulta = $("#busquedaOC").val();

    //hace la bÃºsqueda

    $.ajax({
    type: "POST",
    url: "../../controlador/ocController.php",
    data: "b="+consulta,
    dataType: "html",

    error: function(){
    alert("error peticiÃ³n ajax");
    },
    success: function(data){                                                    
    $("#resultado").empty();
    $("#resultado").append(data);
    //$("#busqueda").val(consulta);

    }
    });


    });

    });   
                
   //-------------------------------------------------------------  
   
   
  $(document).ready(function(){// Buscar EQUIPOS

    var consulta;

    //hacemos focus al campo de bÃºsqueda
    $("#busquedaEquipos").focus();

    //comprobamos si se pulsa una tecla
    $("#busquedaEquipos").keyup(function(e){

    //obtenemos el texto introducido en el campo de bÃºsqueda
    consulta = $("#busquedaEquipos").val();

    //hace la bÃºsqueda

    $.ajax({
    type: "POST",
    url: "../../controlador/EquiposController.php",
    data: "b="+consulta,
    dataType: "html",

    error: function(){
    alert("error peticiÃ³n ajax");
    },
    success: function(data){                                                    
    $("#resultado").empty();
    $("#resultado").append(data);
    //$("#busqueda").val(consulta);

    }
    });


    });

    });  
      //-------------------------------------------------
  
  
  $(document).ready(function()
  {// Buscar ORDEN COMPRA POR ITEM
 
        var consulta;

        //hacemos focus al campo de bÃºsqueda
        $("#busquedaOCxItems").focus();

        //comprobamos si se pulsa una tecla
        $("#busquedaOCxItems").keyup(function(e)
        {

            //obtenemos el texto introducido en el campo de bÃºsqueda
            consulta = $("#busquedaOCxItems").val();

            //hace la bÃºsqueda

            $.ajax(
            {
            type: "POST",
            url: "../../controlador/ocController.php",
            data: "bxi="+consulta,
            dataType: "html",

                error: function()
                {
                alert("error peticiÃ³n ajax");
                },
                success: function(data)
                {                                                    
                $("#resultado_bus_x_Items").empty();
                $("#resultado_bus_x_Items").append(data);
                //$("#busqueda").val(consulta);

                }
            });


        });

    });   
                
   //-------------------------------------------------------------  
    
    
    
    $(document).ready(function(){// Buscar UNIDAD

    var consulta;

    //hacemos focus al campo de bÃºsqueda
    $("#busquedaunidad").focus();

    //comprobamos si se pulsa una tecla
    $("#busquedaunidad").keyup(function(e){

    //obtenemos el texto introducido en el campo de busqueda
    consulta = $("#busquedaunidad").val();

    //hace la bÃºsqueda

    $.ajax({
    type: "POST",
    url: "../../controlador/UnidadController.php",
    data: "b="+consulta,
    dataType: "html",

    error: function(){
    alert("error peticiÃ³n ajax");
    },
    success: function(data){                                                    
    $("#resultado").empty();
    $("#resultado").append(data);
    //$("#busqueda").val(consulta);

    }
    });


    });

    });      
    
    
    
    
    
    
    
                
   //-------------------------------------------------------------     
                
                
                
                
                
                
                
//             function operacion()
//	{
//            for(i=1;i<=100;i++){
//		var n1 = document.getElementById("cantidad"+i).value;
//		var n2 = document.getElementById("precio"+i).value;
//
//                  
//            if (n1 == null) {
//                    n1=0;
//                        }
//                if (n2 == null) {
//                    n2=0;
//                                    }
//		var tot = (parseFloat(n1) * parseFloat(n2));
//                
//                
//                
//                if (tot == null) {
//                    tot=0; 
//                }
//                document.getElementById("total"+i).value=tot;
//		//total.value = tot;
//            }  
//	}
        

    






