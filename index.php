<?php

include "config.php";
include "functions.php";

$data = file_get_contents("sm.txt");
$data1 = file_get_contents("https://drive.google.com/uc?export=download&id=1-EopH8hKLwaRJ3kxm3-40x4CZQ3prAzP");



if($data != $data1)
{
  
  $merged_data = merge_subscription($subscription_urls);
  $merged_vmess = array_to_subscription($merged_data['vmess']);
  $merged_vless = array_to_subscription($merged_data['vless']);
  $merged_reality = get_reality($merged_vless);
  $merged_trojan = array_to_subscription($merged_data['trojan']);
  $merged_shadowsocks = array_to_subscription($merged_data['ss']);
  $merged_mix = $merged_vmess . $merged_shadowsocks . $merged_vless . $merged_trojan ;

  
file_put_contents("merged", $merged_mix);
file_put_contents("merged_base64", base64_encode($merged_mix));

  # Random Lines
$lines = file('merged');
shuffle($lines);
$random_lines = array_slice($lines, 0, 50);
file_put_contents("lite", $random_lines);

  
  //Archive - start

    date_default_timezone_set('Iran');
    $date  = date('Y-m-d H:i:s');
    $fileName = 'Archive';
    $fileName = $fileName.'_'.$date;
    $path = 'update/'.$fileName.'.txt';
    $path2 = 'update/ss/'.$fileName.'.txt';

file_put_contents($path, $merged_mix);
file_put_contents($path2, $merged_shadowsocks);

  //Archive - End

file_put_contents("Split/Normal/vmess", $merged_vmess);
file_put_contents("Split/Base64/vmess", base64_encode($merged_vmess));
file_put_contents("Split/Normal/vless", $merged_vless);
file_put_contents("Split/Base64/vless", base64_encode($merged_vless));
file_put_contents("Split/Normal/reality", $merged_reality);
file_put_contents("Split/Base64/reality", base64_encode($merged_reality));
file_put_contents("Split/Normal/trojan", $merged_trojan);
file_put_contents("Split/Base64/trojan", base64_encode($merged_trojan));
file_put_contents("Split/Normal/shadowsocks", $merged_shadowsocks);
file_put_contents("Split/Base64/shadowsocks", base64_encode($merged_shadowsocks));
file_put_contents("sm.txt", file_get_contents("https://drive.google.com/uc?export=download&id=1-EopH8hKLwaRJ3kxm3-40x4CZQ3prAzP"));


// decoding...

$url = "https://raw.githubusercontent.com/soroushmirzaei/telegram-configs-collector/refs/heads/main/countries/ir/mixed";
$base64_content = file_get_contents($url);
$decoded = base64_decode($base64_content);
file_put_contents("smir.txt", $decoded);

$url = "https://raw.githubusercontent.com/soroushmirzaei/telegram-configs-collector/refs/heads/main/countries/de/mixed";
$base64_content = file_get_contents($url);
$decoded = base64_decode($base64_content);
file_put_contents("smde.txt", $decoded);
  

exit(0);
} else {
    // If no changes, still exit with success
    echo "No updates detected. Exiting successfully.\n";
    exit(0);
}
