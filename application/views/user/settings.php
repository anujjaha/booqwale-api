<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_contact','enctype'=>'multipart/form-data', 'onsubmit' => 'return validateForm();');
echo form_open('user/settings', $attributes);
?>  

<style>
.height-55  {
  height:55px;
}

</style>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-5">
      <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Site Details</h3>
      </div>
      
      <?php
        $settingArr = array();
        foreach($settings as $setting)
        {
          $settingArr[$setting['site_key']] = $setting['site_value'];
        }
      ?>
      
      <div class="box-body">
      Default Title
      <?php
      $default_name = array( 
        'name'     =>'PAGE_DEFAULT_TITLE',
        'class'    =>'form-control',
        'required' =>'required',
        'value'    => $settingArr['PAGE_DEFAULT_TITLE']
      );  
      echo form_input($default_name);
      ?>
      </div>
            
      <div class="box-body">
      Site Short Title
      <?php
      $short_name = array( 
        'name'  => 'SITE_SHORT_TITlE',
        'class' => 'form-control',
        'value' => $settingArr['SITE_SHORT_TITlE']
      );  
      echo form_input($short_name);
      ?>
      </div>
      
      <div class="box-body">
      Site Full Title
      <?php
      $full_title = array(
        'name'=>'SITE_FULL_TITlE',
        'class'=>'form-control',
        'required'=>'required',
        'value' => $settingArr['SITE_FULL_TITlE']
      );  
      echo form_input($full_title);
      ?>
      </div>

      <div class="box-body">
      Company Title
      <?php
      $company_title = array(
        'name'=>'COMPNAY_TITLE',
        'class'=>'form-control',
        'value' => $settingArr['COMPNAY_TITLE']
      );  
      echo form_input($company_title);
      ?>
      </div>

      <div class="box-body">
      Site Title
      <?php
      $site_title = array(
        'name'=>'SITE_TITLE',
        'class'=>'form-control',
        'value' => $settingArr['SITE_TITLE']
      );  
      echo form_input($site_title);
      ?>
      </div>
      </div>
      
    </div>

    <div class="col-md-5">
      <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Set Signature</h3>
      </div>
     
      <div class="box-body">
        <textarea name="editor1"  id="my_editor"><?php echo $settingArr['SITE_SIGNATURE'];?></textarea>
          <iframe id="form_target" name="form_target" style="display:none"></iframe>
      </div>

      
    </div>
        
      </div><!-- /.box -->
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

  $htmlContent = array(
          'name' => 'html_content',
          'id'   => 'html_content',
          'type' => 'hidden'
        );
  echo form_input($htmlContent);

  echo form_submit('submit', 'Save',$submit);
  echo form_reset('reset', 'Reset',$reset);
?>
</form>
</div>
</div>
</div>
<iframe id="form_target" name="form_target" style="display:none"></iframe>
<form id="my_form" action="<?php echo site_url();?>email/uploadImage" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
<input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
</form>

<!--Java Script Block-->
<script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function() {

//Tiny Mce Editor
tinymce.init({
  selector: 'textarea',
  relative_urls : false,
  remove_script_host : false,
  convert_urls : true,
  automatic_uploads: true,
  height: 300,
  theme: 'modern',
  plugins: [
    'image',
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//www.tinymce.com/css/codepen.min.css'
  ],
  file_browser_callback: function(field_name, url, type, win) {
    if(type=='image')
    {
      $('#my_form input').click();  
    } 
  }
   });
});

function validateForm()
{
  tinyMCE.triggerSave();
  var content =$('#my_editor').val();
  jQuery("#html_content").val(content);
  return true;
}
</script>