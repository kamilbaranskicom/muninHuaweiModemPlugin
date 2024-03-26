#!/usr/bin/env php
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('muninFunctions.php');
require_once('huaweiApi.php');

$PLUGINNAME = 'Huawei Modem Status';
$PLUGINID = strtr($PLUGINNAME, array(' ' => ''));

$huaweiModemUrl = 'http://192.168.8.1';

sendMuninResponse(
    getHuaweiDataFromApi($huaweiModemUrl, 'api/monitoring/status'),
    array(
        'ConnectionStatus',
        'WifiConnectionStatus',
        'SignalIcon',
        'BatteryPercent',
        'CurrentWifiUser'
    ),
    $PLUGINNAME,
    $PLUGINID,
    false
);

// CurrentNetworkType
//  MACRO_NET_WORK_TYPE_NOSERVICE         = '0';          /* æ— æœåŠ¡            */
// 
//  MACRO_NET_WORK_TYPE_GSM               = '1';          /* GSMæ¨¡å¼           */
//  MACRO_NET_WORK_TYPE_GPRS              = '2';          /* GPRSæ¨¡å¼          */
//  MACRO_NET_WORK_TYPE_EDGE              = '3';          /* EDGEæ¨¡å¼          */
// 
//  MACRO_NET_WORK_TYPE_WCDMA             = '4';          /* WCDMAæ¨¡å¼         */
//  MACRO_NET_WORK_TYPE_HSDPA             = '5';          /* HSDPAæ¨¡å¼         */
//  MACRO_NET_WORK_TYPE_HSUPA             = '6';          /* HSUPAæ¨¡å¼         */
//  MACRO_NET_WORK_TYPE_HSPA              = '7';          /* HSPAæ¨¡å¼          */
//  MACRO_NET_WORK_TYPE_TDSCDMA           = '8';          /* TDSCDMAæ¨¡å¼       */
//  MACRO_NET_WORK_TYPE_HSPA_PLUS         = '9';          /* HSPA_PLUSæ¨¡å¼     */
//  MACRO_NET_WORK_TYPE_EVDO_REV_0        = '10';         /* EVDO_REV_0æ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_EVDO_REV_A        = '11';         /* EVDO_REV_Aæ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_EVDO_REV_B        = '12';         /* EVDO_REV_Aæ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_1xRTT             = '13';         /* 1xRTTæ¨¡å¼         */
//  MACRO_NET_WORK_TYPE_UMB               = '14';         /* UMBæ¨¡å¼           */
//  MACRO_NET_WORK_TYPE_1xEVDV            = '15';         /* 1xEVDVæ¨¡å¼        */
//  MACRO_NET_WORK_TYPE_3xRTT             = '16';         /* 3xRTTæ¨¡å¼         */
//  MACRO_NET_WORK_TYPE_HSPA_PLUS_64QAM   = '17';         /* HSPA+64QAMæ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_HSPA_PLUS_MIMO    = '18';          /* HSPA+MIMOæ¨¡å¼     */
// 
//  MACRO_NET_WORK_TYPE_LTE               = '19';          /*LTE æ¨¡å¼*/
// 
//  MACRO_NET_WORK_TYPE_EX_NOSERVICE         = '0';          /* æ— æœåŠ¡                   */
//  MACRO_NET_WORK_TYPE_EX_GSM               = '1';          /* GSMæ¨¡å¼                  */
//  MACRO_NET_WORK_TYPE_EX_GPRS              = '2';          /* GPRSæ¨¡å¼                 */
//  MACRO_NET_WORK_TYPE_EX_EDGE              = '3';          /* EDGEæ¨¡å¼                 */
// 
//  MACRO_NET_WORK_TYPE_EX_IS95A             = '21';         /* IS95Aæ¨¡å¼                */
//  MACRO_NET_WORK_TYPE_EX_IS95B             = '22';         /* IS95Bæ¨¡å¼                */
//  MACRO_NET_WORK_TYPE_EX_CDMA_1x           = '23';         /* CDMA1xæ¨¡å¼               */
//  MACRO_NET_WORK_TYPE_EX_EVDO_REV_0        = '24';         /* EVDO_REV_0æ¨¡å¼           */
//  MACRO_NET_WORK_TYPE_EX_EVDO_REV_A        = '25';         /* EVDO_REV_Aæ¨¡å¼           */
//  MACRO_NET_WORK_TYPE_EX_EVDO_REV_B        = '26';         /* EVDO_REV_Aæ¨¡å¼           */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_CDMA_1x    = '27';         /* HYBRID_CDMA1xæ¨¡å¼        */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_EVDO_REV_0 = '28';         /* HYBRID_EVDO_REV_0æ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_EVDO_REV_A = '29';         /* HYBRID_EVDO_REV_Aæ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_EVDO_REV_B = '30';         /* HYBRID_EVDO_REV_Aæ¨¡å¼    */
//  MACRO_NET_WORK_TYPE_EX_EHRPD_REL_0       = '31';         /* EHRPD_Rel_0æ¨¡å¼          */
//  MACRO_NET_WORK_TYPE_EX_EHRPD_REL_A       = '32';         /* EHRPD_Rel_Aæ¨¡å¼          */
//  MACRO_NET_WORK_TYPE_EX_EHRPD_REL_B       = '33';         /* EHRPD_Rel_Bæ¨¡å¼          */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_EHRPD_REL_0= '34';         /* HYBRID_EHRPD_Rel_0æ¨¡å¼   */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_EHRPD_REL_A= '35';         /* HYBRID_EHRPD_Rel_Aæ¨¡å¼   */
//  MACRO_NET_WORK_TYPE_EX_HYBRID_EHRPD_REL_B= '36';         /* HYBRID_EHRPD_Rel_Bæ¨¡å¼   */
// 
//  MACRO_NET_WORK_TYPE_EX_WCDMA             = '41';         /* WCDMAæ¨¡å¼                */
//  MACRO_NET_WORK_TYPE_EX_HSDPA             = '42';         /* HSDPAæ¨¡å¼                */
//  MACRO_NET_WORK_TYPE_EX_HSUPA             = '43';         /* HSUPAæ¨¡å¼                */
//  MACRO_NET_WORK_TYPE_EX_HSPA              = '44';         /* HSPAæ¨¡å¼                 */
//  MACRO_NET_WORK_TYPE_EX_HSPA_PLUS         = '45';         /* HSPA_PLUSæ¨¡å¼            */
//  MACRO_NET_WORK_TYPE_EX_DC_HSPA_PLUS      = '46';         /* DC_HSPA_PLUSæ¨¡å¼         */
// 
//  MACRO_NET_WORK_TYPE_EX_TD_SCDMA          = '61';         /* TD_SCDMAæ¨¡å¼             */
//  MACRO_NET_WORK_TYPE_EX_TD_HSDPA          = '62';         /* TD_HSDPAæ¨¡å¼             */
//  MACRO_NET_WORK_TYPE_EX_TD_HSUPA          = '63';         /* TD_HSUPAæ¨¡å¼             */
//  MACRO_NET_WORK_TYPE_EX_TD_HSPA           = '64';         /* TD_HSPAæ¨¡å¼              */
//  MACRO_NET_WORK_TYPE_EX_TD_HSPA_PLUS      = '65';         /* TD_HSPA_PLUSæ¨¡å¼         */
// 
//  MACRO_NET_WORK_TYPE_EX_802_16E           = '81';         /* 802.16Eæ¨¡å¼              */
// 
//  MACRO_NET_WORK_TYPE_EX_LTE               = '101';        /* LTE æ¨¡å¼                 */
// 
// 