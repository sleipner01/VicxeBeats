<?php
    $page = 'File manager';

    require 'includes/user-authentication.php';
    require "includes/header.php";
    require "includes/nav.php";
?>



    <div class="main-panel">
      <?php
        require "includes/toolbar.php";
      ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title">Upload a beat</h4>
                    </div>
                    <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="admin-PHP-scripts/beat-upload.php">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">BPM</label>
                            <input type="number" class="form-control" name="bpm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">YouTube ID</label>
                            <input type="text" class="form-control" name="youtube-id">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">Hashtags</label>
                            <input type="text" class="form-control" name="hashtags">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="number" class="form-control" name="price" step=".01">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">Avatar | Choose a file</label>
                            <input type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">Audio file | Choose a file</label>
                            <input type="file" class="form-control" id="audiofile" name="audiofile">
                            </div>
                        </div>
                        </div>
                        <input type="number" name="duration" id="duration" style="display: none;">
                        <button type="submit" name="file-upload" class="btn btn-primary pull-right">Upload</button>
                        <div class="clearfix"></div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <script>
            // Add a change event listener to the file input
            document.getElementById("audiofile").addEventListener('change', function(){

            // Obtain the uploaded file, you can change the logic if you are working with multiupload
            var file = this.files[0];

            // Create instance of FileReader
            var reader = new FileReader();

            // When the file has been succesfully read
            reader.onload = function (event) {

                // Create an instance of AudioContext
                var audioContext = new (window.AudioContext || window.webkitAudioContext)();

                // Asynchronously decode audio file data contained in an ArrayBuffer.
                audioContext.decodeAudioData(event.target.result, function(buffer) {
                    // Obtain the duration in seconds of the audio file (with milliseconds as well, a float value)
                    var duration = buffer.duration;

                    // example 12.3234 seconds
                    console.log("The duration of the song is of: " + parseInt(duration) + " seconds");
                    // Alternatively, just display the integer value with
                    // parseInt(duration)
                    // 12 seconds

                    //Adding duration value to form
                    document.getElementById("duration").value = parseInt(duration);
                });
            };

            // In case that the file couldn't be read
            reader.onerror = function (event) {
                console.error("An error ocurred reading the file: ", event);
            };

            // Read file as an ArrayBuffer, important !
            reader.readAsArrayBuffer(file);

            }, false);
        </script>


<?php
    require "includes/suffix-bottom.php";
    require "includes/fixed-plugin.php";
    require "includes/scripts-footer.php";
?>