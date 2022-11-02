<?php


if(isset($_POST['update']))
{
	if($conn)
    {
    	$p_schoolname=$_POST['pschool'];
    	$p_fromyear=$_POST['psyfrom'];
    	$p_toyear=$_POST['psyto'];
    	$p_scholar=$_POST['txt_pscholar'];
    	$p_gradyear=$_POST['graduate'];
    	$p_scholar=$_POST['txt_pscholar'];

    	$s_schoolname=$_POST['sschool'];
    	$s_fromyear=$_POST['ssyfrom'];
    	$s_toyear=$_POST['ssyto'];
    	// $s_sgradyear=$_POST['sgrad_year'];
    	$s_scholar=$_POST['sscholar'];

    	$t_schoolname=$_POST['tschool'];
    	$t_fromyear=$_POST['tsyfrom'];
    	$t_toyear=$_POST['tsyto'];
    	$t_course=$_POST['tcourse'];
    	$t_scholar=$_POST['txt_tscholar'];
    	$t_units=$_POST['tunits'];
    	

    	$p_gradyear=$_POST['pgrad_year'];

    	// $del_sql = "delete from emp_education where agencyid='$agencyid'";
    	// sqlsrv_query($conn, $del_sql);

    	$new_record_version = $record_version+1;

    	if($_POST['sel_highgrade']=='0')
    	{
    		$errorcount++;
    		if($errorcount>1)
	  		{
    			$err_msg.=", Highest Educational level";
    		}
    		else
    		{
    			$err_msg.="Highest Educational level";
    		}
    		$high_grade="0";
    	}
    	else
    	{
    		$high_grade=$_POST['sel_highgrade'];
    		$hg_sql = "select * from select_highest_grade where id ='$high_grade'";

	    	if($result = sqlsrv_query($conn, $hg_sql))
	        {
	        	while($row = sqlsrv_fetch_array($result))
	       		{
	            	$hg_lvl=$row['edu_level'];
	        	}
	        }
    	}
           

    		//get record version
    		$accountcheck_sql = "select * from emp_basic where username='$username' and pass='$password'";
			$paramm = array();
		    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		    $stmt = sqlsrv_query( $conn, $accountcheck_sql , $paramm, $options);
		    
		    $total_account = sqlsrv_num_rows( $stmt );
		    


			for($p=0, $count = count($p_schoolname);$p<$count;$p++) 
			{

			if(($p+1)==$count)
			{
				$p_gradyear=1;
			}else{
				$p_gradyear=0;
			}


			$pedulvl_id = $p+1;

			$query="insert into emp_education (agencyid,record_version,edu_lvl,edu_lvl_id,school,course,from_year,to_year,graduate,units,scholarship) values (?,?,?,?,?,?,?,?,?,?,?)";

			$p_params = array("$agencyid","$new_record_version","primary","$pedulvl_id","$p_schoolname[$p]","n/a","$p_fromyear[$p]","$p_toyear[$p]","$p_gradvoid","n/a","$p_scholar[$p]");

	        $p_go = sqlsrv_query($conn, $query, $p_params);

			}

    	if($hg_lvl>=2)
    	{
			for($s=0, $count = count($s_schoolname);$s<$count;$s++) 
			{
				if(($s+1)==$count)
				{
					$s_gradvoid=1;
				}else{
					$s_gradvoid=0;
				}

				$sedulvl_id = $s+1;

				$query="insert into emp_education (agencyid,record_version,edu_lvl,edu_lvl_id,school,course,from_year,to_year,graduate,units,scholarship) values (?,?,?,?,?,?,?,?,?,?,?)";

			    $s_params = array("$agencyid","$new_record_version","secondary","$sedulvl_id","$s_schoolname[$s]","n/a","$s_fromyear[$s]","$s_toyear[$s]","$s_gradvoid","n/a","$s_scholar[$s]");

		    	$s_go = sqlsrv_query($conn, $query, $s_params);

			}
		}

		if($hg_lvl==3)
		{
			$tt=1;
			for($t=0, $count = count($t_schoolname);$t<$count;$t++) 
			{
		
				if(!isset($_POST['tgrad_year'.$tt]))
				{
					$t_gradyear = 0;
				}
				else
				{
					$t_gradyear=$_POST['tgrad_year'.$tt];
				}

			$query="insert into emp_education (agencyid,record_version,edu_lvl,edu_lvl_id,school,course,from_year,to_year,graduate,units,scholarship) values (?,?,?,?,?,?,?,?,?,?,?)";

			$tedulvl_id = $t+1;

			$t_params = array("$agencyid",$new_record_version,"tertiary","$tedulvl_id","$t_schoolname[$t]","$t_course[$t]","$t_fromyear[$t]","$t_toyear[$t]", "$t_gradyear","$t_units[$t]","$t_scholar[$t]");

		    $t_go = sqlsrv_query($conn, $query, $t_params);

		    $tt++;
			}
			
			$hg_query="insert into emp_highest_edu (record_version,agencyid,highest_grade_id) values (?,?,?)";
			$hg_params = array("$new_record_version","$agencyid","$high_grade");
		    $hg_go = sqlsrv_query($conn, $hg_query, $hg_params);

		    //audit trail
			
		    echo '<script>alert("Record Successfully Updated")</script>';
		    echo "<script>window.open('index.php','_self')</script>";
		}
	}
	

}



?>