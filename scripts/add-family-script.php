<?php
if(isset($_POST['save']))
{


if($_POST['sel_employee']==="0")
  {
    echo "<h4>please select employee name</h4>";
  }
  else
  {
  	$agencyid=$_POST['sel_employee'];
	

		if (isset($_POST['s_sname'])){
			$s_sname = $_POST['s_sname'];
		}
		else
		{
			$s_sname = "";
		}

		if (isset($_POST['s_fname'])){
			$s_fname = $_POST['s_fname'];
		}
		else
		{
			$s_fname = "";
		}

		if (isset($_POST['s_mname'])){
			$s_mname = $_POST['s_mname'];
		}
		else
		{
			$s_mname = "";
		}

		if (isset($_POST['s_num'])){
			$s_num = $_POST['s_num'];
		}
		else
		{
			$s_num = "";
		}

		if (isset($_POST['s_work'])){
			$s_work = $_POST['s_work'];
		}
		else
		{
			$s_work = "";
		}

		if (isset($_POST['s_boss'])){
			$s_boss = $_POST['s_boss'];
		}
		else
		{
			$s_boss = "";
		}

		if (isset($_POST['s_badd'])){
			$s_badd = $_POST['s_badd'];
		}
		else
		{
			$s_badd = "";
		}

		if (isset($_POST['s_bday'])){
			$s_bday = $_POST['s_bday'];
		}
		else
		{
			$s_bday = "";
		}

		$c_name = $_POST['c_name'];
		$c_bday = $_POST['c_bday'];


		$f_sname = $_POST['f_sname'];
		$f_fname = $_POST['f_fname'];
		$f_mname = $_POST['f_mname'];
		$f_bday = $_POST['f_bday'];

		$m_maiden = $_POST['m_maiden'];
		$m_sname = $_POST['m_sname'];
		$m_fname = $_POST['m_fname'];
		$m_mname = $_POST['m_mname'];
		$m_bday = $_POST['m_bday'];
		


  $insert_query="insert into dbo.emp_family (agencyid,spouse_sname,spouse_fname,spouse_mname,spouse_contact,spouse_work,spouse_boss,spouse_badd,spouse_bday,father_sname,father_fname,father_mname,father_bday,mother_maiden,mother_sname,mother_fname,mother_mname,mother_bday) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


  $params = array("$agencyid","$s_sname","$s_fname","$s_mname","$s_num","$s_work","$s_boss","$s_badd","$s_bday","$f_sname","$f_fname","$f_mname","$f_bday","$m_maiden","$m_sname","$m_fname","$m_mname","$m_bday");

  $stmt = sqlsrv_query($conn, $insert_query, $params);

  			for($p=0, $count = count($c_name);$p<$count;$p++) 
				{

					$query="insert into emp_children (agencyid,child_name, bday) values (?,?,?,?)";

	        $child_params = array("$agencyid","$c_name[$p]","$c_bday[$p]");

	        $child_go = sqlsrv_query($conn, $query, $child_params);

				}
		include "scripts/audit_emp_add_family.php";

  echo '<script>alert("Record Successfully Added")</script>';
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>