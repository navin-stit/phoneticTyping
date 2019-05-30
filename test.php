<?php

$file = file_get_contents('assessments.txt', true);
$arr = explode("\n", $file);
$gambar = explode("\n" , $arr[1]);
$detailGambar = explode("|" , $gambar[0]);

echo '<pre>';print_r($detailGambar);
echo $detailGambar[1];


/*$file = file_get_contents('lessons.txt', true);
$arr = explode("\n", $file);
echo '<pre>';print_r($arr);
echo $arr[42];*/


$file3 = file_get_contents('imageLoad.txt', true);
$arr3 = explode("\n", $file3);
echo '<pre>';print_r($arr3);
$gambar3 = explode("\n" , $arr3[21]);
$detailGambar3 = explode("=" , $gambar3[0]);
echo '<pre>';print_r($detailGambar3);