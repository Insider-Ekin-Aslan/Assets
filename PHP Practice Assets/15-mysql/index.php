<?php

include "connection.php";


// // $query = "INSERT INTO blogs(title, description, url, image_url, active) VALUES ('Tenet', 'Tenet, Christopher Nolan’ın senaryosunu yazıp yönetmenliğini yaptığı; başrollerini John David Washington, Robert Pattinson, Elizabeth Debicki ve Kenneth Branagh’ın paylaştığı Birleşik Krallık ve Amerika Birleşik Devletleri ortak yapımı casus filmi.', 'tenet', '3.png', 0);";
// // $query .= "INSERT INTO blogs(title, description, url, image_url, active) VALUES ('Tenet', 'Tenet, Christopher Nolan’ın senaryosunu yazıp yönetmenliğini yaptığı; başrollerini John David Washington, Robert Pattinson, Elizabeth Debicki ve Kenneth Branagh’ın paylaştığı Birleşik Krallık ve Amerika Birleşik Devletleri ortak yapımı casus filmi.', 'tenet', '3.png', 0);";
// // $query .= "INSERT INTO blogs(title, description, url, image_url, active) VALUES ('Tenet', 'Tenet, Christopher Nolan’ın senaryosunu yazıp yönetmenliğini yaptığı; başrollerini John David Washington, Robert Pattinson, Elizabeth Debicki ve Kenneth Branagh’ın paylaştığı Birleşik Krallık ve Amerika Birleşik Devletleri ortak yapımı casus filmi.', 'tenet', '3.png', 0);";
// // mysqli_multi_query($connection, $query);




// $query = "INSERT INTO blogs(title, description, url, image_url, active) VALUES ('Tenet', 'Tenet, Christopher Nolan’ın senaryosunu yazıp yönetmenliğini yaptığı; başrollerini John David Washington, Robert Pattinson, Elizabeth Debicki ve Kenneth Branagh’ın paylaştığı Birleşik Krallık ve Amerika Birleşik Devletleri ortak yapımı casus filmi.', 'tenet', '3.png', 0)";


// $result = mysqli_query($connection, $query);

// $last_id = mysqli_insert_id($connection);

// if ($result)
//     echo "Movie added.";
// else
//     echo "Error!";








// $query = "SELECT * FROM blogs";


// $query = "SELECT * FROM blogs WHERE id = 1";
// $query = "SELECT * FROM blogs WHERE id > 1";
// $query = "SELECT * FROM blogs WHERE id > 1 AND id < 4";
// $query = "SELECT * FROM blogs WHERE title = 'Film I'";
// $query = "SELECT * FROM blogs WHERE title LIKE 'Film%'";

// $result = mysqli_query($connection, $query);

// print_r($result);

// echo "<hr>";

// while ($row = mysqli_fetch_row($result)) {
//     echo $row[0] . " - " . $row[1] . "<br>";
// }





// $query = "UPDATE blogs SET title = 'Birinci Film' WHERE id = 1";
// $result = mysqli_query($connection, $query);

// if ($result)
//     echo "OK";
// else
//     echo "ERROR";


// mysqli_close($connection);







// $query = "DELETE FROM blogs WHERE id = 2";
// $result = mysqli_query($connection, $query);

// if ($result)
//     echo "OK";
// else
//     echo "ERROR";


// mysqli_close($connection);






// $input = trim("  <script>efeko>>>12345</script> ");

// if (empty($input)) {
//     echo "blablabla";
// }

// if (strlen($input) > 150) {
//     echo "blablabla";
// }

// if (strlen($input) < 4) {
//     echo "blablabla";
// }

// $input = strip_tags($input);

// $input = htmlspecialchars($input);

// echo $input;



// $input = "\\' O\R '\223' = '1";


// $input = stripslashes($input);


// echo $input;







// $query = "INSERT INTO blogs(title, description, url, image_url, active) VALUES (?, ?, ?, ?, ?)";
// // $result = mysqli_query($connection, $query);


// $title = "'; DELETE FROM blogs";
// $url = "tenet";
// $desc = 'Tenet, Christopher Nolan’ın senaryosunu yazıp yönetmenliğini yaptığı; başrollerini John David Washington, Robert Pattinson, Elizabeth Debicki ve Kenneth Branagh’ın paylaştığı Birleşik Krallık ve Amerika Birleşik Devletleri ortak yapımı casus filmi.';
// $image_url = '3.png';
// $active = 1;

// $result = mysqli_prepare($connection, $query);

// mysqli_stmt_bind_param($result, 'ssssi', $title, $desc, $url, $image_url, $active);
// mysqli_stmt_execute($result);
// mysqli_stmt_close($result);

// if ($result)
//     echo "OK";
// else
//     echo "ERROR";



echo "HELLO";



// "ALTER TABLE blogs
// ADD CONSTRAINT blogs_categories
// FOREIGN KEY (category_id) REFERENCES categories(id);";


mysqli_close($connection);




?>