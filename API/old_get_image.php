<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        #image {
            display: flex;
            flex-wrap: wrap;
            width: 100vw;
        }
        .yellow {
            height: auto;
        }
        .yellow img{
            width: 100%;
            height: auto;
        }

        @media only screen and (max-device-width: 700px) {
            .yellow {
                width: 100%;
                height: auto;
            }
        }
    </style>
    <?php
    // display column
    $column = $_POST['column'];

    $width = 100/$column;

    echo "<style>.yellow{width:{$width}%}</style>"
?>
</head>
<body>
<?php
    // post information
    $search = $_POST['search'];
    $r18 = $_POST['r18'];
    $num = $_POST['num'];
    $size = $_POST['size'];

    $url = "https://api.lolicon.app/setu/v2";
    
    // edit on url
    if (empty($search)){
        $url = $url . "?r18=" . $r18 . "&num=" . $num. "&size=" . $size;
    }
    else {
        $url = $url . "?tag=" . $search . "&r18=" . $r18. "&num=" . $num. "&size=" . $size;
    }
    
    // send api request
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
    $json = curl_exec($ch);
    if(!$json) {
        echo curl_error($ch);
    }
    curl_close($ch);

    // decode data
    $arr = json_decode($json,true);

    // var_dump($arr);
    
?>

<div id="image">
    <?php 
        for ($i = 0; $i < $num; $i++){
            echo "<div class='yellow'>";
            echo "<img src='" . $arr['data'][$i]['urls'][$size] . "' alt='error'>";
            echo "</div>";
        }
    ?>
</div>
</body>
</html>