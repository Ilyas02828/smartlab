<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">
    <div class="card-header bg-info">
    <h4 class="mb-0 text-white">  EXPENCES BY DATE</h4>
</div>

            	<div class="row bg-primary" >

            <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label"> From Date</label>
                        <input type="date" name="from" id="from" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label"> To  Date</label>
                        <input type="date" name="todate" id="todate" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>
            	</div>

<div class="col-lg-12">
<div class="panel ">

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
    <tr class="bg-primary">
		<th>#</th>
		<th>Expance Name</th>
		<th>Amount</th>
		<th>Person Name </th>
		<th>Discription</th>
		<th>Date</th>
		</tr>
	</thead>
	<tbody id="display">

	</tbody>


</table>
</div>
</div>
</div>
</div>





                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

        <!-- footer -->
<script type="text/javascript">
	
  $('#todate').change(function()
  {
    var start_date = $('#from').val();
    var end_date = $('#todate').val();

  console.log(start_date);
    
      $.ajax({
        type : 'POST',
        url : 'ajax_by_expances.php',
        data  : {start_date,end_date},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

</script>
<script type="text/javascript">
  
  $('#from').change(function()
  {
    var start_date = $('#from').val();
      $.ajax({
        type : 'POST',
        url : 'ajax_by_expances_date.php',
        data  : {start_date},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

</script>