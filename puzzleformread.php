<?php
    require 'puzzleformreader.php';
    $abstract = ($_GET["a"]);
    $abstract::writeSurveytoDB($_POST);
    header("Location: ". $abstract::getNextPage());
    die();
?>
