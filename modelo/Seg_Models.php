<?php

/**
 * Description of Seg_Models
 *
 * @author marcos
 */
class Seg_Models {
    //put your code here
    
        function ins_seg($id_oc,$componente,$n_parte,$cant)
    {
            
            for ($i=0;$i<sizeof($componente)-1;$i++ )
        { 
        $this->datos = mysql_query("insert into seguimiento_oc (id_oc,componente,n_parte,cant,cant_i)"
                . "values('".$id_oc."','".$componente[$i]."','".$n_parte[$i]."','".$cant[$i]."','".$cant[$i]."')");
        }
        
        if($this->datos)
        {
        echo '';
        }    
        else 
        {
        echo 'error al insertar'; 
        } 
        
    }
    
    function Actualizar_seg($id_seg,$cant)
    {

        $this->datos=mysql_query("update seguimiento_oc set cant = cant - $cant where id_seg = $id_seg ");
        
        if($this->datos)
        {
            
            echo '<center><a class="alert alert-success" > * Se registro correctamente</a></center> ';
            
        }
        else
        {
            echo 'Error al registrar';    
        }
    }
    
    
    function Insert_historial($id_seg,$fecha,$cant,$gr)
    {
        $this->datos = mysql_query("insert into historial_seg values('".$id_seg."','".$fecha."','".$cant."','".$gr."')");
        
    }
    

    
}