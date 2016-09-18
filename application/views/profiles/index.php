
            <link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/datatable/css/jquery.dataTables.css">
            <script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/datatable/js/jquery.dataTables.js"></script>
            <script>
            jQuery(document).ready(function() {
                     jQuery("#datatable").DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "paging": true,
                    "iDisplayLength": 10,
                    "bPaginate": true,
                    "bServerSide": true,
                    "bSort": false,
                    "ajax": "<?php echo site_url();?>profiles/ajax_list"
                } );
            } );
            </script>
            
            <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url();?>/profiles/add">Add New Profiles </a>
            </div>
            <div class="col-md-12">
            <table id="datatable"  class="table table-bordered" width="100%">
            <thead>
                <tr>
                <th>Sr.</th><th>
                         Name</th><th>
                         Age</th><th>
                         Mobile</th><th>
                         Contact_number</th><th>
                         Email_id</th><th>Edit</th><th>Delete</th><thead></tr></table>
                    </div></div>
                    </div>