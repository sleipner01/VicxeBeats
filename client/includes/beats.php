<h1>My beats</h1>

<div class="popular my-beats">
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
                    <th></th>
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
                                $audio_file = $row["audio_file"];
                                $price = $row["price"];

                                echo "<tr class='beatRow' id='$youtube_id'>";
                                    echo "<td><img src='beatAvatars/$avatar_file' alt='$avatar_file' width='100%'></td>";
                                    echo "<td>$title</td>";
                                    echo "<td>$duration</td>";
                                    echo "<td>$bpm</td>";
                                    echo "<td>#$hashtags</td>";
                                    echo "<td><a class='addCart' href='../beats/$audio_file' download>Download</a></td>";
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
</div>