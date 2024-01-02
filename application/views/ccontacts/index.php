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

                <div class="col-md-12">

                    <div class="table-container">

                        <table class="table table-striped table-bordered table-hover " id="contacts-tbl"
                               data-url="<?php echo site_url('cleads/get_all/'.$search_type);?>">
                            <thead>
                            <tr>

                                <th> Customer Name </th>
                                <th> Closed Date </th>
                                <th> Final Status </th>
                                <th> Sales charge </th>
                                <th> Cost </th>
                                <th> Phone </th>
                                <th> Status </th>

                                <th class="text-center">More Action </th>
                            </tr>

                            <tr role="row" class="filter">

                                <td class="filter-cw-td"></td>
                                <td class="filter-cw-td"></td>
                                <td class="filter-cw-td">

                                    <select  class="form-control  form-filter statuses" name="final_stat">
                                        <option value="">--Final Status--</option>
                                        <?php foreach($arr_final_status as $key => $item ){

                                            ?>
                                            <option value="<?php echo $key; ?>" >
                                                <?php echo  $item; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td class="filter-cw-td">
                                    <select  class="form-control  form-filter statuses" name="sales_id">
                                        <option value="">--Sales Incharge--</option>
                                        <?php foreach($arr_sales as $item ){

                                            ?>
                                            <option value="<?php echo $item->id ?>" >
                                                <?php echo  $item->first_name.' '.$item->last_name;; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>


                                <td class="filter-cw-td"></td>
                                <td class="filter-cw-td"></td>

                                <td class="filter-cw-td">
                                    <select  class="form-control  form-filter statuses" name="statuses">
                                        <option value="">--Status--</option>
                                        <?php foreach($arr_statuses as $item ){

                                            if($item->id !=2 ){
                                                continue;
                                            }
                                            ?>
                                            <option value="<?php echo $item->id; ?>" >
                                                <?php echo  $item->name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td class="filter-cw-td">

                                    <button class="btn btn-xs green btn-outline filter-submit margin-bottom">
                                        <i class="fa fa-search"></i>
                                    </button>

                                    <button class="btn btn-xs red btn-outline filter-cancel">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            </thead>

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
                                <select id="final_status"  required class="form-control" name="final_status">
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
                                    <label>Invoice No</label>
                                    <input type="text" class="form-control" name="invoice_no" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Models</label>
                                    <input type="text" class="form-control" name="models" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Invoice Value</label>
                                    <input type="text" class="form-control" name="invoice_value" >
                                </div>
                            </div>
                        </div>


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