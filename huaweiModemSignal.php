#!/usr/bin/env php
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('muninFunctions.php');
require_once('huaweiApi.php');

$PLUGINNAME = 'Huawei Modem Signal';
$PLUGINID = strtr($PLUGINNAME, array(' ' => ''));

$huaweiModemUrl = 'http://192.168.8.1';

sendMuninResponse(
    getHuaweiDataFromApi($huaweiModemUrl, 'api/device/signal'),
    array(
        'pci',
        'cell_id',
        'rsrq',
        'rsrp',
        'rssi',
        'sinr',
        'mode'
    ),
    $PLUGINNAME,
    $PLUGINID,
    true        // quick strip of the "dBm" in values
);
