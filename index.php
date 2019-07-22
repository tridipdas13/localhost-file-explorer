<?  date_default_timezone_set('Asia/Kolkata'); ?>
<!DOCTYPE html>
<html lang="en">
<?php define('SITE_ROOT_URL','//'.$_SERVER['HTTP_HOST'].'');?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo gethostname(); ?></title>

  <!-- Bootstrap -->
  <link href=" <?php echo SITE_ROOT_URL ?>/index/css/bootstrap.min.css" rel="stylesheet">
  <link href=" <?php echo SITE_ROOT_URL ?>/index/css/cust.css" rel="stylesheet">
  <link href=" <?php echo SITE_ROOT_URL ?>/index/intro/introjs.css" rel="stylesheet">
  <script src="index/js/bootstrap.min.js"></script>
  <script src="index/intro/intro.js"></script>
  <script src="index/js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="index/js/cust.js"></script>
  
</head>

<body>
  <div class="container-fluid display-table">
    <div class="row display-table-row">
      <!---side menu-->
      <div class="col-md-2 col-sm-1 hidden-xs  display-table-cell valign-top" id="side-menu">
        <h1 class="hidden-xs hidden-sm"><img src='../index/icon/geek.png' width='60%'></h1>
        <ul>
		<div class='span6' data-step="3" data-intro='Your System Name' data-position='right' data-scrollTo='tooltip'>
          <li class="link active">
          <a href="">
          <span class="hidden-xs hidden-sm"><?php echo gethostname();?>-PC</span>
            </a>
		  </li>
		</div>

		<div class='span6' data-step="4" data-intro='Php Version' data-position='right' data-scrollTo='tooltip'>
          <li class="link setting-btn">
          <a href="">
          <span class="glyphicon glyphicon-cog" area-hidden="true"></span>
          <span class="hidden-xs hidden-sm">PHP version:   <?php echo phpversion();?></span>
            </a>
		  </li>
</div>
<div class='span6' data-step="5" data-intro='Systems current Date' data-position='right' data-scrollTo='tooltip'>
          <li class="link setting-btn">
          <a href="">
          <span class="glyphicon glyphicon-cog" area-hidden="true"></span>
          <span class="hidden-xs hidden-sm"><?php echo date("d-m-Y");?></span>
            </a>
		  </li>
</div>
<div class='span6' data-step="6" data-intro='Access phpMyAdmin' data-position='right' data-scrollTo='tooltip'>
          <li class="link setting-btn">
          <a href="<?php echo SITE_ROOT_URL ?>/phpmyadmin">
          <span class="glyphicon glyphicon-cog" area-hidden="true"></span>
          <span class="hidden-xs hidden-sm">phpMyAdmin</span>
            </a>
		  </li>
</div>
	<li class="link setting-btn">
	<a href="javascript:void(0);" onclick="javascript:introJs().start();">
	<span class="glyphicon glyphicon-cog" area-hidden="true"></span>
		  <span class="hidden-xs hidden-sm">Help Me</span>
		  </a>
</li>

<li class="link setting-btn">

<div style="padding: 40px;top: 71vh;position: absolute;">
<div class='span6' data-step="7" data-intro='Battry information' data-position='right' data-scrollTo='tooltip'>
<div id="percent" class="c100 p80 " >

  <span id="percent_txt"></span>
  <span id="charge_Status" style="padding:10px;font-size:11px;"></span>
  
  <div class="slice">
    <div class="bar"></div>
	<div class="fill"></div>
  </div>

</div>
</div>
</div>
</li>

        </ul>

      </div>
      <!---manin contain-->
      <div class="col-md-10 col-sm-11 display-table-cell vlaign-top">
        <div class="row">
          <header id="nav-header" class="clearfix">
            <div class="col-md-5">
            <nav class="navbar-default pull-left">
            <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="true">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            </nav>


              <!-- <input type="text" class="hidden-sm hidden-xs" id="header-search-filed" placeholder="<?php $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
foreach($crumbs as $crumb){
    echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
} ?>"> -->

<div style="padding-top: 17px;">
<div class='span6' data-step="1" data-intro='Search for file and folder' data-position='right' data-scrollTo='tooltip'>
	<input style="padding:5px; border: none; width: 300px; outline: none; " type="text"  class="" id="search-filed" placeholder="search here" onkeyup="handleKeyup(this)">
</div>
</div>			
</div>
            <div class="col-md-7">
              <ul class="pull-right  ">
                <li id="welcone" class="hidden-xs">
			<div class='span6' data-step="2" data-intro='Your Local Ip address' data-position='right' data-scrollTo='tooltip'>
					Your IP Address is <?php echo $ip = ($_SERVER['REMOTE_ADDR']); ?>
					</div>
				</li>
  
			</ul>
			
			  

            </div>
		  </header>
		  
		  </div>
		  
		  <!-- -----------box---------- -->
		  <div class='span6' data-step="8" data-intro='All your files and folders' data-position='right' data-scrollTo='tooltip'>
		  <div class="row" id="ResultCard">
		  

	<?php

	// Adds pretty filesizes
	function pretty_filesize($file) {
		$size=filesize($file);
		if($size<1024){$size=$size." Bytes";}
		elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
		elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
		else{$size=round($size/1073741824, 1)." GB";}
		return $size;
	}

 	// Checks to see if veiwing hidden files is enabled
	if($_SERVER['QUERY_STRING']=="hidden")
	{$hide="";
	 $ahref="./";
	 $atext="Hide";}
	else
	{$hide=".";
	 $ahref="./?hidden";
	 $atext="Show";}

	 // Opens directory
	 $myDirectory=opendir(".");

	// Gets each entry
	while($entryName=readdir($myDirectory)) {
	   $dirArray[]=$entryName;
	}

	// Closes directory
	closedir($myDirectory);

	// Counts elements in array
	$indexCount=count($dirArray);

	// Sorts files
	sort($dirArray);

	// Loops through the array of files
	for($index=0; $index < $indexCount; $index++) {

	// Decides if hidden files should be displayed, based on query above.
	    if(substr("$dirArray[$index]", 0, 1)!=$hide) {

	// Resets Variables
		$favicon="";
		$class="file";

	// Gets File Names
		$name=$dirArray[$index];
		$namehref=$dirArray[$index];

	// Gets Date Modified
		$modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
		$timekey=date("YmdHis", filemtime($dirArray[$index]));


	// Separates directories, and performs operations on those directories
		if(is_dir($dirArray[$index]))
		{
				$extn="<img src='../index/icon/fold.png' width='45%'>";
				$size="&lt;Directory&gt;";
				$sizekey="0";
				$class="dir";

			// Gets favicon.ico, and displays it, only if it exists.
				if(file_exists("$namehref/favicon.ico"))
					{
						$favicon=" style='background-image:url($namehref/favicon.ico);'";
						$extn="&lt;Website&gt;";
					}

			// Cleans up . and .. directories
				if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;"; $favicon=" style='background-image:url($namehref/.favicon.ico);'";}
				if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
		}

	// File-only operations
		else{
			// Gets file extension
			$extn=pathinfo($dirArray[$index], PATHINFO_EXTENSION);

			// Prettifies file type
			switch ($extn){
				case "png": $extn="<img src='../index/icon/png.png' width='45%'>"; break;
				case "jpg": $extn="<img src='../index/icon/jpg.png' width='45%'>"; break;
				case "jpeg": $extn="<img src='../index/icon/jpg.png' width='45%'>"; break;
				case "svg": $extn="<img src='../index/icon/html.png' width='45%'>"; break;
				case "gif": $extn="<img src='../index/icon/html.png' width='45%'>"; break;
				case "ico": $extn="<img src='../index/icon/ico.png' width='45%'>"; break;

				case "txt": $extn="<img src='../index/icon/txt.png' width='45%'>"; break;
				case "log": $extn="<img src='../index/icon/log.png' width='45%'>"; break;
				case "htm": $extn="<img src='../index/icon/html.png' width='45%'>"; break;
				case "html": $extn="<img src='../index/icon/html.png' width='45%'>"; break;
				case "xhtml": $extn="<img src='../index/icon/html.png' width='45%'>"; break;
				case "shtml": $extn="<img src='../index/icon/html.png' width='45%'>"; break;
				case "php": $extn="<img src='../index/icon/php.png' width='45%'>"; break;
				case "js": $extn="<img src='../index/icon/Javascript.png' width='45%'>"; break;
				case "css": $extn="<img src='../index/icon/css.png' width='45%'>"; break;
        case "json": $extn="<img src='../index/icon/json-file.png' width='45%'>"; break;

				case "pdf": $extn="<img src='../index/icon/pdf.png' width='45%'>"; break;
				case "xls": $extn="<img src='../index/icon/xls.png' width='45%'>"; break;
				case "xlsx": $extn="<img src='../index/icon/xls.png' width='45%'>"; break;
				case "doc": $extn="<img src='../index/icon/doc.png' width='45%'>"; break;
        case "csv": $extn="<img src='../index/icon/csv.png' width='45%'>"; break;
        case "ppt": $extn="<img src='../index/icon/ppt.png' width='45%'>"; break;
        case "mp3": $extn="<img src='../index/icon/mp3.png' width='45%'>"; break;
        case "mp4": $extn="<img src='../index/icon/mp4.png' width='45%'>"; break;
        case "psd": $extn="<img src='../index/icon/psd.png' width='45%'>"; break;
				case "docx": $extn="<img src='../index/icon/doc.png' width='45%'>"; break;
        case "xml": $extn="<img src='../index/icon/xml.png' width='45%'>"; break;

				case "zip": $extn="<img src='../index/icon/zip.png' width='45%'>"; break;
				case "htaccess": $extn="<img src='../index/icon/txt.png' width='45%'>"; break;
				case "exe": $extn="<img src='../index/icon/exe.png' width='45%'>"; break;

				default: if($extn!=""){$extn=strtoupper($extn)." File";} else{$extn="<img src='../index/icon/Javascript.png' width='45%'>";} break;
			}

			// Gets and cleans up file size
				$size=pretty_filesize($dirArray[$index]);
				$sizekey=filesize($dirArray[$index]);
		}

	// Output
		$subName = substr($name,0,10);
		$json[]=array(
			'files_Name'=> $subName,
			'files_path'=>$namehref,
			'favicon' => $favicon,
			'extn' => $extn
		);
	  echo("
	  
       <div class='col-md-2 dashboard-left-cell' align='center'>
               <div class='admin-content-con' align='center'>
               <a href='./$namehref'$favicon class='name'>$extn</a>
               <header>
                   <h5>
                      <a href='./$namehref'$favicon class='name'> $subName..</a>
                   </h5>
                 </header>
             </div>
			</div>
		

		");
  }

	}
	$new = json_encode($json);
	?>
	</div>

</div>
  </div>
  </div>
  
<script>
	document.getElementById("search-filed").focus();
	  let filename = <?php echo $new; ?>;
	
	  function handleKeyup(elem) {
		var m = elem.value;
		var Count = 0;
		  $("#ResultCard").html("");
		  if (m !== "") {
			for (var i = 0; i < filename.length; i++) {
                var files_Name = filename[i].files_Name;
                var files_path = filename[i].files_path;
				var favicon = filename[i].favicon;
				var extn = filename[i].extn;
                var files_NameUp = files_Name.toUpperCase();

                m = m.toUpperCase();

                if (files_NameUp.indexOf(m) != -1) {
					++Count;
                        // var htmldata =" <label id="+i+" class='con'>" + ajaxResult[i].Report_Name+ "<input type='checkbox' value="+ ajaxResult[i].Analyte_Code+ " "+ajaxResult[i].status+"  ><span class='checkmark'></span></label>"
                       var htmlfromsearch = "<div class='col-md-2 dashboard-left-cell' align='center'><div class='admin-content-con' align='center'><a href='./"+ filename[i].files_path +"'"+ filename[i].files_favicon + "class='name'>"+ filename[i].extn +"</a><header><h5><a href='./"+ filename[i].files_path +"'"+ filename[i].files_favicon +" class='name'> "+ filename[i].files_Name +"..</a></h5></header></div></div>";
					   $("#ResultCard").append(htmlfromsearch).show();
						
                }
            }
			if(Count == 0){
                var htmldata =" <div style='position: fixed;top: 50%;left: 50%;'><img src='images/nothing-found.png' width=10%></br><span style='font-size:22px;'>Nothing Found</span></div>"
               
				$("#ResultCard").append(htmldata).show();
            }
		  
		  }
		  else{
			for (var i = 0; i < filename.length; i++) {
                var files_Name = filename[i].files_Name;
                var files_path = filename[i].files_path;
				var favicon = filename[i].favicon;
				var extn = filename[i].extn;
                var files_NameUp = files_Name.toUpperCase();

                        // var htmldata =" <label id="+i+" class='con'>" + ajaxResult[i].Report_Name+ "<input type='checkbox' value="+ ajaxResult[i].Analyte_Code+ " "+ajaxResult[i].status+"  ><span class='checkmark'></span></label>"
                       var htmlfromsearch = "<div class='col-md-2 dashboard-left-cell' align='center'><div class='admin-content-con' align='center'><a href='./"+ filename[i].files_path +"'"+ filename[i].files_favicon + "class='name'>"+ filename[i].extn +"</a><header><h5><a href='./"+ filename[i].files_path +"'"+ filename[i].files_favicon +" class='name'> "+ filename[i].files_Name +"..</a></h5></header></div></div>";
					   $("#ResultCard").append(htmlfromsearch).show();
						
                
            
		  }
		  
	  }
	  }
</script>
<script src="index/intro/intro.js"></script>

</body>

</html>
