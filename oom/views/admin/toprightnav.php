<?php error_reporting(0);?>
 <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!--<span class="logo-mini"><b>HARMO</b>NIZER</span>-->
      <span class="logo-mini"><img style="width:35px; height:35px;" src="<?php echo base_url().'assets/images/babylon.png';?>" alt="logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width:115px; height:35px;margin: 7px 0 0 0;" src="<?php echo base_url().'assets/images/babylon.png';?>" alt="logo"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     
      
      <div class="navbar-custom-menu">
       
        <ul class="nav navbar-nav">
          
              
              
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                

                <p>
                  <?php echo $this->session->userdata('name');?>
                  <small><?php echo $this->session->userdata('unit');?></small>
                </p>
              </li>
         
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="text-center">
                  <a href="<?php echo base_url();?>User_Login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
   
        </ul>
      </div>
	  <!--<div class="center-navbar">Support:&nbsp;Arif&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;<span>01842493349</span>&nbsp;&nbsp;||&nbsp;&nbsp;Parvez&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;<span>01675184716</span></div>-->
    </nav>
  </header>