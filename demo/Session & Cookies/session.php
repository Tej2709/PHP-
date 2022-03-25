<?php
session_start();
?>

<html>
    <head>
        <title>Session Demo</title>
    </head>
    <body>
            <?php
                    $_SESSION["Car"]="TATA SAFARI";
                    $_SESSION["Bike"]="Honda";
                    echo "Session Variable set";
                    echo "<br>";
                    print_r($_SESSION);
            ?>
    </body>
</html>