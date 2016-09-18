<div class="container">
            <div class="row">
            <form action="<?php echo site_url();?>/profiles/edit" method="post">
                    <div class="col-md-12">
                            <div class="box box-success">
			<div class="box-header with-border">
                  <h3 class="box-title">Profiles</h3>
            </div><div class="box-body">
                         Name
                            <input type="text" value="<?php echo $record->name;?>" name="name" id="name" class="form-control">
                        </div><div class="box-body">
                         Age
                            <input type="text" value="<?php echo $record->age;?>" name="age" id="age" class="form-control">
                        </div><div class="box-body">
                         Mobile
                            <input type="text" value="<?php echo $record->mobile;?>" name="mobile" id="mobile" class="form-control">
                        </div><div class="box-body">
                         Contact_number
                            <input type="text" value="<?php echo $record->contact_number;?>" name="contact_number" id="contact_number" class="form-control">
                        </div><div class="box-body">
                         Email_id
                            <input type="text" value="<?php echo $record->email_id;?>" name="email_id" id="email_id" class="form-control">
                        </div></div></div>
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?php echo $record->id;?>">
                            <input type="submit" name="save" value="Save" class="btn btn-primary btn-flat">
                            <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-flat">
                        </div>
                    </form>
                    </div>
                    </div>