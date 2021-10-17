<div id="cartWidget" class="cart-content" style=" <?php if($page == "Checkout") { echo 'display: none'; } ?>">
            <div class="cart-header">
                <p>Your cart</p>
                <p class="account-name"><?php echo $_SESSION["fName"] . ' ' . $_SESSION["sName"]?></p>
                <hr>
            </div>
            <div class="cart">
                <table>
                    <tbody id="cart">
                        <?php

                            if(isset($_SESSION['cart'])) {

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

                            } else {
                                echo '<tr class="cart-empty"><td>You currently dont have any beats in your cart</td></tr>';
                            }

                        ?>
                    </tbody>
                </table>

                <div class="cartButtonsContainer">
                    <a id="cartReset" class="cartButton reset-cart">Remove all items</a>

                    <a id="checkout-button" class="cartButton checkout">Checkout</a>
                </div>

            </div>
        </div>