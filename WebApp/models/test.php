<?php
$postData = array(
    'Malpractice' => 10,
    'Time' => 30,
    'Result' => 1,
    'Difficulty' => 60
);
$url = 'http://localhost:5000/endpoint';  // Updated URL to point to your Flask app

// Initialize cURL and set options for the POST request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request and retrieve the response
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Print the response from the Flask app
$responseData = json_decode($response, true);
echo 'Response from Flask: ' . $responseData['result'] . "\n";
echo 'Acknowledgment: ' . $responseData['acknowledgment'];

?>