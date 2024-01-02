/**
 * Created by Kanisha on 12/26/20.
 */

$(document).on('change', '#group_id', function(){

    var $this = $(this);

    var $batch_id = $this.val();

    if($batch_id == 1 ){
        $('.dis_sec').hide();
    }else{
        $('.dis_sec').show();
    }

});


