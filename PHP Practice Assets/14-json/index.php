<?php



// deserialize - string(json) to array

// $json_string = '{
//     "firstName": "Ekin",
//     "lastName": "Aslan",
//     "hobbies": ["Sport", "Cinema"],
//     "age": 22,
//     "children": [],
//     "firstLove": null,
//     "meaningOfHisLife": null
//   }';


// $json_array = json_decode($json_string, true);

// echo "<pre>";
// print_r($json_array);
// echo "</pre>";


// echo $json_array["firstName"] . " " . $json_array["lastName"];





// serialize - array to string(json)

// $urunler = array("Samsung", "Iphone", "Google");


// $jsonString = json_encode($urunler);



// echo $jsonString;


// $file = fopen("urunler.json", "w");

// fwrite($file, $jsonString);

// fclose($file);



// $user = array(
//     "username" => "ekinaslan",
//     "password" => "12345",
//     "name" => "Ekin"
// );


// $jsonUser = json_encode($user, JSON_PRETTY_PRINT);


// $file = fopen("user.json", "w");

// fwrite($file, $jsonUser);

// fclose($file);





// $null = null;

// echo is_null($null);

?>