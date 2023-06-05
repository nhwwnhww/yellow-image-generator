<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>under 18 image</title>
</head>
<body>
<?php
$url = "https://api.lolicon.app/setu/v2";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
$json = curl_exec($ch);
if(!$json) {
    echo curl_error($ch);
}
curl_close($ch);
$json_out = print_r($json);
// echo $json_out;
// echo "<hr>";
$result = json_decode($json,true);
$ok = ($result['data']);
// var_dump($ok);
// echo "<hr>";
$ok2 = $ok['0'];
// var_dump($ok2);
// echo "<hr>";
$ok3 = $ok2['urls'];
// var_dump($ok3);
// echo "<hr>";
$ok4 = $ok3['original'];
// var_dump($ok4);
// echo $ok4;
?>
<a href="<?php echo $ok4?>" target="_blank"><button>image</button></a>
<div id="page_1"></div>
<img src="<?php echo $ok4?>" alt="error" style="height: 1080px;">
</body>
</html>