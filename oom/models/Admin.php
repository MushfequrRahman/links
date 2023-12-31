<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

	public function fac_insert($facid,$facname,$fac_address)
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
		$query = "SELECT * FROM factory ORDER BY factoryname ASC";
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
		$query = "SELECT * FROM department";
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
		$query = "SELECT * FROM designation";
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
	public function line_manager_insert($lmuserid)
	{
		$sql = "SELECT * FROM line_manager_insert WHERE lmuserid='$lmuserid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO line_manager_insert VALUES ('$lmuserid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function linemanager_list()
	{
		$query = "SELECT * FROM line_manager_insert 
		JOIN user ON user.userid=line_manager_insert.lmuserid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_insert($factoryid, $departmentid, $name, $designationid, $pmobile, $userid, $password)
	{
		$sql = "SELECT * FROM user WHERE userid='$userid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO user VALUES ('$factoryid','$departmentid','$name','$designationid','$pmobile','0','$userid','','$password','1','0000-00-00')";
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
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
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
	public function ulup($factoryid, $departmentid, $designationid, $name, $mobile, $usertypeid, $lmuserid, $userstatusid, $userid, $password, $indate)
	{
		$indate = date("Y-m-d", strtotime($indate));
		$sql = "UPDATE user SET factoryid='$factoryid',departmentid='$departmentid',designationid='$designationid',name='$name',mobile='$mobile',user_type='$usertypeid',lmauserid='$lmuserid',password='$password',ustatus='$userstatusid',indate='$indate' WHERE userid='$userid'";
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
	
	/////////////////////////////////////////////////////////////MOVEMENT////////////////////////////////////////////////////////////////
	
	public function movement_insert($userid,$lmauserid,$fdate,$tdate,$ftime,$ttime,$purpose,$location)
	{
		date_default_timezone_set('Asia/Dhaka');
		$fdate=date("Y-m-d", strtotime($fdate));
		$tdate=date("Y-m-d", strtotime($tdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d1=str_replace("-","",$d);
		$t1=str_replace(":","",$t);
		$ccid=$d1.$t1;
		$sql = "INSERT INTO movement_insert VALUES ('$ccid','$userid','$lmauserid','$fdate','$tdate','$ftime','$ttime','$purpose','$location','1')";
		$query = $this->db->query($sql);
		return $query;
	}
	public function movement_list()
	{
		$query = "SELECT * FROM movement_insert
		JOIN user ON user.userid=movement_insert.userid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	//public function movement_bill_id($mtoken)
//	{
//		
//		$sql = "SELECT * FROM movement_bill_insert WHERE mtoken='$mtoken'";
//		$query = $this->db->query($sql);
//		if ($query->num_rows() == 1) {
//			return false;
//		} else {
//		return true;
//		}
//	}
	
	public function movement_bill_insert($mtoken,$transport,$tiffin,$accomodation,$gift,$others)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d1=str_replace("-","",$d);
		$t1=str_replace(":","",$t);
		$ccid=$d1.$t1;
		$sql = "SELECT * FROM movement_insert WHERE mid='$mtoken'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 0) {
			return false;
		} else {
		$sql1 = "INSERT INTO movement_bill_insert VALUES ('$ccid','$mtoken','$transport','$tiffin','$accomodation','$gift','$others')";
		$query1 = $this->db->query($sql1);
		$sql2 = "UPDATE movement_insert SET mstatus='2' WHERE mid='$mtoken'";
		$this->db->query($sql2);
		return $query1;
		}
	}
	public function movement_bill_details($mtoken)
	{
		$query = "SELECT * FROM movement_bill_insert
		WHERE mtoken='$mtoken'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
}
