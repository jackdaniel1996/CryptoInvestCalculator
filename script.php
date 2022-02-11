<?php
    // *** PUT YOUR API KEY HERE:
    $myAPIKey = '9c9ea06b-27ba-458a-b0d8-32e5202faff5';
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
    $parameters = array ( 'symbol' => 'BTC,ETH,ADA,BNB,SHIB', 'convert' => 'EUR');
    $myCoins_array =  array ('BTC','ETH','ADA','BNB','SHIB');
    $headers = array ( 
    'Accepts: application/json', 
    'X-CMC_PRO_API_KEY: ' . $myAPIKey 
    );
    // query string encode the parameters
    $qs = http_build_query($parameters);
    // create the request URL
    $request = "{$url}?{$qs}";
    // Get cURL resource
    $curl = curl_init();
    // Set cURL options
    curl_setopt_array($curl, array(
    CURLOPT_URL => $request,      // set the request URL
    CURLOPT_HTTPHEADER => $headers, // set the headers 
    CURLOPT_RETURNTRANSFER => 1     // ask for raw response instead of bool
    ));
    // Send the request, save the response
    $response = curl_exec($curl);
    // print json decoded response (here as an array)
    /*
    echo '<pre>';
    print_r(json_decode($response, true)); 
    echo '</pre>';
    */

    $apiData = json_decode($response, true);
    $btcPrice = $apiData['data']['BTC']['quote']['EUR']['price'];
    $ethPrice = $apiData['data']['ETH']['quote']['EUR']['price'];
    $adaPrice = $apiData['data']['ADA']['quote']['EUR']['price'];
    $bnbPrice = $apiData['data']['BNB']['quote']['EUR']['price'];
    $shibPrice = $apiData['data']['SHIB']['quote']['EUR']['price'];
    // Close request            
    curl_close($curl);
?>
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