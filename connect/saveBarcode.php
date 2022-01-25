<?php
    require '../vendor/autoload.php';

    if (!is_dir('barcode')){
        mkdir('barcode');
    }

    $fileDir = '../connect/barcode/';
    $filename = $_GET['name'] . "-" .$_GET['id'];
    $file = $fileDir . $filename . ".svg";

    $generator = new Picqer\Barcode\BarcodeGeneratorSVG();

    file_put_contents($file, (new Picqer\Barcode\BarcodeGeneratorSVG())->getBarcode($_GET['id'], Picqer\Barcode\BarcodeGeneratorSVG::TYPE_UPC_A));

    Header("Location: ../pages/admin-dashboard-inv-manage.php");
?>