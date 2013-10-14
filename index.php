<?php
if(isset($_GET['action']) && isset($_GET['action']))
{
$url="http://www.scriptcon.com/api/service.php";


$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $sData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$vRes = curl_exec($ch);
curl_close($ch);
header('Content-Type: text/xml');
echo $vRes;
exit;




}



?>
<DOCTYPE html5>
<html>
<head>

<title>Scriptcon.com |API</title>

<link href="css/main.css" type="text/stylesheet">
</head>
<body>
<header>
<h2>Scriptcon Blog posts..News Feed</h2>
<a href="http://www.scriptcon.com/blog.php">
</header>
<div class="container">
<div class="contr">
<form action="service.php" target="result">
<label>Action</label>
<select name="action">
<option value="last_blog">last blogs</option>
<option value="top_blog">top blogs</option>
</select>
<label>Limit</label>
<select name="limit">
	<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
<label>method</label>
<select name="method">
	<option value="xml">XML</option>
	<option value="json">Json</option>
	<option value="html">html</option>
</select>
</form>
<div>Results</div>
<iframe name="results" style="width:500px;height:600px;"></iframe>
</div>
</div>
</html>