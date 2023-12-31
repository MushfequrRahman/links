<style>
.error{color:red;}
em{color:red;}
</style>
<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	})
</script> 
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
    		<section class="content">
    			<div class="row">
        			<div class="col-md-12">
      					<div class="row">
           					<div class="col-md-12">
								<div class="box box-danger">
									<div class="box-header with-border">
									<h3 class="box-title">Fabric Issue</h3>
								</div>
								<div class="box-body">
									<form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/fabric_delivery_insert" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<input type="hidden" class="form-control" name="fabricreceivedid" value="<?php echo $fabricreceivedid;?>">
										</div>
                                        <div class="form-group">
                        					<label>Type<em>*</em></label>
                        					<select class="form-control" name="fabricideliverytypeid" id="fabricdeliverytypeid">
                          						<option value="">Select....</option>
                          						<?php
                          							foreach ($ul as $row) 
														{
                          						?>
                            								<option value="<?php echo $row['fabricideliverytypeid']; ?>"><?php echo $row['fabricdeliverytype']; ?></option>
                          						<?php
                          								}
                          						?>
                        					</select>
                        						<?php echo form_error('fabricdeliverytypeid', '<div class="error">', '</div>');  ?>
                 						</div>
                                        <div class="form-group">
                                        	<label>Amount<em>*</em></label>
											<input type="text" class="form-control" name="amout" placeholder="Enter Issue Amount">
                                            <?php echo form_error('amount', '<div class="error">', '</div>');  ?>
										</div>
                                        <div class="form-group">
                                        	<label>Challan Number<em>*</em></label>
											<input type="text" class="form-control" name="challan" placeholder="Enter Challan">
                                            <?php echo form_error('challan', '<div class="error">', '</div>');  ?>
									   </div>
                					   <div class="form-group">
											<label>Issue Date<em>*</em></label>
											<input type="text" class="form-control pd" name="ddate" readonly id="pd" value="<?php echo date('d-m-Y');?>">
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
</body>
</html>


