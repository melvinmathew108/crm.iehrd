<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->

        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">



                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Lead Details</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li id="personal_info" class="active" >
                                    <a href="#tab_1_1" data-toggle="tab">Basic Info</a>
                                </li>
                                <li id="profile_pic"  >
                                    <a href="#tab_1_2" data-toggle="tab">Follow Up Info</a>
                                </li>
                                <li id="user_password" >
                                    <a href="#tab_1_3" data-toggle="tab">Company Info</a>
                                </li>
                                <!-- <li>
                                    <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->

                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong><small class="text-danger">Full Name</small></strong></td>
                                                <td colspan="3"><?php echo $row_contacts->first_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Email</small></strong></td>
                                                <td><?php echo $row_contacts->email; ?></td>
                                                <td><strong><small class="text-danger">Phone</small></strong></td>
                                                <td><?php echo $row_contacts->phone; ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong><small class="text-danger">Source</small></strong></td>
                                                <td><?php echo $row_contacts->source; ?></td>
                                                <td><strong><small class="text-danger">Type</small></strong></td>
                                                <td><?php echo $row_contacts->type; ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong><small class="text-danger">Status</small></strong></td>
                                                <td colspan="3"><?php echo $row_contacts->statusName; ?> </td>
                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Feed Back</small></strong></td>
                                                <td><?php echo $row_contacts->feed_back; ?></td>

                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Address</small></strong></td>
                                                <td colspan="3"> <?php echo $row_contacts->country.' ,'.$row_contacts->state.' ,'.$row_contacts->city; ?> </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->

                                <div class="tab-pane " id="tab_1_2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong><small class="text-danger">Products</small></strong></td>
                                                <td colspan="3">

                                                    <p><?php echo $row_contacts->product.' - '.$row_contacts->cost; ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Source</small></strong></td>
                                                <td><?php echo $row_contacts->source; ?></td>
                                                <td><strong><small class="text-danger">Type</small></strong></td>
                                                <td><?php echo $row_contacts->type; ?> </td>
                                            </tr>

                                            <tr>
                                                <td><strong><small class="text-danger">Final Status</small></strong></td>
                                                <td><?php echo get_final_status($row_contacts->final_status); ?></td>
                                                <td><strong><small class="text-danger">Brand Name</small></strong></td>
                                                <td><?php echo $row_contacts->brand_name; ?> </td>
                                            </tr>

                                            <tr>
                                                <td><strong><small class="text-danger">Invoice No</small></strong></td>
                                                <td><?php echo get_final_status($row_contacts->invoice_no); ?></td>
                                                <td><strong><small class="text-danger">Models</small></strong></td>
                                                <td><?php echo $row_contacts->models; ?> </td>
                                                <td><strong><small class="text-danger">Invoice Value</small></strong></td>
                                                <td><?php echo get_final_status($row_contacts->invoice_value); ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong><small class="text-danger">Reason</small></strong></td>
                                                <td><?php echo $row_contacts->reason; ?></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="clearfix"></div>

                                    <h4>Folloup History</h4>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Folloup Date</th>
                                                <th>Type</th>
                                                <th>Remarks</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach($arr_follow as $follo){

                                                $followup_date = $follo->followup_date;
                                                $followup_date = new DateTime($followup_date);
                                                $followup_date = $followup_date->format('F j, Y, g:i a');

                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $followup_date; ?>
                                                    </td>

                                                    <td>
                                                        <i class="ti-mobile"></i>
                                                        <?php echo get_follow_type($follo->type);?>
                                                    </td>

                                                    <td><?php echo $follo->remark;?> </td>
                                                </tr>


                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->

                                <div class="tab-pane " id="tab_1_3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong><small class="text-danger">Company name</small></strong></td>
                                                <td colspan="3"><?php echo $row_contacts->company_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Company Phone/Mobile</small></strong></td>
                                                <td colspan="3"><?php echo $row_contacts->phone; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Company E-Mail</small></strong></td>
                                                <td colspan="3"><?php echo $row_contacts->email; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong><small class="text-danger">Company Website</small></strong></td>
                                                <td colspan="3"> <?php echo $row_contacts->company_website; ?> </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

