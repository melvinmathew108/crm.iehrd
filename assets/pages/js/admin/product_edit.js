$(document).ready(function(){



    CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;

    CKEDITOR.config.allowedContent = true;

    CKEDITOR.config.extraAllowedContent = 'p(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*};span(*)[*]{*}';

    CKEDITOR.dtd.$removeEmpty.i = 0;

    CKEDITOR.config.protectedSource.push(/<span[^>]*><\/span>/g);

    CKEDITOR.replace( 'ckeditor',{

        "filebrowserImageUploadUrl": base_url+"/assets/global/plugins/ckeditor/plugins/imgupload/imgupload.php"

    });

    $(".select2").select2({
        placeholder: 'Sent To',
        closeOnSelect: false
    });

});


