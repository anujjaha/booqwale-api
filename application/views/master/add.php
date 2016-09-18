<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_user');
echo form_open('master/create', $attributes);
?>	
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Module</h3>
                </div>
			
                <div class="box-body">
                    Module Name
                    <?php
                    $module_name = array( 'name'=>'module_name',
                                            'id'=>'module_name',
                                            'class'=>'form-control',
                                            'required'=>'required'
                                                            );	
                            echo form_input($module_name);
                    ?>
                </div>
                
                <div class="box-body">
                    Module Alias Name
                    <?php
                    $module_alias_name = array( 'name'=>'module_alias_name',
                                            'id'=>'module_alias_name',
                                            'class'=>'form-control',
                                            'required'=>'required'
                                                            );	
                            echo form_input($module_alias_name);
                    ?>
                </div>
                
                <hr>
                Create Schema
                <hr>
                
                
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-1"> 
                            <label><input type="radio" name="primary" value="0"> Primary</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="field[]" placeholder="Field Name" class="form-control" required="required">
                        </div>
                        <div class="col-sm-2"> 
                            <select name="field_type[]" class="form-control" required="required" >
                                <option>Int</option>
                                <option>Varchar</option>
                            </select>
                        </div>
                        <div class="col-sm-2"> 
                            <input type="number" min="1" max="255" name="field_length[]"  placeholder="Length"  class="form-control" required="required">
                        </div>
                        <div class="col-sm-2"> 
                            <input type="text" name="field_comment[]" placeholder="Comments"  class="form-control">
                        </div>
                        <div class="col-sm-1"> 
                            <a  onclick="add_more();" href="javascript:void(0);">Plus</a>
                        </div>
                    </div>
                    
                    <div id="add_more_rows">
                        
                        
                    </div>
                    
                </div>
                </div>
        </div>
        
        <div class="col-md-10 text-center">
        <?php	
                $submit = array(
                                'id'    => 'submit',
                                'class' => 'btn btn-primary btn-flat'
                );

                $reset = array(
                                'id'    => 'submit',
                                'class' => 'btn btn-primary btn-flat'
                );

                echo form_submit('submit', 'Save',$submit);
                echo form_reset('reset', 'Reset',$reset);
        ?>
        </div>
    </div>
</div>
<script>
    var rowCount = 0;
    function add_more() {
        var id = rowCount++;
        var html ="";
        html = '<div id="added_row_'+rowCount+'" class="col-sm-12"><div class="col-sm-1"><label><input type="radio" name="primary" value="'+rowCount+'"> Primary</label></div><div class="col-sm-4"> <input type="text" name="field[]" placeholder="Field Name" required="required" class="form-control"></div><div class="col-sm-2">  <select name="field_type[]" class="form-control" required="required" ><option>Int</option><option>Varchar</option></select></div><div class="col-sm-2"> <input type="number" min="1" max="255" name="field_length[]" requried="required"  placeholder="Length"  class="form-control"></div><div class="col-sm-2"> <input type="text" name="field_comment[]" placeholder="Comments"  class="form-control"></div><div class="col-sm-1"> <a  onclick="remove_row('+rowCount+');" href="javascript:void(0);">Minus</a></div></div>';
        jQuery("#add_more_rows").append(html);
    }
    
    function remove_row(id) {
        jQuery("#added_row_"+id).remove();
    }
</script>        