<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>| Subhojits |</title>
<link href="Home.css" rel="stylesheet">
</head>

<body>
<div class="header1">
</div>

<?php
require_once "vendor/autoload.php";
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://api.stackexchange.com/2.2/users?order=desc&sort=reputation&site=stackoverflow&pagesize=10');
$data = $response->json();

for( $i = 0; $i <= 10; $i++)
{
?><table><tr><?php
error_reporting(0);
?><td><h4>Name: &nbsp;</h4></td><td><?php
$var = $data['items'][$i]['display_name']; 
echo $var; echo '&nbsp; &nbsp;';?></td>

<td><h4>Account Id: &nbsp;</h4></td><td><?php
$var1 = $data['items'][$i]['account_id']; 
echo $var1;?></td></tr><?php
echo '<br><br>';


$client2 = new Client();
$url1 = "https://api.stackexchange.com/2.2/users/$var1/top-tags?pagesize=3&site=stackoverflow";
//echo $url1;
$response2 = $client2->get($url1);
$data2 = $response2->json();

?><tr><?php
for( $j = 0; $j <= 2; $j++)
{
error_reporting(0);
?><td><h5>Tag Name: &nbsp;</h5></td><td><?php
$var2 = $data2['items'][$j]['tag_name']; 
echo $var2; echo '&nbsp; &nbsp;';?></td>

<td><h5>Question Score: &nbsp;</h5></td><td><?php
$var3 = $data2['items'][$j]['question_score']; 
echo $var3;?></td><?php
echo '<br><br>';

 }?></tr><?php

error_reporting(0);
$client3 = new Client();
$url2 = "https://api.stackexchange.com/2.2/users/$var1/questions?pagesize=3&order=desc&sort=votes&site=stackoverflow" ;
$response3 = $client2->get($url2);

$data3 = $response3->json();
?><tr><?php
for( $k = 0; $k <= 2; $k++)
{

?><td><h5>Question Title: &nbsp;</h5></td><td><?php
$var4 = $data3['items'][$k]['title']; 
echo $var4; echo '&nbsp; &nbsp;';?></td>

<td><h5>Question Id: &nbsp;</h5></td><td><?php
$var5 = $data3['items'][$k]['question_id']; 
echo $var5;?></td><?php
echo '<br><br>';
}
?></tr></table><?php
}
?>

</body>
</html>