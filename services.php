<?php
/*this is the service files that communicates with all the files and get data from index page */
//load the database class
include_once('lib_api/database.php');
//load the final library class
include_once('lib_api/cservice.php');
$newservice=new cservice();

$newservice->setmethod($_REQUEST['type']);
if(isset($_GET['limit']))
{
	$newservice->setlimit($_GET['limit']);
}
switch ($_REQUEST['action'])
 {
	case 'last_blog':
		$newservice->last_blog();
		break;

	case 'top_blog':
	    $newservices->setorder('top');
        $newservices->last_blog();

	     break;	
	
	
}
?>