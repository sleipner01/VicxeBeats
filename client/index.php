<?php
 // Retrieving header file, and declearing which page this is
    $stylesheet = "style";
    $page = ""; //Not declaring to make title only display the name

    require 'PHPscripts/check-visitor.inc.php';
    require '../database-login/dbh.inc.php';

    require "includes/header.php";
    // Retrieving database information

    require "includes/user-nav.php";
?>

    <!-- Floating navigation bar -->
    <nav class="page-nav" id="nav">
        <a href="#top"><p>Search</p></a>
        <a href="#popular"><p>Popular</p></a>
        <a href="#about"><p>About me</p></a>
        <a href="#contact"><p>Contact</p></a>
    </nav>

    <!-- Header element. Id=0 referring to navbar as first section -->
    <section class="header" id="0">
        <!-- Video element playing in the header -->
        <video autoplay muted loop class="header-video" id="top">
            <source src="media/videos/header-video1440.mp4">
        </video>
            
        <!-- Blackish filter above the video -->
        <div class="filter"></div>

        <!-- Excess element in the header -->
        <div class="front-page" id="front-page">
            <div class="logo-container">
                <img src="media/imgs/MartinsBeats.png" alt="" class="logo">
            </div>
            <div class="search-container">
                <form>
                    <input type="search" id="search" placeholder="Search for a beat..">
                </form>
            </div>
        </div>
    </section>

    <!-- Popular section -->
    <section class="popular" id="1">
        <div class="popular-top"id="popular">
            <div>
                <h1>Popular</h1>
            </div>
        </div>

        <!-- Table for popular beats -->
        <div class="popular-beats">
            <table>
                <thead>
                    <tr>
                        <!-- Declaring header values -->
                        <th></th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>BPM</th>
                        <th>Hashtags</th>
                        <th>Add to cart</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM beats";
                    
                    $result = mysqli_query($conn, $sql);

                    if(!$result) {
                        die("We have a problem with the connection to our database...");
                    }   else {
                            if(mysqli_num_rows($result) > 0) {

                                // Printing out rows with information
                                while($row = mysqli_fetch_array($result)) {
                                    $beatId = $row["beatId"];
                                    $title = $row["title"];
                                    $duration = $row["duration"];
                                    $bpm = $row["bpm"];
                                    $youtube_id = $row["youtube_id"];
                                    $hashtags = $row["hashtags"];
                                    $avatar_file = $row["avatar_file"];
                                    $price = $row["price"];

                                    echo "<tr class='beatRow' id='$youtube_id'>";
                                        echo "<td><img src='beatAvatars/$avatar_file' alt='$avatar_file' width='100%'></td>";
                                        echo "<td>$title</td>";
                                        echo "<td>$duration</td>";
                                        echo "<td>$bpm</td>";
                                        echo "<td>#$hashtags</td>";
                                        echo "<td><a class='addCart' id='$beatId'><i class='fas fa-cart-plus'></i> $$price</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                // If no rows were found in the database
                                echo "<tr><td>No beats were found in the database</td></tr>";
                            }
                            
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- About page -->
    <section class="about" id="2">
        <div class="about-container">
            <div class="about-img" style="background-image: url(media/imgs/about.jpeg);"></div>
            <div class="about-main">
                <h1 id="about">About me</h1>
                <p">I am 19 yaer old boi i liek maker beat show me pic of bob and vagen</p>
            </div>
        </div>
    </section>

    <!-- Conctact form -->
    <!-- https://www.w3schools.com/w3css/tryw3css_templates_band.htm -->
    <section class="contact" id="3">
        <div class="contact-container">
            <div class="contact-img" style="background-image: url(media/imgs/tweeter-gray.jpg);"></div>
            <div class="contact-main">
                <h1 id="contact">Contact</h1>
                <p>Do you want something special?</p>
                <p>Or just have ha general question?</p>
                <p>Send me a message by clicking below...</p>
                <a href="contact/index.html" class="contact-button">Send me a request</a>  
            </div>
        </div>
    </section>


    <!-- Audio player. Retrieving sound from YouTube to secure the audio files. Youtube frame is not visable, 
    but controlled by custom Javascript video controller -->
    <div id="audioPlayer" class="audio-player">
    <!-- https://developers.google.com/youtube/iframe_api_reference -->
        <div id="player"></div>
    </div>

    <!-- We can retrieve playlist from Youtube playlists trough the API | https://developers.google.com/youtube/iframe_api_reference -->
    <div id="audioControls" class="audio-controls">
        <div id="progressBar">
            <div id="progressBarPassed"></div>
            <div id="progressBarControl"></div>
        </div>
        <div class="controls">
            <table class="controls-table">
                <tbody>
                    <tr>
                        <td>
                            <img id="playerAvatar" src="beatAvatars/vicxe.png" alt="avatar" width="70px">
                            <div>
                                <h3 id="playerTitle">You got Rick rolled</h3>
                            </div>
                            <div>
                                <p><span id="currentTimer"></span> s <span id="totalDuration"></span>s</p>
                            </div>
                        </td>
                        <td>
                            <i class="fa fa-step-backward" id="previous"></i>
                            <i class="fa fa-pause" id="pause"></i>
                            <i class="fa fa-play" id="play" style="display: none;"></i>
                            <i class="fa fa-step-forward" id="next"></i>
                        </td>
                        <td>
                            <div class="volume-container">
                                <div>
                                    <i class="fa fa-volume-up" id="volumeUp"></i>
                                    <i class="fa fa-volume-down" id="volumeDown" style="display: none;"></i>
                                    <i class="fa fa-volume-off" id="volumeMute" style="display: none;"></i>
                                </div>
                                <div id="volumeBar" class="volume-bar">
                                    <div id="volumeColumn" class="volume-column"></div>
                                    <div id="volumeDot" class="volume-dot"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Inserting all JS scripts for the page -->
    <script src="js/userNav.js"></script>
    <script src="js/smoothScroll.js"></script>
    <script src="js/sectionObserver.js"></script>
    <script src="js/audioController.js"></script>
    <script src="js/chooseBeat.js"></script>
    <script src="js/YouTubeAPI.js"></script>

        <!-- Stripe -->
   <script type="text/javascript">
        var stripe = Stripe('pk_test_51Ha2bDKDv87jG37EVfVqdg6JvDCBmcYSkPmnb71KnSZGd8mBaUIidSqnyDAApIr1rbiXz8BUZT7U8czSjt0eLnKQ00ftTmQ5RJ');
        var checkoutButton = document.getElementById("checkout-button");

        if(checkoutButton){
            checkoutButton.addEventListener("click", function () {
                fetch("/prosjekter/VicxeBeats/server/php/create-session.php", {
                method: "POST",
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (session) {
                    return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function (result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                if (result.error) {
                    alert(result.error.message);
                }
                })
                .catch(function (error) {
                    console.error("Error:", error);
                });
        })};
    </script>


<?php
    require "includes/footer.php";
?>