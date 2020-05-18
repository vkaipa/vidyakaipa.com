<?PHP
/*
SYNCING CCB PROFILE DATA TO TYPEFORM
Simple tutorial to add CCB profiles from Typeform survey(s)
*/
// contains resusable globals and functions
include("includes/config.php");
// Typeform Credentials
// set the Typeform API key - read About API Keys: https://www.typeform.com/help/data-api/
$tfApiKey = '56ueZ1BB8WWktJQEWdBfYetMSGKWwhezFQjUvsRyqxQ9';

// set taret url
$url = 'https://api.typeform.com/forms/W480Qz/responses?key='.$tfApiKey;

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer 56ueZ1BB8WWktJQEWdBfYetMSGKWwhezFQjUvsRyqxQ9'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL, $url);

$result = curl_exec($ch);
curl_close($ch);

?>
<hr>

<?PHP

$response = json_decode($result,true);

echo $response;

foreach ($response["items"] as $v) {
    echo "Current value of \$a: $v.\n";
}





?>
