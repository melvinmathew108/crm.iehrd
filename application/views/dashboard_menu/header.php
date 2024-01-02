


    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('assets/front_end/css/custom_style.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/front_end/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/front_end/css/bootstrap-grid.min.css');?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url('assets/front_end/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/front_end/js/bootstrap.bundle.min.js');?>" type="text/javascript"></script>
        <title><?php echo $core_settings->site_name;?> | <?php echo $page_title;?></title>

        <?php if( isset($css_files)) { foreach( $css_files as $css ){ ?>
            <link href="<?php echo $css;?>" media="all" rel="stylesheet" type="text/css" />
        <?php }} ?>
        <link rel="shortcut icon" href="favicon.ico" />
        <script>var base_url = '<?php echo base_url();?>';</script>
        <script>var site_url = '<?php echo site_url();?>';</script>
    </head>