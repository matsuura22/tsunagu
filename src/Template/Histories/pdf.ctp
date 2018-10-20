<?php
require_once './../vendor/mpdf60/mpdf.php';


//$html_doc = new DOMDocument();
//$html_doc->loadHTMLFile('view.php');

$html = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">'.
'<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="ja" lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope="itemscope" itemtype="http://schema.org/">'.
'<head>'.
'</head>'.
'<body>'.
'<img src = "./../webroot/img/pdf_img/create/'.$history->pdfUrl.'"/>'.
'</body>'.
'</html>';


// mPDFクラス作成
$mpdf = new mPDF();

// タイトルを指定
$mpdf->setTitle("MyPDF.pdf");

// テキストを設定
$mpdf->WriteHTML($html);

// 出力
$mpdf->Output();


// include("./../vendor/mpdf60/mpdf.php");
// // mPDFクラス作成
// $mpdf = new mPDF();

// // タイトルを指定
// $mpdf->setTitle("MyPDF.pdf");

// // テキストを設定
// $mpdf->WriteHTML("Test");

// // 出力
// $mpdf->Output();

// return;
