<?php

$file = fopen("sample.txt", "r");

$customers = array();

while(! feof($file)) {
  $line = fgets($file);
  $data = explode("\n", $line);
  $name = trim($data[0]);
  $email = trim($data[1]);
  $mobile = trim($data[2]);
  $address = trim($data[3]);

  $customer = array(
    "name" => $name,
    "email" => $email,
    "mobile" => $mobile,
    "address" => $address
  );

  array_push($customers, $customer);
}

fclose($file);

print_r($customers);

?>