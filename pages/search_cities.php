<?php
require_once __DIR__ . '../../classes/Model/City.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $city = new City();
    $cities = $city->getByStateId($_POST["state_id"]);
    echo $cities;
} else {
    require_once __DIR__ . '../../pages/err.php';
}
?>
