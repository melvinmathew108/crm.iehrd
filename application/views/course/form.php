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
                    <a href="<?php echo site_url('');?>">Course</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>New</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> New Course<hr /></h3>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <form method="POST"  class="form-horizontal branch_form" enctype="multipart/form-data">

            <div class="form-group <?php echo form_error('university_id')?'has-error':'';?>">
                <label class="col-md-2 control-label" for="university_id">University<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-5">
                    <select class="form-control" name="university_id">
                        <option value="">Select</option>
                        <?php foreach ($arr_university as $key => $university) { ?>
                            <option <?php echo($university->id==$row['university_id'])?'selected':''; ?>
                                value="<?php echo $university->id;?>"><?php echo $university->name;?></option>
                        <?php } ?>

                    </select>
                    <?php echo form_error('university_id');?>
                </div>
            </div>

            <div class="form-group <?php echo form_error('name')?'has-error':'';?>">
                <label class="col-md-2 control-label" for="name">Course Name<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-5">
                    <input type="text" name="name" class="form-control" autocomplete="off"  value="<?php echo $row['name'];?>">
                    <?php echo form_error('name');?>
                </div>
            </div>



            <div class="form-group">
                <div >
                    <button type="submit" class="btn btn-danger col-md-offset-6" name="save">Save</button>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
