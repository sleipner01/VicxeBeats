<?php
    /* Checks if user is an admin, if so, the file gives access to the admin page restricted for the public */
        if(isset($_SESSION['isAdmin'])) {
                echo '<div class="admin">
                        <div class="admin-container">
                            <p>You are an admin. Visit the admin page: </p>
                            <form action="../admin-panel-bootstrap/dashboard.php" method="POST">
                                <button type="submit" name="admin-submit">
                                    <i class="fas fa-user-shield fa-2x"></i>
                                </button>
                            </form>
                        </div>
                    </div>';
        }

        /* If a user is logged in, login button is replaced with a user panel */
        if (isset($_SESSION['userId'])) {
            require 'includes/is-user.php';
        }
        else {
            /* If not, login button stays */
            require 'includes/none-user.php';
        }