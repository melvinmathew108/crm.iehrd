<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url();?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                	<span>Printer Settings</span>
                </li>    
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Printer Settings<hr /></h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
				<?php if($this->session->flashdata('msg')){?>   
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        <span><?php echo $this->session->flashdata('msg');?></span>
                    </div>
                <?php }?>
            
            	<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="site_name">Printer Share Name <span class="text-danger">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="share_name" placeholder="Printer Share Name" id="share_name" class="form-control"
                                   value="<?php echo $settings->share_name;?>">
                            
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn green-meadow" type="submit">Save</button>
                             <a href="<?php echo site_url('invoice/test_printer');?>"  class="btn red">Test Printer</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->