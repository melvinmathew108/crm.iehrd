<form method="post"  class="district_form" id="district_form" enctype="multipart/form-data">
    <div class="row product">

        <div class="col-md-12">

            <div class="form-group">
                <label class="control-label">District</label>
                <input value="<?php echo $row_district->name; ?>" type="text" class="form-control"
                       name="name" id="name" autocomplete="off" placeholder="">
                <input type="hidden" id="district_id" name="district_id" value="<?php echo $row_district->id;?>">
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-danger btn-block col-md-12" name="save" id="save_details">Save</button>
                </div>
            </div>

        </div>
    </div>
</form>