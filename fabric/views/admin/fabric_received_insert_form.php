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
                  <h3 class="box-title">Fabric Received Insert</h3>
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
                <div class="box-body">
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/fabric_received_insert" method="post" enctype="multipart/form-data">
                 <div class="form-group">
					<label>Date<em>*</em></label>
					<input type="text" class="form-control pd" name="frcdate" readonly  id="pd" value="<?php echo date('d-m-Y');?>">
                 </div>
                 <div class="form-group">
					<label>Challan No<em>*</em></label>
					<input type="text" class="form-control" name="challanno" placeholder="Enter Challan No" value="<?php echo set_value('challanno'); ?>">
                    <?php echo form_error('challanno', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Supplier<em>*</em></label>
					<input type="text" class="form-control" placeholder="Enter Supplier">
                    <?php /*?><?php echo form_error('challanno', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                 <div class="form-group">
                        <label>Buyer Name<em>*</em></label>
                        <select class="form-control" name="buyerid" id="buyerid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('buyerid', '<div class="error">', '</div>');  ?>
                 </div>
                 <div class="form-group">
					<label>Job No<em>*</em></label>
					<select class="form-control" name="jobno" id="jobno">
                    	<option value="">Select....</option>
                        
                    </select>
                    <?php echo form_error('jobno', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Style No<em>*</em></label>
					<select class="form-control" name="style" id="style">
                    	<option value="">Select....</option>
                        
                    </select>
                    <?php echo form_error('style', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Order No<em>*</em></label>
					<select class="form-control" name="orderno" id="orderno">
                    	<option value="">Select....</option>
                        
                    </select>
                    <?php echo form_error('orderno', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Color<em>*</em></label>
					<select class="form-control" name="colorno" id="colorno">
                    	<option value="">Select....</option>
                        
                    </select>
                    <?php echo form_error('colorno', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Batch/Lot No<em>*</em></label>
					<input type="text" class="form-control" name="lotno" placeholder="Enter Batch/Lot No" value="<?php echo set_value('lotno'); ?>">
                    <?php echo form_error('lotno', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Dia(Inch)<em>*</em></label>
					<input type="text" class="form-control" name="dia" placeholder="Enter Dia(Only Digit)" value="<?php echo set_value('dia'); ?>">
                    <?php echo form_error('dia', '<div class="error">', '</div>');  ?>
				</div>
                
                <div class="form-group">
					<label>Received Qty<em>*</em></label>
					<input type="text" class="form-control" name="rqty" placeholder="Enter Received Qty" value="<?php echo set_value('rqty'); ?>">
                    <?php echo form_error('rqty', '<div class="error">', '</div>');  ?>
				</div>
                 <div class="form-group">
					<label>Rack No<em>*</em></label>
					<select class="form-control" name="racknoid" id="racknoid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul1 as $row1) {
                          ?>
                            <option value="<?php echo $row1['racknoid']; ?>"><?php echo $row1['rackno']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('racknoid', '<div class="error">', '</div>');  ?>
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

<script type="text/javascript">
$(document).ready(function(){

    $('#buyerid').change(function(event){
        event.preventDefault();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_jobno",
			dataType:"json",
                    data:{ buyerid:buyerid},
            success:function(res)
            	{
         		 	$('#jobno').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#jobno').append('<option value="'+data['jobnoid']+'">'+data['jobno']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#jobno').change(function(event){
        event.preventDefault();
		var jobno = $('#jobno').val();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_styleno",
			dataType:"json",
                    data:{ jobno:jobno,buyerid},
            success:function(res)
            	{
         		 	$('#style').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#style').append('<option value="'+data['styleid']+'">'+data['stylename']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#style').change(function(event){
        event.preventDefault();
		var jobno = $('#jobno').val();
		var style = $('#style').val();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_orderno",
			dataType:"json",
                    data:{ jobno:jobno,style:style,buyerid},
            success:function(res)
            	{
         		 	$('#orderno').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#orderno').append('<option value="'+data['orderid']+'">'+data['ordername']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#orderno').change(function(event){
        event.preventDefault();
		var orderno = $('#orderno').val();
		var style = $('#style').val();
		var jobno = $('#jobno').val();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_colorno",
			dataType:"json",
                    data:{ orderno:orderno,style:style,jobno:jobno,buyerid},
            success:function(res)
            	{
         		 	$('#colorno').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#colorno').append('<option value="'+data['colorid']+'">'+data['colorname']+'</option>');
          			});
				}
        	});
    	});
	});
</script>


</body>
</html>


