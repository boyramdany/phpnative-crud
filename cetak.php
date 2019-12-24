<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html =
    '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>CUMA TEST</h1>
<h1>BOYRAMDANY GANTENG</h1>
<H2>BOYRAMDANY GANTENG</H2>
<H3>BOYRAMDANY GANTENG</H3>
<H4>BOYRAMDANY GANTENG</H4>
<H5>BOYRAMDANY GANTENG</H5>
</body>
</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output('Daftarmahasiswa.pdf', 'D');
