$(document).ready(function(){
    $(document).on('change', '.country_id', function(){


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
});