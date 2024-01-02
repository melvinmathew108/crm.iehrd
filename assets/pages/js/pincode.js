$(document).ready(function(){

    var grid = new Datatable();

    grid.init({
        src: $("#pincode-tbl"),
        onSuccess: function (grid, response) {
            // grid:        grid object
            // response:    json object of server side ajax response
            // execute some code after table records loaded
        },
        onError: function (grid) {
            // execute some code on network or other general error
        },
        onDataLoad: function(grid) {
            // execute some code on ajax data load
        },
        loadingMessage: 'Loading...',
        dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options
            "processing": true,
            "serverSide": true,
            select: true,
            "ajax": {
                "url": $("#pincode-tbl").data('url')
            },
            "order": [
                [0, "desc"]
            ],
            "colReorder": {
                reorderCallback: function () {
                    console.log( 'callback' );
                }
            },
            buttons: [

                { className: 'btn red', text: 'Add   ', action: function ( e, dt, node, config ) {
                    window.location.href = site_url+'pincode/create'  } },

            ],
            "dom": "<'row cw-listactions'<'col-xs-6'f><'col-xs-6'B>><'table-scrollable'rt><'row cw-listnav'<'col-xs-6'il><'col-xs-6'p>>",
            "pagingType": "bootstrap_number",
            "language": { // language settings
                "info": "Found total _TOTAL_ records",
                "search": "Search : ",
            },
            "columnDefs": [
                {"className": "text-center", "targets": [3]},
                {"className": "text-center", "targets": [1]},
                {"className": "text-left", "targets": "_all"},
//                { orderable: false, targets:  },
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 20,
        }
    });

    grid.setAjaxParam("customActionType", "group_action");
    grid.getDataTable().ajax.reload();
    grid.clearAjaxParams();



    $(document).on('click', '#con_del', function(){

        if(!confirm('Are you sure you want to delete this forever?')){
            return false;
        }

    });

});