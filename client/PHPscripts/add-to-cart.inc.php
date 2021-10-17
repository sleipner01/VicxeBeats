<?php
session_start();

//If the cart has not been set, set the cart as an array
if(isset($_SESSION['cart']) == false) {
    $_SESSION['cart'] = array();
}

$selectedBeat = $_POST['selectedBeat'];

//Variable to set to 1 if the cart contains the beat already
$alreadyInCart = 0;

//Checks if the chosen beat is already in the cart
for($i = 0; $i<count($_SESSION['cart']); $i++) {
    if($_SESSION['cart'][$i] == $selectedBeat) {
        echo "<tr><td><script type='text/javascript'>alert('The beat is already in your cart');</script></td></tr>";
        $alreadyInCart = 1;
    }
}

//If the beat is not in the cart, the beat will be added to the cart
if($alreadyInCart !== 1) {
    array_push($_SESSION['cart'], $selectedBeat);   
}

//Require the database login
require '../../database-login/dbh.inc.php';

//Prints out all beats in the cart, by the id and youtube Id
for($i = 0; $i<count($_SESSION['cart']); $i++) {
    //echo '<script>console.log("' . $_SESSION['cart'][$i][0] . '", "' . $_SESSION['cart'][$i][1] . '")</script>';

    $sql = 'SELECT title, avatar_file, price, discount FROM beats WHERE beatID="' . $_SESSION['cart'][$i] . '";';             
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die("We have a problem with the connection to our database...");
    }   else {
            if(mysqli_num_rows($result) > 0) {

                // Printing out rows with information
                    while($row = mysqli_fetch_array($result)) {
                    
                    $title = $row['title'];
                    $avatarFile = $row['avatar_file'];
                    $price = $row['price'];
                    $discount =  $row['discount'];    

                    echo "<tr>";
                        echo "<td><img src='beatAvatars/$avatarFile' width='50px'></td>";
                        echo "<td>$title</td>";
                        echo "<td>$price</td>";
                    echo "</tr>";
                    }
            } else {
                // If no rows were found in the database
                echo "<tr>The beat could not be found</tr>";
            }   
        }
}