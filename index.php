<?php
// Fetch Bitcoin data from CoinGecko API
$apiUrl = 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd&include_market_cap=true&include_24hr_vol=true&include_24hr_change=true';
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// Extract Bitcoin information from the API response
$bitcoinData = $data['bitcoin'];
$price = $bitcoinData['usd'];
$volume = $bitcoinData['usd_24h_vol'];
$marketCap = $bitcoinData['usd_market_cap'];
$percentChange = $bitcoinData['usd_24h_change'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bitcoin Price</title>
    <style>
        /* Add your CSS styling here */
        *{
            background-color: #6c9a9f;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container{
            text-align: center;
        }
        h1{
            font-size: 28px;
            color: #012020;
            text-transform: uppercase;
        }
        table {
            border-collapse: collapse;
            width: 110%;
            background-color: #dddddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th,td {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">

<table>
    <tr>
        <th colspan="3">
            <h1>Bitcoin Price</h1>
        </th>
    </tr>
    <tr>
        <th>Price</th>
        <td>$<?php echo $price; ?></td>
    </tr>
    <tr>
        <th>Volume (24h)</th>
        <td>$<?php echo $volume; ?></td>
    </tr>
    <tr>
        <th>Market Cap</th>
        <td>$<?php echo $marketCap; ?></td>
    </tr>
    <tr>
        <th>Percent Change (24h)</th>
        <td><?php echo $percentChange; ?>%</td>
    </tr>
</table>
</div>
</body>
</html>