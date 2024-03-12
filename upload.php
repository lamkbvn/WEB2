<?php 
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die('Could not connect: ');
} 
mysqli_select_db($con, "web2");
// if(isset($_POST["submit"])) {
//     $file = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
    
//     $sql = "INSERT INTO image_product (id_user, id_product, image) VALUES ('1', '1', '$file')";
//     if ($con->query($sql) === TRUE) {
//         echo "Image uploaded successfully.";
//     } else {
//         echo "Error: " . $sql . "<br>" . $con->error;
//     }
// }
$sql = "SELECT * FROM image_product WHERE id = '12'"; // Thay đổi điều kiện truy vấn tùy theo yêu cầu của bạn
$result = $con->query($sql);

$row = $result->fetch_assoc();
    $imageData = $row["image"];
    echo '<img src="data:image/jpeg;base64,'.base64_encode($imageData).'">';
mysqli_close($con);
// ?>