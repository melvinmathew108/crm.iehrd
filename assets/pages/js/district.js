$(document).ready(function(){

    $(document).on('click', '.add_district', function(e){

        e.preventDefault();
        var $this = $(this);
        var $url = $this.data('url');
        var image_url = site_url+'files/media/loading_gif.gif';

        $('#edit_district_modal').modal();
        var loading = '<div class="gif_loading_wrap" align="center "><img class="loading_img" src="'+image_url+'"; ></div>';

        $('#edit_district_modal .modal-body').html(loading);

        $.ajax({
            type: 'GET',
            url: $url,
            dataType:'json',
            success:function( data ){
                console.log(data);
                $('#edit_district_modal .modal-body').html(data.html);
            }
        });

    });

    $(document).on('click','#save_details', function(e){

        e.preventDefault();

        var formData = $('#district_form').serialize();
        var $url = site_url+'district/save_district';


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