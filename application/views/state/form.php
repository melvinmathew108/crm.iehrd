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
                	<a href="<?php echo site_url('admin/state');?>">States</a>
                    <i class="fa fa-circle"></i>
                </li>    
                <li>   
                    <span>New</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> New State<hr /></h3>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        
            <div class="col-md-12">
            
            	<form role="form" class="form-horizontal" method="post">


                    <div class="form-group <?php echo form_error('country_id')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="country_id">Country Name<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <select class="form-control" name="country_id">
                                <option value="">Select</option>
                                <?php foreach ($arr_country as $key => $country) { ?>
                                    <option <?php echo($country->id==$row['country_id'])?'selected':''; ?>
                                        value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                                <?php } ?>

                            </select>
                            <?php echo form_error('country_id');?>
                        </div>
                    </div>
                	
                    
                    <div class="form-group <?php echo form_error('name')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="name">Name<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="<?php echo $row['name'];?>"> 
                            <?php echo form_error('name');?>
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

        