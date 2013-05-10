<?php
// list_bugs.php
require_once "bootstrap.php";

$dql = "SELECT b FROM Bug b ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach($bugs AS $bug) {
    echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."\n";
    try {
        echo "    Reported by: ".$bug->getReporter()->getName()."\n";
    } catch (\Doctrine\ORM\EntityNotFoundException $e) {
        echo "    Reported by: ?\n";
    }
    try {
        echo "    Assigned to: ".$bug->getEngineer()->getName()."\n";
    } catch (\Doctrine\ORM\EntityNotFoundException $e)  {
        echo "    Assigned to: ?\n";
    }
    foreach($bug->getProducts() AS $product) {
        echo "    Platform: ".$product->getName()."\n";
    }
    echo "\n";
}
