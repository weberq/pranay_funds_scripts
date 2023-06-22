<?php

$file = fopen("sample.txt", "r");

// Read contents of the file into a string
$customers_input = fread($file, filesize("sample.txt"));

// Split input into lines
$lines = explode("\n", $customers_input);

// Initialize customers array
$customers = array();

// Loop through lines and store customer information
for ($i = 0; $i < count($lines); $i += 4) {
    $customer = array(
        'name' => $lines[$i],
        'email' => $lines[$i + 1],
        'mobile' => $lines[$i + 2],
        'address' => $lines[$i + 3]
    );
    $customers[] = $customer;
}

// Print out customers array for testing
print_r($customers[2]);

fclose($file);


?>