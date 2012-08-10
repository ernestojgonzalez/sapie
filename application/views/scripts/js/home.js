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

    //Grid de Plenarias
    var crudPlenariasBaseUrl = "plenarias/";
    dataSource = new kendo.data.DataSource({
        transport: {
            read:  {
                url: crudPlenariasBaseUrl + "getDataForGrid",
                dataType: "json"
            },
            update: {
                url: crudPlenariasBaseUrl + "crud/edit",
                dataType: "json"
            },
            destroy: {
                url: crudPlenariasBaseUrl + "crud/destroy",
                dataType: "json"
            },
            create: {
                url: crudPlenariasBaseUrl + "crud/create",
                dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {models: kendo.stringify(options.models)};
                }
                //alert(kendo.stringify(options.models));
            }
        },
        batch: true,
        pageSize: 10,
        schema: {
            model: {
                id: "id",
                fields: {
                    id: { editable: false, nullable: true },
                    eje: { validation: { required: true } },
                    municipio: { validation: { required: true } },
                    parroquia: { validation: { required: true } },
                    lugar: { validation: { required: true } },
                    fecha: { validation: { required: true } },
                    observacion: {}
                }
            }
        }
    });

    $("#grid").kendoGrid({
        dataSource: dataSource,
        pageable: true,

        height: 400,
        toolbar: [
            { name: "create", text: "Agregar nueva plenaria" }
        ],
        columns: [
            { field: "eje", title: "Eje", width: "100px" },
            { field: "municipio", title:"Municipio", width: "100px" },
            { field: "parroquia", width: "100px" },
            { field: "lugar", title: "Lugar", width: "100px"},
            { field: "fecha", title: "Fecha", width: "100px"},
            { field: "observacion", title: "Observaciones", width: "100px"},
            { title: "Opciones", command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }
        ],
        editable: "inline"
    });
});