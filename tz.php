<?php
/* ---------------------------------------------------- */
/* 程序名称: PHP探针-Yahei
/* 程序功能: 探测系统的Web服务器运行环境
/* 程序开发: Yahei.Net
/* 联系方式: info@Yahei.net
/* Date: 1970-01-01 / 2012-07-08
/* ---------------------------------------------------- */
/* 使用条款:
/* 1.该软件免费使用.
/* 2.禁止任何衍生版本.
/* ---------------------------------------------------- */
/* 感谢以下朋友为探针做出的贡献:
/* zyypp,酷を龙卷风,龙智超,菊花肿了,闲人,Clare Lou,hotsnow
/* 二戒,yexinzhu,wangyu1314,Kokgog,gibyasus,akw28888,A大,huli
/* 小松,charwin,华景网络
/* 您可能是下一个?
/* ---------------------------------------------------- */
error_reporting(0); //抑制所有错误信息
@header("content-Type: text/html; charset=utf-8"); //语言强制
ob_start();

$title = "Yahei-PHP Prober";
$version = "v0.4.7"; //版本号

define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST']));

$time_start = microtime_float();

function memory_usage() 
{
	$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
	return $memory;
}

// 计时
function microtime_float() 
{
	$mtime = microtime();
	$mtime = explode(' ', $mtime);
	return $mtime[1] + $mtime[0];
}

//单位转换
function formatsize($size) 
{
	$danwei=array(' B ',' K ',' M ',' G ',' T ');
	$allsize=array();
	$i=0;

	for($i = 0; $i <5; $i++) 
	{
		if(floor($size/pow(1024,$i))==0){break;}
	}

	for($l = $i-1; $l >=0; $l--) 
	{
		$allsize1[$l]=floor($size/pow(1024,$l));
		$allsize[$l]=$allsize1[$l]-$allsize1[$l+1]*1024;
	}

	$len=count($allsize);

	for($j = $len-1; $j >=0; $j--) 
	{
		$fsize=$fsize.$allsize[$j].$danwei[$j];
	}	
	return $fsize;
}

function valid_email($str) 
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

//检测PHP设置参数
function show($varName)
{
	switch($result = get_cfg_var($varName))
	{
		case 0:
			return '<font color="red">×</font>';
		break;
		
		case 1:
			return '<font color="green">√</font>';
		break;
		
		default:
			return $result;
		break;
	}
}

//保留服务器性能测试结果
$valInt = isset($_POST['pInt']) ? $_POST['pInt'] : "No Test";
$valFloat = isset($_POST['pFloat']) ? $_POST['pFloat'] : "No Test";
$valIo = isset($_POST['pIo']) ? $_POST['pIo'] : "No Test";

if ($_GET['act'] == "phpinfo") 
{
	phpinfo();
	exit();
} 
elseif($_POST['act'] == "Int Test")
{
	$valInt = test_int();
} 
elseif($_POST['act'] == "Float Test")
{
	$valFloat = test_float();
} 
elseif($_POST['act'] == "IO Test")
{
	$valIo = test_io();
} 
//网速测试-开始
elseif($_POST['act']=="Start Test")
{
?>
	<script language="javascript" type="text/javascript">
		var acd1;
		acd1 = new Date();
		acd1ok=acd1.getTime();
	</script>
	<?php
	for($i=1;$i<=100000;$i++)
	{
		echo "<!--567890#########0#########0#########0#########0#########0#########0#########0#########012345-->";
	}
	?>
	<script language="javascript" type="text/javascript">
		var acd2;
		acd2 = new Date();
		acd2ok=acd2.getTime();
		window.location = '?speed=' +(acd2ok-acd1ok)+'#w_networkspeed';
	</script>
<?php
}
//网速测试-结束
elseif($_GET['act'] == "Function")
{
	$arr = get_defined_functions();
	Function php()
	{
	}
	echo "<pre>";
	Echo "This shows all the functions supported by the system, and custom functions\n";
	print_r($arr);
	echo "</pre>";
	exit();
}elseif($_GET['act'] == "disable_functions")
{
	$disFuns=get_cfg_var("disable_functions");
	if(empty($disFuns))
	{
		$arr = '<font color=red>×</font>';
	}
	else
	{ 
		$arr = $disFuns;
	}
	Function php()
	{
	}
	echo "<pre>";
	Echo "This shows all the functions disable by the system\n";
	print_r($arr);
	echo "</pre>";
	exit();
}

//MySQL检测
if ($_POST['act'] == 'MySQL Test')
{
	$host = isset($_POST['host']) ? trim($_POST['host']) : '';
	$port = isset($_POST['port']) ? (int) $_POST['port'] : '';
	$login = isset($_POST['login']) ? trim($_POST['login']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';
	$host = preg_match('~[^a-z0-9\-\.]+~i', $host) ? '' : $host;
	$port = intval($port) ? intval($port) : '';
	$login = preg_match('~[^a-z0-9\_\-]+~i', $login) ? '' : htmlspecialchars($login);
	$password = is_string($password) ? htmlspecialchars($password) : '';
}
elseif ($_POST['act'] == 'Function Test')
{
	$funRe = "Function".$_POST['funName']."Test results support the position: ".isfun1($_POST['funName']);
} 
elseif ($_POST['act'] == 'Mail Test')
{
	$mailRe = "Mail test results: send";
	if($_SERVER['SERVER_PORT']==80){$mailContent = "http://".$_SERVER['SERVER_NAME'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);}
	else{$mailContent = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);}
	$mailRe .= (false !== @mail($_POST["mailAdd"], $mailContent, "This is a test mail!")) ? "Complete":"Failure";
}

//网络速度测试
if(isset($_POST['speed']))
{
	$speed=round(100/($_POST['speed']/1000),2);
}
elseif($_GET['speed']=="0")
{
	$speed=6666.67;
}
elseif(isset($_GET['speed']) and $_GET['speed']>0)
{
	$speed=round(100/($_GET['speed']/1000),2); //下载速度: $speed kb/s
}
else
{
	$speed="<font color=\"red\">&nbsp;No Test&nbsp;</font>";
}	
	
	
// 检测函数支持
function isfun($funName = '')
{
    if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '错误';
	return (false !== function_exists($funName)) ? '<font color="green">√</font>' : '<font color="red">×</font>';
}
function isfun1($funName = '')
{
    if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '错误';
	return (false !== function_exists($funName)) ? '√' : '×';
}

//整数运算能力测试
function test_int()
{
	$timeStart = gettimeofday();
	for($i = 0; $i < 3000000; $i++)
	{
		$t = 1+1;
	}
	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)." Second";
	return $time;
}

//浮点运算能力测试
function test_float()
{
	//得到圆周率值
	$t = pi();
	$timeStart = gettimeofday();

	for($i = 0; $i < 3000000; $i++)
	{
		//开平方
		sqrt($t);
	}

	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."Second";
	return $time;
}

//IO能力测试
function test_io()
{
	$fp = @fopen(PHPSELF, "r");
	$timeStart = gettimeofday();
	for($i = 0; $i < 10000; $i++) 
	{
		@fread($fp, 10240);
		@rewind($fp);
	}
	$timeEnd = gettimeofday();
	@fclose($fp);
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."Second";
	return($time);
}

function GetCoreInformation() {$data = file('/proc/stat');$cores = array();foreach( $data as $line ) {if( preg_match('/^cpu[0-9]/', $line) ){$info = explode(' ', $line);$cores[]=array('user'=>$info[1],'nice'=>$info[2],'sys' => $info[3],'idle'=>$info[4],'iowait'=>$info[5],'irq' => $info[6],'softirq' => $info[7]);}}return $cores;}
function GetCpuPercentages($stat1, $stat2) {if(count($stat1)!==count($stat2)){return;}$cpus=array();for( $i = 0, $l = count($stat1); $i < $l; $i++) {	$dif = array();	$dif['user'] = $stat2[$i]['user'] - $stat1[$i]['user'];$dif['nice'] = $stat2[$i]['nice'] - $stat1[$i]['nice'];	$dif['sys'] = $stat2[$i]['sys'] - $stat1[$i]['sys'];$dif['idle'] = $stat2[$i]['idle'] - $stat1[$i]['idle'];$dif['iowait'] = $stat2[$i]['iowait'] - $stat1[$i]['iowait'];$dif['irq'] = $stat2[$i]['irq'] - $stat1[$i]['irq'];$dif['softirq'] = $stat2[$i]['softirq'] - $stat1[$i]['softirq'];$total = array_sum($dif);$cpu = array();foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 2);$cpus['cpu' . $i] = $cpu;}return $cpus;}
$stat1 = GetCoreInformation();sleep(1);$stat2 = GetCoreInformation();$data = GetCpuPercentages($stat1, $stat2);
$cpu_show = $data['cpu0']['user']."%us,  ".$data['cpu0']['sys']."%sy,  ".$data['cpu0']['nice']."%ni, ".$data['cpu0']['idle']."%id,  ".$data['cpu0']['iowait']."%wa,  ".$data['cpu0']['irq']."%irq,  ".$data['cpu0']['softirq']."%softirq";
function makeImageUrl($title, $data) {$api='http://api.yahei.net/tz/cpu_show.php?id=';$url.=$data['user'].',';$url.=$data['nice'].',';$url.=$data['sys'].',';$url.=$data['idle'].',';$url.=$data['iowait'];$url.='&chdl=User|Nice|Sys|Idle|Iowait&chdlp=b&chl=';$url.=$data['user'].'%25|';$url.=$data['nice'].'%25|';$url.=$data['sys'].'%25|';$url.=$data['idle'].'%25|';$url.=$data['iowait'].'%25';$url.='&chtt=Core+'.$title;return $api.base64_encode($url);}
if($_GET['act'] == "cpu_percentage"){echo "<center><b><font face='Microsoft YaHei' color='#666666' size='3'>Slow image loading, please be patient!</font></b><br /><br />";foreach( $data as $k => $v ) {echo '<img src="' . makeImageUrl( $k, $v ) . '" style="width:360px;height:240px;border: #CCCCCC 1px solid;background: #FFFFFF;margin:5px;padding:5px;" />';}echo "</center>";exit();}

// 根据不同系统取得CPU相关信息
switch(PHP_OS)
{
	case "Linux":
		$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
	break;
	
	case "FreeBSD":
		$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
	break;
	
/*	
	case "WINNT":
		$sysReShow = (false !== ($sysInfo = sys_windows()))?"show":"none";
	break;
*/	
	
	default:
	break;
}

//linux系统探测
function sys_linux()
{
    // CPU
    if (false === ($str = @file("/proc/cpuinfo"))) return false;
    $str = implode("", $str);
    @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
    @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
    @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
    @preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $bogomips);
    if (false !== is_array($model[1]))
	{
        $res['cpu']['num'] = sizeof($model[1]);
		/*
        for($i = 0; $i < $res['cpu']['num']; $i++)
        {
            $res['cpu']['model'][] = $model[1][$i].'&nbsp;('.$mhz[1][$i].')';
            $res['cpu']['mhz'][] = $mhz[1][$i];
            $res['cpu']['cache'][] = $cache[1][$i];
            $res['cpu']['bogomips'][] = $bogomips[1][$i];
        }*/
		if($res['cpu']['num']==1)
			$x1 = '';
		else
			$x1 = ' ×'.$res['cpu']['num'];
		$mhz[1][0] = ' | Frequency:'.$mhz[1][0];
		$cache[1][0] = ' | Secondary cache:'.$cache[1][0];
		$bogomips[1][0] = ' | Bogomips:'.$bogomips[1][0];
		$res['cpu']['model'][] = $model[1][0].$mhz[1][0].$cache[1][0].$bogomips[1][0].$x1;
        if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
        if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
        if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
        if (false !== is_array($res['cpu']['bogomips'])) $res['cpu']['bogomips'] = implode("<br />", $res['cpu']['bogomips']);
	}

    // NETWORK

    // UPTIME
    if (false === ($str = @file("/proc/uptime"))) return false;
    $str = explode(" ", implode("", $str));
    $str = trim($str[0]);
    $min = $str / 60;
    $hours = $min / 60;
    $days = floor($hours / 24);
    $hours = floor($hours - ($days * 24));
    $min = floor($min - ($days * 60 * 24) - ($hours * 60));
    if ($days !== 0) $res['uptime'] = $days."Day";
    if ($hours !== 0) $res['uptime'] .= $hours."Hour";
    $res['uptime'] .= $min."Minute";

    // MEMORY
    if (false === ($str = @file("/proc/meminfo"))) return false;
    $str = implode("", $str);
    preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
	preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buffers);

    $res['memTotal'] = round($buf[1][0]/1024, 2);
    $res['memFree'] = round($buf[2][0]/1024, 2);
    $res['memBuffers'] = round($buffers[1][0]/1024, 2);
	$res['memCached'] = round($buf[3][0]/1024, 2);
    $res['memUsed'] = $res['memTotal']-$res['memFree'];
    $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

    $res['memRealUsed'] = $res['memTotal'] - $res['memFree'] - $res['memCached'] - $res['memBuffers']; //真实内存使用
	$res['memRealFree'] = $res['memTotal'] - $res['memRealUsed']; //真实空闲
    $res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0; //真实内存使用率

	$res['memCachedPercent'] = (floatval($res['memCached'])!=0)?round($res['memCached']/$res['memTotal']*100,2):0; //Cached内存使用率

    $res['swapTotal'] = round($buf[4][0]/1024, 2);
    $res['swapFree'] = round($buf[5][0]/1024, 2);
    $res['swapUsed'] = round($res['swapTotal']-$res['swapFree'], 2);
    $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;

    // LOAD AVG
    if (false === ($str = @file("/proc/loadavg"))) return false;
    $str = explode(" ", implode("", $str));
    $str = array_chunk($str, 4);
    $res['loadAvg'] = implode(" ", $str[0]);

    return $res;
}

//FreeBSD系统探测
function sys_freebsd()
{
	//CPU
	if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
	$res['cpu']['model'] = get_key("hw.model");
	//LOAD AVG
	if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false;
	//UPTIME
	if (false === ($buf = get_key("kern.boottime"))) return false;
	$buf = explode(' ', $buf);
	$sys_ticks = time() - intval($buf[3]);
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."Day";
	if ($hours !== 0) $res['uptime'] .= $hours."Hour";
	$res['uptime'] .= $min."Minute";
	//MEMORY
	if (false === ($buf = get_key("hw.physmem"))) return false;
	$res['memTotal'] = round($buf/1024/1024, 2);

	$str = get_key("vm.vmtotal");
	preg_match_all("/\nVirtual Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buff, PREG_SET_ORDER);
	preg_match_all("/\nReal Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buf, PREG_SET_ORDER);

	$res['memRealUsed'] = round($buf[0][2]/1024, 2);
	$res['memCached'] = round($buff[0][2]/1024, 2);
	$res['memUsed'] = round($buf[0][1]/1024, 2) + $res['memCached'];
	$res['memFree'] = $res['memTotal'] - $res['memUsed'];
	$res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

	$res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0;

	return $res;
}

//取得参数值 FreeBSD
function get_key($keyName)
{
	return do_command('sysctl', "-n $keyName");
}

//确定执行文件位置 FreeBSD
function find_command($commandName)
{
	$path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
	foreach($path as $p) 
	{
		if (@is_executable("$p/$commandName")) return "$p/$commandName";
	}
	return false;
}

//执行系统命令 FreeBSD
function do_command($commandName, $args)
{
	$buffer = "";
	if (false === ($command = find_command($commandName))) return false;
	if ($fp = @popen("$command $args", 'r')) 
	{
		while (!@feof($fp))
		{
			$buffer .= @fgets($fp, 4096);
		}
		return trim($buffer);
	}
	return false;
}

//windows系统探测
function sys_windows()
{
	if (PHP_VERSION >= 5)
	{
		$objLocator = new COM("WbemScripting.SWbemLocator");
		$wmi = $objLocator->ConnectServer();
		$prop = $wmi->get("Win32_PnPEntity");
	}
	else
	{
		return false;
	}

	//CPU
	$cpuinfo = GetWMI($wmi,"Win32_Processor", array("Name","L2CacheSize","NumberOfCores"));
	$res['cpu']['num'] = $cpuinfo[0]['NumberOfCores'];
	if (null == $res['cpu']['num']) 
	{
		$res['cpu']['num'] = 1;
	}/*
	for ($i=0;$i<$res['cpu']['num'];$i++)
	{
		$res['cpu']['model'] .= $cpuinfo[0]['Name']."<br />";
		$res['cpu']['cache'] .= $cpuinfo[0]['L2CacheSize']."<br />";
	}*/
	$cpuinfo[0]['L2CacheSize'] = ' ('.$cpuinfo[0]['L2CacheSize'].')';
	if($res['cpu']['num']==1)
		$x1 = '';
	else
		$x1 = ' ×'.$res['cpu']['num'];
	$res['cpu']['model'] = $cpuinfo[0]['Name'].$cpuinfo[0]['L2CacheSize'].$x1;
	// SYSINFO
	$sysinfo = GetWMI($wmi,"Win32_OperatingSystem", array('LastBootUpTime','TotalVisibleMemorySize','FreePhysicalMemory','Caption','CSDVersion','SerialNumber','InstallDate'));
	$sysinfo[0]['Caption']=iconv('GBK', 'UTF-8',$sysinfo[0]['Caption']);
	$sysinfo[0]['CSDVersion']=iconv('GBK', 'UTF-8',$sysinfo[0]['CSDVersion']);
	$res['win_n'] = $sysinfo[0]['Caption']." ".$sysinfo[0]['CSDVersion']." 序列号:{$sysinfo[0]['SerialNumber']} 于".date('Y年m月d日H:i:s',strtotime(substr($sysinfo[0]['InstallDate'],0,14)))."安装";
	//UPTIME
	$res['uptime'] = $sysinfo[0]['LastBootUpTime'];

	$sys_ticks = 3600*8 + time() - strtotime(substr($res['uptime'],0,14));
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."Day";
	if ($hours !== 0) $res['uptime'] .= $hours."Hour";
	$res['uptime'] .= $min."Minute";

	//MEMORY
	$res['memTotal'] = round($sysinfo[0]['TotalVisibleMemorySize']/1024,2);
	$res['memFree'] = round($sysinfo[0]['FreePhysicalMemory']/1024,2);
	$res['memUsed'] = $res['memTotal']-$res['memFree'];	//上面两行已经除以1024,这行不用再除了
	$res['memPercent'] = round($res['memUsed'] / $res['memTotal']*100,2);

	$swapinfo = GetWMI($wmi,"Win32_PageFileUsage", array('AllocatedBaseSize','CurrentUsage'));

	// LoadPercentage
	$loadinfo = GetWMI($wmi,"Win32_Processor", array("LoadPercentage"));
	$res['loadAvg'] = $loadinfo[0]['LoadPercentage'];

	return $res;
}

function GetWMI($wmi,$strClass, $strValue = array())
{
	$arrData = array();

	$objWEBM = $wmi->Get($strClass);
	$arrProp = $objWEBM->Properties_;
	$arrWEBMCol = $objWEBM->Instances_();
	foreach($arrWEBMCol as $objItem) 
	{
		@reset($arrProp);
		$arrInstance = array();
		foreach($arrProp as $propItem) 
		{
			eval("\$value = \$objItem->" . $propItem->Name . ";");
			if (empty($strValue)) 
			{
				$arrInstance[$propItem->Name] = trim($value);
			} 
			else
			{
				if (in_array($propItem->Name, $strValue)) 
				{
					$arrInstance[$propItem->Name] = trim($value);
				}
			}
		}
		$arrData[] = $arrInstance;
	}
	return $arrData;
}

//比例条
function bar($percent)
{
?>
	<div class="bar"><div class="barli" style="width:<?php echo $percent?>%">&nbsp;</div></div>
<?php
}

$uptime = $sysInfo['uptime']; //在线时间
$stime = date('Y-m-d H:i:s'); //系统当前时间

//硬盘
$dt = round(@disk_total_space(".")/(1024*1024*1024),3); //总
$df = round(@disk_free_space(".")/(1024*1024*1024),3); //可用
$du = $dt-$df; //已用
$hdPercent = (floatval($dt)!=0)?round($du/$dt*100,2):0;

$load = $sysInfo['loadAvg'];	//系统负载


//判断内存如果小于1G，就显示M，否则显示G单位
if($sysInfo['memTotal']<1024)
{
	$memTotal = $sysInfo['memTotal']." M";
	$mt = $sysInfo['memTotal']." M";
	$mu = $sysInfo['memUsed']." M";
	$mf = $sysInfo['memFree']." M";
	$mc = $sysInfo['memCached']." M";	//cache化内存
	$mb = $sysInfo['memBuffers']." M";	//缓冲
	$st = $sysInfo['swapTotal']." M";
	$su = $sysInfo['swapUsed']." M";
	$sf = $sysInfo['swapFree']." M";
	$swapPercent = $sysInfo['swapPercent'];
	$memRealUsed = $sysInfo['memRealUsed']." M"; //真实内存使用
	$memRealFree = $sysInfo['memRealFree']." M"; //真实内存空闲
	$memRealPercent = $sysInfo['memRealPercent']; //真实内存使用比率
	$memPercent = $sysInfo['memPercent']; //内存总使用率
	$memCachedPercent = $sysInfo['memCachedPercent']; //cache内存使用率
}
else
{
	$memTotal = round($sysInfo['memTotal']/1024,3)." G";
	$mt = round($sysInfo['memTotal']/1024,3)." G";
	$mu = round($sysInfo['memUsed']/1024,3)." G";
	$mf = round($sysInfo['memFree']/1024,3)." G";
	$mc = round($sysInfo['memCached']/1024,3)." G";
	$mb = round($sysInfo['memBuffers']/1024,3)." G";
	$st = round($sysInfo['swapTotal']/1024,3)." G";
	$su = round($sysInfo['swapUsed']/1024,3)." G";
	$sf = round($sysInfo['swapFree']/1024,3)." G";
	$swapPercent = $sysInfo['swapPercent'];
	$memRealUsed = round($sysInfo['memRealUsed']/1024,3)." G"; //真实内存使用
	$memRealFree = round($sysInfo['memRealFree']/1024,3)." G"; //真实内存空闲
	$memRealPercent = $sysInfo['memRealPercent']; //真实内存使用比率
	$memPercent = $sysInfo['memPercent']; //内存总使用率
	$memCachedPercent = $sysInfo['memCachedPercent']; //cache内存使用率
}

//网卡流量
$strs = @file("/proc/net/dev"); 

for ($i = 2; $i < count($strs); $i++ )
{
	preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );
	$NetOutSpeed[$i] = $info[10][0];
	$NetInputSpeed[$i] = $info[2][0];
	$NetInput[$i] = formatsize($info[2][0]);
	$NetOut[$i]  = formatsize($info[10][0]);
}

//ajax调用实时刷新
if ($_GET['act'] == "rt")
{
	$arr=array('useSpace'=>"$du",'freeSpace'=>"$df",'hdPercent'=>"$hdPercent",'barhdPercent'=>"$hdPercent%",'TotalMemory'=>"$mt",'UsedMemory'=>"$mu",'FreeMemory'=>"$mf",'CachedMemory'=>"$mc",'Buffers'=>"$mb",'TotalSwap'=>"$st",'swapUsed'=>"$su",'swapFree'=>"$sf",'loadAvg'=>"$load",'uptime'=>"$uptime",'freetime'=>"$freetime",'bjtime'=>"$bjtime",'stime'=>"$stime",'memRealPercent'=>"$memRealPercent",'memRealUsed'=>"$memRealUsed",'memRealFree'=>"$memRealFree",'memPercent'=>"$memPercent%",'memCachedPercent'=>"$memCachedPercent",'barmemCachedPercent'=>"$memCachedPercent%",'swapPercent'=>"$swapPercent",'barmemRealPercent'=>"$memRealPercent%",'barswapPercent'=>"$swapPercent%",'NetOut2'=>"$NetOut[2]",'NetOut3'=>"$NetOut[3]",'NetOut4'=>"$NetOut[4]",'NetOut5'=>"$NetOut[5]",'NetOut6'=>"$NetOut[6]",'NetOut7'=>"$NetOut[7]",'NetOut8'=>"$NetOut[8]",'NetOut9'=>"$NetOut[9]",'NetOut10'=>"$NetOut[10]",'NetInput2'=>"$NetInput[2]",'NetInput3'=>"$NetInput[3]",'NetInput4'=>"$NetInput[4]",'NetInput5'=>"$NetInput[5]",'NetInput6'=>"$NetInput[6]",'NetInput7'=>"$NetInput[7]",'NetInput8'=>"$NetInput[8]",'NetInput9'=>"$NetInput[9]",'NetInput10'=>"$NetInput[10]",'NetOutSpeed2'=>"$NetOutSpeed[2]",'NetOutSpeed3'=>"$NetOutSpeed[3]",'NetOutSpeed4'=>"$NetOutSpeed[4]",'NetOutSpeed5'=>"$NetOutSpeed[5]",'NetInputSpeed2'=>"$NetInputSpeed[2]",'NetInputSpeed3'=>"$NetInputSpeed[3]",'NetInputSpeed4'=>"$NetInputSpeed[4]",'NetInputSpeed5'=>"$NetInputSpeed[5]");
	$jarr=json_encode($arr); 
	$_GET['callback'] = htmlspecialchars($_GET['callback']);
	echo $_GET['callback'],'(',$jarr,')';
	exit;
}
?>
