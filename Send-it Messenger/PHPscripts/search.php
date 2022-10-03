<?php
$searchCriteria = htmlspecialchars(trim($_POST['userSearch']));

header("Location: ../appHome?c=$searchCriteria");
?>