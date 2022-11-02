<?php


if(isset($_POST['save']))
{
	if($conn)
    {
    	$record_version = "1";
    	$errorcount=0;
    	$err_msg="Error: Please Fill/select ";

    	$agencyid=$_POST['sel_employee'];
    	$p_schoolname=$_POST['pschool'];
    	$p_fromyear=$_POST['psyfrom'];
    	$p_toyear=$_POST['psyto'];
    	
    	// $p_highest=$_POST['txt_phighest'];
    	

		$p_scholarship=$_POST['txt_pscholar'];

    	$s_schoolname=$_POST['sschool'];
    	$s_fromyear=$_POST['ssyfrom'];
    	$s_toyear=$_POST['ssyto'];

    	// $s_highest=$_POST['txt_shighest'];

    	$s_scholar=$_POST['txt_sscholar'];

    	

    	$t_schoolname=$_POST['tschool'];
    	$t_fromyear=$_POST['tsyfrom'];
    	$t_toyear=$_POST['tsyto'];
    	$t_course=$_POST['tcourse'];

    	//validation
    	if($agencyid==0)
	  	{	
	  		$errorcount++;
	  		$err_msg.="Employee Name";
	  	}
    	
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
    	else{
    		$high_grade=$_POST['sel_highgrade'];
    		$hg_sql = "select * from select_highest_grade where id ='$high_grade'";

	    	$result = sqlsrv_query($conn, $hg_sql);
	        $row = sqlsrv_fetch_array($result);
	        $hg_lvl=$row['edu_level'];

	        
    	}
            
    
	  		if($errorcount==0)
	  		{
				for($p=0, $count = count($p_schoolname);$p<$count;$p++) 
				{
					$pedulvl_id = $p+1;

					if(($p+1)==$count)
					{
						$p_gradvoid=1;
					}else{
						$p_gradvoid=0;
					}

					$query="insert into emp_education (agencyid,record_version,edu_lvl,edu_lvl_id,school,course,from_year,to_year,graduate,units,scholarship) values (?,?,?,?,?,?,?,?,?,?,?)";

			        $p_params = array("$agencyid","$record_version","primary","$pedulvl_id","$p_schoolname[$p]","n/a","$p_fromyear[$p]","$p_toyear[$p]","$p_gradvoid","n/a","$p_scholarship[$p]");

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

			        	$s_params = array("$agencyid","$record_version","secondary","$sedulvl_id","$s_schoolname[$s]","n/a","$s_fromyear[$s]","$s_toyear[$s]","$s_gradvoid","n/a","$s_scholar[$s]");

			        	$s_go = sqlsrv_query($conn, $query, $s_params);

					}
				}
				
				if($hg_lvl==3)
				{
					for($t=0, $count = count($t_schoolname);$t<$count;$t++) 
					{
						if(isset($_POST['grad_year'.$t]))
						{
							$t_gradyear='1';
							// echo $_POST['grad_year'.$t];
						}else{
							$t_gradyear="0";
						}

						if(isset($_POST['units'.$t])){
				    		$t_units=$_POST['units'.$t];
				    	}else{
				    		$t_units="";
				    	}
				    	
				    	if(isset($_POST['txt_scholar'.$t])){
				    		$t_scholar=$_POST['txt_scholar'.$t];
				    	}else{
				    		$t_scholar="";
				    	}

						$query="insert into emp_education (agencyid,record_version,edu_lvl,edu_lvl_id,school,course,from_year,to_year,graduate,units,scholarship) values (?,?,?,?,?,?,?,?,?,?,?)";

						$tedulvl_id = $t+1;

				        $t_params = array("$agencyid",$record_version,"tertiary","$tedulvl_id","$t_schoolname[$t]","$t_course[$t]","$t_fromyear[$t]","$t_toyear[$t]", "$t_gradyear","$t_units","$t_scholar");

				        $t_go = sqlsrv_query($conn, $query, $t_params);

		        		
					}
				}
				$hg_query="insert into emp_highest_edu (record_version,agencyid,highest_grade_id) values (?,?,?)";
				$hg_params = array("$record_version","$agencyid","$high_grade");
				$hg_go = sqlsrv_query($conn, $hg_query, $hg_params);

				echo "<h4><b style='color:green;'>Record Successfully added</b></h4>";
			}
			else
			{
				echo "<h5><b style='color:red;'>".$err_msg."</b></h5>";
			}
    }
}


?>