<?php
class service

{
 private $amethod;
 private $blimit;
 private $corder;
 // call to the constructor means it will be uploaded as default values
  public function service()
  {
  	$this->$amethod="html";
  	$this->$blimit="5";
  	$this->$corder="last"
  }
 public function setmethod($a)
 {
 $this->$amethod=$a;
 }
public function setlimit($b)
{
	$this->$blimit=($b >1 && $b<10) ? $b : $this->blimit;

}
public function setorder($c)
{
	$this->climit=$c;
}
public function last_blog()
{
$sorder=($this->corder=='last')?'title':'views';
$data=$Global['Mysql']->getall("select * from 'blog_post' ORDER BY `{$sorder}` DESC LIMIT {$this->ilimit}");
switch$this->amethod)
{
	case 'json':
	if(count($data))
	{
		echo json_encode(array('data'=>$adata));
	}
	else
	{
		echo json_encode(array('data'=>'nothing is found'))
	}
	break;

	case 'xml':
	$xcode='';
	if(count($data))
	{
		foreach ($data as $i => $aresult) 
		{
		 $xcode.=<<<EOR
		 <unit>
    <id>{$aresult['id']}</id>
    <title>{$aresult['title']}</title>
    <author>{$aresult['author']}</author>
    <image>{$aresult['thumb']}</image>
    <views>{$aresult['views']}</views>
</unit>
EOR;
}
}

header('content-type:text/xml; charset:utf-8');
echo <<<EOR

<?xml version="1.0" encoding="utf-8"?>
<blog>
{$xcode};
</blog>
EOR;
break;
 
 case 'html':
  $xcode='';
  if(count($data))
  {
  	foreach ($data as $i => $aresult) {
  		$xcode.=<<<EOR
  		<div>
  		<p>title:{$aresult['title']}</p>
         <p>author:{$aresult['author']}</p>
         <p>views:{$aresult['id']}</p>
         <p><img src="{$aresult['thumb']}" style="width:100px; height:100px; float:left;"><p>

  		</div>
EOR;
  	}
  }
else
	$xcode.=<<<EOR
<div>nothing is found</div>
EOR;
header('content-type:text/html charset:utf-8');
echo $xcode;
break;
}















}

}

}



?>