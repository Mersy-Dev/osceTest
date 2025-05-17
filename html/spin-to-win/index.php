<?php
require_once '../inc/conn.php';

function loadItems()
{
    return json_decode(file_get_contents('items.json'), true);
}

function saveItems($items)
{
    file_put_contents('items.json', json_encode($items));
}

function pickRandomItem($items)
{
    $rand = mt_rand() / mt_getrandmax();
    $cumulativeProbability = 0.0;

    foreach ($items as $item => $details) {
        $cumulativeProbability += $details['prob'];
        if ($rand <= $cumulativeProbability) {
            return $item;
            // return "1 Month Subscription";
        }
    }
}

function updateItemCount($items, $item)
{
    $items[$item]['no'] -= 1;
    saveItems($items);
    return $items;
}

function loadAccessCodes()
{
    return json_decode(file_get_contents('access_codes.txt'), true);
}

function saveAccessCodes($codes)
{
    // save json as pretty printed
    file_put_contents('access_codes.txt', json_encode($codes, JSON_PRETTY_PRINT));
}

function checkAccessCode($code)
{
    $codes = json_decode(file_get_contents('access_codes.txt'), true);
    return in_array($code, $codes);
}

function removeAccessCode($code)
{
    $codes = loadAccessCodes();
    $codes = array_diff($codes, [$code]);
    saveAccessCodes(array_values($codes));
}

function saveIpAddress()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    // file_put_contents('ip_addresses.txt', $ip . PHP_EOL, FILE_APPEND);
}

function removeIpAddress($ipToRemove)
{
    $filename = 'ip_addresses.txt';

    $ips = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($ips === false) {
        return false;
    }

    $ips = array_filter($ips, function ($ip) use ($ipToRemove) {
        return trim($ip) !== trim($ipToRemove);
    });

    $result = file_put_contents($filename, implode(PHP_EOL, $ips) . PHP_EOL);

    return $result !== false;
}


function hasIpSpun()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $ips = file('ip_addresses.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $ips);
}

//please review
// if (logged_in()) {
//     $ip = $_SERVER['REMOTE_ADDR'];
//     removeIpAddress($ip);
// }

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'spin') {
        // if (hasIpSpun()) {
        //     echo json_encode(['error' => 'You have already spun the wheel, kindly login or input Access code to spin again']);
        //     exit;
        // }

        saveIpAddress();
        $items = loadItems();
        $result = pickRandomItem($items);
        $items = updateItemCount($items, $result);
        echo json_encode(['result' => $result, 'remaining' => $items[$result]['no']]);
        exit;
    }

    if ($action === 'checkCode') {
        $code = $_POST['code'] ?? '';
        $valid = checkAccessCode($code);
        $ip = $_SERVER['REMOTE_ADDR'];

        if ($valid) {
            removeAccessCode($code);
            removeIpAddress($ip);
        }

        echo json_encode(['valid' => $valid]);
        exit;
    }

    if ($action === 'checkFreeSpin') {
        $freeSpinAvailable = !hasIpSpun();
        echo json_encode(['freeSpinAvailable' => $freeSpinAvailable]);
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin the Wheel</title>
    <link rel="stylesheet" href="styles.css">

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>


</head>

<body>
    <a href="../" style="position: absolute;"><img src="images/logo-blue.png" width="50px" class="logo"></a>

    <!-- <h2>Spin to Win!</h2> -->

    <div class="outer-container">


        <div class="wheel-container">
            
            <div class="container3" id="container3">
            <div id="wheel-triangle"><div class="triangle"></div></div>
            <div class="container2" id="container2">
                <div class="container" id="wheel-container">
                    
                    <button id="spin"><img src="images/logo-white.png" width="40px" style="margin-top: 5px;" class="logo"></button>

                <!-- Border lines -->
                <div class="border-line border-1"></div>
                <div class="border-line border-2"></div>
                <div class="border-line border-3"></div>
                <div class="border-line border-4"></div>
                <div class="border-line border-5"></div>
                <div class="border-line border-6"></div>
                <div class="border-line border-7"></div>


            </div>
            </div>
            </div>
        </div>

        

        <div id="access-code-form">

            <div class="qr-header"> Extra spin if you make a free account on OSCE Toolbox & sign up to the newsletter</div>
            <div class="qr-container">
                <a href="../login/register">
                <div class="qr-item">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://oscetoolbox.com/login/register" alt="Sign up/Register">
                    <div class="qr-title">Sign up / Register</div>
                </div>
                </a>
                
                <a href="https://oscetoolbox.us21.list-manage.com/subscribe/post?u=e35f3ec3cf5ff662229e194c3&id=cf2ce7769e&f_id=00fdede6f0">
                <div class="qr-item">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://bit.ly/3ZlCq5Y" alt="Subscribe to Newsletter">
                    <div class="qr-title">Subscribe to our Newsletter</div>
                </div>
                </a>

            </div>
            
            <div class="qr-header">Extra spin if you follow on Instagram and TikTok</div>
            <div class="qr-container">
                
                <a href="https://instagram.com/oscetoolbox">
                <div class="qr-item">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://instagram.com/oscetoolbox" alt="Follow Us on Instagram">
                    <div class="qr-title">Follow us on Instagram</div>
                </div>
                </a>
                
                <a href="https://tiktok.com/@oscetoolbox">
                <div class="qr-item">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://tiktok.com/@oscetoolbox" alt="Follow Us on Tiktok">
                    <div class="qr-title">Follow us on Tiktok</div>
                </div>  
                </a>
            </div>

        </div>

    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message">Modal Message</p>
        </div>
    </div>
    <script src="script.js?v=4"></script>

</body>

</html>