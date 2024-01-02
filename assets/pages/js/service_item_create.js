$(document).ready(function(){




    $(document).on('change', '#district', function(e){

        e.preventDefault();
        var district_id = $('#district').val();
        var $url = site_url+'service_item/get_place/'+district_id;


        if(district_id != ''){


            $.ajax({
                type: 'GET',
                url: $url,
                dataType:'json',
                success:function( data ){

                    console.log(data.city);

                    $('#city_id').html(data.city);

                }
            });
        }
    });


});