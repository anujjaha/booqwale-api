<section class="content-header">
  <h1>
    <?php if(isset($page_title)) { echo  $page_title; }else { echo PAGE_DEFAULT_TITLE; }?>
    <small>
      <?php if(isset($page_sub_title)) { echo  $page_sub_title; }else { echo PAGE_DEFAULT_TITLE; }?>
    </small>
  </h1>

  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>

    <li class="active">
      Dashboard
    </li>
  </ol>
</section>
