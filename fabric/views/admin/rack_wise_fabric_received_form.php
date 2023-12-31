<style>
.error{color:red;}
em{color:red;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      

      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
      
          <div class="row">
           
            <!-- /.col -->

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Rack Wise Fabric Received/Delivery List</h3>
					
              
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                	<div class="col-sm-12 col-md-5 col-lg-5">
					<div class="form-group">
                        <label>Rack Name<em>*</em></label>
                        <select class="form-control" name="racknoid" id="racknoid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['racknoid']; ?>"><?php echo $row['rackno']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('rackid', '<div class="error">', '</div>');  ?>
                 </div>
                    
				</div>
                
                <div class="col-sm-12 col-md-2 col-lg-2">
                <label>&nbsp;</label>
                  <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                </div>
               </div>
                <!-- /.box-body -->
                
				 <!--</form>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div id="ajax-content-container">
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->
<script>
    $(document).ready(function(){
        $( "#btn" ).click(function(event)
        {
            event.preventDefault();
            var racknoid= $("#racknoid").val();
            $.ajax(
                {
                    type:'post',
                    url: '<?php echo base_url(); ?>Dashboard/rack_wise_fabric_received_list',
					dataType:"text",
                    data:{ racknoid:racknoid},
					      success: function(data) 
						  	{
       					  		$('#ajax-content-container').html(data);
								
      						},
	  					error: function(){
    					alert('error!');
  				}
                    
                });
        });
    });
</script>


</body>
</html>


