$(document).ready(function(){

    var grid = new Datatable();

    grid.init({
        src: $("#amenities-tbl"),
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
                "url": $("#amenities-tbl").data('url')
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

                { className: 'btn red  add_amenities', text: 'Add   ', action: function ( e, dt, node, config ) { } },

            ],
            "dom": "<'row cw-listactions'<'col-xs-6'f><'col-xs-6'B>><'table-scrollable'rt><'row cw-listnav'<'col-xs-6'il><'col-xs-6'p>>",
            "pagingType": "bootstrap_number",
            "language": { // language settings
                "info": "Found total _TOTAL_ records",
                "search": "Search : ",
            },
            "columnDefs": [
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

    $(document).on('click', '.add_amenities', function(e){

        e.preventDefault();
        var $this = $(this);
        var $url = site_url+'amenities/create';
        var image_url = site_url+'files/media/loading_gif.gif';

        $('#add_model').modal();
        var loading = '<div class="gif_loading_wrap" align="center "><img class="loading_img" src="'+image_url+'"; ></div>';

        $('#add_model .modal-body').html(loading);

        $.ajax({
            type:'GET',
            url: $url,
            dataType:'json',
            success:function( data ){
                console.log(data);
                $('#add_model .modal-body').html(data.html);
            }
        });

    });

    $(document).on('click','#save_details', function(e){

        e.preventDefault();

        var formData = $('#add_amenities_form').serialize();
        var $url = site_url+'amenities/save_amenities';


        $('#save_details').attr('disabled', true);

        var image_url = site_url+'files/media/loading_gif.gif';

        var loading = '<div class="gif_loading_wrap" align="center "><img class="loading_img" src="'+image_url+'"; ></div>';

        $('#add_model .modal-body').html(loading);


        $.blockUI({ message: '<h1><img src="'+base_url+'/assets/global/img/loading-spinner-blue.gif" /> Just a moment...</h1>' });
        $.ajax({
            url: $url,
            type: 'POST',
            data: formData,
            dataType:'json',
            success: function (data) {

                console.log( data );

                $.unblockUI();


                location.reload();

//                    $('#edit_district_modal .modal-body').html(data.html);



            },
            error: function(data){
                console.log( data );
            }
        });


    });

    $(document).on('click', '.edit_form', function(e){

        e.preventDefault();
        var $this = $(this);
        var $url = $this.data('url');
        var image_url = site_url+'files/media/loading_gif.gif';

        $('#edit_model').modal();
        var loading = '<div class="gif_loading_wrap" align="center "><img class="loading_img" src="'+image_url+'"; ></div>';

        $('#edit_model .modal-body').html(loading);

        $.ajax({
            type: 'GET',
            url: $url,
            dataType:'json',
            success:function( data ){
                console.log(data);
                $('#edit_model .modal-body').html(data.html);
            }
        });

    });

    $(document).on('click','#save_edit_details', function(e){

        e.preventDefault();

        var formData = $('#edit_amenities_form').serialize();
        var $url = site_url+'amenities/update_amenities';


        $('#save_details').attr('disabled', true);

        var image_url = site_url+'files/media/loading_gif.gif';

        var loading = '<div class="gif_loading_wrap" align="center "><img class="loading_img" src="'+image_url+'"; ></div>';

        $('#edit_district_modal .modal-body').html(loading);


        $.blockUI({ message: '<h1><img src="'+base_url+'/assets/global/img/loading-spinner-blue.gif" /> Just a moment...</h1>' });
        $.ajax({
            url: $url,
            type: 'POST',
            data: formData,
            dataType:'json',
            success: function (data) {

                console.log( data );

                $.unblockUI();


                location.reload();

//                    $('#edit_district_modal .modal-body').html(data.html);



            },
            error: function(data){
                console.log( data );
            }
        });


    });




});