$(document).ready(function() {

    // Cuando todos los elementos de la página cargen..
    $(".tablesorter").tablesorter(); 
    $(".tab_content").hide(); //Oculto todos los elementos
    $("ul.tabs li:first").addClass("active").show(); //Activo la primera pestaña
    $(".tab_content:first").show(); //Muestro el contenido de la primera pestaña

    //En evento click
    $("ul.tabs li").click(function() {
        $("ul.tabs li").removeClass("active"); //Remuevo cualquier clase "active"
        $(this).addClass("active"); //Agrego clase "active" a la pestaña seleccionada
        $(".tab_content").hide(); //Oculto todo el contenido de la pestaña
        var activeTab = $(this).find("a").attr("href"); //Busco el valor del atributo href para identificar la pestaña activa + el contenido
        $(activeTab).fadeIn(); //Aplico el efecto fadeIn en el contenido del ID activo
        return false;
    });
    
    $('.column').equalHeight();

    $("#grid-plenarias").kendoGrid({
        dataSource: {
            transport: {
                read: "plenarias/getDataForGrid"
            },
            schema: {
                data: "data"
            }
        },
        columns: [
            { field: "eje" }, 
            { field: "municipio" },
            { field: "parroquia" },
            { field: "lugar" },
            { field: "fecha" },
            { field: "observacion" }
        ],
        detailTemplate: kendo.template($("#template").html()),
        detailInit: detailInit
    });

    

    function detailInit(e) {
        // get a reference to the current row being initialized 
        var detailRow = e.detailRow;
        
        // create a subgrid for the current detail row, getting territory data for this employee
        
        detailRow.find(".subgrid-plenarias").kendoGrid({
            dataSource: {
                transport: {
                    read: "plenarias/getParticipantesPlenarias/" + e.data.id
                },
                schema: {
                    data: "data"
                }
            },

            columns: [{ title: "Nombre", field: "nombre" }],

        });
        
    }



});