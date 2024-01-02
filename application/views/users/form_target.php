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
                	<a href="<?php echo site_url('users');?>">Target</a>
                    <i class="fa fa-circle"></i>
                </li>    
                <li>   
                    <span>New</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> New Target<hr /></h3>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        
            <div class="col-md-12">
            
            	<form role="form" class="form-horizontal" method="post">
                	
                    <div class="form-group <?php echo form_error('month')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="month">Month<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <select class="form-control" id="month" name="month">
                                <option value="">Select</option>

                                <?php foreach($arr_month as $key => $row_month){ ?>
                                    <option value="<?php echo $key; ?>" <?php echo ($row['month']==$key)?"selected":''; ?>><?php echo $row_month; ?></option>
                                <?php } ?>

                            </select>
                            
                            <?php echo form_error('group_id');?>
                        </div>
                    </div>

                    <div class="form-group <?php echo form_error('year')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="year">Year<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="year" placeholder="year" id="year" readonly class="form-control" value="<?php echo date('Y');?>">
                            <?php echo form_error('year');?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('amount')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="amount">Amount<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="amount" placeholder="Amount" id="amount" class="form-control" value="<?php echo $row['amount'];?>">
                            <?php echo form_error('amount');?>
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

        