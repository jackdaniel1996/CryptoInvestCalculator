<!DOCTYPE html>
<html lang="de" id="home">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Source+Serif+Pro:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&family=Raleway:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <!--  Css  -->
    <link rel="stylesheet" href="css/style.css">
    <title>Crypto Invest Calculator</title>
    <!--- Jquery/js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="imgs/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="imgs/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="imgs/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="imgs/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="imgs/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="imgs/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="imgs/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="imgs/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="imgs/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="imgs/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imgs/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imgs/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="imgs/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <div class="mobile-navigation-banner">
        <div class="mobile-burger-menu">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
        <div class="site-logo">
            <span>CIC</span>
            <div class="site-slogan">Crypto <br>Invest <br> Calculator</div>
        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="site-logo">
            <span>CIC</span>
            <div class="site-slogan">Crypto <br>Invest <br> Calculator</div>
        </div>
        <div class="navigation-item-wrapper">
            <div class="navigation-item">
                <a href="#home">Home</a>
            </div>
            <div class="navigation-item">
                Info
            </div>
            <div class="navigation-item">
                Impressum
            </div>
            <div class="navigation-item">
                Anmelden
            </div>
        </div>
        <div class="darkmode-button-wrapper">
            <div id="darkmodeBtn" class="darkmode-button set-dark"></div>
            <div id="lightmodeBtn" class="darkmode-button set-light"></div>
        </div>
    </div>
    <!-- landingpage-banner -->
    <div class="landing-page-wrapper">
        <div class="landingpage-banner-wrapper">
            <div class="landing-page-left-side">
                <img src="imgs/3dBitcoin.png" class="background-3-b">
            </div>
            <div class="landing-page-right-side">
                <div class="title-font">Crypto Invest Calculator</div>
            </div>
            <div class="landing-page-gradient"></div>
        </div>
    </div>
    <!-- Content -->
    <div class="content-wrapper">
        <div class="coin-value-display-wrapper">
            <?php include 'script.php';
            foreach ($myCoins_array as $coin) :
                $coinName = $apiData['data'][$coin]['name'];
                $coinNameShort = $apiData['data'][$coin]['symbol'];
                $coinPrice = $apiData['data'][$coin]['quote']['EUR']['price'];
                $coinChange = $apiData['data'][$coin]['quote']['EUR']['percent_change_24h'];
                ?>
                <div class="coin-value-display-block">
                    <div class="coin-value-display-name"><?php echo $coinName ?> <span>(<?php echo $coinNameShort ?>)</span></div>
                    <div class="coin-value-display-value"><?php echo number_format(round($coinPrice, 2), 2, ',', '.'); ?> €</div>
                    <div class="coin-value-display-change">(<?php echo round($coinChange, 2); ?> %)</div>
                </div>
                <?php endforeach; ?>
        </div>
            

    </div>
    <div style="height: 2000px;"></div> <!-- platzhalter zum scrollen -->
</body>

</html>