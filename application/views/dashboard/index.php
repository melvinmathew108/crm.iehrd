<style>
    .label_btn{
        padding: 4px 15px !important
    }

    .white-box {
        background: #fff;
        padding: 25px;
        margin-bottom: 15px;
    }
    .white-box .box-title {
        margin: 0 0 12px;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 14px;
    }
</style>

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
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Dashboard
            <small>dashboard & statistics</small>
        </h3>


        <?php if( $this->session->userdata('main_menu_sess') == 'leads' ) { ?>

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="alert alert-success" id="follw_add_success" style="display: none">
                        <button class="close" data-close="alert"></button>
                        <span>Follow Up Added Successfully</span>
                    </div>

                </div>

            </div>



            <div class="row">
                <a style="margin: 15px" class="pull-right btn btn-info col-md-2"
                   href="<?php echo site_url('leads/create'); ?>" >
                    <i class="fa fa-plus"></i>
                    CREATE NEW LEAD</a>
            </div>


            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo site_url('leads');?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" ><?php echo $total_leads; ?></span>
                            </div>
                            <div class="desc">Total Leads </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo site_url('cleads/index/1');?>">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" >Rs <?php echo $total_leads_closed_today_value; ?></span> </div>
                            <div class="desc">  Closed Leads Value Today </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo site_url('cleads/index/2');?>">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" > <?php echo $total_leads_closed_today; ?></span> </div>
                            <div class="desc"> Leads Closed Today </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo site_url('cleads/index/3');?>">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" >Rs <?php echo $converted_cost; ?></span>
                            </div>
                            <div class="desc"> Converted Cost </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo site_url('leads/index/1');?>">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="89">
                                    <?php echo $total_leads_created_today; ?></span> </div>
                            <div class="desc"> Total Leads Today </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="89">
                                    <?php echo $follow_today; ?></span> </div>
                            <div class="desc"> Followups Today </div>
                        </div>
                    </a>
                </div>

                <?php if( $this->session->userdata('group_id') == 1 ) { ?>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                            <div class="visual">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" > <?php echo $total_leads_closed_month; ?></span> </div>
                                <div class="desc"> Leads Closed This Month </div>
                            </div>
                        </a>
                    </div>



                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                            <div class="visual">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" > <?php echo $leads_closed_month_value; ?></span> </div>
                                <div class="desc"> Closed Leads Value In This Month </div>
                            </div>
                        </a>
                    </div>

                <?php } ?>

            </div>

            <?php if( $this->session->userdata('group_id') == 2 && $target_set == 1 ) { ?>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="box-title">Target for - <?php echo get_month($target_month);?></h3>
                </div>




                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" ><?php echo $target; ?></span>
                            </div>
                            <div class="desc">Your Target </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" >Rs <?php echo $achieved; ?></span> </div>
                            <div class="desc">  Achieved </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" > <?php echo $pending; ?></span> </div>
                            <div class="desc"> Pending </div>
                        </div>
                    </a>
                </div>

            </div>

            <?php } ?>


            <?php if( $this->session->userdata('group_id') == 1 ) { ?>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Sales Target For This Month</h3>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th> Month </th>
                                    <th> Sales </th>
                                    <th>Target Amount </th>
                                    <th> Achieved Amount </th>
                                    <th> Pending </th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if( is_array($arr_targets) && count($arr_targets) > 0 ){?>
                                    <?php foreach( $arr_targets as $row ){

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
                                        <tr id="row_<?php echo $row->id;?>" >
                                            <td> <?php echo get_month($row->month);?> </td>
                                            <td> <?php echo $row->first_name.' '.$row->last_name;?> </td>
                                            <td> <?php echo $row->amount;?> </td>
                                            <td><?php echo $closed_month_value; ?></td>
                                            <td><?php echo ($row->amount - $closed_month_value); ?></td>



                                        </tr>
                                    <?php }
                                } else {?>
                                    <tr>
                                        <td colspan="6">No targets found!</td>
                                    </tr>
                                <?php }?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Upcoming Follow Ups</h3>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Staff</th>
                                    <th>Student</th>
                                    <th>University</th>
                                    <th>Followup</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($arr_followups as $key => $row ){

                                    $followup_date = $row->followup_date;

                                    $followup_date = new DateTime($followup_date);
                                    $followup_date = $followup_date = $followup_date->format('F j, Y, g:i a');

                                    $left_join = [
                                        'products p'=> 'p.id=c.product_id'
                                    ];
                                    $arr_pro = $this->common->get_all('contacts_products c',
                                        ['contact_id'=>$row->contact_id],'c.*,p.name','','','',$left_join);

                                    $names = array_column($arr_pro, 'name');
                                    $cost_array = array_column($arr_pro, 'cost');

                                    if( $row->type == 1 ){

                                        $act = "tel:".$row->phone;

                                    }elseif($row->type == 2){

                                        $act = "mailto:".$row->email;

                                    }else{
                                        $act = "";
                                    }

                                    if( $row->type == 0 ){

                                        $user_status = '';
                                        $follow_types = '';

                                    }else{

                                        $user_status = get_user_status_class($row->type);
                                        $follow_types = get_follow_type($row->type);
                                    }




                                    ?>



                                    <tr id="row_<?php echo $row->id;?>" >

                                        <td><?php echo $key + 1; ?></td>
                                        <td class="txt-oflo"><?php echo $row->nameFirst.' '.$row->nameLast; ?></td>
                                        <td class="txt-oflo"><?php echo $row->first_name.' '.$row->last_name; ?></td>
                                        <td class="txt-oflo"><?php echo $row->product; ?></td>
                                        <td>

                                            <a style="text-decoration: none" href="<?php echo $act;?>">

                                            <span class="label
                                            label-<?php echo $user_status;?> label-rounded">
                                                <span class="ti-location-pin"></span> &nbsp;
                                                <?php echo $follow_types;?>
                                            </span>

                                            </a>

                                        </td>
                                        <td><span class="text-success">
                                                <img src=""> <?php echo array_sum($cost_array); ?>
                                            </span></td>
                                        <td class="txt-oflo">
                                            <?php echo $followup_date; ?>
                                        </td>

                                        <td class="txt-oflo" >
                                            <span id="status_<?php echo $row->id;?>" class="btn btn-outline btn-circle red" style="color:<?php echo $row->color;?>"  >
                                                <?php echo $row->status_name; ?></span>

                                        </td>

                                        <td class="txt-oflo">

                                            <a id="change_status"
                                               data-contactId="<?php echo $row->id; ?>" title="Update" class="btn
                    btn-outline btn-circle btn-sm yellow" >
                                                <i class="fa fa-edit"></i>  </a>

                                            <a title="Add FollowUp" id="add_followup" data-contactId="<?php echo $row->contact_id; ?>"
                                               class="btn btn-outline btn-circle btn-sm blue">
                                                <i class="fa fa-plus"></i> </a>

                                            <a title="View" id="view" data-contactId="<?php echo $row->contact_id; ?>"
                                               class="btn btn-outline btn-circle btn-sm red" >
                                                <i class="fa fa-eye"></i> </a>

                                            <a title="Activity History" id="activity" data-contactId="<?php echo $row->contact_id; ?>"
                                               class="btn btn-outline btn-circle btn-sm btn-primary">
                                                <i class="fa fa-list"></i> </a>


                                            <a class="toggle_reply btn btn-block"
                                               style="text-decoration: none; margin-top: 10px;     margin-left: -17px;"
                                               data-href="<?php echo site_url('dashboard/toggle_replay/'.$row->id);?>" >

                                            <span class="label
                                            label-<?php echo get_user_status_class(is_null($row->reply)?2:1);?>
                                            label-rounded">
                                                <span class="ti-location-pin"></span> &nbsp;
                                                <?php echo (is_null($row->reply)?'Mark Completed':'Completed');?>
                                            </span>

                                            </a>
                                        </td>
                                    </tr>

                                <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">OOPS SOME FOLLOW UP MISSED!</h3>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Staff</th>
                                    <th>Student</th>
                                    <th>University</th>
                                    <th>Followup</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($miss_arr_followups as $key => $row ){

                                    $followup_date = $row->followup_date;

                                    $followup_date = new DateTime($followup_date);
                                    $followup_date = $followup_date = $followup_date->format('F j, Y, g:i a');

                                    $left_join = [
                                        'products p'=> 'p.id=c.product_id'
                                    ];
                                    $arr_pro = $this->common->get_all('contacts_products c',
                                        ['contact_id'=>$row->contact_id],'c.*,p.name','','','',$left_join);

                                    $names = array_column($arr_pro, 'name');
                                    $cost_array = array_column($arr_pro, 'cost');

                                    if( $row->type == 1 ){

                                        $act = "tel:".$row->phone;

                                    }elseif($row->type == 2){

                                        $act = "mailto:".$row->email;

                                    }else{
                                        $act = "";
                                    }


                                    ?>

                                    <tr id="row_<?php echo $row->id;?>">
                                        <td><?php echo $key + 1; ?></td>
                                        <td class="txt-oflo"><?php echo $row->nameFirst.' '.$row->nameLast; ?></td>
                                        <td class="txt-oflo"><?php echo $row->first_name.' '.$row->last_name; ?></td>
                                        <td class="txt-oflo"><?php echo $row->product; ?></td>
                                        <td>

                                            <a style="text-decoration: none" href="<?php echo $act;?>">

                                            <span class="label
                                            label-<?php echo get_user_status_class($row->type);?> label-rounded">
                                                <span class="ti-location-pin"></span> &nbsp;
                                                <?php echo get_follow_type($row->type);?>
                                            </span>

                                            </a>

                                        </td>
                                        <td><span class="text-success">
                                                <img src=""> <?php echo array_sum($cost_array); ?>
                                            </span></td>
                                        <td class="txt-oflo">
                                            <?php echo $followup_date; ?>
                                        </td>

                                        <td class="txt-oflo">
                                            <span class="btn btn-outline btn-circle red" id="status_<?php echo $row->id;?>" style="color:<?php echo $row->color;?>"  >
                                                <?php echo $row->status_name; ?></span>

                                        </td>

                                        <td class="txt-oflo">
                                            <a id="change_status"

                                               data-contactId="<?php echo $row->id; ?>" title="Update" class="btn
                    btn-outline btn-circle btn-sm yellow" >
                                                <i class="fa fa-edit"></i>  </a>

                                            <a title="Add FollowUp" id="add_followup" data-contactId="<?php echo $row->contact_id; ?>"
                                               class="btn btn-outline btn-circle btn-sm blue">
                                                <i class="fa fa-plus"></i> </a>

                                            <a title="View" id="view" data-contactId="<?php echo $row->contact_id; ?>"
                                               class="btn btn-outline btn-circle btn-sm red" >
                                                <i class="fa fa-eye"></i> </a>

                                            <a title="Activity History" id="activity" data-contactId="<?php echo $row->contact_id; ?>"
                                               class="btn btn-outline btn-circle btn-sm btn-primary">
                                                <i class="fa fa-list"></i> </a>


                                            <a class="toggle_reply btn btn-block"
                                               style="text-decoration: none; margin-top: 10px;     margin-left: -17px;"
                                               data-href="<?php echo site_url('dashboard/toggle_replay/'.$row->id);?>" >

                                            <span class="label
                                            label-<?php echo get_user_status_class(is_null($row->reply)?2:1);?>
                                            label-rounded">
                                                <span class="ti-location-pin"></span> &nbsp;
                                                <?php echo (is_null($row->reply)?'Mark Completed':'Completed');?>
                                            </span>

                                            </a>
                                        </td>
                                    </tr>

                                <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->




    <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Change Status</h4>
                </div>
                <div class="modal-body">

                    <!--                <div class="gif_loading_wrap" align="center "><img class="loading_img" src="--><?php //echo base_url('files/media/loading_gif.gif');?><!--"; ></div>-->

                    <form method="POST" id="form_status" class="form-horizontal form_status" enctype="multipart/form-data">

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="status_id"  required class="form-control" name="status_id">
                                        <option value="">--Select Status--</option>
                                        <?php foreach($arr_statuses as $item ){ ?>
                                            <option value="<?php echo $item->id; ?>" >
                                                <?php echo  $item->name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6 item_final" style="display: none">
                                <div class="form-group">
                                    <label>Final Status</label>
                                    <select id="final_status"  required class="form-control required_field_final" name="final_status">
                                        <option value="">--Select Final Status--</option>
                                        <?php foreach($arr_final_status as $key => $item ){ ?>
                                            <option value="<?php echo $key; ?>" >
                                                <?php echo  $item; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>



                        </div>

                        <input id="hidden_contact" type="hidden" name="contact_id" value="" >
                        <input id="hidden_followId" type="hidden" name="follow_id" value="" >

                        <div class="sec_1" style="display: none">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Application No</label>
                                        <input type="text" class="form-control required_field_status" name="invoice_no" >
                                    </div>
                                </div>
                            </div>

<!--                            <div class="col-md-12">-->
<!--                                <div class="col-md-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Models</label>-->
<!--                                        <input type="text" class="form-control" name="models" >-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-md-12">-->
<!--                                <div class="col-md-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Invoice Value</label>-->
<!--                                        <input type="text" class="form-control" name="invoice_value" >-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->


                        </div>

                        <div class="sec_2" style="display: none">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea class="form-control" name="reason1"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="sec_3" style="display: none">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea class="form-control" name="reason"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="row">

                            <div class="col-md-12">
                                <div align="right">
                                    <button type="submit"   id="status_save" class="btn btn-danger btn-lg" name="save"> Change</button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>

                <div class="modal-footer">


                </div>

            </div>

        </div>
    </div>


    <div class="modal fade" id="myModalFollow" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Followup</h4>
                </div>

                <div class="modal-body">

                    <!--                <div class="gif_loading_wrap" align="center "><img class="loading_img" src="--><?php //echo base_url('files/media/loading_gif.gif');?><!--"; ></div>-->

                    <form style="margin: 10px;" method="POST"
                          id="form_follow" class="form-horizontal form_follow" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Follow Up Date</label>
                                    <div  class='input-group date date_element' id='datetimepicker2'>
                                        <input required name="followup_date" id="followup_date" type='text' class="form-control " />

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        <span class="help-block "></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select id="type" required class="form-control required_field" name="type">
                                        <option value="">--Select Type--</option>
                                        <option value="1" >Call</option>
                                        <option value="2" >Email</option>
                                        <option value="3" >Meeting</option>
                                        <option value="4" >WhatsApp</option>
                                    </select>
                                    <span class="help-block "></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label> Reamrks</label>
                                    <textarea   type="text" name="private_note"  class="form-control required_field"></textarea>
                                    <span class="help-block "></span>
                                </div>
                            </div>
                        </div>

                        <input id="hidden_contact_follow" type="hidden" name="contact_id" value="" >



                        <div class="row">

                            <div class="col-md-12">
                                <div align="right">
                                    <button type="submit"   id="follow_save" class="btn btn-danger " name="save"> Save</button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>

                <div class="modal-footer">


                </div>

            </div>

        </div>
    </div>

    <div class="modal fade" id="myModalView" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Lead Details</h4>
                </div>

                <div class="modal-body" id="lead_content">

                    <div class="gif_loading_wrap" align="center "><img class="loading_img" src="<?php echo base_url('files/media/loading_gif.gif');?>"; ></div>


                </div>

                <div class="modal-footer">


                </div>

            </div>

        </div>
    </div>

    <div class="modal fade" id="myModalActivity" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Lead Activity Timeline</h4>
                </div>

                <div class="modal-body" id="activity_content">

                    <div class="gif_loading_wrap" align="center "><img class="loading_img" src="<?php echo base_url('files/media/loading_gif.gif');?>"; ></div>


                </div>

                <div class="modal-footer">


                </div>

            </div>

        </div>
    </div>


    <!-- BEGIN CONTENT -->
    <!-- END CONTENT -->
    <div class="modal fade" id="view_model" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="gif_loading_wrap" align="center "><img class="loading_img" src="<?php echo base_url('files/media/loading_gif.gif');?>"; ></div>

                </div>

            </div>

        </div>
    </div>