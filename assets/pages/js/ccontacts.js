$(document).ready(function(){




    var grid = new Datatable();

    grid.init({
        src: $("#contacts-tbl"),
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
                "url": $("#contacts-tbl").data('url')
            },
            "order": [
                [1, "desc"]
            ],
            "colReorder": {
                reorderCallback: function () {
                    console.log( 'callback' );
                }
            },
            buttons: [



            ],
            "dom": "<'row cw-listactions'<'col-xs-6'f><'col-xs-6'B>><'table-scrollable'rt><'row cw-listnav'<'col-xs-6'il><'col-xs-6'p>>",
            "pagingType": "bootstrap_number",
            "language": { // language settings
                "info": "Found total _TOTAL_ records",
                "search": "Search : ",
            },
            "columnDefs": [
                {"className": "text-center", "targets": [7]},
                {"className": "text-center", "targets": [2]},
                {"className": "text-left", "targets": "_all"},
                { orderable: false, targets: [1,2,3,4,7] }
            ],
            "lengthMenu": [
                [500, 1000, 1500, 2000, -1],
                [500, 1000, 1500, 2000, "All"] // change per page values here
            ],
            "pageLength": 2000,
        }
    });

    grid.setAjaxParam("customActionType", "group_action");
    grid.getDataTable().ajax.reload();
    grid.clearAjaxParams();




    $(document).on('change', '#status_id', function(){


        var $this = $(this);

        var status = $this.val();

        $('.sec_1').hide();
        $('.sec_2').hide();
        $('.sec_3').hide();

        if(status == 2){
            $('.item_final').show();
            $('#final_status').val('');
        }else{
            $('.item_final').hide();
        }


    });

    $(document).on('change', '#final_status', function(){


        var $this = $(this);

        var status = $this.val();


        if(status == 1){
            $('.sec_1').show();
            $('.sec_2').hide();
            $('.sec_3').hide();
        }else if(status == 2){
            $('.sec_1').hide();
            $('.sec_2').show();
            $('.sec_3').hide();
        }else if(status == 3 || status == 4){
            $('.sec_1').hide();
            $('.sec_2').hide();
            $('.sec_3').show();
        }else{
            $('.sec_1').hide();
            $('.sec_2').hide();
            $('.sec_3').hide();
        }



    });

    $(document).on('click', '#change_status', function(){


        var $this = $(this);
        var $contact_id = $this.data('contactid');
        var status = $this.val();



        $('#hidden_contact').val($contact_id);

        var image_url = site_url+'files/media/loading_gif.gif';


        $('#myModal').modal();

    });

    $(document).on('click', '#activity', function(){


        var $this = $(this);
        var $contact_id = $this.data('contactid');

        var image_url = site_url+'files/media/loading_gif.gif';
        $('#myModalActivity').modal();

        var $url = site_url+'leads/getActivity';

        $.ajax({
            url: $url,
            type: 'POST',
            async: false,
            dataType:'json',
            data: {contact_ids:$contact_id},
            success: function (data) {

                $('#activity_content').html(data.html);

            },
            error: function(data){
                console.log( data );
            }
        });

    });


    $(document).on('click','#status_save', function(e){

        e.preventDefault();





        var form = $('#form_status')[0];

        var formData = new FormData(form);

        var $url = site_url+'leads/update_status';

        var $status_id = $('#status_id').val();

        if ( $status_id != '' ) {

            $('#status_save').attr('disabled', true);
            $.ajax({
                url: $url,
                type: 'POST',
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                data: formData,
                success: function (data) {

                    window.location.replace(base_url+'leads');

                },
                error: function(data){
                    console.log( data );
                }
            });
        }else{

            alert('Select a status');
        }

    });


    $(document).on('click', '#add_followup', function(){


        var $this = $(this);
        var $contact_id = $this.data('contactid');


        $('#hidden_contact_follow').val($contact_id);

        var image_url = site_url+'files/media/loading_gif.gif';


        $('#myModalFollow').modal();

        var dateNow = new Date();

        var new_date = moment(dateNow).hour(11).minute(00);
        $('#datetimepicker2').datetimepicker({
            defaultDate:new_date,

        });

    });

    $(document).on('click','#follow_save', function(e){

        e.preventDefault();

        var err = false;

        $( ".required_field" ).each(function() {

            if($(this).val() == '' ){
                err = true;

                $(this).closest( ".form-group").addClass('has-error');
                $(this).next().html('This field is required');
            }else{
                $(this).next().html('');
                $(this).closest( ".form-group").removeClass('has-error');
            }

        });


        var form = $('#form_follow')[0];

        var formData = new FormData(form);

        var $url = site_url+'leads/add_follow';

        if ( !err  ) {

            $('#follow_save').attr('disabled', true);
            $.ajax({
                url: $url,
                type: 'POST',
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                data: formData,
                success: function (data) {

                    window.location.replace(base_url+'leads');

                },
                error: function(data){
                    console.log( data );
                }
            });
        }

    });

    $(document).on('click', '#view', function(){


        var $this = $(this);
        var $contact_id = $this.data('contactid');

        var image_url = site_url+'files/media/loading_gif.gif';
        $('#myModalView').modal();

        var $url = site_url+'leads/getView';

        $.ajax({
            url: $url,
            type: 'POST',
            async: false,
            dataType:'json',
            data: {contact_ids:$contact_id},
            success: function (data) {

                $('#lead_content').html(data.html);

            },
            error: function(data){
                console.log( data );
            }
        });



    });



    $(document).on('click', '#con_del', function(){

        if(!confirm('Are you sure you want to delete this forever?')){
            return false;
        }

    });

});