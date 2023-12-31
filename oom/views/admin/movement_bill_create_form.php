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
                  <h3 class="box-title">Bill Create</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php if($responce = $this->session->flashdata('Successfully')): ?>
								<div class="text-center">
									<div class="alert alert-success text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?>
						</div>
					</div>
              
                </div>
                <!-- /.box-header -->
                <div class="box-body">
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/movement_bill_insert" method="post" enctype="multipart/form-data">
                 	<div class="form-group">
						<input type="hidden" class="form-control" name="mtoken" value="<?php echo $mtoken;?>">
					</div>
                 	<div class="form-group">
						<label>Transport</label>
						<input type="text" class="form-control" name="transport" alue="<?php echo set_value('transport'); ?>" placeholder="Enter Transport(Only Digit)">
					</div>
                    <div class="form-group">
						<label>Food/Tiffin</label>
						<input type="text" class="form-control" name="tiffin" alue="<?php echo set_value('tiffin'); ?>" placeholder="Enter Food/Tiffin(Only Digit)">
					</div>
                    <div class="form-group">
						<label>Accomodation</label>
						<input type="text" class="form-control" name="accomodation" alue="<?php echo set_value('accomodation'); ?>" placeholder="Enter Accomodation(Only Digit)">
					</div>
                    <div class="form-group">
						<label>Gift</label>
						<input type="text" class="form-control" name="gift" alue="<?php echo set_value('gift'); ?>" placeholder="Enter Gift(Only Digit)">
					</div>
                    <div class="form-group">
						<label>Others</label>
						<input type="text" class="form-control" name="others" alue="<?php echo set_value('others'); ?>" placeholder="Enter Others(Only Digit)">
					</div>
               		<div class="box-footer text-center">
                  		<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                	</div>
                    
				 </form>
				</div>
                
                
                
              </div>
             
            </div>
            
          </div>
          

        
          
        </div>
        

        
      </div>
      
    </section>
    
  </div>
  

  
</div>


</body>
</html>


