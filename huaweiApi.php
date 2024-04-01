<?php
// (c) kamilbaranski.com
// v. 20240326

function getHuaweiDataFromApi($modemUrl = 'http://192.168.8.1', $apiMethod = 'api/monitoring/status') {
    global $PLUGINID;
    list($sesInfo, $tokInfo, $curlHandle) = openApiSession($modemUrl);

    curl_setopt($curlHandle, CURLOPT_URL, $modemUrl . '/' . $apiMethod);
    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
        'Cookie: ' . $sesInfo,
        '__RequestVerificationToken: ' . $tokInfo
    ));

    $result = curl_exec($curlHandle);
    if (curl_error($curlHandle)) {
        $curlError = curl_error($curlHandle);
        closeApiSession($curlHandle);
        return ($PLUGINID . ' curl ERROR: ' . $curlError . chr(10));
    };

    closeApiSession($curlHandle);
    return parseXmlToArray($result);
}

function openApiSession($modemUrl = 'http://192.168.8.1') {
    $modemGetSessionUrl = $modemUrl . '/api/webserver/SesTokInfo';
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $modemGetSessionUrl);
    curl_setopt($curlHandle, CURLOPT_AUTOREFERER, true);
    curl_setopt($curlHandle, CURLOPT_COOKIESESSION, true);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
    $result = curl_exec($curlHandle);
    if (curl_error($curlHandle)) {
        return ($PLUGINID . ' curl ERROR: ' . curl_error($curlHandle) . chr(10));
    };
    
    $array = parseXmlToArray($result);

    return array($array['SesInfo'], $array['TokInfo'], $curlHandle);
}

function closeApiSession($curlHandle) {
    return curl_close($curlHandle);
}

function parseXmlToArray($xmlData) {
    $xml = simplexml_load_string($xmlData, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json, TRUE);
    return $array;
}
