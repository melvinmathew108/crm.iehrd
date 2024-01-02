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
                    <span>State</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> State<hr /></h3>
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

                <form method="post" action="<?php echo site_url('state');?>" class="form-inline">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Filter By:</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">All</option>
                                <?php foreach($arr_country as $row_country){ ?>
                                    <option value="<?php echo $row_country->id; ?>" <?php echo ($search['country_id']==$row_country->id)?"selected":''; ?>><?php echo $row_country->name; ?></option>
                                <?php } ?>

                            </select>
                            <input class="btn btn-danger" type="submit" name="search" value="Search" >
                        </div>
                    </div>
                    <div class="margin-bottom-10"></div>
                </form>

                
                <div class="row">
                    <a style="margin: 15px" class="pull-right btn btn-info col-md-2"
                       href="<?php echo site_url('state/create'); ?>" >ADD NEW</a>
                </div>
            	<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th> Country </th>
                            <th> State </th>

                            <th class="text-center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if( count($result) > 0 ){

                            foreach ($result as $key => $row) {
                               
                        ?>
							
                            <tr>
                                <td> <?php echo $row->countryName;?> </td>
                                <td> <?php echo $row->name;?> </td>

                                
                                <td class="text-center"> 
                                    <a class="btn btn-outline btn-circle btn-sm blue" href="<?php echo site_url('state/edit/'.encrypt($row->id));?>">
                                    <i class="fa fa-edit"></i> Edit </a>
                                    
                                    <a class="btn btn-outline btn-circle btn-sm red" href="<?php echo site_url('state/delete/'.encrypt($row->id));?>" onclick="if(!confirm('Are you sure you want to delete this forever?')) return false;" >
                                    <i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                        <?php }  } else { ?>
                            <tr>
                                <td colspan="6">No state found!</td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>

                    <?php if( $pagination ) {?>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="pull-right">
                                    <ul class="pagination">
                                        <?php echo $pagination;?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    <?php }?>
                   
                </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->       