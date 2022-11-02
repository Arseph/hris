<?php


if(isset($_POST['update']))
{
	if($conn)
    {
    	$p_schoolname=$_POST['pschool'];
    	$p_fromyear=$_POST['psyfrom'];
    	$p_toyear=$_POST['psyto'];

    	$s_schoolname=$_POST['sschool'];
    	$s_fromyear=$_POST['ssyfrom'];
    	$s_toyear=$_POST['ssyto'];

    	$t_schoolname=$_POST['tschool'];
    	$t_fromyear=$_POST['tsyfrom'];
    	$t_toyear=$_POST['tsyto'];
    	$t_course=$_POST['course'];

    	$del_sql = "delete from emp_education where agencyid='$agencyid'";
    	sqlsrv_query($conn, $del_sql);

			for($p=0, $count = count($p_schoolname);$p<$count;$p++) 
			{

			$query="insert into emp_education (agencyid,edu_lvl,school,course,from_year,to_year) values (?,?,?,?,?,?)";

	        $p_params = array("$agencyid","primary","$p_schoolname[$p]","n/a","$p_fromyear[$p]","$p_toyear[$p]");

	        $p_go = sqlsrv_query($conn, $query, $p_params);

			}

			for($s=0, $count = count($s_schoolname);$s<$count;$s++) 
			{

			$query="insert into emp_education (agencyid,edu_lvl,school,course,from_year,to_year) values (?,?,?,?,?,?)";

		    $s_params = array("$agencyid","secondary","$s_schoolname[$s]","n/a","$s_fromyear[$s]","$s_toyear[$s]");

		    $s_go = sqlsrv_query($conn, $query, $s_params);

			}

			for($t=0, $count = count($t_schoolname);$t<$count;$t++) 
			{

			$query="insert into emp_education (agencyid,edu_lvl,school,course,from_year,to_year) values (?,?,?,?,?,?)";

		    $t_params = array("$agencyid","tertiary","$t_schoolname[$t]","$t_course[$t]","$t_fromyear[$t]","$t_toyear[$t]");

		    $t_go = sqlsrv_query($conn, $query, $t_params);


			}
			
			$_SESSION['update_success'] = "<b style='color:green;'>Record Successfully Updated</b>";
			echo "<meta http-equiv='refresh' content='0'>";	
	}
	

}



?>