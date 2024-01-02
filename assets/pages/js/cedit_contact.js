$(document).ready(function(){

    $('#country_id').select2({
        maximumInputLength: 20 // only allow terms up to 20 characters long
    });

    if( group_id != 1){

//        $("#user_id").select2("readonly", true);
        $("#user_id").select2({disabled:'readonly'});

    }else{

        $('#user_id').select2({
            maximumInputLength: 20 // only allow terms up to 20 characters long
        });
    }

//    $('.product_id').select2({
//        maximumInputLength: 20 // only allow terms up to 20 characters long
//    });


    $(document).on('change','#country_id', function(){

        var $this = $(this);
        var $url = $this.data('url');

        var $country_id = $this.val();

        $.ajax({
            type:"POST",
            url:$url,
            async: false,                          // execute code line by line after ajax success
            dataType:'json',
            data:{country_id:$country_id},
            success:function(json){

                console.log(json);

                $('#state_id').html(json.html);


            },
            error: function(data){
                console.log( data );
            }
        })
    });


    $(document).on('change','#state_id', function(){

        var $this = $(this);
        var $url = $this.data('url');

        var $state_id = $this.val();

        $.ajax({
            type:"POST",
            url:$url,
            async: false,                          // execute code line by line after ajax success
            dataType:'json',
            data:{state_id:$state_id},
            success:function(json){

                console.log(json);

                $('#city_id').html(json.html);


            },
            error: function(data){
                console.log( data );
            }
        })
    });

    var dateNow = new Date();

    var new_date = moment(dateNow).hour(11).minute(00);
    $('#datetimepicker2').datetimepicker();


//    $('.date_picker').data("DateTimePicker").minDate(dateNow);


    $(document).on('click', '#btn_add_more', function(){

        var row_id = $(this).data('row_id');
        var new_row_id = row_id+1;
        $(this).data('row_id',new_row_id);  //setter

        var html_template = $('#add_more_template').html();
        var res_html = html_template.replace(/tem_row_id/g, new_row_id);
        res_html = res_html.replace(/tem_required_field/g, 'required_field');

        $( ".add_more_wrap" ).append( res_html );



    });


    $(document).on('click','.btn_delete_more', function(){

        var row_id = $(this).data('row_id');
        $('#add_more_row_'+row_id).remove();

    });


    $(document).on('change','.product_id', function(){

        var $this = $(this);
        var $url = $this.data('url');
        var row_id = $(this).data('row_id');
        var $product_id = $this.val();

        $.ajax({
            type:"POST",
            url:$url,
            async: false,                          // execute code line by line after ajax success
            dataType:'json',
            data:{product_id:$product_id},
            success:function(json){

                console.log(json);

                $('#cost_'+row_id).val(json.cost);


            },
            error: function(data){
                console.log( data );
            }
        })
    });




    $(document).on('click','#save_details', function(e){

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


        //var formData = $('#form_guest').serialize();
        //var formData = new FormData($(this)[0]);
        var form = $('#lead_form')[0];

        var formData = new FormData(form);

        var $url = site_url+'leads/update_form';

        if ( !err  ) {

            $('#save_details').attr('disabled', true);
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

    var new_touch_date = moment(dateNow);
    $('#datetimepicker3').datetimepicker({
        defaultDate:new_touch_date,
        format:'DD/MM/YYYY'

    });





});
