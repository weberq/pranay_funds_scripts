<?php

// Input data
$customers_input = "Name1
Email1
mobile1
address1

Name2
Email2
mobile2
address2
";

// Split input into lines
$lines = explode("\n", $customers_input);

// Initialize customers array
$customers = array();

// Loop through lines and store customer information
for ($i = 0; $i < count($lines); $i += 5) {
    $customer = array(
        'name' => $lines[$i],
        'email' => $lines[$i + 1],
        'mobile' => $lines[$i + 2],
        'address' => $lines[$i + 3]
    );
    $customers[] = $customer;
}

// Print out customers array for testing
print_r($customers);

?>