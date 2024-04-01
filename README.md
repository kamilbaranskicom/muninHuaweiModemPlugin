# muninHuaweiModemPlugin
<a href="http://munin-monitoring.org/">munin</a> plugin to log cell signal quality (rsrq, rsrp, rssi, sinr) from Huawei mobile modems (e.g. e3131 etc.) API.

## REQUIREMENTS
PHP (with curl extension).

## INSTALL
* Set the modem IP (`$huaweiModemUrl = ` line).
* Install in munin
* add optional cron entry to log CellID changes (every hour)
```
1 * * * * echo "`date +\%Y\%m\%d-%H\%M` - `/var/www/html/huaweimodem/huaweiModemLogCellID.php`" >> /var/www/html/huaweimodem/log/huaweiModemLogCellID.log
```

<img src="screenshot.png">
<img src="screenshot2.png">