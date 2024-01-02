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
                    <span>Excel File</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Excel File<hr /></h3>
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
                <?php if($this->session->flashdata('error_msg')){?>
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span><?php echo strip_tags($this->session->flashdata('error_msg'));?></span>
                    </div>
                <?php }?>

                <div class="col-md-12">

                    <form class="form" name="import_form" method="post"
                          enctype="multipart/form-data" id="" >

                        <div class="row">

                            <div class="col-md-5 col-md-offset-2">

                                <div class="form-group   <?php echo form_error('import_excel')?'has-error':'';?>">
                                    <label for="import_excel">Lead Excel file</label>
                                    <input type="file" name="import_excel" class="form-control-file" id="import_excel">
                                    <?php echo form_error('import_excel');?>

                                </div>
                                <a  href="<?php echo base_url('files/sample/samplelead.xlsx');?>"  target="_blank">Download Sample Excel file</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-danger btn-block" name="save">Save</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->