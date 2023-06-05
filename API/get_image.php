<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=56ac0ec133e27aff839b2e0be71ab12f">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=47a30cf8b25fb83ceef27652b0ddf97e">
</head>

<?php
// display column
$column = $_POST['column'];

$width = 100 / $column;

echo "<style>.yellow{width:{$width}%}</style>"
?>

<?php
// post information
$search = $_POST['search'];
$r18 = $_POST['r18'];
$num = $_POST['num'];
$size = $_POST['size'];

$url = "https://api.lolicon.app/setu/v2";

// edit on url
if (empty($search)) {
    $url = $url . "?r18=" . $r18 . "&num=" . $num . "&size=" . $size;
} else {
    $url = $url . "?tag=" . $search . "&r18=" . $r18 . "&num=" . $num . "&size=" . $size;
}

// send api request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
$json = curl_exec($ch);
if (!$json) {
    echo curl_error($ch);
}
curl_close($ch);

// decode data
$arr = json_decode($json, true);

// var_dump($arr);

?>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    <nav class="navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#">Enjoy :))))</a><button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-link"></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#contact">contact</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="./ask_image.html">Go back</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <p>Your url is <?php echo $url?></p>
    <?php echo "<script>console.log('" . json_encode($arr) . "');</script>";?>
    <section class="text-center content-section" id="about">
        <div class="container">
            <div class="row">

                    <?php

                    if ($arr){
                        for ($i = 0; $i < $num; $i++) {
                            echo "<div class='col' style='transform-style: preserve-3d;' style='width:<?php echo $width?>%'>";
                            echo "<div class='card-group'>
                        <div class='card'><img src='" . $arr['data'][$i]['urls'][$size] . "'>
                            <div class='card-body'><a href='" . $arr['data'][$i]['urls'][$size] . "'><button class='btn btn-dark' type='button'
                                    style='--bs-secondary: #b5c6d5;--bs-secondary-rgb: 181,198,213;'>Link</button></a>
                            </div>
                        </div>
                    </div>";
                    echo "</div>";
                        }
                    }
                    else {
                        echo '<h1>No image for this</h1>';
                        echo '<a class="btn btn-light" href="./ask_image.html">try again</a>';
                    }
                    
                    

                    ?>

            </div>
        </div>
    </section>
    <section class="text-center content-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact us</h2>
                    <ul class="list-inline banner-social-buttons">
                        <li class="list-inline-item">&nbsp;</li>
                        <li class="list-inline-item">&nbsp;</li>
                        <li class="list-inline-item">&nbsp;<button class="btn btn-primary btn-lg btn-default" type="button" data-bs-target="https://github.com/nhwwnhww"><i class="fa fa-github fa-fw"></i><span class="network-name">&nbsp;github</span></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- Start: Map Clean -->
    <div class="map-clean"></div><!-- End: Map Clean -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/script.min.js?h=abade7a6b58120c54533d461e48e360b"></script>
</body>

</html>