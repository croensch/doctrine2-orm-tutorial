<?php
// create_bug.php
require_once "bootstrap.php";

$theUserId = $argv[1];
$theProductId = $argv[2];
$thePrice = $argv[3];

$user = $entityManager->find("User", $theUserId);
if (!$user) {
    echo "No user found for the input.\n";
    exit(1);
}

$product = $entityManager->find("Product", $theProductId);
if (!$product) {
	echo "No user found for the input.\n";
	exit(1);
}

$licence = new Licence($user, $product);
$licence->setPrice($thePrice);

$entityManager->persist($licence);
$entityManager->flush();

echo "Your paid: ".$licence->getPrice()."\n";
