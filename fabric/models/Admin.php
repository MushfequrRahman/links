<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

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


	public function fac_insert($facid, $facname, $fac_address)
	{
		$sql = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO factory VALUES ('$facid','$facname','$fac_address')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factory_list()
	{
		$query = "SELECT * FROM factory";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_list_up($facid)
	{
		$sql1 = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function flup($fid, $facid, $factoryname, $factory_address)
	{
		$sql = "UPDATE factory SET factoryid='$facid',factoryname='$factoryname',factory_address='$factory_address' WHERE factoryid='$fid'";
		$query = $this->db->query($sql);
	}
	public function department_insert($department)
	{
		$sql = "SELECT * FROM department WHERE departmentname='$department'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO department VALUES ('','$department')";
			$query = $this->db->query($sql);
			return $query;
		}
	}

	public function department_list()
	{
		$query = "SELECT * FROM department ORDER BY departmentname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function department_list_up($deptid)
	{
		$sql1 = "SELECT * FROM department 
		
		WHERE deptid='$deptid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function departmentlup($deptid, $departmentname)
	{
		$sql = "UPDATE department SET deptid='$deptid',departmentname='$departmentname' WHERE deptid='$deptid'";
		$query = $this->db->query($sql);
	}

	public function designation_insert($designation)
	{
		$sql = "SELECT * FROM designation WHERE designation='$designation'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO designation VALUES ('','$designation')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function designation_list()
	{
		$query = "SELECT * FROM designation ORDER BY designation ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function designation_list_up($designationid)
	{
		$sql1 = "SELECT * FROM designation WHERE designationid='$designationid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function designationlup($designationid, $designation)
	{

		$sql = "UPDATE designation SET designation='$designation' WHERE designationid='$designationid'";
		$query = $this->db->query($sql);
	}
	public function usertype_insert($usertype)
	{
		$sql = "SELECT * FROM usertype WHERE usertype='$usertype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO usertype VALUES ('','$usertype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function usertype_list()
	{
		$query = "SELECT * FROM usertype";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function usertype_list_up($usertypeid)
	{
		$sql1 = "SELECT * FROM usertype WHERE usertypeid='$usertypeid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function usertypelup($usertypeid, $usertype)
	{

		$sql = "UPDATE usertype SET usertype='$usertype' WHERE usertypeid='$usertypeid'";
		$query = $this->db->query($sql);
	}


	public function user_insert($factoryid, $departmentid, $name, $designationid, $oemail, $pmobile, $usertypeid, $userid, $password)
	{
		$sql = "SELECT * FROM user WHERE userid='$userid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO user VALUES ('$factoryid','$departmentid','$name','$designationid','$oemail','$pmobile','$usertypeid','$userid','$password','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factorywise_user_list($factoryid)
	{
		$query = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' ORDER BY user.userid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_list_up($userid)
	{
		$sql1 = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE userid='$userid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate)
	{
		$indate = date("Y-m-d", strtotime($indate));
		$sql = "UPDATE user SET factoryid='$factoryid',departmentid='$departmentid',designationid='$designationid',name='$name',email='$email',mobile='$mobile',user_type='$usertypeid',password='$password',ustatus='$userstatusid',indate='$indate' WHERE userid='$userid'";
		return $query = $this->db->query($sql);
	}
	

	public function userstatus_insert($userstatus)
	{
		$sql = "SELECT * FROM userstatus WHERE userstatus='$userstatus'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO userstatus VALUES ('','$userstatus')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function userstatus_list()
	{
		$query = "SELECT * FROM userstatus";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function userstatus_list_up($userstatusid)
	{
		$sql1 = "SELECT * FROM userstatus WHERE userstatusid='$userstatusid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function userstatuslup($userstatusid, $userstatus)
	{
		$sql = "UPDATE userstatus SET userstatus='$userstatus' WHERE userstatusid='$userstatusid'";
		$query = $this->db->query($sql);
	}
	
	public function product_uom_insert($puom)
	{
		$sql = "SELECT * FROM product_uom_insert WHERE puom='$puom'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO product_uom_insert VALUES ('','$puom')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function product_uom_list()
	{
		$query = "SELECT * FROM product_uom_insert";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function product_uom_list_up($puomid)
	{
		$sql1 = "SELECT * FROM product_uom_insert WHERE puomid='$puomid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function productuomlup($puomid, $puom)
	{
		$sql = "UPDATE product_uom_insert SET puom='$puom' WHERE puomid='$puomid'";
		return $query = $this->db->query($sql);
	}
	public function fabric_type_insert($fabrictype)
	{
		$sql = "SELECT * FROM fabric_type WHERE fabrictype='$fabrictype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO fabric_type VALUES ('','$fabrictype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function fabric_type_list()
	{
		$query = "SELECT * FROM fabric_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rackno_insert($rackno)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM rackno WHERE rackno='$rackno'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO rackno VALUES ('$ccid','$rackno')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function rackno_list()
	{
		$query = "SELECT * FROM rackno";
		$result = $this->db->query($query);
		return $result->result_array();
	}
		/////////////////////////////////////////////////////////BUYER/////////////////////////////////////////////////////////////
		
	public function buyer_insert($buyername)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM buyer WHERE buyername='$buyername'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO buyer VALUES ('$ccid','$buyername')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function buyer_list()
	{
		$query = "SELECT * FROM buyer";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
		/////////////////////////////////////////////////////////JOB NO/////////////////////////////////////////////////////////////
	
	public function jobno_insert($jobno,$buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM jobno WHERE jobno='$jobno'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO jobno VALUES ('$ccid','$jobno','$buyerid','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function jobno_list()
	{
		$query = "SELECT * FROM jobno
		JOIN buyer ON buyer.buyerid=jobno.buyerid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	public function show_jobno($buyerid)
	{
		$query="SELECT * FROM jobno WHERE buyerid='$buyerid' ORDER BY jobno ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	/////////////////////////////////////////////////////////STYLE/////////////////////////////////////////////////////////////
	
	public function style_insert($jobno,$stylename,$buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM style WHERE jobno='$jobno' AND stylename='$stylename'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO style VALUES ('$ccid','$jobno','$stylename','$buyerid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function style_list()
	{
		$query = "SELECT * FROM style
		JOIN buyer ON buyer.buyerid=style.buyerid
		JOIN jobno ON jobno.jobnoid=style.jobnoid
		ORDER BY jobno ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_styleno($jobno,$buyerid)
	{
		$query="SELECT * FROM style WHERE jobnoid='$jobno' AND buyerid='$buyerid' ORDER BY stylename ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	
	/////////////////////////////////////////////////////////ORDER/////////////////////////////////////////////////////////////
	
	public function order_insert($jobno,$style,$ordername,$buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM border WHERE ordername='$ordername'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO border VALUES ('$ccid','$ordername','$jobno','$style','$buyerid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function order_list()
	{
		$query = "SELECT * FROM border
		JOIN jobno ON jobno.jobnoid=border.jobnoid
		JOIN style ON style.styleid=border.styleid
		JOIN buyer ON buyer.buyerid=style.buyerid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_orderno($buyerid,$jobno,$style)
	{
		$query="SELECT * FROM border WHERE buyerid='$buyerid' AND jobnoid='$jobno' AND styleid='$style' ORDER BY ordername ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	/////////////////////////////////////////////////////////ORDER/////////////////////////////////////////////////////////////
	
	public function color_insert($colorcode,$colorname,$bqty,$gsm,$fabrictypeid,$orderno,$style,$jobno,$buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "INSERT INTO color VALUES ('$ccid','$colorcode','$colorname','$bqty','$gsm','$fabrictypeid','$orderno','$style','$jobno','$buyerid')";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function color_list()
	{
		$query = "SELECT * FROM color
		JOIN fabric_type ON fabric_type.fabrictypeid=color.fabrictypeid
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_colorno($buyerid,$jobno,$style,$orderid)
	{
		$query="SELECT * FROM color WHERE buyerid='$buyerid' AND styleid='$style' AND jobnoid='$jobno' AND orderid='$orderid' ORDER BY colorname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
			/////////////////////////////////////////////////////////FABRIC/////////////////////////////////////////////////////////////
	
	public function fabric_received_insert($frcdate,$challanno,$buyerid,$jobno,$style,$orderno,$colorno,$lotno,$dia,$rqty,$racknoid)
	{
		$frcdate = date("Y-m-d", strtotime($frcdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "INSERT INTO fabric_received VALUES ('$ccid','$frcdate','$challanno','$buyerid','$jobno','$style','$orderno','$colorno','$lotno','$dia','$rqty','$racknoid')";
		$query = $this->db->query($sql);
		return $query;
	}
	public function date_wise_fabric_received_list($pd, $wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT * FROM fabric_received
		JOIN color ON color.colorid=fabric_received.colorid
		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		JOIN fabric_type ON fabric_type.fabrictypeid=color.fabrictypeid
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		WHERE frcdate BETWEEN '$pd' AND '$wd'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rack_wise_fabric_received_list($racknoid)
	{
		//$query = "SELECT * FROM fabric_received
//		JOIN color ON color.colorid=fabric_received.colorid
//		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
//		JOIN fabric_type ON fabric_type.fabrictypeid=color.fabrictypeid
//		JOIN border ON border.orderid=fabric_received.orderid
//		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
//		JOIN style ON style.styleid=fabric_received.styleid
//		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
//		JOIN fabric_delivery ON fabric_delivery.fabricreceivedid=fabric_received.fabricreceivedid
//		WHERE fabric_received.racknoid= '$racknoid'
//		GROUP BY fabric_received.fabricreceivedid";
		$query = "SELECT (total_fab_received.fabricreceivedid) AS fabricreceivedid,buyername,jobno,stylename,ordername,
		colorname,bqty,lotno,frqty,deliveryamount,rackno FROM total_fab_received
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=total_fab_received.fabricreceivedid
		WHERE total_fab_received.racknoid= '$racknoid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_delivery_type_list()
	{
		$query = "SELECT * FROM fabric_delivery_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	public function fabric_delivery_insert($fabricreceivedid,$fabricideliverytypeid,$amout,$challan,$ddate)
	{
		$ddate = date("Y-m-d", strtotime($ddate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "INSERT INTO fabric_delivery VALUES ('$ccid','$fabricreceivedid','$fabricideliverytypeid','$amout','$challan','$ddate')";
		$query = $this->db->query($sql);
		return $query;
	}
}
