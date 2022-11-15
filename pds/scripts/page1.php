<?php
session_start();
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$uid = $_POST['id'];
include "../scripts/connect.php";
$basic = "select * from emp_basic where agencyid='$uid'";
if($result = sqlsrv_query($conn, $basic, $params, $options))
{$emp_basic_row = sqlsrv_fetch_array($result);}
$identify = "select * from emp_identification where agencyid='$uid'";
if($result = sqlsrv_query($conn, $identify, $params, $options))
{$identify_row = sqlsrv_fetch_array($result);}
$address = "select * from emp_address where agencyid='$uid'";
if($result = sqlsrv_query($conn, $address, $params, $options))
{$adress_row = sqlsrv_fetch_array($result);}
$family = "select * from emp_family where agencyid='$uid'";
if($result = sqlsrv_query($conn, $family, $params, $options))
{$family_row = sqlsrv_fetch_array($result);}
$children = "select * from emp_children where agencyid='$uid'";
$html_child = '';
$left = 766.5;
if($res_child = sqlsrv_query($conn, $children, $params, $options))
{ while($children_row = sqlsrv_fetch_array($res_child)) {
	$html_child .= '<span style="font-size:12px;font-family:&#39;Arial Narrow&#39;;font-weight:bold;">';
	$html_child .= '<span class="text" style="left:576.6px;top:'.$left.'px;">'.$children_row['child_name'].'</span>';
	$html_child .='<span class="text" style="left:841.5px;top:'.$left.'px;">'.$children_row['bday'].'</span>';
	$html_child .= '</span>';
	$left += 26;

}}
$prim = "select * from emp_education_primary where agencyid='$uid'";
$prim_school = '';
$prim_from = '';
$prim_to = '';
$prim_scholar = '';
$prim_unit = '';
$prim_basic_educ = '';
$prim_grad = '';
if($prims = sqlsrv_query($conn, $prim, $params, $options)) {
	if(sqlsrv_num_rows($prims)>0){
		while ($prim_row = sqlsrv_fetch_array($prims)) {
			$prim_school .=  $prim_row['school'].'/';
			$prim_from .= $prim_row['from_year'].'/';
			$prim_to .= $prim_row['to_year'].'/';
			$prim_scholar .= $prim_row['scholarship'].'/';
			$prim_unit .= $prim_row['unit_earned'].'/';
			$prim_basic_educ .= $prim_row['basic_educ'].'/';
			$prim_grad .= $prim_row['graduate'].'/';
		}
	}
}
$sec = "select * from emp_education_secondary where agencyid='$uid'";
$sec_school = '';
$sec_from = '';
$sec_to = '';
$sec_scholar = '';
$sec_unit = '';
$sec_basic_educ = '';
$sec_grad = '';
if ($secs = sqlsrv_query($conn, $sec, $params, $options)) {
	if(sqlsrv_num_rows($secs)>0){
		while ($sec_row = sqlsrv_fetch_array($secs)) {
			$sec_school .=  $prim_row['school'].'/';
			$sec_from .= $prim_row['from_year'].'/';
			$sec_to .= $prim_row['to_year'].'/';
			$sec_scholar .= $prim_row['scholarship'].'/';
			$sec_unit .= $prim_row['unit_earned'].'/';
			$sec_basic_educ .= $prim_row['basic_educ'].'/';
			$sec_grad .= $prim_row['graduate'].'/';
		}
	}
}
$sec = "select * from emp_education_secondary where agencyid='$uid'";
$sec_school = '';
$sec_from = '';
$sec_to = '';
$sec_scholar = '';
$sec_unit = '';
$sec_basic_educ = '';
$sec_grad = '';
if($secs = sqlsrv_query($conn, $sec, $params, $options)) {
	if(sqlsrv_num_rows($secs)>0){
		while ($sec_row = sqlsrv_fetch_array($secs)) {
			$sec_school .=  $sec_row['school'].'/';
			$sec_from .= $sec_row['from_year'].'/';
			$sec_to .= $sec_row['to_year'].'/';
			$sec_scholar .= $sec_row['scholarship'].'/';
			$sec_unit .= $sec_row['unit_earned'].'/';
			$sec_basic_educ .= $sec_row['basic_educ'].'/';
			$sec_grad .= $sec_row['graduate'].'/';
		}
	}
}
$voc = "select * from emp_education_vocational where agencyid='$uid'";
$voc_school = '';
$voc_from = '';
$voc_to = '';
$voc_scholar = '';
$voc_unit = '';
$voc_basic_educ = '';
$voc_grad = '';
if($vocs = sqlsrv_query($conn, $voc, $params, $options)) {
	if(sqlsrv_num_rows($vocs)>0){
		while ($voc_row = sqlsrv_fetch_array($vocs)) {
			$voc_school .=  $prim_row['school'].'/';
			$voc_from .= $prim_row['from_year'].'/';
			$voc_to .= $prim_row['to_year'].'/';
			$voc_scholar .= $prim_row['scholarship'].'/';
			$voc_unit .= $prim_row['unit_earned'].'/';
			$voc_basic_educ .= $prim_row['basic_educ'].'/';
			$voc_grad .= $prim_row['graduate'].'/';
		}
	}

}
$bac = "select * from emp_education_bachelor where agencyid='$uid'";
$bac_school = '';
$bac_from = '';
$bac_to = '';
$bac_scholar = '';
$bac_unit = '';
$bac_basic_educ = '';
$bac_grad = '';
if($bacs = sqlsrv_query($conn, $bac, $params, $options)){
	if(sqlsrv_num_rows($bacs)>0){
		while ($bac_row = sqlsrv_fetch_array($bacs)) {
			$bac_school .=  $bac_row['school'].'/';
			$bac_from .= $bac_row['from_year'].'/';
			$bac_to .= $bac_row['to_year'].'/';
			$bac_scholar .= $bac_row['scholarship'].'/';
			$bac_unit .= $bac_row['unit_earned'].'/';
			$bac_basic_educ .= $bac_row['basic_educ'].'/';
			$bac_grad .= $bac_row['graduate'].'/';
		}
	}
}
$grad = "select * from emp_education_bachelor where agencyid='$uid'";
$grad_school = '';
$grad_from = '';
$grad_to = '';
$grad_scholar = '';
$grad_unit = '';
$grad_basic_educ = '';
$grad_grad = '';
if($grads = sqlsrv_query($conn, $bac, $params, $options)){
	if(sqlsrv_num_rows($grads)>0){
		while ($grad_row = sqlsrv_fetch_array($grads)) {
			$grad_school .=  $grad_row['school'].'/';
			$grad_from .= $grad_row['from_year'].'/';
			$grad_to .= $grad_row['to_year'].'/';
			$grad_scholar .= $grad_row['scholarship'].'/';
			$grad_unit .= $grad_row['unit_earned'].'/';
			$grad_basic_educ .= $grad_row['basic_educ'].'/';
			$grad_grad .= $grad_row['graduate'].'/';
		}
	}
}
?>