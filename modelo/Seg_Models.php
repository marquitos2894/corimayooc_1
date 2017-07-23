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
        $this->datos = mysql_query("insert into oc (id_oc,componente,n_parte,cant)"
                . "values('".$id_oc."','".$componente."','".$n_parte."','".$cant."')");
        
//        echo mysql_insert_id();
        
        if($this->datos)
        {
        echo '';
        }    
        else 
        {
        echo 'error al insertar'; 
        } 
        
    }
    
}
