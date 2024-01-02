
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

$('.date-picker_end_date').datetimepicker({
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

$(document).on('click', '#manage_trek', function(e){
    e.preventDefault();
    var $this = $(this);
    var image_url = site_url+'files/media/loading_gif.gif';
    $('#view_model').modal();
});


$(document).on('click','#save_date', function(e){
    e.preventDefault();
    var err = false;
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var trek_id = $('#trek_id').val();

    var $url = site_url+'admin/trek/manage_trek';

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

    if( !err ){

        $('#save_date').attr('disabled', true);

        $.ajax({
            url: $url,
            type: 'POST',
            data: {start_date:start_date,end_date:end_date,trek_id:trek_id},
            success: function(data) {

                $('#view_model').modal('hide');
                window.location.reload();
            },
            error: function(data){
                console.log( data );
            }
        });
    }
});
