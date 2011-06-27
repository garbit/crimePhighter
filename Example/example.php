<?php

//**************************************************
//Example
//**************************************************

include('../Police API/cPoliceAPI.php');
$policeAPI = new cPoliceAPI(YOUR_USERNAME, YOUR_PASSWORD);
echo '<pre>';
print_r($policeAPI->getCrimeCategories());
echo '</pre>';

?>