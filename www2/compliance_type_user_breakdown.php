<?php
chdir ( dirname ( __FILE__));
require_once "../../core.inc.php";

if(isset($_REQUEST['team']) && isset($_REQUEST['teamemail'])) {
  //  $userwhere = " (select trim(lower(data)) from mdl_user_info_data where mdl_user_info_data.userid=mdl_user.id and mdl_user_info_data.fieldid=1)=trim(lower('".$USER->email."')) ";
}

if(isset($_REQUEST['demographics'])) {
  $demographics = get_object_vars(json_decode(urldecode($_REQUEST['demographics'])));


  if(isset($demographics['bm_parentorganisation']) && $demographics['bm_parentorganisation'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_parentorganisation'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_parentorganisation in (".$list.")";
  }
  if(isset($demographics['bm_division']) && $demographics['bm_division'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_division'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_division in (".$list.")";
  }
  if(isset($demographics['bm_subdivision']) && $demographics['bm_subdivision'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_subdivision'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_subdivision in (".$list.")";
  }
  if(isset($demographics['bm_department']) && $demographics['bm_department'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_department'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_department in (".$list.")";
  }
  if(isset($demographics['bm_region']) && $demographics['bm_region'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_region'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_region in (".$list.")";
  }
  if(isset($demographics['bm_location']) && $demographics['bm_location'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_location'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_location in (".$list.")";
  }
  if(isset($demographics['bm_jobtitle']) && $demographics['bm_jobtitle'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_jobtitle'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_jobtitle in (".$list.")";
  }
  if(isset($demographics['bm_jobgrade']) && $demographics['bm_jobgrade'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_jobgrade'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_jobgrade in (".$list.")";
  }
  if(isset($demographics['bm_jobgrade']) && $demographics['bm_jobgrade'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_jobgrade'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_jobgrade in (".$list.")";
  }
  if(isset($demographics['bm_status']) && $demographics['bm_status'][0]!='Any') {
    $list="'".implode("','",$demographics['bm_status'])."'";
    $userwhere.=" and ".$CFG->prefix."user.bm_status in (".$list.")";
  }
  if(trim($demographics['traineasy_firstname'])!='') {
    $userwhere.=" and mdl_user.firstname like '".$demographics['traineasy_firstname']."'";
  }
  if(trim($demographics['traineasy_lastname'])!='') {
    $userwhere.=" and mdl_user.lastname like '".$demographics['traineasy_lastname']."'";
  }
  if(trim($demographics['traineasy_email'])!='') {
    $userwhere.=" and mdl_user.email like '".$demographics['traineasy_email']."'";
  }
  if(trim($demographics['traineasy_employeeid'])!='') {
    $userwhere.=" and mdl_user.idnumber like '".$demographics['traineasy_employeeid']."'";
  }
}
set_time_limit(0);

if($_REQUEST['type']=='A') {
    
  $compliantusers = "select mdl_user.id as userid,mdl_user.bm_status,concat(mdl_user.firstname,' ',mdl_user.lastname) as user,mdl_user.firstname,mdl_user.lastname,mdl_user.idnumber,mdl_user.email as email,mdl_user.bm_parentorganisation,mdl_user.bm_division,mdl_user.bm_subdivision,mdl_user.bm_department,mdl_user.bm_region,mdl_user.bm_location,mdl_user.bm_jobtitle,mdl_user.bm_jobgrade,num_mandatory_modules_passed,numtypes,totalpassed as nummandatorytypespassed,totalpassed,nummodules,num_mandatory_types_passed,if(num_mandatory_types_passed>=(select count(*) from mdl_tec_sector_mandatory_type where sector='".$_REQUEST['id']."') and numtypes>=(select numtypes from mdl_tec_sector_requirements where sector='".$_REQUEST['id']."') and nummodules>=(select nummodules from mdl_tec_sector_requirements where sector='".$_REQUEST['id']."') and num_mandatory_modules_passed>=(select count(*) from mdl_tec_sector_mandatory where sector='".$_REQUEST['id']."'),'COMPLIANT','NON-COMPLIANT') as status  from (select userid,type_results.numtypes,num_mandatory_type,totalpassed,num_mandatory_type_modules_passed,num_mandatory_modules_passed,type_results.nummodules,num_mandatory_types_passed from (select userid,sum(if(compliancetype,1,0)) as numtypes,sum(if(compliancetype and mandatory_type,1,0)) as num_mandatory_types_passed,sum(mandatory_type) as num_mandatory_type,num_mandatory_type_modules,totalpassed,num_mandatory_type_modules_passed,sum(if(compliancetype,0,num_mandatory_modules_passed)) as num_mandatory_modules_passed,sum(if(compliancetype,0,totalpassed)) as nummodules from (select userid,compliancetype,num_mandatory_modules,mandatory_type,num_mandatory_type_modules,totalpassed,num_mandatory_type_modules_passed,num_mandatory_modules_passed from ((select enrolledusers.userid,mandatory_modules.compliancetype,sum(mandatory_modules.mandatory_module) as num_mandatory_modules,mandatory_modules.mandatory_type,sum(mandatory_type_module) as num_mandatory_type_modules,count(distinct mandatory_modules.id) as distinctmodules,sum($query_module_passed_and_not_expired) as totalpassed,sum(if(mandatory_modules.mandatory_module,$query_module_passed_and_not_expired,0)) as num_mandatory_modules_passed,sum(if(mandatory_type_module,$query_module_passed_and_not_expired,0)) as num_mandatory_type_modules_passed from (select mdl_tec_module.*,modules_with_mandatory.type as compliancetype,modules_with_mandatory.mandatory_module,modules_with_mandatory.mandatory_type,modules_with_mandatory.mandatory_type_module from mdl_tec_module,(select modules.module,modules.type,if(mdl_tec_sector_mandatory.id,1,0) as mandatory_module,if(mdl_tec_sector_mandatory_type.id,1,0) as mandatory_type,if((select count(*) from mdl_tec_type_mandatory where mdl_tec_type_mandatory.type=modules.type and modules.type>0)>0,1,0) as mandatory_type_module from ((select mdl_tec_type_module.type,mdl_tec_type_module.module from mdl_tec_sector_type,mdl_tec_type_module where mdl_tec_type_module.type=mdl_tec_sector_type.type and mdl_tec_sector_type.sector='".$_REQUEST['id']."') union (select 0,module from mdl_tec_sector_module where sector='".$_REQUEST['id']."')) as modules left join mdl_tec_sector_mandatory on mdl_tec_sector_mandatory.sector='".$_REQUEST['id']."' and mdl_tec_sector_mandatory.module=modules.module left join mdl_tec_sector_mandatory_type on mdl_tec_sector_mandatory_type.sector='".$_REQUEST['id']."' and mdl_tec_sector_mandatory_type.type=modules.type) as modules_with_mandatory where modules_with_mandatory.module=mdl_tec_module.id and mdl_tec_module.inuse=1) as mandatory_modules,mdl_tec_enrolments as enrolledusers,mdl_user  left join mdl_user_info_data on mdl_user_info_data.userid=mdl_user.id and mdl_user_info_data.fieldid=1 where mdl_user.id=enrolledusers.userid  and enrolledusers.timestart<=unix_timestamp() and enrolledusers.timeend>=unix_timestamp(substring(now(),1,10)) and $userwhere and enrolledusers.sector='".$_REQUEST['id']."' group by userid,compliancetype) as module_results)) as types_passed group by userid) as type_results) as module_results,mdl_user where module_results.userid=mdl_user.id";

  //  echo $compliantusers;
  //  exit;


} elseif ($_REQUEST['type']=='C') {

  $compliantusers = "select mdl_user.id as userid,mdl_user.bm_status,if(num_mandatory_types_passed>=(select count(*) from mdl_tec_sector_mandatory_type where sector='".$_REQUEST['id']."') and numtypes>=(select numtypes from mdl_tec_sector_requirements where sector='".$_REQUEST['id']."') and nummodules>=(select nummodules from mdl_tec_sector_requirements where sector='".$_REQUEST['id']."') and num_mandatory_modules_passed>=(select count(*) from mdl_tec_sector_mandatory where sector='".$_REQUEST['id']."'),'COMPLIANT','NON-COMPLIANT') as status ,concat(mdl_user.firstname,' ',mdl_user.lastname) as user,mdl_user.firstname,mdl_user.lastname,mdl_user.idnumber,mdl_user.email as email,mdl_user.bm_parentorganisation,mdl_user.bm_division,mdl_user.bm_subdivision,mdl_user.bm_department,mdl_user.bm_region,mdl_user.bm_location,mdl_user.bm_jobtitle,mdl_user.bm_jobgrade,num_mandatory_modules_passed,numtypes,totalpassed as nummandatorytypespassed,totalpassed,nummodules,num_mandatory_types_passed from (select userid,type_results.numtypes,num_mandatory_type,totalpassed,num_mandatory_type_modules_passed,num_mandatory_modules_passed,type_results.nummodules,num_mandatory_types_passed from (select userid,sum(if(compliancetype,1,0)) as numtypes,sum(if(compliancetype and mandatory_type,1,0)) as num_mandatory_types_passed,sum(mandatory_type) as num_mandatory_type,num_mandatory_type_modules,totalpassed,num_mandatory_type_modules_passed,sum(if(compliancetype,0,num_mandatory_modules_passed)) as num_mandatory_modules_passed,sum(if(compliancetype,0,totalpassed)) as nummodules  from (select userid,compliancetype,num_mandatory_modules,mandatory_type,num_mandatory_type_modules,totalpassed,num_mandatory_type_modules_passed,num_mandatory_modules_passed from ((select enrolledusers.userid,mandatory_modules.compliancetype,sum(mandatory_modules.mandatory_module) as num_mandatory_modules,mandatory_modules.mandatory_type,sum(mandatory_type_module) as num_mandatory_type_modules,count(distinct mandatory_modules.id) as distinctmodules,sum($query_module_passed_and_not_expired) as totalpassed,sum(if(mandatory_modules.mandatory_module,$query_module_passed_and_not_expired,0)) as num_mandatory_modules_passed,sum(if(mandatory_type_module,$query_module_passed_and_not_expired,0)) as num_mandatory_type_modules_passed from (select mdl_tec_module.*,modules_with_mandatory.type as compliancetype,modules_with_mandatory.mandatory_module,modules_with_mandatory.mandatory_type,modules_with_mandatory.mandatory_type_module from mdl_tec_module,(select modules.module,modules.type,if(mdl_tec_sector_mandatory.id,1,0) as mandatory_module,if(mdl_tec_sector_mandatory_type.id,1,0) as mandatory_type,if((select count(*) from mdl_tec_type_mandatory where mdl_tec_type_mandatory.type=modules.type and modules.type>0)>0,1,0) as mandatory_type_module from ((select mdl_tec_type_module.type,mdl_tec_type_module.module from mdl_tec_sector_type,mdl_tec_type_module where mdl_tec_type_module.type=mdl_tec_sector_type.type and mdl_tec_sector_type.sector='".$_REQUEST['id']."') union (select 0,module from mdl_tec_sector_module where sector='".$_REQUEST['id']."')) as modules left join mdl_tec_sector_mandatory on mdl_tec_sector_mandatory.sector='".$_REQUEST['id']."' and mdl_tec_sector_mandatory.module=modules.module left join mdl_tec_sector_mandatory_type on mdl_tec_sector_mandatory_type.sector='".$_REQUEST['id']."' and mdl_tec_sector_mandatory_type.type=modules.type) as modules_with_mandatory where modules_with_mandatory.module=mdl_tec_module.id and mdl_tec_module.inuse=1) as mandatory_modules,mdl_tec_enrolments as enrolledusers,mdl_user  left join mdl_user_info_data on mdl_user_info_data.userid=mdl_user.id and mdl_user_info_data.fieldid=1 where mdl_user.id=enrolledusers.userid  and enrolledusers.timestart<=unix_timestamp() and enrolledusers.timeend>=unix_timestamp(substring(now(),1,10)) and $userwhere and enrolledusers.sector='".$_REQUEST['id']."' group by userid,compliancetype) as module_results,mdl_tec_sector_requirements) left join mdl_tec_type_requirements on mdl_tec_type_requirements.type=module_results.compliancetype where mdl_tec_sector_requirements.sector='".$_REQUEST['id']."' and ((compliancetype=0 and module_results.num_mandatory_modules=module_results.num_mandatory_modules_passed and module_results.totalpassed>=mdl_tec_sector_requirements.nummodules ) or (compliancetype>0 and module_results.totalpassed>=mdl_tec_type_requirements.nummodules  and (module_results.num_mandatory_type_modules_passed-module_results.num_mandatory_type_modules)>=0))) as types_passed group by userid) as type_results,mdl_tec_sector_requirements where mdl_tec_sector_requirements.sector='".$_REQUEST['id']."' and type_results.numtypes>=mdl_tec_sector_requirements.numtypes and type_results.num_mandatory_type=(select count(*) from mdl_tec_sector_mandatory_type where sector='".$_REQUEST['id']."') ) as module_results,mdl_user where module_results.userid=mdl_user.id";

} elseif ($_REQUEST['type']=='N') {

  $compliantusers = "select mdl_user.id as userid,mdl_user.bm_status,if(num_mandatory_types_passed>=(select count(*) from mdl_tec_sector_mandatory_type where sector='".$_REQUEST['id']."') and numtypes>=(select numtypes from mdl_tec_sector_requirements where sector='".$_REQUEST['id']."') and nummodules>=(select nummodules from mdl_tec_sector_requirements where sector='".$_REQUEST['id']."') and num_mandatory_modules_passed>=(select count(*) from mdl_tec_sector_mandatory where sector='".$_REQUEST['id']."'),'COMPLIANT','NON-COMPLIANT') as status ,concat(mdl_user.firstname,' ',mdl_user.lastname) as user,mdl_user.firstname,mdl_user.lastname,mdl_user.idnumber,mdl_user.email as email,mdl_user.bm_parentorganisation,mdl_user.bm_division,mdl_user.bm_subdivision,mdl_user.bm_department,mdl_user.bm_region,mdl_user.bm_location,mdl_user.bm_jobtitle,mdl_user.bm_jobgrade,num_mandatory_modules_passed,numtypes,totalpassed as nummandatorytypespassed,totalpassed,nummodules,num_mandatory_types_passed from (select if((type_results.numtypes>=mdl_tec_sector_requirements.numtypes and type_results.num_mandatory_type=(select count(*) from mdl_tec_sector_mandatory_type where sector='".$_REQUEST['id']."')),'passed','failed') as type_results_status,type_passed_status,userid,type_results.numtypes,num_mandatory_type,totalpassed,num_mandatory_type_modules_passed,num_mandatory_modules_passed,type_results.nummodules,num_mandatory_types_passed from (select type_passed_status,userid,sum(if(compliancetype,1,0)) as numtypes,sum(if(compliancetype and mandatory_type,1,0)) as num_mandatory_types_passed,sum(mandatory_type) as num_mandatory_type,num_mandatory_type_modules,totalpassed,num_mandatory_type_modules_passed,sum(if(compliancetype,0,num_mandatory_modules_passed)) as num_mandatory_modules_passed,sum(if(compliancetype,0,totalpassed)) as nummodules  from (select if((compliancetype=0 and module_results.num_mandatory_modules=module_results.num_mandatory_modules_passed and module_results.totalpassed>=mdl_tec_sector_requirements.nummodules ) or (compliancetype>0 and module_results.totalpassed>=mdl_tec_type_requirements.nummodules  and (module_results.num_mandatory_type_modules_passed-module_results.num_mandatory_type_modules)>=0),'passed','failed') as type_passed_status,userid,compliancetype,num_mandatory_modules,mandatory_type,num_mandatory_type_modules,totalpassed,num_mandatory_type_modules_passed,num_mandatory_modules_passed from ((select enrolledusers.userid,mandatory_modules.compliancetype,sum(mandatory_modules.mandatory_module) as num_mandatory_modules,mandatory_modules.mandatory_type,sum(mandatory_type_module) as num_mandatory_type_modules,count(distinct mandatory_modules.id) as distinctmodules,sum($query_module_passed_and_not_expired) as totalpassed,sum(if(mandatory_modules.mandatory_module,$query_module_passed_and_not_expired,0)) as num_mandatory_modules_passed,sum(if(mandatory_type_module,$query_module_passed_and_not_expired,0)) as num_mandatory_type_modules_passed from (select mdl_tec_module.*,modules_with_mandatory.type as compliancetype,modules_with_mandatory.mandatory_module,modules_with_mandatory.mandatory_type,modules_with_mandatory.mandatory_type_module from mdl_tec_module,(select modules.module,modules.type,if(mdl_tec_sector_mandatory.id,1,0) as mandatory_module,if(mdl_tec_sector_mandatory_type.id,1,0) as mandatory_type,if((select count(*) from mdl_tec_type_mandatory where mdl_tec_type_mandatory.type=modules.type and modules.type>0)>0,1,0) as mandatory_type_module from ((select mdl_tec_type_module.type,mdl_tec_type_module.module from mdl_tec_sector_type,mdl_tec_type_module where mdl_tec_type_module.type=mdl_tec_sector_type.type and mdl_tec_sector_type.sector='".$_REQUEST['id']."') union (select 0,module from mdl_tec_sector_module where sector='".$_REQUEST['id']."')) as modules left join mdl_tec_sector_mandatory on mdl_tec_sector_mandatory.sector='".$_REQUEST['id']."' and mdl_tec_sector_mandatory.module=modules.module left join mdl_tec_sector_mandatory_type on mdl_tec_sector_mandatory_type.sector='".$_REQUEST['id']."' and mdl_tec_sector_mandatory_type.type=modules.type) as modules_with_mandatory where modules_with_mandatory.module=mdl_tec_module.id  and mdl_tec_module.inuse=1) as mandatory_modules,mdl_tec_enrolments as enrolledusers,mdl_user  left join mdl_user_info_data on mdl_user_info_data.userid=mdl_user.id and mdl_user_info_data.fieldid=1 where mdl_user.id=enrolledusers.userid  and enrolledusers.timestart<=unix_timestamp() and enrolledusers.timeend>=unix_timestamp(substring(now(),1,10)) and $userwhere and enrolledusers.sector='".$_REQUEST['id']."' group by userid,compliancetype) as module_results,mdl_tec_sector_requirements) left join mdl_tec_type_requirements on mdl_tec_type_requirements.type=module_results.compliancetype where mdl_tec_sector_requirements.sector='".$_REQUEST['id']."') as types_passed group by userid) as type_results,mdl_tec_sector_requirements  where mdl_tec_sector_requirements.sector='".$_REQUEST['id']."' ) as module_results,mdl_user where module_results.userid=mdl_user.id and (type_results_status='failed' or type_passed_status='failed')";
}

if(!$result=mysql_query($compliantusers,$mydb)) {
  database_error(__FILE__,__LINE__,$compliantusers);
  exit;
}
$i=0;
$numrows=mysql_num_rows($result);
if($_REQUEST['exportkey']==1) {
  echo 
    '"Employee",'.
    '"Employee ID",'.
    '"Email",'.
    '"Firstname",'.
    '"Lastname",'.
    '"'.get_string("bm_parentorganisation").'",'.
    '"'.get_string("bm_division").'",'.
    '"'.get_string("bm_subdivision").'",'.
    '"'.get_string("bm_department").'",'.
    '"'.get_string("bm_region").'",'.
    '"'.get_string("bm_location").'",'.
    '"'.get_string("bm_jobtitle").'",'.
    '"'.get_string("bm_jobgrade").'",'.
    '"'.get_string("bm_status").'",'.  
    '"Compliance",'.
    '"Status"'."\n";
} else {
  ?>
  {"ResultSet":{
      "totalResultsAvailable":<?php echo $numrows?>,
	"totalResultsReturned":<?php echo $numrows?>,
	"firstResultPosition":1,
	"ResultSetMapUrl":"<?php echo $_SERVER['REQUEST_URI']?>",
	"Result":[
		  <?php
		  }
	if($numrows) {
	  while($row=mysql_fetch_array($result)) {
	    if($_REQUEST['exportkey']==1) {
	      echo 
		'"'.$row['firstname']." ".$row['lastname'].
		'","'.$row['idnumber'].
		'","'.$row['email'].
		'","'.$row['firstname'].
		'","'.$row['lastname'].
		'","'.$row['bm_parentorganisation'].
		'","'.$row['bm_division'].
		'","'.$row['bm_subdivision'].
		'","'.$row['bm_department'].
		'","'.$row['bm_region'].
		'","'.$row['bm_location'].
		'","'.$row['bm_jobtitle'].
		'","'.$row['bm_jobgrade'].
		'","'.$row['bm_status'].
		'","'.$_REQUEST['label'].
		'","'.$row['status'].
		'"'."\n";
	    } else {
	      
	      if($i) echo ",";
	      echo '{"id":"'.$row['userid'].'","user":"'.$row['user'].'","firstname":"'.$row['firstname'].'","lastname":"'.$row['lastname'].'","parentorganisation":"'.$row['bm_parentorganisation'].'","division":"'.$row['bm_division'].'","subdivision":"'.$row['bm_subdivision'].'","department":"'.$row['bm_department'].'","region":"'.$row['bm_region'].'","location":"'.$row['bm_location'].'","jobtitle":"'.$row['bm_jobtitle'].'","jobgrade":"'.$row['bm_jobgrade'].'","modules":"'.$row['nummodules'].'","mandatorymodules":"'.$row['num_mandatory_modules_passed'].'","modulegroupings":"'.$row['numtypes'].'","mandatorymodulegroupings":"'.$row['num_mandatory_types_passed'].'","email":"'.$row['email'].'"}';
	    }
	    $i++;
	  }
	}
      if(!$_REQUEST['exportkey']==1) {
	?>]
    }
  }
  <?php
}
mysql_free_result($result);
?>

