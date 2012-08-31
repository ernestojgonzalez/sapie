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
                read: "plenarias/getDataForGrid",
                create: {
                    url: "plenarias/crud/create",
                    type: "POST"
                },
                update: {
                    url: "plenarias/crud/edit",
                    type: "POST"
                }
            },
            error: function(e) {
                alert(e.responseText);
            },
            schema: {
                data: "data",
                model: {
                    id: "id",
                    fields: {
                        eje: { validation: { required: true} },
                        municipio: { validation: { required: true} },
                        parroquia: { validation: { required: true} },
                        lugar: { validation: { required: true} },
                        fecha: { validation: { required: true} },
                        observacion: { }
                    }
                }
            }
        },
        columns: [
            { field: "eje", title: 'Eje', editor: ejeDropDownEditor }, 
            { field: "municipio", title: 'Municipio' },
            { field: "parroquia", title: 'Parroquia' },
            { field: "lugar", title: 'Lugar' },
            { field: "fecha", title: 'Fecha', format: "{0:dd/MMMM/yyyy}" },
            { field: "observacion", title: 'Observaciones' }
        ],
        detailTemplate: kendo.template($("#template").html()),
        detailInit: detailInit,
        editable: true,
        navigable: true,  // enables keyboard navigation in the grid
        toolbar: [ 'save', 'cancel', 'create' ],  // adds save and cancel buttons
        selectable: true,
        sortable: true
    });

    

    function detailInit(e) {
        // get a reference to the current row being initialized 
        var detailRow = e.detailRow;
        
        // create a subgrid for the current detail row, getting territory data for this employee
        
        detailRow.find(".subgrid-plenarias").kendoGrid({
            dataSource: {
                transport: {
                    read: "participantes/getDataForGrid/" + e.data.id,
                    create: {
                        url: "participantes/crud/create",
                        type: "POST"
                    }
                },
                schema: {
                    data: "data",
                    model: {
                        id: 'id',
                        fields: {
                            nombre: { validation: { required: true} },
                            colectivo: { },
                            tlf: { },
                            email: { },
                        }
                    }
                }
            },

            columns: [
                { title: "Nombre", field: "nombre" },
                { title: "Colectivo", field: "colectivo" },
                { title: "Teléfono", field: "tlf" },
                { title: "Email", field: "email" }
            ],
            toolbar: [ "save" ],  
            selectable: true,
            sortable: true
        });
        
    }

    function ejeDropDownEditor(container, options) {
        $('<input data-text-field="CategoryName" data-value-field="CategoryName" data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: false,
                dataSource: {
                    type: "odata",
                    transport: {
                        read: "http://demos.kendoui.com/service/Northwind.svc/Categories"
                    }
                }
            });
    }

});