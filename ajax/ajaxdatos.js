function enviar() {
                var idEm = document.getElementById('comboEmpresa').value;

                var cadena = "idEm=" + idEm ;

                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open("POST", "../controlador/ocController.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    
                   
                    peticion.send(cadena);
 
                    var ruc = document.getElementById('resp').innerHTML = peticion.responseText;
                   document.getElementById('RucEm').value=ruc;
                }
            }
            /////////////////
          

            
            
            ////////////////////
                   function enviar2() {
                var idEm = document.getElementById('comboEmpresa').value;
                
 
                var cadena = "idEm2=" + idEm ;
 
               
                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST', "../controlador/ocController.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                   
                    peticion.send(cadena);
 
                    var ruc = document.getElementById('resp2').innerHTML = peticion.responseText;
                   document.getElementById('EmpresaDir').value=ruc;
                }
            }  
            
           //------------------------
                       function enviarPro() { // enviamos el id de text idp para que que me traiga el combo de atencion a oc.php
                var idPro = document.getElementById('idp').value;
                
 
                var cadena = "idPro=" + idPro;
 
               
                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST',"../controlador/ocController.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                     
                    peticion.send(cadena);
 
                   var id = document.getElementById('resp3').innerHTML = peticion.responseText;
                   document.getElementById('Em_Pro').value=id;
                }
            }
            
            //-----------------------
            

               //function enviarIDprove() {
        //var idPro = document.getElementById('id_proveedor').value;


 //       var cadena = "idProDir=" + idPro;
//

   //     var peticion = null;
     //   peticion = ConstructorXMLHttpRequest();
//
  //      if (peticion) {
    //        peticion.open('POST',"../controlador/ocController.php", false);
//
 //           peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //          peticion.setRequestHeader("Content-length", cadena.length);
    //        peticion.setRequestHeader("Connection", "close");
//
  //          peticion.send(cadena);

    //       var id = document.getElementById('resp5').innerHTML = peticion.responseText;
      //     document.getElementById('Em_Pro').value=id;
        //}
    //}
            
            //--------------------------
            
                // ESTOS SOLO MANDAN UN SOLO DATO
                        function enviarDirPro() // con text idp nos trae direccion de proveedores a oc.php
                {
                var idProDir = document.getElementById('idp').value;
                
 
                var cadena = "idProDir=" + idProDir;
 
               
                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST', "../controlador/ocController.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    peticion.send(cadena);
 
                    var dir = document.getElementById('resp4').innerHTML = peticion.responseText;
                   document.getElementById('ProDir').value=dir;
                                }
                } 
                
                 //--------------------------
       
                 //--------------------------
                 
                   function ajax_traer_id_prove() {
                var nompro = document.getElementById('idbuscaprovedor').value;
                
 
                var cadena = "nomproveedor=" + nompro;
 
               
                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST',"../controlador/ocController.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 ;
                   
                    peticion.send(cadena);
 
                   var id = document.getElementById('idp_ajax').innerHTML = peticion.responseText;
                   document.getElementById('idp').value=id;
                }
            }
            
                       function ajax_traer_id_prove_mod_emp() { //PARA MODIFICAR EMP Y TAMBIEN INSERTAR EMP
                var nompro = document.getElementById('IdProveedor').value;
                
 
                var cadena = "nomproveedor=" + nompro;
 
               
                var peticion = null;
                peticion = new XMLHttpRequest();
 
                if (peticion) {
                    peticion.open('POST',"../../controlador/Empleado_Controller.php", false);
 
                    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                   
                   
                    peticion.send(cadena);
 
                   var id = document.getElementById('idp_ajax_mod_emp').innerHTML = peticion.responseText;
                   document.getElementById('IdPr').value=id;
                }
            }