<?php
include "tz.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>sInfo</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Baguz Ach.">
<link rel="stylesheet" href="//bootswatch.com/simplex/bootstrap.css">
<script src="//goez.my.id/bootstrap/dist/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript"> 
<!--
$(document).ready(function(){getJSONData();});
var OutSpeed2=<?php echo floor($NetOutSpeed[2]) ?>;
var OutSpeed3=<?php echo floor($NetOutSpeed[3]) ?>;
var OutSpeed4=<?php echo floor($NetOutSpeed[4]) ?>;
var OutSpeed5=<?php echo floor($NetOutSpeed[5]) ?>;
var InputSpeed2=<?php echo floor($NetInputSpeed[2]) ?>;
var InputSpeed3=<?php echo floor($NetInputSpeed[3]) ?>;
var InputSpeed4=<?php echo floor($NetInputSpeed[4]) ?>;
var InputSpeed5=<?php echo floor($NetInputSpeed[5]) ?>;
function getJSONData()
{
	setTimeout("getJSONData()", 1000);
	$.getJSON('?act=rt&callback=?', displayData);
}
function ForDight(Dight,How)
{ 
  if (Dight<0){
  	var Last=0+"B/s";
  }else if (Dight<1024){
  	var Last=Math.round(Dight*Math.pow(10,How))/Math.pow(10,How)+"B/s";
  }else if (Dight<1048576){
  	Dight=Dight/1024;
  	var Last=Math.round(Dight*Math.pow(10,How))/Math.pow(10,How)+"K/s";
  }else{
  	Dight=Dight/1048576;
  	var Last=Math.round(Dight*Math.pow(10,How))/Math.pow(10,How)+"M/s";
  }
	return Last; 
}
function displayData(dataJSON)
{
	$("#useSpace").html(dataJSON.useSpace);
	$("#freeSpace").html(dataJSON.freeSpace);
	$("#hdPercent").html(dataJSON.hdPercent);
	$("#barhdPercent").width(dataJSON.barhdPercent);
	$("#TotalMemory").html(dataJSON.TotalMemory);
	$("#UsedMemory").html(dataJSON.UsedMemory);
	$("#FreeMemory").html(dataJSON.FreeMemory);
	$("#CachedMemory").html(dataJSON.CachedMemory);
	$("#Buffers").html(dataJSON.Buffers);
	$("#TotalSwap").html(dataJSON.TotalSwap);
	$("#swapUsed").html(dataJSON.swapUsed);
	$("#swapFree").html(dataJSON.swapFree);
	$("#swapPercent").html(dataJSON.swapPercent);
	$("#loadAvg").html(dataJSON.loadAvg);
	$("#uptime").html(dataJSON.uptime);
	$("#freetime").html(dataJSON.freetime);
	$("#stime").html(dataJSON.stime);
	$("#bjtime").html(dataJSON.bjtime);
	$("#memRealUsed").html(dataJSON.memRealUsed);
	$("#memRealFree").html(dataJSON.memRealFree);
	$("#memRealPercent").html(dataJSON.memRealPercent);
	$("#memPercent").html(dataJSON.memPercent);
	$("#barmemPercent").width(dataJSON.memPercent);
	$("#barmemRealPercent").width(dataJSON.barmemRealPercent);
	$("#memCachedPercent").html(dataJSON.memCachedPercent);
	$("#barmemCachedPercent").width(dataJSON.barmemCachedPercent);
	$("#barswapPercent").width(dataJSON.barswapPercent);
	$("#NetOut2").html(dataJSON.NetOut2);
	$("#NetOut3").html(dataJSON.NetOut3);
	$("#NetOut4").html(dataJSON.NetOut4);
	$("#NetOut5").html(dataJSON.NetOut5);
	$("#NetOut6").html(dataJSON.NetOut6);
	$("#NetOut7").html(dataJSON.NetOut7);
	$("#NetOut8").html(dataJSON.NetOut8);
	$("#NetOut9").html(dataJSON.NetOut9);
	$("#NetOut10").html(dataJSON.NetOut10);
	$("#NetInput2").html(dataJSON.NetInput2);
	$("#NetInput3").html(dataJSON.NetInput3);
	$("#NetInput4").html(dataJSON.NetInput4);
	$("#NetInput5").html(dataJSON.NetInput5);
	$("#NetInput6").html(dataJSON.NetInput6);
	$("#NetInput7").html(dataJSON.NetInput7);
	$("#NetInput8").html(dataJSON.NetInput8);
	$("#NetInput9").html(dataJSON.NetInput9);
	$("#NetInput10").html(dataJSON.NetInput10);	
	$("#NetOutSpeed2").html(ForDight((dataJSON.NetOutSpeed2-OutSpeed2),3));	OutSpeed2=dataJSON.NetOutSpeed2;
	$("#NetOutSpeed3").html(ForDight((dataJSON.NetOutSpeed3-OutSpeed3),3));	OutSpeed3=dataJSON.NetOutSpeed3;
	$("#NetOutSpeed4").html(ForDight((dataJSON.NetOutSpeed4-OutSpeed4),3));	OutSpeed4=dataJSON.NetOutSpeed4;
	$("#NetOutSpeed5").html(ForDight((dataJSON.NetOutSpeed5-OutSpeed5),3));	OutSpeed5=dataJSON.NetOutSpeed5;
	$("#NetInputSpeed2").html(ForDight((dataJSON.NetInputSpeed2-InputSpeed2),3));	InputSpeed2=dataJSON.NetInputSpeed2;
	$("#NetInputSpeed3").html(ForDight((dataJSON.NetInputSpeed3-InputSpeed3),3));	InputSpeed3=dataJSON.NetInputSpeed3;
	$("#NetInputSpeed4").html(ForDight((dataJSON.NetInputSpeed4-InputSpeed4),3));	InputSpeed4=dataJSON.NetInputSpeed4;
	$("#NetInputSpeed5").html(ForDight((dataJSON.NetInputSpeed5-InputSpeed5),3));	InputSpeed5=dataJSON.NetInputSpeed5;
}
-->
</script>
</head>
 <body role="document" id="top">

    <!-- Fixed navbar -->
    <!-- Fixed navbar -->
        <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><img src="//goez.my.id/goez-eggo.png" alt="gœz" title="g0eZ egGo" width="25" hight="25"/></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a class="goez" href="/">Home</a></li>
					</ul> 
        </div>
        </div>
        </div>
    <div class="container theme-showcase" style="padding: 28px 3px 5px 5px;">
<h1>Server Parameters</h1>
<div class="list-group">
<table class="table table-striped table-hover ">
<tbody>
  <tr>
    <td>Server Domain/IP</td>
    <td colspan="3"><?php echo @get_current_user();?> - <?php echo $_SERVER['SERVER_NAME'];?>(<?php if('/'==DIRECTORY_SEPARATOR){echo $_SERVER['SERVER_ADDR'];}else{echo @gethostbyname($_SERVER['SERVER_NAME']);} ?>)&nbsp;&nbsp;Your IP address is: <code><?php echo @$_SERVER['REMOTE_ADDR'];?></code></td>
  </tr>
  <tr>
    <td>Server identifies the</td>
    <td colspan="3"><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};?></td>
  </tr>
  <tr>
    <td width="15%">Server OS</td>
    <td width="35%"><?php $os = explode(" ", php_uname()); echo $os[0];?> &nbsp;Kernel version: <?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?></td>
    <td width="15%">Web Server</td>
    <td width="35%"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
  </tr>
  <tr>
    <td>Server Language</td>
    <td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
    <td>Server Port</td>
    <td><?php echo $_SERVER['SERVER_PORT'];?></td>
  </tr>
  <tr>
	  <td>Server HostName</td>
	  <td><?php if('/'==DIRECTORY_SEPARATOR ){echo $os[1];}else{echo $os[2];} ?></td>
	  <td>Absolute Path</td>
	  <td><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?></td>
	</tr>
  <tr>
	  <td>Administrator Mail</td>
	  <td><?php echo $_SERVER['SERVER_ADMIN'];?></td>
		<td>Prober Path</td>
		<td><?php echo str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];?></td>
	</tr>
	</tbody>
</table>
</div>
<?if("show"==$sysReShow){?>
  <h1>Real-time Data Server</h1>
<table class="table table-striped table-hover ">
  <tbody>
    <tr>
      <td>Time: </td>
      <td><!--<?php echo $stime;?>--><span id="stime"></span></td>
      <td>Uptime:</td>
      <td><!--<?php echo $uptime;?>--><span id="uptime"></span></td>
    </tr>
	    <tr>
      <td>CPU:</td>
      <td><?php echo $sysInfo['cpu']['num'];?>Core <?php echo $sysInfo['cpu']['model'];?></td>
      <td>Usage:</td>
      <td><?php if('/'==DIRECTORY_SEPARATOR){echo $cpu_show." | <a href='".$phpSelf."?act=cpu_percentage' target='_blank' class='static'>View Chart</a>";}else{echo "Only supports the Linux system";}?></td>
    </tr>
  </tbody>
</table> 	  
<h1>Space usage</h1>
		Total: <font color='#333333'><?php echo $dt;?></font>G,
		<font color='#333333'><span id="useSpace"> <?php echo $du;?></span></font>G Used,
		<font color='#333333'><span id="freeSpace"><?php echo $df;?></span></font>G Available
				<div class="progress">
  <div class="progress-bar progress-bar-info" id="barhdPercent" aria-valuenow="<?php echo $hdPercent;?>" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hdPercent;?>%%;"><span id="hdPercent"><?php echo $hdPercent;?></span>%
</div>
  </div>

<h1>Memory usage</h1>
<?php
$tmp = array(
    'memTotal', 'memUsed', 'memFree', 'memPercent',
    'memCached', 'memRealPercent',
    'swapTotal', 'swapUsed', 'swapFree', 'swapPercent'
);
foreach ($tmp AS $v) {
    $sysInfo[$v] = $sysInfo[$v] ? $sysInfo[$v] : 0;
}
?>
          Total Memory: 
          <font color='#CC0000'><?php echo $memTotal;?></font>,
          <font color='#CC0000'><span id="UsedMemory"><?php echo $mu;?></span></font> Used, Free
          <font color='#CC0000'><span id="FreeMemory"><?php echo $mf;?></span></font>
		  
	<div class="progress progress-striped active">
	<div class="progress-bar" id="barmemPercent" aria-valuenow="<?php echo $memPercent?>" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $memPercent?>%%">
  <span id="memPercent"><?php echo $memPercent;?></span>
  </div>
</div>
<?php

if($sysInfo['memCached']>0)
{
?>		
		  Cache Memory <span id="CachedMemory"><?php echo $mc;?></span>
		| Buffers  <span id="Buffers"><?php echo $mb;?></span>
		  <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success"  id="barmemCachedPercent" style="width: <?php echo $memCachedPercent?>%%">
            <span id="memCachedPercent"><?php echo $memCachedPercent;?></span>%
  </div>
</div>

          Real Memory Used
          <span id="memRealUsed"><?php echo $memRealUsed;?></span>
		  , Free
          <span id="memRealFree"><?php echo $memRealFree;?></span>

		 <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-info" id="barmemRealPercent" style="width: <?php echo $memRealPercent?>%%">
  <span id="memRealPercent"><?php echo $memRealPercent;?></span>%
  </div>
</div>
<?php
}

if($sysInfo['swapTotal']>0)
{
?>	
          Swap Memory: 
          <?php echo $st;?>
          , Used
          <span id="swapUsed"><?php echo $su;?></span>
          , Free
          <span id="swapFree"><?php echo $sf;?></span>
		  <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger"  id="barswapPercent" style="width: <?php echo $swapPercent?>%%">
  <span id="swapPercent"><?php echo $swapPercent;?></span>%
  </div>
</div>

<?php
}	
?>		  
	  Average System Load
	<span id="loadAvg"><?php echo $load;?></span>
		<div class="progress">
  <div class="progress-bar progress-bar-warning" style="width: <?php echo $memPercent?>%"></div>
   <div class="progress-bar progress-bar-info" style="width: <?php echo $memCachedPercent?>%"></div>
  <div class="progress-bar progress-bar-success" style="width: <?php echo $memRealPercent?>%"></div>
  <div class="progress-bar progress-bar" style="width: <?php echo $swapPercent?>%"></div>
</div>

<?}?>
<h1>Networks</h1>
<div class="list-group">
<?php if (false !== ($strs = @file("/proc/net/dev"))) : ?>
<table width="100%" cellpadding="3" cellspacing="0" align="center" class="table table-striped table-hover ">
<tbody>
<?php for ($i = 2; $i < count($strs); $i++ ) : ?>
<?php preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );?>
     <tr>
        <td width="13%"><?php echo $info[1][0]?> : </td>
        <td width="29%">In : <font color='#CC0000'><span id="NetInput<?php echo $i?>"><?php echo $NetInput[$i]?></span></font></td>
		<td width="14%">Real time: <font color='#CC0000'><span id="NetInputSpeed<?php echo $i?>">0B/s</span></font></td>
        <td width="29%">Out : <font color='#CC0000'><span id="NetOut<?php echo $i?>"><?php echo $NetOut[$i]?></span></font></td>
		<td width="14%">Real time: <font color='#CC0000'><span id="NetOutSpeed<?php echo $i?>">0B/s</span></font></td>
    </tr>
<?php endfor; ?>
</tbody>
</table>
</div>
<?php endif; ?>
<h1>PHP, Module, SQL, Test, Network Speed</h1>
<div class="list-group">
  <a href="#phpi" class="list-group-item">
    <h4 class="list-group-item-heading" id="phpi">PHP has been compiled module testing</h4>
	<p class="list-group-item-text">
<?php
$able=get_loaded_extensions();
foreach ($able as $key=>$value) {
	if ($key!=0 && $key%25==0) {
		echo '<br />';
	}
	echo "$value,&nbsp;";
}
?>
 </a>
 </div>
<div class="list-group">
  <a href="#phpp" class="list-group-item">
    <h4 class="list-group-item-heading" id="phpp">PHP Parameters</h4>
</a>	  </div>
<table class="table table-striped table-hover ">
  <tbody>
    <tr>
    <td width="32%">PHP Info: </td>
    <td width="18%">
		<?php
		$phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
		$disFuns=get_cfg_var("disable_functions");
		?>
    <?php echo (false!==eregi("phpinfo",$disFuns))? '<font color="red"><i class="fa fa-times"></i></font>' :"<a href='$phpSelf?act=phpinfo' target='_blank'>PHPINFO</a>";?>
    </td>
    <td width="32%">PHP Version: </td>
    <td width="18%"><?php echo PHP_VERSION;?></td>
  </tr>
  <tr>
    <td>Run PHP: </td>
    <td><?php echo strtoupper(php_sapi_name());?></td>
    <td>Memory Limit: </td>
    <td><?php echo show("memory_limit");?></td>
  </tr>
  <tr>
    <td>PHP Safe Mode: </td>
    <td><?php echo show("safe_mode");?></td>
    <td>Post Max Size: </td>
    <td><?php echo show("post_max_size");?></td>
  </tr>
  <tr>
    <td>Upload Max Filesize: </td>
    <td><?php echo show("upload_max_filesize");?></td>
    <td>Floating-point data of significant digits: </td>
    <td><?php echo show("precision");?></td>
  </tr>
  <tr>
    <td>Max Execution Time: </td>
    <td><?php echo show("max_execution_time");?>Second</td>
    <td>Socket TimeOut: </td>
    <td><?php echo show("default_socket_timeout");?>Second</td>
  </tr>
  <tr>
    <td>PHP Doc Root: </td>
    <td><?php echo show("doc_root");?></td>
    <td>User Dir: </td>
    <td><?php echo show("user_dir");?></td>
  </tr>
  <tr>
    <td>Enable Dl: </td>
    <td><?php echo show("enable_dl");?></td>
    <td>Include Path: </td>
    <td><?php echo show("include_path");?></td>
  </tr>
  <tr>
    <td>Display Errors: </td>
    <td><?php echo show("display_errors");?></td>
    <td>Register Globals: </td>
    <td><?php echo show("register_globals");?></td>
  </tr>
  <tr>
    <td>Magic Quotes Gpc: </td>
    <td><?php echo show("magic_quotes_gpc");?></td>
    <td>"&lt;?...?&gt;"Short Open Tag: </td>
    <td><?php echo show("short_open_tag");?></td>
  </tr>
  <tr>
    <td>"&lt;% %&gt;"ASP Tags: </td>
    <td><?php echo show("asp_tags");?></td>
    <td>Ignore Repeated Errors: </td>
    <td><?php echo show("ignore_repeated_errors");?></td>
  </tr>
  <tr>
    <td>Ignore Repeated Source: </td>
    <td><?php echo show("ignore_repeated_source");?></td>
    <td>Report Memleaks: </td>
    <td><?php echo show("report_memleaks");?></td>
  </tr>
  <tr>
    <td>Magic Quotes Gpc: </td>
    <td><?php echo show("magic_quotes_gpc");?></td>
    <td>Magic Quotes Runtime: </td>
    <td><?php echo show("magic_quotes_runtime");?></td>
  </tr>
  <tr>
    <td>Allow URL Fopen: </td>
    <td><?php echo show("allow_url_fopen");?></td>
    <td>Register Argc Argv: </td>
    <td><?php echo show("register_argc_argv");?></td>
  </tr>
  <tr>
    <td>Cookie：</td>
    <td><?php echo isset($_COOKIE)?'<font color="green"><i class="fa fa-check"></i></font>' : '<font color="red"><i class="fa fa-times"></i></font>';?></td>
    <td>Spell check(ASpell Library): </td>
    <td><?php echo isfun("aspell_check_raw");?></td>
  </tr>
   <tr>
    <td>High-precision math(BCMath)：</td>
    <td><?php echo isfun("bcadd");?></td>
    <td>PREL(PCRE)：</td>
    <td><?php echo isfun("preg_match");?></td>
   <tr>
    <td>PDF：</td>
    <td><?php echo isfun("pdf_close");?></td>
    <td>SNMP：</td>
    <td><?php echo isfun("snmpget");?></td>
  </tr> 
   <tr>
    <td>VMailMgr：</td>
    <td><?php echo isfun("vm_adduser");?></td>
    <td>Curl：</td>
    <td><?php echo isfun("curl_init");?></td>
  </tr> 
   <tr>
    <td>SMTP：</td>
    <td><?php echo get_cfg_var("SMTP")?'<font color="green"><i class="fa fa-check"></i></font>' : '<font color="red"><i class="fa fa-times"></i></font>';?></td>
    <td>SMTP：</td>
    <td><?php echo get_cfg_var("SMTP")?get_cfg_var("SMTP"):'<font color="red"><i class="fa fa-times"></i></font>';?></td>
  </tr> 
	<tr>
		<td>Enable Functions: </td>
		<td colspan="3"><a href='<?php echo $phpSelf;?>?act=Function' target='_blank' class='static'>Click here to view more!</a></td>		
	</tr>
	<tr>


		<td>Disable Functions: </td>
		<td colspan="3" class="word">
<?php 
$disFuns=get_cfg_var("disable_functions");
if(empty($disFuns))
{
	echo '<font color=red><i class="fa fa-times"></i></font>';
}
else
{ 
	//echo $disFuns;
	$disFuns_array =  explode(',',$disFuns);
	foreach ($disFuns_array as $key=>$value) 
	{
		if ($key!=0 && $key%5==0) {
			echo '<br />';
	}
	echo "$value&nbsp;&nbsp;";
}	
}

?>
		</td>
	</tr>
	  </tbody>
</table>  

<div class="list-group">
  <a href="#comp" class="list-group-item">
    <h4 class="list-group-item-heading" id="comp">Components</h4>
</a>	  </div>
<table class="table table-striped table-hover ">
  <tbody>
  <tr>
    <td width="32%">FTP: </td>
    <td width="18%"><?php echo isfun("ftp_login");?></td>
    <td width="32%">XML: </td>
    <td width="18%"><?php echo isfun("xml_set_object");?></td>
  </tr>
  <tr>
    <td>Session: </td>
    <td><?php echo isfun("session_start");?></td>
    <td>Socket: </td>
    <td><?php echo isfun("socket_accept");?></td>
  </tr>
  <tr>
    <td>Calendar</td>
    <td><?php echo isfun('cal_days_in_month');?>
	</td>
    <td>Allow Url Fopen: </td>
    <td><?php echo show("allow_url_fopen");?></td>
  </tr>
  <tr>
    <td>GD Library: </td>
    <td>
    <?php
        if(function_exists(gd_info)) {
            $gd_info = @gd_info();
	        echo $gd_info["GD Version"];
	    }else{echo '<font color="red"><i class="fa fa-times"></i></font>';}
	?></td>
    <td>Zlib: </td>
    <td><?php echo isfun("gzclose");?></td>
  </tr>
  <tr>
    <td>IMAP: </td>
    <td><?php echo isfun("imap_close");?></td>
    <td>JDToGregorian: </td>
    <td><?php echo isfun("JDToGregorian");?></td>
  </tr>
  <tr>
    <td>Preg Match: </td>
    <td><?php echo isfun("preg_match");?></td>
    <td>WDDX: </td>
    <td><?php echo isfun("wddx_add_vars");?></td>
  </tr>
  <tr>
    <td>Iconv: </td>
    <td><?php echo isfun("iconv");?></td>
    <td>mbstring: </td>
    <td><?php echo isfun("mb_eregi");?></td>
  </tr>
  <tr>
    <td>BCADD: </td>
    <td><?php echo isfun("bcadd");?></td>
    <td>LDAP: </td>
    <td><?php echo isfun("ldap_close");?></td>
  </tr>
  <tr>
    <td>MCrypt: </td>
    <td><?php echo isfun("mcrypt_cbc");?></td>
    <td>Mhash Count: </td>
    <td><?php echo isfun("mhash_count");?></td>
  </tr>
	  </tbody>
</table>  

<div class="list-group">
  <a href="#ocomp" class="list-group-item">
    <h4 class="list-group-item-heading" id="ocomp">Other Components</h4>
</a>	  </div>
<table class="table table-striped table-hover ">
  <tbody>
  <tr>
    <td width="32%">Zend Version</td>
    <td width="18%"><?php $zend_version = zend_version();if(empty($zend_version)){echo '<font color=red><i class="fa fa-times"></i></font>';}else{echo $zend_version;}?></td>
    <td width="32%">
<?php
$PHP_VERSION = PHP_VERSION;
$PHP_VERSION = substr($PHP_VERSION,2,1);
if($PHP_VERSION > 2)
{
	echo "ZendGuardLoader[On]";
}
else
{
	echo "Zend Optimizer";
}
?>
	</td>
    <td width="18%"><?php if($PHP_VERSION > 2){echo (get_cfg_var("zend_loader.enable"))?'<font color=green><i class="fa fa-check"></i></font>':'<font color=red><i class="fa fa-times"></i></font>';} else{if(function_exists('zend_optimizer_version')){	echo zend_optimizer_version();}else{	echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend.ze1_compatibility_mode")||get_cfg_var("zend_extension_ts"))?'<font color=green><i class="fa fa-check"></i></font>':'<font color=red><i class="fa fa-times"></i></font>';}}?></td>
  </tr>
  <tr>
    <td>eAccelerator</td>
    <td><?php if((phpversion('eAccelerator'))!=''){echo phpversion('eAccelerator');}else{ echo "<font color=red><i class=\"fa fa-times\"></i></font>";} ?></td>
    <td>ioncube</td>
    <td><?php if(extension_loaded('ionCube Loader')){   $ys = ioncube_loader_iversion();   $gm = ".".(int)substr($ys,3,2);   echo ionCube_Loader_version().$gm;}else{echo "<font color=red><i class=\"fa fa-times\"></i></font>";}?></td>
  </tr>
  <tr>
    <td>XCache</td>
    <td><?php if((phpversion('XCache'))!=''){echo phpversion('XCache');}else{ echo "<font color=red><i class=\"fa fa-times\"></i></font>";} ?></td>
    <td>APC</td>
    <td><?php if((phpversion('APC'))!=''){echo phpversion('APC');}else{ echo "<font color=red><i class=\"fa fa-times\"></i></font>";} ?></td>
  </tr>

	  </tbody>
</table>  

<div class="list-group">
  <a href="#db" class="list-group-item">
    <h4 class="list-group-item-heading" id="db">Database</h4>
</a>	  </div>
<table class="table table-striped table-hover ">
  <tbody>
  <tr>
    <td width="32%">MySQL: </td>
    <td width="18%"><?php echo isfun("mysql_close");?>
    <?php
    if(function_exists("mysql_get_server_info")) {
        $s = @mysql_get_server_info();
        $s = $s ? '&nbsp; mysql_server version: '.$s : '';
	    $c = '&nbsp; mysql_client version: '.@mysql_get_client_info();
        echo $s;
    }
    ?>
	</td>
    <td width="32%">ODBC: </td>
    <td width="18%"><?php echo isfun("odbc_close");?></td>
  </tr>
  <tr>
    <td>Oracle: </td>
    <td><?php echo isfun("ora_close");?></td>
    <td>SQL Server: </td>
    <td><?php echo isfun("mssql_close");?></td>
  </tr>
  <tr>
    <td>dBASE: </td>
    <td><?php echo isfun("dbase_close");?></td>
    <td>mSQL: </td>
    <td><?php echo isfun("msql_close");?></td>
  </tr>
  <tr>
    <td>SQLite: </td>
    <td><?php if(extension_loaded('sqlite3')) {$sqliteVer = SQLite3::version();echo '<font color=green><i class="fa fa-check"></i></font>　';echo "SQLite3　Ver ";echo $sqliteVer[versionString];}else {echo isfun("sqlite_close");if(isfun("sqlite_close") == '<font color="green"><i class="fa fa-check"></i></font>') {echo "&nbsp; ".@sqlite_libversion();}}?></td>
    <td>Hyperwave: </td>
    <td><?php echo isfun("hw_close");?></td>
  </tr>
  <tr>
    <td>Postgre SQL: </td>
    <td><?php echo isfun("pg_close"); ?></td>
    <td>Informix: </td>
    <td><?php echo isfun("ifx_close");?></td>
  </tr>
  <tr>
    <td>DBA database: </td>
    <td><?php echo isfun("dba_close");?></td>
    <td>DBM database: </td>
    <td><?php echo isfun("dbmclose");?></td>
  </tr>
  <tr>
    <td>FilePro database：</td>
    <td><?php echo isfun("filepro_fieldcount");?></td>
    <td>SyBase database：</td>
    <td><?php echo isfun("sybase_close");?></td>
  </tr> 
	  </tbody>
</table>  
<a name="w_performance"></a><a name="bottom"></a>
<form action="<?php echo $_SERVER[PHP_SELF]."#bottom";?>" method="post">
<div class="list-group">
  <a href="#spt" class="list-group-item">
    <h4 class="list-group-item-heading" id="spt">Server Performance Test</h4>
</a>	  </div>

<table class="table table-striped table-hover ">
  <tbody>
  <tr align="center">
    <td width="13%">Reference Object</td>
    <td width="21%">Int Test<br />(1+1 Count 3 Million)</td>
    <td width="24%">Float Test<br />(Pi times the square root of 3 million)</td>
    <td width="21%">I/O Test<br />(10K file read 10,000 times)</td>
    <td width="21%">CPU Info</td>
  </tr>
  <tr align="center">
    <td align="left">LinodeVPS</td>
    <td>0.357 Second</td>
    <td>0.802 Second</td>
    <td>0.023 Second</td>
    <td align="left">4 x Xeon L5520 @ 2.27GHz</td>
  </tr> 
  <tr align="center">
    <td align="left">PhotonVPS.com</td>
    <td>0.431 Second</td>
    <td>1.024 Second</td>
    <td>0.034 Second</td>
    <td align="left">8 x Xeon E5520 @ 2.27GHz</td>
  </tr>
  <tr align="center">
    <td align="left">SpaceRich.com</td>
    <td>0.421 Second</td>
    <td>1.003 Second</td>
    <td>0.038 Second</td>
    <td align="left">4 x Core i7 920 @ 2.67GHz</td>
  </tr>
  <tr align="center">
    <td align="left">RiZie.com</td>
    <td>0.521 Second</td>
    <td>1.559 Second</td>
    <td>0.054 Second</td>
    <td align="left">2 x Pentium4 3.00GHz</td>
  </tr>
  <tr align="center">
    <td align="left">CitynetHost.com</td>
    <td>0.343 Second</td>
    <td>0.761 Second</td>
    <td>0.023 Second</td>
    <td align="left">2 x Core2Duo E4600 @ 2.40GHz</td>
  </tr>
  <tr align="center">
    <td align="left">IXwebhosting.com</td>
    <td>0.535 Second</td>
    <td>1.607 Second</td>
    <td>0.058 Second</td>
    <td align="left">4 x Xeon E5530 @ 2.40GHz</td>
  </tr> 
  <tr align="center">
    <td>This Server</td>
    <td><?php echo $valInt;?><br /><input class="btn btn-default" name="act" type="submit" value="Int Test" /></td>
    <td><?php echo $valFloat;?><br /><input class="btn btn-default" name="act" type="submit" value="Float Test" /></td>
    <td><?php echo $valIo;?><br /><input class="btn btn-default" name="act" type="submit" value="IO Test" /></td>
    <td></td>
  </tr>
    	  </tbody>
 </table>

<input type="hidden" name="pInt" value="<?php echo $valInt;?>" />
<input type="hidden" name="pFloat" value="<?php echo $valFloat;?>" />
<input type="hidden" name="pIo" value="<?php echo $valIo;?>" />

<div class="list-group">
  <a href="#nst" class="list-group-item">
    <h4 class="list-group-item-heading" id="nst">Network Speed Test</h4>
</a>	  </div>
<table class="table table-striped table-hover " id="w_networkspeed">
  <tbody>
  <tr>
    <td width="19%" align="center"><input name="act" type="submit" class="btn btn-default" value="Start Test" />
        <br />
	1000k bytes sent to the client data
	</td>
    <td width="81%" align="center" >

  <table align="center" width="550" border="0" cellspacing="0" cellpadding="0" >
    <tr >
    <td height="15" width="50">Bandwidth</td>
	<td height="15" width="50">1M</td>
    <td height="15" width="50">2M</td>
    <td height="15" width="50">3M</td>
    <td height="15" width="50">4M</td>
    <td height="15" width="50">5M</td>
    <td height="15" width="50">6M</td>
    <td height="15" width="50">7M</td>
    <td height="15" width="50">8M</td>
    <td height="15" width="50">9M</td>
    <td height="15" width="50">10M</td>
    </tr>
   <tr>
    <td colspan="11" class="suduk" ><table align="center" width="550" border="0" cellspacing="0" cellpadding="0" height="8" class="suduk">
    <tr>
      <td class="sudu"  width="<?php 
	if(preg_match("/[^\d-., ]/",$speed))
		{
			echo "0";
		}
	else{
			echo 550*($speed/11000);
		} 
		?>"></td>
      <td class="suduk" width="<?php 
	if(preg_match("/[^\d-., ]/",$speed))
		{
			echo "550";
		}
	else{
			echo 550-550*($speed/11000);
		} 
		?>"></td>
    </tr>
    </table>
   </td>
  </tr>
  </table>
  <?php echo (isset($_GET['speed']))?"Download 1000KB Used <font color='#cc0000'>".$_GET['speed']."</font> Millisecond, Download Speed: "."<font color='#cc0000'>".$speed."</font>"." kb/s":"<font color='#cc0000'>&nbsp;No Test&nbsp;</font>" ?>

    </td>
  </tr>
    	  </tbody>
</table>

<div class="list-group">
  <a href="#sql" class="list-group-item">
    <h4 class="list-group-item-heading" id="sql">MySQL Database connection detection</h4>
</a></div>
<table class="table table-striped table-hover ">
  <tbody>
  <tr>
      <td>Host: <input type="text" name="host" value="localhost" size="10" class="form-control input-sm"/></td>
   <td>  Port: <input type="text" name="port" value="3306" size="10" class="form-control input-sm" style="width:40%"/></td>
    <td>  Username: <input type="text" name="login" size="10" class="form-control input-sm"/></td>
    <td>  Password: <input type="password" name="password" size="10" class="form-control input-sm"/></td>
    <td> <br /><input class="btn btn-default" type="submit" name="act" value="MySQL Test" /></td> 
	  </tr>
  <?php
  if ($_POST['act'] == 'MySQL Test') {
  	if(function_exists("mysql_close")==1) {
  		$link = @mysql_connect($host.":".$port,$login,$password);
  		if ($link){
  			echo "<script>alert('Connect to the MySql database to normal')</script>";
  		} else {
  			echo "<script>alert('Unable to connect to MySql database!')</script>";
  		}
  	} else {
  		echo "<script>alert('Server does not support MySQL database!')</script>";
  	}
  }
	?>
  	  </tbody>
</table>
<div class="list-group">
  <a href="#fs" class="list-group-item">
    <h4 class="list-group-item-heading" id="fs">Function Test</h4>
</a></div>
<table class="table table-striped table-hover ">
  <tbody>
  <tr>
    <td>
      <input type="text" name="funName" class="form-control input-sm" />
    </td>
    <td>
      <input class="btn btn-default" type="submit" name="act" align="right" value="Function Test" />
    </td>
  </tr>
  <?php
  if ($_POST['act'] == 'Function Test') {
  	echo "<script>alert('$funRe')</script>";
  }
  ?>
   </tbody>
</table>


<div class="list-group">
  <a href="#mst" class="list-group-item">
    <h4 class="list-group-item-heading" id="mst">Mail Send Test</h4>
</a></div>
<table class="table table-striped table-hover ">
  <tbody>
  <tr>
    <td>
      <input type="text" name="mailAdd"  class="form-control input-sm"/>
    </td>
    <td>
    <input class="btn btn-default" type="submit" name="act" value="Mail Test" />
    </td>
  </tr>
  <?php
  if ($_POST['act'] == 'Mail Test') {
  	echo "<script>alert('$mailRe')</script>";
  }
  ?>
    	  </tbody>
</table>
<hr /><center><p>
<small><?php $run_time = sprintf('%0.4f', microtime_float() - $time_start);?>Processed in <font color='red'><?php echo $run_time?></font> seconds. <font color='red'><?php echo memory_usage();?> </font>memory usage.</small><br />
Tweek By <a href="http://yahei.net" target="_new">Yahei.Net</a> | Awensome By <a href="http://goez.my.id">Me</a>.<br /><a href="#top">TOP!</a></p>
</center>
</body>
</html>
