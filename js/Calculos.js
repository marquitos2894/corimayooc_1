   $(document).ready(function()
    {
    $(".grupo ").keyup(function()
        {
        var cantidad=$(this).find("input[name^=cantidad").val();    
        var precio=$(this).find("input[name^=precio").val();
        var tot =0;
        tot = parseFloat(precio)*parseFloat(cantidad);
        $(this).find("input[name^=total").val(tot.toFixed(2));
        $(this).find("[class=total]").html(parseFloat(precio)*parseFloat(cantidad)); 
        // calculamos el total de todos los grupos
        
        var total=0;
        var igv = 0;
        var completo=0;
               
              $(" .grupo .total  ").each(function()
            {
              total=total+parseFloat($(this).html());
              igv = total * 0.18;
              completo = igv + total;
              
//              parseFloat(total).toFixed(2);
//              parseFloat(igv).round(2);
//              parseFloat(Math.round(completo)).toFixed(2);
              
            })
            $(".total .total ").html(total).val();
            $("input[name=subtotal").val(total.toFixed(2));
            $("input[name=igv").val(igv.toFixed(2));
            $("input[name=completo").val(completo.toFixed(2));
         
        
        });
    });
    
    
    
    
    
       
       
       
       