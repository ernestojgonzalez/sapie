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
    // $("#grid").kendoGrid({
    //     dataSource: {
    //         data: createRandomData(50),
    //         pageSize: 10
    //     },
    //     groupable: true,
    //     sortable: true,
    //     pageable: true,
    //     columns: [ 
    //         { field: "FirstName", width: 90, title: "First Name" }, 
    //         { field: "LastName", width: 90, title: "Last Name" },
    //         { field: "City", width: 100 }, 
    //         { field: "Title" }, 
    //         { field: "BirthDate", title: "Birth Date", template: '#= kendo.toString(BirthDate,"dd MMMM yyyy") #' }, 
    //         { field: "Age", width: 50 },
    //         { field: "actions", title: "Opciones", width: 100, command: ["save", "destroy", "cancel", "create"] }
    //     ]
    // });
    var crudSapiePlenariasBaseUrl = "http://demos.kendoui.com/service",
    dataSource = new kendo.data.DataSource({
        transport: {
            read:  {
                url: crudServiceBaseUrl + "/Products",
                dataType: "jsonp"
            },
            update: {
                url: crudServiceBaseUrl + "/Products/Update",
                dataType: "jsonp"
            },
            destroy: {
                url: crudServiceBaseUrl + "/Products/Destroy",
                dataType: "jsonp"
            },
            create: {
                url: crudServiceBaseUrl + "/Products/Create",
                dataType: "jsonp"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {models: kendo.stringify(options.models)};
                }
            }
        },
        batch: true,
        pageSize: 30,
        schema: {
            model: {
                id: "ProductID",
                fields: {
                    ProductID: { editable: false, nullable: true },
                    ProductName: { validation: { required: true } },
                    UnitPrice: { type: "number", validation: { required: true, min: 1} },
                    Discontinued: { type: "boolean" },
                    UnitsInStock: { type: "number", validation: { min: 0, required: true } }
                }
            }
        }
    });

    $("#grid").kendoGrid({
        dataSource: dataSource,
        pageable: true,
        groupable: true,
        height: 400,
        toolbar: ["create"],
        columns: [
            { field: "eje", title: "Eje", width: "100px" },
            { field: "municipio", title:"Municipio", width: "100px" },
            { field: "parroquia", width: "100px" },
            { field: "lugar", title: "Lugar", width: "100px"},
            { field: "fecha", title: "Fecha", width: "100px"},
            { field: "observaciones", title: "Observaciones", width: "100px"},
            { title: "Opciones", command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }
        ],
        editable: "inline"
    });
});