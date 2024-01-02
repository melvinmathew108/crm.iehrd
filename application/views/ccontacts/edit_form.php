<script>
    var group_id = "<?php echo $this->user->group_id?>";
</script>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .gif_loading_wrap{
        width: 100% !important;
        background-color: #FAFCFA !important;
        text-align: center !important;
    }
    .loading_img{
        height: 70px;
    }
</style>

<script>


</script>
<style>

    .form-horizontal .form-group {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }
    .btn{
        border: none;
        margin-top: 17px;
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
            <a href="<?php echo site_url('');?>"> Edit</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Edit Lead <hr /></h3>

<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<form method="POST" id="lead_form"  class="form-horizontal lead_form" enctype="multipart/form-data">

<!--            <p>Basic Information</p>-->

<input type="hidden" name="id" value="<?php echo $row['id'];?>">

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label>Customer Name</label>
            <input id="first_name"  type="text" name="first_name"
                   value="<?php echo $row['first_name'];?>" class="form-control required_field">
            <span class="help-block "></span>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Customer Phone</label>
            <input id="phone"  type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control required_field">
            <span class="help-block "></span>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Customer Email</label>
            <input id="email"  type="text" name="email" value="<?php echo $row['email'];?>" class="form-control">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Lead ID</label>
            <input id=""  type="text" name="lead_id" value="<?php echo $row['lead_id'];?>" class="form-control">
        </div>
    </div>


    <div class="col-md-2">
        <div class="form-group">
            <label>Lead Touch Date</label>
            <div class='input-group date date_element' id='datetimepicker3'>
                <input value="<?php echo $touch_date; ?>"   name="touch_date" id="touch_date" type='text' class="form-control " />

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                <span class="help-block "></span>
            </div>
        </div>
    </div>


    <div class="col-md-2">
        <div class="form-group">
            <label>Source</label>
            <select
                id="source_id" class="form-control source_id" name="source_id">
                <option value="">--Source--</option>
                <?php foreach($arr_source as $source ){ ?>
                    <option value="<?php echo $source->id; ?>"
                        <?php echo ($row['source_id']== $source->id)?"selected":''; ?>>
                        <?php echo $source->name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block "></span>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Country</label>
            <select data-url="<?php echo site_url('leads/get_state');?>"
                    id="country_id" class="form-control country_id " name="country_id">
                <option value="">--Country--</option>
                <?php foreach($arr_country as $country ){ ?>
                    <option value="<?php echo $country->id; ?>"
                        <?php echo ($row['country_id']== $country->id)?"selected":''; ?> >
                        <?php echo $country->name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block "></span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>State</label>
            <select data-url="<?php echo site_url('leads/get_city');?>"
                    id="state_id" class="form-control state_id required_field" name="state_id">
                <option value="">--State--</option>
                <?php foreach($arr_state as $state ){ ?>
                    <option value="<?php echo $state->id; ?>"
                        <?php echo ($row['state_id']== $state->id)?"selected":''; ?> >
                        <?php echo $state->name; ?>
                    </option>
                <?php } ?>

            </select>
            <span class="help-block "></span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>District</label>
            <select id="city_id" class="form-control city_id required_field" name="city_id">
                <option value="">--District--</option>
                <?php foreach($arr_city as $city ){ ?>
                    <option value="<?php echo $city->id; ?>"
                        <?php echo ($row['city_id']== $city->id)?"selected":''; ?> >
                        <?php echo $city->name; ?>
                    </option>
                <?php } ?>

            </select>
            <span class="help-block "></span>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>City</label>
            <input  id=""  type="text" value="<?php echo $row['city_name']; ?>"
                    name="city_name"
                    class="form-control cost required_field" >
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label>Type</label>
            <select
                id="type_id" class="form-control type_id" name="type_id">
                <option value="">--Type--</option>
                <?php foreach($arr_type as $type ){ ?>
                    <option value="<?php echo $type->id; ?>"
                        <?php echo ($row['type_id']== $type->id)?"selected":''; ?> >
                        <?php echo $type->name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block "></span>
        </div>
    </div>
</div>

<!--            <p>Assign Agent</p>-->

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Sales Incharge</label>
            <select
                id="user_id" class="form-control user_id " name="user_id">
                <option value="">--Name--</option>
                <?php foreach($arr_agent as $agent ){ ?>
                    <option value="<?php echo $agent->id; ?>"
                        <?php echo ( $this->user->group_id != 1 && $agent->id == $this->user->id)?'selected':'';?>
                        <?php echo ($row['user_id']== $agent->id)?"selected":''; ?> >
                        <?php echo $agent->first_name.' '.$agent->last_name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block "></span>
        </div>
    </div>

    <?php if ( $this->user->group_id != 1){ ?>
        <input type="hidden" name="user_id" value="<?php echo $this->user->id; ?>">
    <?php } ?>

    <div class="col-md-3">
        <div class="form-group">
            <label>Status</label>
            <select
                id="status_id" class="form-control status_id required_field" name="status_id">
                <option value="">--Status--</option>
                <?php foreach($arr_status as $status ){ ?>
                    <option value="<?php echo $status->id; ?>"
                        <?php echo ($row['status_id']== $status->id)?"selected":''; ?> >
                        <?php echo $status->name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block "></span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Followup Type </label>
            <select
                id="type" class="form-control type required_field" name="type">
                <option value="">--Select Type--</option>
                <option value="1" <?php echo ($row_followup->type== 1)?"selected":''; ?>  >Call</option>
                <option value="2" <?php echo ($row_followup->type== 2)?"selected":''; ?>>Email</option>
                <option value="3" <?php echo ($row_followup->type== 3)?"selected":''; ?>>Meeting</option>
                <option value="3" <?php echo ($row_followup->type== 4)?"selected":''; ?>>WhatsApp</option>
            </select>
            <span class="help-block "></span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Follow Up Date</label>
            <div class='input-group date date_element' id='datetimepicker2'>
                <input value="<?php echo $followup_date; ?>"   name="followup_date" id="followup_date" type='text' class="form-control " />

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                <span class="help-block "></span>
            </div>
        </div>
    </div>



</div>

<?php /*

<div class="add_more_wrap">

<?php foreach($arr_products as $key_row => $item_row){ ?>

    <div class="row add_more_row" id="add_more_row_<?php echo $key_row;?>">

        <div class="col-md-3">
            <div class="form-group">
                <label>Inquiry For</label>
                <select data-row_id="0" data-url="<?php echo site_url('leads/cost'); ?>"
                        class="form-control product_id required_field" name="product_id[]">
                    <option value="">--Inquiry For--</option>
                    <?php foreach($arr_product as $key => $item ){ ?>
                        <option value="<?php echo $item->id; ?>"
                            <?php echo ($item_row->product_id== $item->id)?"selected":''; ?>>
                            <?php echo  $item->name; ?>
                        </option>
                    <?php } ?>
                </select>
                <span class="help-block err_required"></span>
            </div>
        </div>




        <div class="col-md-2">
            <div class="form-group">
                <label>Cost</label>
                <input  id="cost_<?php echo $key_row;?>" data-cost="<?php echo $key_row;?>" type="number"
                        value="<?php echo $item_row->cost;?>" data-row_id="<?php echo $key_row;?>"
                        name="cost[]"
                        class="form-control cost required_field" >
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <button
                    data-row_id="<?php echo $key_row==0?count($arr_products):$key_row;?>"
                    id="<?php echo $key_row==0?'btn_add_more':'';?>" type="button"
                    class="btn btn-default btn-lg <?php echo $key_row!=0?'btn_delete_more':'';?>">
                    <span class="glyphicon glyphicon-<?php echo $key_row==0?'plus':'minus';?>"
                          aria-hidden="true" style="color:orangered"></span>
                </button>
            </div>
        </div>


    </div>

<?php } ?>


</div> */ ?>


<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>Inquiry For</label>
            <select data-row_id="0" data-url="<?php echo site_url('leads/cost'); ?>"
                    class="form-control  required_field" name="product_id">
                <option value="">--Inquiry For--</option>
                <?php foreach($arr_categories as $key => $item ){ ?>
                    <option value="<?php echo $item->id; ?>" <?php echo ($row['product_id']== $item->id)?"selected":''; ?>>
                        <?php echo  $item->name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block err_required"></span>
        </div>
    </div>




    <div class="col-md-2">
        <div class="form-group">
            <label>Cost</label>
            <input  id="cost_0" data-cost="0" type="number" value="<?php echo $row['cost'];?>" data-row_id="0"
                    name="cost"
                    class="form-control  required_field" >
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Company  Name</label>
            <input id="company_name"  type="text" name="company_name" value="<?php echo $row['company_name'];?>" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Company  Phone</label>
            <input id="company_phone"  type="text" name="company_phone" value="<?php echo $row['company_phone'];?>" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Company  Email</label>
            <input id="company_email"  type="text" name="company_email" value="<?php echo $row['company_email'];?>" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Company  Website</label>
            <input id="company_website"  type="text" name="company_website" value="<?php echo $row['company_website'];?>" class="form-control">
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Feed Back</label>
            <select
                id="cgroup_id" class="form-control cgroup_id" name="cgroup_id">
                <option value="">--Status--</option>
                <?php foreach($arr_cgroups as $groups ){ ?>
                    <option value="<?php echo $groups->id; ?>"
                        <?php echo ($row['cgroup_id']== $groups->id)?"selected":''; ?> >
                        <?php echo $groups->name; ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block "></span>
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group">
            <label>Additional Reamrks</label>
            <textarea   type="text" name="private_note"  class="form-control"><?php echo $row_followup->remark;?></textarea>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4 pull-right">
        <button type="submit" id="save_details" name="save" class="btn btn-danger col-md-12">Save</button>
    </div>
</div>


</form>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


<div id="add_more_template" style="display: none">

    <div class="row add_more_row" id="add_more_row_tem_row_id">


        <div class="col-md-3">
            <div class="form-group">
                <label>Inquiry For</label>
                <select id="product_id_tem_row_id" data-row_id="tem_row_id" data-url="<?php echo site_url('leads/cost'); ?>"
                        class="form-control product_id tem_required_field" name="product_id[]">
                    <option value="">--Inquiry For--</option>
                    <?php foreach($arr_product as $key => $item ){ ?>
                        <option value="<?php echo $item->id; ?>" >
                            <?php echo  $item->name; ?>
                        </option>
                    <?php } ?>
                </select>
                <span class="help-block err_required"></span>
            </div>
        </div>




        <div class="col-md-2">
            <div class="form-group">
                <label>Cost</label>
                <input  id="cost_tem_row_id" data-cost="0" type="number" value="0" data-row_id="tem_row_id"
                        name="cost[]"
                        class="form-control cost tem_required_field" >
            </div>
        </div>


        <div class="col-md-1">
            <div class="form-group">
                <button data-row_id="tem_row_id" id="" type="button" class="btn btn-default btn-lg btn_delete_more">
                    <span class="glyphicon glyphicon-minus" aria-hidden="true" style="color:orangered"></span>
                </button>
            </div>
        </div>


    </div>

</div>

