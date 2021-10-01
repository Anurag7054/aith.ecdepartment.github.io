<?php
    $server  = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ele';

        $conn = mysqli_connect($server,$user, $password,$database);

        if($conn){
        ?>
            <!-- <script>
            alert(' Connection Successfull ');
            </script> -->
        <?php
        }
        else{
            ?>
            <script>
            alert(' Connection Failed ');
            </script>
        <?php
        }
?>