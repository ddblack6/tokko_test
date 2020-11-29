<?php
include "api.php";


#Para ejecutar este ejemplo por URL
/*
http://localhost/barrios_activos-tipo_propiedades_activas.php?order_by=price&limit=200&order=desc&page=1&data={%22current_localization_id%22:0,%22current_localization_type%22:%22country%22,%22price_from%22:0,%22price_to%22:999999999,%22operation_types%22:[1,2,3],%22property_types%22:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],%22currency%22:%22ANY%22,%22filters%22:[]}
*/



//CHANGE THIS APIKEY WITH YOUR REAL STATE APIKEY
// $auth = new TokkoAuth('5940ea45eb7cfb55228bec0b958ea9c0be151757');  //demo key

//key real
$auth = new TokkoAuth('5940ea45eb7cfb55228bec0b958ea9c0be151757');


// CREATE PROPERTY SEARCH OBJECT
$search = new TokkoSearch($auth);

// ORDER BY, LIMIT, ORDER
$search->do_search();

foreach ($search->get_properties() as $property){ 
	$i++;
	//Propiedades tipo	
	$arrayPropiedades[$property->get_field("type")->id]= strtoupper($property->get_field("type")->name);

	//print_r($property->get_field("location"));

	$arrayBarrio[$property->get_field("location")->id]["id"]= strtoupper($property->get_field("location")->id); 	
	$arrayBarrio[$property->get_field("location")->id]["name"]= strtoupper($property->get_field("location")->name); 
	
	//echo "<hr>";
 
} 
echo "<pre>";

//barrios con propiedades
print_r($arrayBarrio);

//tipos de propiedades
print_r($arrayPropiedades);

?>
