<?php
// list_bugs.php
require_once "bootstrap.php";

$dql = "SELECT u, l FROM User u LEFT JOIN u.licences l ORDER BY l.price DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$users = $query->getResult();

foreach($users AS $user) {
    echo "User: ".$user->getName()."\n";
    foreach($user->getLicences() AS $licence) {
        echo "    paid ".$licence->getPrice()." for ".$licence->getProduct()->getName()."\n";
    }
    echo "\n";
}
