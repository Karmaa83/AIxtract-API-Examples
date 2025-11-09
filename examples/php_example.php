<?php
/**
 * AIxtract API Example - PHP
 * Extract structured data from PDFs using AI.
 */

$api_url = "https://ai-pdf-data-extractor-extract-invoices-tables-more1.p.rapidapi.com/extract";
$api_key = "YOUR_RAPIDAPI_KEY"; // Replace with your key
$api_host = "aixtract2.p.rapidapi.com";
$file_path = "invoice.pdf";

$curl = curl_init();

$postFields = [
    'file' => new CURLFile($file_path),
    'use_ai' => 'true',
    'extract_tables' => 'true'
];

curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postFields,
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-key: $api_key",
        "x-rapidapi-host: $api_host"
    ],
]);

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if ($httpCode === 200) {
    $data = json_decode($response, true);
    echo "✅ Extraction successful\n";
    echo "Document type: " . $data['document_type'] . "\n";
    echo "Confidence: " . $data['confidence_score'] . "\n";
    print_r($data['structured_data']);
} else {
    echo "❌ Error $httpCode: $response\n";
}
?>
