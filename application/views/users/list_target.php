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
                    <span>Users Target</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Users Target - <span style="color: red">
                <?php echo $row_user['first_name'].' '.$row_user['last_name']; ?> </span>
            <hr /></h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <div class="col-md-12" style="margin-bottom: 10px">

                <a href="<?php echo site_url('users/create_target/'.$row_user['id']); ?>" class="btn btn-default pull-right" > Add New </a>

            </div>

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
                

            	<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th> Month </th>
                            <th> Year </th>
                            <th>Target Amount </th>
                            <th> Achieved Amount </th>
                            <th> Pending </th>
                            <th class="text-center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( is_array($result) && count($result) > 0 ){?>
							<?php foreach( $result as $row ){

                               $sales_id =  $row->sales_id;

                                $condition_closed_today = "MONTH(a.created) = ".$row->month." AND YEAR(a.created) = ".$row->year." AND a.status_id = 2
                                AND a.user_id = ".$sales_id;

//                                echo $condition_closed_today; exit;


                                $left_today_converted = [
                                    'contacts c'=>'c.id=a.lead_id'
                                ];

                                $arr_value_closed_today  = $this->common->get_all( 'activitylogs a', $condition_closed_today,'c.invoice_value','','','',$left_today_converted);

//                                echo $this->db->last_query(); exit;

                                $arr_value_closed_today = array_column($arr_value_closed_today, 'invoice_value');

                                $closed_month_value = array_sum($arr_value_closed_today);


                            ?>
                            <tr>
                                <td> <?php echo get_month($row->month);?> </td>
                                <td> <?php echo $row->year;?> </td>
                                <td> <?php echo $row->amount;?> </td>
                                <td><?php echo $closed_month_value; ?></td>
                                <td><?php echo ($row->amount - $closed_month_value); ?></td>

                                
                                <td class="text-center"> 

                                    
                                    <a class="btn btn-outline btn-circle btn-sm red" href="<?php echo site_url('users/delete_target/'.encrypt($row->id));?>" onclick="if(!confirm('Are you sure you want to delete this forever?')) return false;" >
                                    <i class="fa fa-trash-o"></i> Delete </a>

                                </td>
                            </tr>
                            <?php } 
                        } else {?>
                            <tr>
                                <td colspan="6">No users found!</td>
                            </tr>
                        <?php }?>
                        
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