<?php

$indoortempf = htmlspecialchars($_GET["indoortempf"]);
$indoortempc = ($indoortempf - 32)*5/9;
$tempf = htmlspecialchars($_GET["tempf"]);
$tempc = ($tempf - 32)*5/9;
$dewptf = htmlspecialchars($_GET["dewptf"]);
$dewptc = ($dewptf - 32)*5/9;
$windchillf = htmlspecialchars($_GET["windchillf"]);
$windchillc = ($windchillf - 32)*5/9;
$indoorhumidity = htmlspecialchars($_GET["indoorhumidity"]);
$humidity = htmlspecialchars($_GET["humidity"]);
$windspeedmph = htmlspecialchars($_GET["windspeedmph"]);
$windspeedkmh = $windspeedmph * 1.60934;
$windgustmph = htmlspecialchars($_GET["windgustmph"]);
$windgustkmh = $windgustmph * 1.60934;
$winddir = htmlspecialchars($_GET["winddir"]);
$absbaromin = htmlspecialchars($_GET["absbaromin"]);
$baromin = htmlspecialchars($_GET["baromin"]);
$rainin = htmlspecialchars($_GET["rainin"]);
$dailyrainin = htmlspecialchars($_GET["dailyrainin"]);
$weeklyrainin = htmlspecialchars($_GET["weeklyrainin"]);
$monthlyrainin = htmlspecialchars($_GET["monthlyrainin"]);
$yearlyrainin = htmlspecialchars($_GET["yearlyrainin"]);
$solarradiation = htmlspecialchars($_GET["solarradiation"]);
$UV = htmlspecialchars($_GET["UV"]);


require_once('./MQTTClient.php');
//use MQTTClient;

$client = new MQTTClient('127.0.0.1', 1883);
$client->setAuthentication('user','pass');
//$client->setEncryption('cacerts.pem');
$success = $client->sendConnect(12345);  // set your client ID
if ($success) {
    //$client->sendSubscribe('topic1');
    $client->sendPublish('weather/henk', 'Message to all subscribers of this topic');
	$client->sendPublish("weather/indoortempf", $indoortempf);
	$client->sendPublish("weather/indoortempc", $indoortempc);
	$client->sendPublish("weather/tempf", $tempf);
	$client->sendPublish("weather/tempc", $tempc);
	$client->sendPublish("weather/dewptf", $dewptf);
	$client->sendPublish("weather/dewptc", $dewptc);
	$client->sendPublish("weather/windchillf", $windchillf);
	$client->sendPublish("weather/windchillc", $windchillc);
	$client->sendPublish("weather/indoorhumidity", $indoorhumidity);
	$client->sendPublish("weather/humidity", $humidity);
	$client->sendPublish("weather/windspeedmph", $windspeedmph);
	$client->sendPublish("weather/windgustkmh", $windgustkmh);
	$client->sendPublish("weather/winddir", $winddir);
	$client->sendPublish("weather/absbaromin", $absbaromin);
	$client->sendPublish("weather/baromin", $baromin);
	$client->sendPublish("weather/rainin", $rainin);
	$client->sendPublish("weather/dailyrainin", $dailyrainin);
	$client->sendPublish("weather/weeklyrainin", $weeklyrainin);
	$client->sendPublish("weather/monthlyrainin", $monthlyrainin);
	$client->sendPublish("weather/yearlyrainin", $yearlyrainin);
	$client->sendPublish("weather/solarradiation", $solarradiation);
	$client->sendPublish("weather/UV", $UV);
	
	
    $messages = $client->getPublishMessages();  // now read and acknowledge all messages waiting
    foreach ($messages as $message) {
        echo $message['topic'] .': '. $message['message'] . PHP_EOL;
        // Other keys in $message array: retain (boolean), duplicate (boolean), qos (0-2), packetId (2-byte integer)
    }
    $client->sendDisconnect();    
}
$client->close();