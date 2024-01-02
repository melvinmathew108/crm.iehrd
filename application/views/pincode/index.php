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
                    <span>City </span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">City <hr /></h3>
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

                        <table class="table table-striped table-bordered table-hover " id="pincode-tbl"
                               data-url="<?php echo site_url('pincode/get_all');?>">
                            <thead>
                            <tr>

                                <th> District </th>
                                <th> Pincode </th>
                                <th> City </th>

                                <th class="text-center"> Actions </th>
                            </tr>

                            <tr role="row" class="filter">
                                <td class="filter-cw-td">
                                    <select  class="form-control  form-filter category_id" name="district_name">
                                        <option value="">--District--</option>
                                        <?php foreach($arr_district as $item ){ ?>
                                            <option value="<?php echo $item->id; ?>" >
                                                <?php echo  $item->name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td class="filter-cw-td">
                                    <input type="text" name="pincode" placeholder="Pincode" id="pincode"
                                           class="form-control form-filter input-sm" value=""></td>
                                </td>

                                <td class="filter-cw-td">
                                    <input type="text" name="post_office_name" placeholder="City" id="post_office_name"
                                           class="form-control form-filter input-sm" value=""></td>
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