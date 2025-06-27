<?php
// آدرس فایل base64
$url = "https://raw.githubusercontent.com/soroushmirzaei/telegram-configs-collector/refs/heads/main/countries/ir/mixed";

// دریافت محتوای base64
$base64_content = file_get_contents($url);

// دیکد کردن محتوا
$decoded = base64_decode($base64_content);

// ذخیره در فایل smir.txt
file_put_contents("smir.txt", $decoded);

// پیام موفقیت
echo "کانفیگ با موفقیت دیکد و در فایل smir.txt ذخیره شد.";
