<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
		 //$this->load->library('session');
		
			if(!$this->session->userdata('userid'))
				{
					redirect('User_Login');
				}
	 }
	 public function index()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Dashboard';
		$this->load->view('admin/head',$data);
		$userid=$this->session->userdata('userid');
		$usertype=$this->session->userdata('user_type');
		$factoryid=$this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav',$data);
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/dashboard',$data);
	}
	public function factory_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Factory Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/factory_insert_form',$data);
	}
	public function fac_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$facid=$this->form_validation->set_rules('facid', 'Factory ID', 'required');
			$facname=$this->form_validation->set_rules('facname', 'Factory Name', 'required');
			$fac_address=$this->form_validation->set_rules('fac_address', 'Factory Address', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->fac_insert_form();
				}
			else
				{
					$facid=$this->input->post('facid');
					$facname=$this->input->post('facname');
					$fac_address=$this->input->post('fac_address');
					$ins=$this->Admin->fac_insert($facid,$facname,$fac_address);
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/factory_insert_form','refresh');
				}
		}
	}
	public function factory_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Factory List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$this->load->view('admin/factory_list',$data);
	}
	public function factory_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Factory Info Update';
		$facid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['all_line']=$this->Admin->all_line();
		//$data['opskill']=$this->Admin->opskill($opid);
		$data['flup']=$this->Admin->factory_list_up($facid);
		$this->load->view('admin/factory_list_up',$data);
	 }
	 public function flup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$fid=$this->input->post('fid');
			$facid=$this->input->post('facid');
			$factoryname=$this->input->post('factoryname');
			$factory_address=$this->input->post('factory_address');
			
			$ins=$this->Admin->flup($fid,$facid,$factoryname,$factory_address);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/factory_list','refresh');
				
		}
	 }
	 public function department_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Department Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/department_insert_form',$data);
	}
	public function department_insert()
	  {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$department=$this->form_validation->set_rules('department', 'Department Name', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->department_insert_form();
				}
			else
				{
					$department=$this->input->post('department');
					$ins=$this->Admin->department_insert($department);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/department_insert_form','refresh');
				}
		}
	}
	public function department_list()
	 {
		
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Department List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->department_list();
		$this->load->view('admin/department_list',$data);
	 }
	 public function department_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Department Info Update';
		$deptid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup']=$this->Admin->department_list_up($deptid);
		$this->load->view('admin/department_list_up',$data);
	 }
	 public function departmentlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$deptid=$this->input->post('deptid');
			$departmentname=$this->input->post('departmentname');
			
			$ins=$this->Admin->departmentlup($deptid,$departmentname);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/department_list','refresh');
				
		}
	 }
	 public function designation_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Designation Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/designation_insert_form',$data);
	}
	public function designation_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$designation=$this->form_validation->set_rules('designation', 'Designation', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->designation_insert_form();
				}
			else
				{
					$designation=$this->input->post('designation');
					$ins=$this->Admin->designation_insert($designation);
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/designation_insert_form','refresh');
				}
		}
	}
	public function designation_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Designation List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->designation_list();
		$this->load->view('admin/designation_list',$data);
	}
	public function designation_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Designation Update';
		$designationid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup']=$this->Admin->designation_list_up($designationid);
		$this->load->view('admin/designation_list_up',$data);
	 }
	 public function designationlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$designation=$this->input->post('edesignation');
			$ins=$this->Admin->parentdesignationlup($designationid,$designation);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/designation_list','refresh');
		}
	 }
	  public function usertype_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Type Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/usertype_insert_form',$data);
	}
	public function usertype_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$usertype=$this->form_validation->set_rules('usertype', 'User type', 'required');
			 if($this->form_validation->run()==FALSE)
				{
					$this->usertype_insert_form();
				}
			else
				{
					$usertype=$this->input->post('usertype');
					$ins=$this->Admin->usertype_insert($usertype);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/usertype_insert_form','refresh');
				}
		}
	}
	public function usertype_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User type List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->usertype_list();
		$this->load->view('admin/usertype_list',$data);
	}
	 public function usertype_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Type Update';
		$usertypeid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		
		$data['dlup']=$this->Admin->usertype_list_up($usertypeid);
		$this->load->view('admin/usertype_list_up',$data);
	 }
	 public function usertypelup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$usertypeid=$this->input->post('usertypeid');
			$usertype=$this->input->post('usertype');
			
			$ins=$this->Admin->usertypelup($usertypeid,$usertype);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/usertype_list','refresh');
		}
	 }
	 public function userstatus_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Status Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/userstatus_insert_form',$data);
	}
	public function userstatus_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$userstatus=$this->form_validation->set_rules('userstatus', 'User Status', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->userstatus_insert_form();
				}
			else
				{
					$userstatus=$this->input->post('userstatus');
					
					$ins=$this->Admin->userstatus_insert($userstatus);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/userstatus_insert_form','refresh');
				}
		}
	}
	public function userstatus_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Status List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->userstatus_list();
		$this->load->view('admin/userstatus_list',$data);
	}
	 public function userstatus_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Status Info Update';
		$userstatusid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup']=$this->Admin->userstatus_list_up($userstatusid);
		$this->load->view('admin/userstatus_list_up',$data);
	 }
	 public function userstatuslup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$userstatusid=$this->input->post('userstatusid');
			$userstatus=$this->input->post('userstatus');
			
			$ins=$this->Admin->userstatuslup($userstatusid,$userstatus);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/userstatus_list','refresh');
		}
	 }
	 public function user_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->factory_list();
		$data['ul1']=$this->Admin->department_list();
		$data['ul2']=$this->Admin->designation_list();
		$data['ul3']=$this->Admin->usertype_list();
		$this->load->view('admin/user_insert_form',$data);
	 }
	public function user_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$factoryid=$this->input->post('factoryid');
			$departmentid=$this->input->post('departmentid');
			$name=$this->input->post('name');
			$designationid=$this->input->post('designationid');
			$oemail=$this->input->post('oemail');
			$pmobile=$this->input->post('pmobile');
			$usertypeid=$this->input->post('usertypeid');
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			$ins=$this->Admin->user_insert($factoryid,$departmentid,$designationid,$name,$oemail,$pmobile,$usertypeid,$userid,$password);
            		if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/user_insert_form','refresh');
				
		}
	}
	public function user_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$this->load->view('admin/user_list',$data);
	}
	public function factorywise_user_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User List';
		$factoryid = $this->input->post('factoryid');
		$data['ul']=$this->Admin->factorywise_user_list($factoryid);
		$this->load->view('admin/factorywise_user_list',$data);
	}
	
	
	 public function user_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Update';
		$userid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->factory_list();
		$data['ul1']=$this->Admin->department_list();
		$data['ul2']=$this->Admin->designation_list();
		$data['ul3']=$this->Admin->usertype_list();
		$data['ul4']=$this->Admin->userstatus_list();
		$data['ulup']=$this->Admin->user_list_up($userid);
		$this->load->view('admin/user_list_up',$data);
	 }
	 public function ulup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$factoryid=$this->input->post('factoryid');
			$departmentid=$this->input->post('departmentid');
			$name=$this->input->post('name');
			$designationid=$this->input->post('designationid');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$usertypeid=$this->input->post('usertypeid');
			$userstatusid=$this->input->post('userstatusid');
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			$indate=$this->input->post('indate');
			$userid=$this->input->post('userid');
					
					
						$ins=$this->Admin->ulup($factoryid,$departmentid,$designationid,$name,$email,$mobile,$usertypeid,$userstatusid,$userid,$password,$indate);
						if($ins==TRUE)
							{
								$this->session->set_flashdata('Successfully','Successfully Updated');
							}
						else
							{
								$this->session->set_flashdata('Successfully','Failed To Updated');
							}
					redirect('Dashboard/user_list','refresh');
		}
	 }
	 
	 ///////////////////////////////////////////////////////PRODUCT UOM/////////////////////////////////////////////
	 
	 public function product_uom_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product UOM Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/product_uom_insert_form',$data);
	 }
	 
	 public function product_uom_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$puom=$this->form_validation->set_rules('puom', 'Product UOM', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_uom_insert_form();
				}
			else
				{
					$puom=$this->input->post('puom');
					$ins=$this->Admin->product_uom_insert($puom);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_uom_insert_form','refresh');
				}
		}
	}
	 public function product_uom_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product UOM List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->product_uom_list();
		$this->load->view('admin/product_uom_list',$data);
	}
	public function product_uom_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product UOM Update';
		$puomid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['plup']=$this->Admin->product_uom_list_up($puomid);
		$this->load->view('admin/product_uom_list_up',$data);
	 }
	 public function productuomlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$puomid=$this->input->post('puomid');
			$puom=$this->input->post('puom');
			
			$ins=$this->Admin->productuomlup($puomid,$puom);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/product_uom_list','refresh');
		}
	 }
	 
	 ///////////////////////////////////////////////////////RACK NO/////////////////////////////////////////////
	 
	 public function rackno_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Rack No Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/rackno_insert_form',$data);
	 }
	 
	 public function rackno_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$rackno=$this->form_validation->set_rules('rackno', 'Rack Number', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->fabric_type_insert_form();
				}
			else
				{
					$rackno=$this->input->post('rackno');
					$ins=$this->Admin->rackno_insert($rackno);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/rackno_insert_form','refresh');
				}
		}
	}
	 public function rackno_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Rack No List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->rackno_list();
		$this->load->view('admin/rackno_list',$data);
	}
	 
	 ///////////////////////////////////////////////////////FABRIC TYPE/////////////////////////////////////////////
	 
	 public function fabric_type_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Fabric Type Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_type_insert_form',$data);
	 }
	 
	 public function fabric_type_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$fabrictype=$this->form_validation->set_rules('fabrictype', 'Fabric Type', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->fabric_type_insert_form();
				}
			else
				{
					$fabrictype=$this->input->post('fabrictype');
					$ins=$this->Admin->fabric_type_insert($fabrictype);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/fabric_type_insert_form','refresh');
				}
		}
	}
	 public function fabric_type_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Fabric Type List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->fabric_type_list();
		$this->load->view('admin/fabric_type_list',$data);
	}
	//public function product_uom_list_up()
//	 {
//		$this->load->database();
//		$this->load->model('Admin');
//		$data['title']='Product UOM Update';
//		$puomid= $this->uri->segment(3);
//		$this->load->view('admin/head',$data);
//		$this->load->view('admin/toprightnav');
//		$this->load->view('admin/leftmenu');
//		$data['plup']=$this->Admin->product_uom_list_up($puomid);
//		$this->load->view('admin/product_uom_list_up',$data);
//	 }
	 //public function productuomlup()
//	 {
//		$this->load->database();
//		$this->load->library('form_validation');
//		$this->load->model('Admin');
//		if($this->input->post('submit'))
//		{
//			$puomid=$this->input->post('puomid');
//			$puom=$this->input->post('puom');
//			
//			$ins=$this->Admin->productuomlup($puomid,$puom);
//			if($ins==TRUE)
//				{
//					$this->session->set_flashdata('Successfully','Successfully Updated');
//				}
//			else
//				{
//					$this->session->set_flashdata('Successfully','Failed To Updated');
//				}
//					redirect('Dashboard/product_uom_list','refresh');
//		}
//	 }
	 
	 		/////////////////////////////////////////////////////////BUYER/////////////////////////////////////////////////////////////
			
	public function buyer_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Buyer Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/buyer_insert_form',$data);
	 }
	 public function buyer_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$buyername=$this->form_validation->set_rules('buyername', 'Buyer', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->buyer_insert_form();
				}
			else
				{
					$buyername=$this->input->post('buyername');
					$ins=$this->Admin->buyer_insert($buyername);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/buyer_insert_form','refresh');
				}
		}
	}
	public function buyer_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Buyer List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->buyer_list();
		$this->load->view('admin/buyer_list',$data);
	}
	
		/////////////////////////////////////////////////////////JOB NO/////////////////////////////////////////////////////////////
			
	public function jobno_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Job No Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->buyer_list();
		$this->load->view('admin/jobno_insert_form',$data);
	 }
	 public function jobno_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$buyerid=$this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->jobno_insert_form();
				}
			else
				{
					$buyerid=$this->input->post('buyerid');
					$jobno=$this->input->post('jobno');
					$ins=$this->Admin->jobno_insert($jobno,$buyerid);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/jobno_insert_form','refresh');
				}
		}
	}
	public function jobno_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Job No List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->jobno_list();
		$this->load->view('admin/jobno_list',$data);
	}
	
	public function show_jobno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$data=$this->Admin->show_jobno($buyerid);
		echo json_encode($data); 
	}

				/////////////////////////////////////////////////////////STYLE/////////////////////////////////////////////////////////////

	public function style_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Style Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->buyer_list();
		$this->load->view('admin/style_insert_form',$data);
	 }
	 public function style_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$buyerid=$this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
			$stylename=$this->form_validation->set_rules('stylename', 'Style', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->style_insert_form();
				}
			else
				{
					$buyerid=$this->input->post('buyerid');
					$jobno=$this->input->post('jobno');
					$stylename=$this->input->post('stylename');
					$ins=$this->Admin->style_insert($jobno,$stylename,$buyerid);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/style_insert_form','refresh');
				}
		}
	}
	public function style_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Style List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->style_list();
		$this->load->view('admin/style_list',$data);
	}
	public function show_styleno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$jobno = $this->input->get('jobno');
		$buyerid = $this->input->get('buyerid');
		$data=$this->Admin->show_styleno($jobno,$buyerid);
		echo json_encode($data); 
	}
	
			/////////////////////////////////////////////////////////ORDER/////////////////////////////////////////////////////////////
			
	
			
	public function order_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Order Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->buyer_list();
		$this->load->view('admin/order_insert_form',$data);
	 }
	 public function order_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$buyerid=$this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
			$style=$this->form_validation->set_rules('style', 'Style', 'required');
			$ordername=$this->form_validation->set_rules('ordername', 'Order', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->order_insert_form();
				}
			else
				{
					$buyerid=$this->input->post('buyerid');
					$jobno=$this->input->post('jobno');
					$style=$this->input->post('style');
					$ordername=$this->input->post('ordername');
					$ins=$this->Admin->order_insert($jobno,$style,$ordername,$buyerid);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/order_insert_form','refresh');
				}
		}
	}
	public function order_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Order List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->order_list();
		$this->load->view('admin/order_list',$data);
	}
	
	public function show_orderno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$data=$this->Admin->show_orderno($buyerid,$jobno,$style);
		echo json_encode($data); 
	}
	
	/////////////////////////////////////////////////////////COLOR/////////////////////////////////////////////////////////////
			
	
			
	public function color_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Color Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->buyer_list();
		$data['ul1']=$this->Admin->fabric_type_list();
		$data['ul2']=$this->Admin->product_uom_list();
		$this->load->view('admin/color_insert_form',$data);
	 }
	 public function color_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$buyerid=$this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
			$style=$this->form_validation->set_rules('style', 'Style No', 'required');
			$orderno=$this->form_validation->set_rules('orderno', 'Order', 'required');
			$fabrictypeid=$this->form_validation->set_rules('fabrictypeid', 'Fabric Type', 'required');
			$gsm=$this->form_validation->set_rules('gsm', 'GSM', 'required');
			$bqty=$this->form_validation->set_rules('bqty', 'Booking Qty', 'required');
			$colorcode=$this->form_validation->set_rules('colorcode', 'Color Code', 'required');
			$colorname=$this->form_validation->set_rules('colorname', 'Color Name', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->color_insert_form();
				}
			else
				{
					$buyerid=$this->input->post('buyerid');
					$jobno=$this->input->post('jobno');
					$style=$this->input->post('style');
					$orderno=$this->input->post('orderno');
					$fabrictypeid=$this->input->post('fabrictypeid');
					$gsm=$this->input->post('gsm');
					$bqty=$this->input->post('bqty');
					$colorcode=$this->input->post('colorcode');
					$colorname=$this->input->post('colorname');
					$ins=$this->Admin->color_insert($colorcode,$colorname,$bqty,$gsm,$fabrictypeid,$orderno,$style,$jobno,$buyerid);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/color_insert_form','refresh');
				}
		}
	}
	public function color_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Color List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->color_list();
		$this->load->view('admin/color_list',$data);
	}
	public function show_colorno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$orderid = $this->input->get('orderno');
		$data=$this->Admin->show_colorno($buyerid,$jobno,$style,$orderid);
		echo json_encode($data); 
	}
	
			/////////////////////////////////////////////////////////FABRIC RECEIVED//////////////////////////////////////////////
			
	
			
	public function fabric_received_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Fabric Received Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->buyer_list();
		$data['ul1']=$this->Admin->rackno_list();
		$this->load->view('admin/fabric_received_insert_form',$data);
	 }
	 public function fabric_received_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$rcdate=$this->form_validation->set_rules('frcdate', 'Challan Date', 'required');
			$challanno=$this->form_validation->set_rules('challanno', 'Challan No', 'required');
			$buyerid=$this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
			$style=$this->form_validation->set_rules('style', 'Style No', 'required');
			$orderno=$this->form_validation->set_rules('orderno', 'Order', 'required');
			$colorno=$this->form_validation->set_rules('colorno', 'Color', 'required');
			$lotno=$this->form_validation->set_rules('lotno', 'Lot No', 'required');
			$dia=$this->form_validation->set_rules('dia', 'Dia', 'required');
			$rqty=$this->form_validation->set_rules('rqty', 'Received Qty', 'required');
			$racknoid=$this->form_validation->set_rules('racknoid', 'Rack No', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->fabric_received_insert_form();
				}
			else
				{
					$frcdate=$this->input->post('frcdate');
					$challanno=$this->input->post('challanno');
					$buyerid=$this->input->post('buyerid');
					$jobno=$this->input->post('jobno');
					$style=$this->input->post('style');
					$orderno=$this->input->post('orderno');
					$colorno=$this->input->post('colorno');
					$lotno=$this->input->post('lotno');
					$dia=$this->input->post('dia');
					$rqty=$this->input->post('rqty');
					$racknoid=$this->input->post('racknoid');
					$ins=$this->Admin->fabric_received_insert($frcdate,$challanno,$buyerid,$jobno,$style,$orderno,$colorno,$lotno,$dia,$rqty,$racknoid);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/fabric_received_insert_form','refresh');
				}
		}
	}
	public function date_wise_fabric_received_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Fabric Received List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_fabric_received_form', $data);
	} 
	public function date_wise_fabric_received_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['ul'] = $this->Admin->date_wise_fabric_received_list($pd, $wd);
		$this->load->view('admin/date_wise_fabric_received_list', $data);
	}
	public function rack_wise_fabric_received_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Rack Wise Fabric Received List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->rackno_list();
		$this->load->view('admin/rack_wise_fabric_received_form', $data);
	}
	public function rack_wise_fabric_received_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$racknoid = $this->input->post('racknoid');
		$data['ul'] = $this->Admin->rack_wise_fabric_received_list($racknoid);
		$this->load->view('admin/rack_wise_fabric_received_list', $data);
	}
	
	/////////////////////////////////////////////////////////FABRIC ISSUE//////////////////////////////////////////////
	
	public function fabric_delivery_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Fabric Delivery';
		$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid']=$fabricreceivedid;
		$data['ul']=$this->Admin->fabric_delivery_type_list();
		$this->load->view('admin/fabric_delivery_form',$data);
	 }
	 public function fabric_delivery_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$fabricideliverytypeid=$this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$amout=$this->form_validation->set_rules('amout', 'Amount', 'required');
			$challan=$this->form_validation->set_rules('challan', 'Challan', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->rack_wise_fabric_received_form();
				}
			else
				{
					$fabricreceivedid=$this->input->post('fabricreceivedid');
					$fabricideliverytypeid=$this->input->post('fabricideliverytypeid');
					$amout=$this->input->post('amout');
					$challan=$this->input->post('challan');
					$ddate=$this->input->post('ddate');
					$ins=$this->Admin->fabric_delivery_insert($fabricreceivedid,$fabricideliverytypeid,$amout,$challan,$ddate);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/rack_wise_fabric_received_form','refresh');
				}
		}
	} 
}


