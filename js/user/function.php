 <?php
 /*
    function check_login($conn)
    {

        if (isset($_SESSION['id_role'])) {
            $id = $_SESSION['id_role'];
            $query = "select * from users where id_role='$id' limit 1";

            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        header("Location: View/login.php");
        die;
    }

    function random_num($length)
    {
        $text = "";

        if ($length < 5) {
            $length = 5;
        }

        $len = rand(4, $length);

        for ($i = 0; $i < $len; $i++) {
            $text .= rand(0, 9);
        }
        return $text;
    }
