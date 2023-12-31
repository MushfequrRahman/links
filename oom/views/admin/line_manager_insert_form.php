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
                  <h3 class="box-title">Line Manager Insert</h3>
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
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/line_manager_insert" method="post" enctype="multipart/form-data">
                 	<div class="form-group">
						<label>Line Manager ID<em>*</em></label>
						<input type="text" class="form-control" name="lmuserid" placeholder="Enter Factory ID+Employee ID">
                    	<?php echo form_error('lmuserid', '<div class="error">', '</div>');  ?>
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


