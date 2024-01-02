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
                	<a href="#">Stream</a>
                    <i class="fa fa-circle"></i>
                </li>    
                <li>   
                    <span>New</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> New Stream<hr /></h3>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        
            <div class="col-md-12">
            
            	<form role="form" class="form-horizontal" method="post">

                    <div class="form-group <?php echo form_error('university_id')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="university_id">University<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <select class="form-control" name="university_id"id="university_id"
                                    data-url="<?php echo site_url('stream/get_course'); ?>">
                                <option value="">Select</option>
                                <?php foreach ($arr_university as $key => $university) { ?>
                                    <option <?php echo($university->id==$row['university_id'])?'selected':''; ?>
                                        value="<?php echo $university->id;?>"><?php echo $university->name;?></option>
                                <?php } ?>

                            </select>
                            <?php echo form_error('university_id');?>
                        </div>
                    </div>


                    <div class="form-group <?php echo form_error('course_id')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="course_id">Course Name<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <select class="form-control" name="course_id" id="course_id">
                                <option value="">Select</option>


                            </select>
                            <?php echo form_error('course_id');?>
                        </div>
                    </div>
                	
                    
                    <div class="form-group <?php echo form_error('name')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="name">Stream<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="<?php echo $row['name'];?>"> 
                            <?php echo form_error('name');?>
                        </div>
                    </div>

                    <div class="form-group <?php echo form_error('min_price')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="min_price">Discounted Fees<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="min_price" placeholder="Discounted Fees" id="min_price" class="form-control" value="<?php echo $row['min_price'];?>">
                            <?php echo form_error('min_price');?>
                        </div>
                    </div>

                    <div class="form-group <?php echo form_error('max_price')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="max_price">Course Fees<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="max_price" placeholder="Course Fees" id="max_price" class="form-control" value="<?php echo $row['max_price'];?>">
                            <?php echo form_error('max_price');?>
                        </div>
                    </div>
                    
                   
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green-meadow" type="submit">Save</button>
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

        