<?php

//**************************************************
//Example
//**************************************************

include('../Police_API/cPoliceAPI.php');
$policeAPI = new cPoliceAPI(YOUR_USERNAME, YOUR_PASSWORD);
echo '<pre>';
print_r($policeAPI->getCrimeCategories());
echo '</pre>';

?>