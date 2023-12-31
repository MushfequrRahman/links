<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">OUT OF OFFICE MANAGEMENT</li>
			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '1') { ?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Line Manager</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/line_manager_insert_form"><i class="fa fa-circle-o"></i>Add Line Manager</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/linemanager_list"><i class="fa fa-circle-o"></i>Line Manager List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/user_list"><i class="fa fa-circle-o"></i>User List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
						
						
						
						
						
					</ul>
				</li>
				
				
			<?php
			} ?>

			<?php /*?><?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '2') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-money" aria-hidden="true"></i><span>Conveyance Bills</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-pencil" aria-hidden="true"></i><span>Bill Create</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/conveyance_insert_form"><i class="fa fa-circle-o"></i>For User</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/conveyanceguest_insert_form"><i class="fa fa-circle-o"></i>For Guest</a></li>

							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-file" aria-hidden="true"></i><span>Report</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
                            	<li class="treeview">
									<a href="#">
										<i class="fa fa-user" aria-hidden="true"></i><span>User</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_submit_conveyance_report_form"><i class="fa fa-circle-o"></i>Date Wise Submit/Print</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_bill_conveyance_report_form"><i class="fa fa-circle-o"></i>Date Wise Bill Summary</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_user_wise_bill_conveyance_report_form"><i class="fa fa-circle-o"></i>Date Wise User Summary</a></li>
									</ul>
								</li>
                                <li class="treeview">
									<a href="#">
										<i class="fa fa-users" aria-hidden="true"></i><span>Guest</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_submit_conveyanceguest_report_form"><i class="fa fa-circle-o"></i>Date Wise Submit/Print</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_bill_conveyanceguest_report_form"><i class="fa fa-circle-o"></i>Date Wise Bill Summary</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_user_wise_bill_conveyanceguest_report_form"><i class="fa fa-circle-o"></i>Date Wise User Summary</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-cutlery" aria-hidden="true"></i><span>Lunch Bills</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-pencil" aria-hidden="true"></i><span>Bill Create</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">

								<li><a href="<?php echo base_url(); ?>Dashboard/etiffin_insert_form"><i class="fa fa-circle-o"></i>For User</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/etiffinguest_insert_form"><i class="fa fa-circle-o"></i>For Guest</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-file" aria-hidden="true"></i><span>Report</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
                            <ul class="treeview-menu">
                            	<li class="treeview">
									<a href="#">
										<i class="fa fa-user" aria-hidden="true"></i><span>User</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_submit_etiffin_report_form"><i class="fa fa-circle-o"></i>Date Wise Submit/Print</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_bill_etiffin_report_form"><i class="fa fa-circle-o"></i>Date Wise Bill Summary</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_user_wise_bill_etiffin_report_form"><i class="fa fa-circle-o"></i>Date Wise User Summary</a></li>
									</ul>
								</li>
                                <li class="treeview">
									<a href="#">
										<i class="fa fa-users" aria-hidden="true"></i><span>Guest</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_submit_etiffinguest_report_form"><i class="fa fa-circle-o"></i>Date Wise Submit/Print</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_unit_wise_bill_etiffinguest_report_form"><i class="fa fa-circle-o"></i>Date Wise Bill Summary</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_user_wise_bill_etiffinguest_report_form"><i class="fa fa-circle-o"></i>Date Wise User  Summary</a></li>
									</ul>
								</li>
							</ul>
							
						</li>
					</ul>
				</li>
			<?php
			} ?><?php */?>




			<?php //endif;
			?>
		</ul>
	</section>
</aside>