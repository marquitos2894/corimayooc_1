<?php 
//@session_start();
//if(!$_SESSION)
//{
//    echo '<script language = javascript>
//        alert("Debe iniciar Sesion")
//        self.location = "../../index.php" 
//        </script>';
//    
//}   
//
//$id_usu = $_SESSION['id_usu'];
?>


<?php 
require_once '../../conexion/conexion.php';
$objconex = new conex();
$objconex ->conectar();


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registrar Numero Parte</title>
        
<!--          BOOTSTRAP 
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
          FIN BOOTSTRAP 
          ESTILOS 
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/estiloBusqueda.css" rel="stylesheet" type="text/css"/>-->
         <!-- FIN ESTILOS -->
         <!-- JS -->
         <link href="../../css/Form_Seg.css" rel="stylesheet" type="text/css"/>
        <!-- FIN DE JS -->
        <script src="../../../corimayooc_1/js/fecha.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        
        
               
    </head>

    <body onload="getDate()">
           
            
                    <?php	
                                $id=$_GET["id"];
                                $id_oc=$_GET["id_oc"];
                                $compo=$_GET["compo"];
                                $nparte=$_GET["nparte"];
                                $cant=$_GET["cant"];
                                
                        ?>
            
       
	  <h1>Registrar Componente.</h1>
   <div class="info"><p> Registre el ingreso de componente </p></a></div>
  
    
<form id="form2" name="form2" action="../../controlador/Seg_Controller.php"  method="POST">
	    <h1></h1>
	   <input type="hidden" name="id_seg" value="<?php echo $id; ?>"
           <input type="hidden" name="id_oc" value="<?php echo $id_oc; ?>"
    <div class="contentform">
    	<div id="sendmessage"> Your message has been sent successfully. Thank you. </div>


    	<div class="leftcontact">
	    
            <div class="form-group">
		<p>Componente<span>*</span></p>
		<span class="icon-case"><i class="fa fa-male"></i></span>
                <input type="text" value="<?php echo $compo; ?>" name="nom" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné." readonly=""/>
                <div class="validation"></div>
            </div>
            
            <div class="form-group">
		<p>Numero de parte<span>*</span></p>
		<span class="icon-case"><i class="fa fa-male"></i></span>
                <input type="text" value="<?php echo $nparte; ?>" name="npart" id="" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ " readonly=""/>
                <div class="validation"></div>
            </div>
            
            <div class="form-group">
		<p>Cantidad Faltante<span>*</span></p>
		<span class="icon-case"><i class="fa fa-male"></i></span>
                <input type="text" value="<?php echo $cant; ?>" name="cantFal" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné." readonly=""/>
                <div class="validation"></div>
            </div> 

	</div>

	<div class="rightcontact">	

	    <div class="form-group">
		<p>Fecha Ingreso<span>*</span></p>
		<span class="icon-case"><i class="fa fa-male"></i></span>
                <input type="date" value="" id="fecha" name="fecha"  data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                <div class="validation"></div>
            </div> 
            
            
            <div class="form-group">
		<p>Guia Remision<span>*</span></p>
		<span class="icon-case"><i class="fa fa-male"></i></span>
		<input type="text" value="" name="Gremi" id="gremi" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                <div class="validation"></div>
            </div> 
            
            <div class="form-group">
		<p>Cantidad Ingreso<span>*</span></p>
		<span class="icon-case"><i class="fa fa-male"></i></span>
		<input type="number" value="" name="cant" id="cantI" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                <div class="validation"></div>
            </div> 


	</div>
	
        <button type="submit"  class="bouton-contact">Registrar</button>
	
</form>	


    
    
  
</body>
        
        
        
        
        
        
    
</html>