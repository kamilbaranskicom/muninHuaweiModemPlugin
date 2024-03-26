<?php
// (c) kamilbaranski.com
// v. 20240326

function getHuaweiDataFromApi($modemUrl = 'http://192.168.8.1', $apiMethod = 'api/monitoring/status') {
    global $PLUGINID;
    $modemGetSessionUrl = $modemUrl . '/api/webserver/SesTokInfo';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $modemGetSessionUrl);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $result = curl_exec($ch);
    if (curl_error($ch)) {
        return ($PLUGINID . ' curl ERROR: ' . curl_error($ch) . chr(10));
    };
    $array = parseXmlToArray($result);

    $sesInfo = $array['SesInfo'];
    $tokInfo = $array['TokInfo'];

    $modemStatusXmlUrl = $modemUrl . '/' . $apiMethod;
    curl_setopt($ch, CURLOPT_URL, $modemStatusXmlUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Cookie: ' . $sesInfo,
        '__RequestVerificationToken: ' . $tokInfo
    ));

    $result = curl_exec($ch);
    if (curl_error($ch)) {
        return ($PLUGINID . ' curl ERROR: ' . curl_error($ch) . chr(10));
    };

    return parseXmlToArray($result);
};



function parseXmlToArray($xmlData) {
    $xml = simplexml_load_string($xmlData, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json, TRUE);
    return $array;
}
