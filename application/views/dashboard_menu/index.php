<?php
/**
 * Created by PhpStorm.
 * User: 91799
 * Date: 27/4/20
 * Time: 10:15 AM
 */  ?>




<body>
<div class="fullwrapper">
    <div class="header">
        <h1><center>IEHRD</center></h1>
    </div>

    <div class="contentWrapper">
        <div class="row">




            <div class=" col-sm-4 col-md-4 col-lg-4 menuItemCol">
                <a href="<?php echo site_url('auth/switch_dash/leads');?>" class="menuItem">
                    <label>
                        <img src="<?php echo base_url('assets/front_end/images/icons/white/1_masters.png');?>" />
                        <span>LEADS</span>
                    </label>
                </a>
            </div>
            <div class=" col-sm-4 col-md-4 col-lg-4 menuItemCol">
                <a href="<?php echo site_url('auth/switch_dash/application');?>" class="menuItem">
                    <label>
                        <img src="<?php echo base_url('assets/front_end/images/icons/white/1_masters.png');?>" />
                        <span>APPLICATION</span>
                    </label>
                </a>
            </div>

            <?php if( $this->session->userdata('group_id') == 1 ) { ?>


            <div class="col-sm-4 col-md-3 col-lg-4 menuItemCol">
                <a href="<?php echo site_url('auth/switch_dash/admission');?>" class="menuItem">
                    <label>
                        <img src="<?php echo base_url('assets/front_end/images/icons/white/1_masters.png');?>" />
                        <span>ADMISSION</span>
                    </label>
                </a>
            </div>

            <?php }?>

        </div>
    </div>

