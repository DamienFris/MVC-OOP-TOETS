<?php
header("Refresh:3; url=" . URLROOT . "/persons/index");
require APPROOT . '/views/includes/head.php';
?>

<?=$data['deleteStatus']?>