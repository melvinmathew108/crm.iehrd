$(document).on('change', '#category_id', function(){

    var $this = $(this);
    var $url = $this.data('url');
    var $category_id = $this.val();

    $.ajax({
        type:"POST",
        url:$url,
        async: false,                          // execute code line by line after ajax success
        dataType:'json',
        data:{category_id:$category_id},
        success:function(json){

            console.log(json.html);

            $('#sub_category_id').html(json.html);
            $('#sub_category_id').trigger( "change" );


        },
        error: function(data){
            console.log( data );
        }
    })

});

$(document).on('click', '#btn_details', function(e){
    e.preventDefault();
    var count_details_rows = $('#count_details_rows').val();

    var new_count = count_details_rows + 1;
    $('#count_details_rows').val(new_count);

    var $url = site_url+'admin/vendor_trek_booking/add_more_details/'+count_details_rows;

    $.ajax({
        type: 'GET',
        url: $url,
        dataType:'json',
        success:function( data ){
            console.log(data);

            $('#append_details').append(data.html);

            $('.date-picker_start_date').datetimepicker({
                format: 'MM/DD/YYYY',
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'glyphicon glyphicon-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                }
            });

        }
    });
});

$(document).on('click', '.remove_image_button', function(e){
    e.preventDefault();

    var row_id = $(this).data('image_count');

    $('#row_image_'+row_id).remove();

});

$(document).on('click', '#save_details', function(e){

    e.preventDefault();
    var formData = $('#topic_form').serialize();
    var $url = site_url+'admin/vendor_trek_booking/save_topics';

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

    var $no_rows =  $('.image_row_append').length + 1;

    var available = $('#batch_id').find(':selected').data('availabe_count')


    if( $no_rows > available ){

        err = true;

        $('.msg_show').show();
        $('#msg_text').text('Available slot is '+available+' . please remove remaining rows');


    }else{
        $('.msg_show').hide();

    }


    if(!err){
        $.ajax({
            url: $url,
            type: 'POST',
            data: formData,
            dataType:'json',
            success: function (data) {

                console.log( data );
    //            location.reload();

                window.location.href= site_url+"admin/payment/index/"+data.booking_id;


            },
            error: function(data){
                console.log( data );
            }
        });
    }
});


$('.date-picker_start_date').datetimepicker({
    format: 'MM/DD/YYYY',
    icons: {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-chevron-up',
        down: 'fa fa-chevron-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'glyphicon glyphicon-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-times'
    }
});
