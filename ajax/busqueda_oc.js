function FiltroOC(idmes,idano,Empresa,Prov,Equipo)
{ // para filtro de oc , se envian varios datos
        var parametros = {
                "mes" : idmes,
                "ano" : idano,
                "Empresa" : Empresa,
                "Prov" : Prov,
                "Equipo" : Equipo
        };
        $.ajax({
                data:  parametros,
                url:   '../../controlador/ocController.php',
                type:  'post',
                beforeSend: function () {
                        $("#ResultadoOcFiltros").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#ResultadoOcFiltros").html(response);
                }
        });
}
                
