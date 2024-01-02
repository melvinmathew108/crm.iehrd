<style>

    .gif_loading_wrap{
        width: 100% !important;
        background-color: #FAFCFA !important;
        text-align: center !important;
    }
    .loading_img{
        height: 70px;
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
                    <span>Contacts </span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Contacts <hr /></h3>
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

                <div class="alert alert-success" id="follw_add_success" style="display: none">
                    <button class="close" data-close="alert"></button>
                    <span>Follow Up Added Successfully</span>
                </div>

                <div class="col-md-12" style="margin-bottom: 10px">

                    <a style="margin-left: 20px" href="<?php echo site_url('leads/create'); ?>" class="btn btn-info pull-right" > Add New </a>
                    <a href="<?php echo site_url('leads/import'); ?>" class="btn btn-danger pull-right" > Import </a>

                </div>


                <div class="col-md-12">

                    <form method="POST" id="form_billing"  class="form-inline" enctype="multipart/form-data">

                        <div class="form-group  col-md-3">

                            <select style="width: 90%" class="form-control" name="sales_id">

                                <option value="">Select</option>

                                <?php foreach($arr_sales as $row_sale ) { ?>


                                    <option value="<?php echo $row_sale->id;?>"
                                        <?php echo ($search['sales_id']==$row_sale->id)?"selected":''; ?>
                                        >
                                        <?php echo $row_sale->first_name.' '.$row_sale->last_name;?></option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group  col-md-3">
                            <input placeholder="Date From" style="width: 90%" id="date_from" value="<?php echo $search['date_from']; ?>"
                                   type="text" name="date_from" class="form-control date1234 date_from">
                        </div>

                        <div class="form-group  col-md-3">
                            <input placeholder="Date To" style="width: 90%" id="date_to" value="<?php echo $search['date_to']; ?>"
                                   type="text" name="date_to" class="form-control date1234 date_to">
                        </div>

                        <button type="submit" class="btn btn-primary col-md-3">Search</button>


                    </form>

                    <div class="clearfix"></div>


                    <div class="table-container" style="margin-top: 20px">

                        <table class="table table-striped table-bordered table-hover " id=""
                               data-url="">
                            <thead>
                            <tr>

                                <th> Name </th>
                                <th> Lead ID </th>
                                <th> Touch Date </th>
                                <th> District </th>
                                <th> Sales Incharge </th>
<!--                                <th> Customer Category </th>-->
                                <th> Phone </th>
                                <th> Status </th>

                                <th class="text-center">More Action </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if( is_array($result) && count($result) > 0 ){?>
                                <?php

                                foreach( $result as $key => $row ){

                                    $date = $row->touch_date;

                                    $touch_date = new DateTime($date);
                                    $touch_date = $touch_date = $touch_date->format('d/m/Y');


                                    $actions =  '
            <div class="center-block">

                <a title="Add FollowUp" id="add_followup" data-contactId="'.$row->id.'"
                class="btn btn-outline btn-circle btn-sm blue">
                <i class="fa fa-plus"></i> </a>

                <a title="View" id="view" data-contactId="'.$row->id.'"
                 class="btn btn-outline btn-circle btn-sm red" >
                <i class="fa fa-eye"></i> </a>

                <a title="Activity History" id="activity" data-contactId="'.$row->id.'"
                class="btn btn-outline btn-circle btn-sm btn-primary">
                <i class="fa fa-list"></i> </a>

                <a title="Edit" class="btn btn-outline btn-circle btn-sm yellow"
                href="'. site_url('leads/edit/'.encrypt($row->id)).'"
                >
                <i class="fa fa-edit"></i> </a>

                <a  class="btn btn-outline btn-circle btn-sm red"
                 href="'. site_url('leads/delete/'.encrypt($row->id)).'"

                 id="con_del"  >
                <i class="fa fa-trash-o"></i> </a>

           	</div>';


                                    $edit_status = '<span class="btn btn-outline btn-circle red" id="status_'.$row->id.'" style="color:'.$row->color.'" >'.$row->status_name.'</span>
                <a id="change_status" data-contactId="'.$row->id.'" title="Update" class="btn
                btn-outline btn-circle btn-sm yellow" >
                <i class="fa fa-edit"></i>  </a>';

                                    ?>

                                    <tr id="row_<?php echo $row->id;?>" role="row" class="">

                                        <td class=""><?php echo $row->first_name;?></td>
                                        <td class=""><?php echo $row->id;?></td>
                                        <td class=""><?php echo $touch_date;?></td>
                                        <td class=""><?php echo $row->district;?></td>
                                        <td class=""><?php echo $row->name1.' '.$row->name2;?></td>
<!--                                        <td class="">--><?php //echo $row->customer_cat;?><!--</td>-->
                                        <td class=""><?php echo $row->phone;?></td>
                                        <td class=""><?php echo $edit_status;?></td>
                                        <td class=""><?php echo $actions; ?></td>

                                    </tr>

                                <?php }} ?>

                            </tbody>

                            <?php if( $pagination ) {?>

                                <tfoot>
                                <tr>
                                    <td colspan="9">
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


        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
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

                    <div class="sec_1" style="display: none">

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Application No</label>
                                    <input type="text" class="form-control required_field_status" name="invoice_no" >
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="sec_2" style="display: none">

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>College Name</label>
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