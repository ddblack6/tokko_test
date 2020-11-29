<?php
include "api.php";

//CHANGE THIS APIKEY WITH YOUR REAL STATE APIKEY
// $auth = new TokkoAuth('5940ea45eb7cfb55228bec0b958ea9c0be151757');  //demo key

//key real
$auth = new TokkoAuth('5940ea45eb7cfb55228bec0b958ea9c0be151757');


// CREATE PROPERTY SEARCH OBJECT
$search = new TokkoSearch($auth);

// ORDER BY, LIMIT, ORDER
$search->do_search();

foreach ($search->get_properties() as $property){ 

    //Propiedades tipo	
    $arrayPropiedades[]= strtoupper($property->get_field("type")->name);
	
	  //print_r($property->get_field("location"));
	  $arrayBarrio[]= strtoupper($property->get_field("location")->name); 
	
	//echo "<hr>"; 
} 
echo "<pre>";

//barrios con propiedades
print_r($arrayBarrio);

//tipos de propiedades
print_r($arrayPropiedades);

?>
