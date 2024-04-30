<?php
// session_start();
require_once 'vendor/autoload.php';

// Initialize Google Client
$clientID = '753957182028-bcn7049v0jana5ea340i7nfnb9i9tug5.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/WEB2/index.php?controller=trang-chu&action=login';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    // Fetch access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user info from Google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $idGoogle = $google_account_info->id;

    // Check if user exists in the database
    $db = new Database();
    $db->connect();
    $sql = 'SELECT * FROM nguoiDung, acount WHERE nguoiDung.id_acount = acount.id AND email = "' . $email . '"';
    $getData = $db->getAllDataBySql($sql);

    if ($db->num_rows() > 0) {
        $idGoogle = $getData[0]['idGoogle'];
        if ($idGoogle == null) {
            echo "Account with this email already exists.";
        } else {
            echo "Logged in with Google successfully.";
            $idUser = $db->getIdByEmail($email);
            $objuser = array($name, $password);
            $_SESSION['objuser'] = $objuser;
            $_SESSION['idUserLogin'] = $idUser;
            $_SESSION['isLogin'] = 1;
            header("Location: index.php?controller=trang-chu");
        }
    } else {
        // Register new account
        echo "Register new account";
        $create_at = date('Y/m/d');
        $password = md5($idGoogle);
        $db->registerAcountWithGoogle($name, $password, 0, 1, $idGoogle);

        // Register new user
        $accounts = $db->getAllAccounts();
        $accountEND = end($accounts);
        $id_acount = $accountEND['id'];
        $db->registerNguoiDung($name, $email, "", $create_at, 1, "", $id_acount);
        $idUser = $db->getIdByEmail($email);
        $objuser = array($name, $password);
        $_SESSION['objuser'] = $objuser;
        $_SESSION['idUserLogin'] = $idUser;
        $_SESSION['isLogin'] = 1;
        header("Location: index.php?controller=trang-chu");
    }
}
?>