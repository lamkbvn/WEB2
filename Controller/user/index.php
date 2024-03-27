<?php 
if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = '';
}
     
// include ("../../Model/DBConfig.php");
// $db = new DBConfig();
// $db->connect();  

require_once('../../View/user/cart.php');
switch($action){
    case 'book-tour':{
        
        if (isset($_REQUEST['buy-now'])) {
            
            //$selected_tours = $_REQUEST['selected_tour'];
            $hoten = $_REQUEST['hoTen'];
            $email = $_REQUEST['email'];
            $sdt = $_REQUEST['sodienthoai'];
            $diachi = $_REQUEST['diachi'];
            $note = $_REQUEST['note-book-tour'];
            //date này là ngày mua
            $dateBuy = date('y-m-d');
            // Tính tổng số tiền của tất cả các sản phẩm được chọn
            // $totalMoneyAllProducts = array_sum($_POST['totalMoney']);


            $id = date('dmyHis');
            
          
            
            
         
            $db->InsertOrder($id, 1, $hoten, $email, $sdt, $diachi, $note, $dateBuy, 123, 1);
            echo "<script>alert('a')</script>";
            
            // Lặp qua các tour được chọn
            // foreach ($selected_tours as $index => $selected_tour_id) {
            //     $id_product = $_REQUEST['id_product'][$index];
            //     $numTicket = $_REQUEST['numTicket'][$index];
            //     $totalMoney = $_REQUEST['totalMoney'][$index];
            //     $dateBook = $_REQUEST['date'][$index];
            
            //     $db->InsertDetailOrder($id, 1, $totalMoney, $numTicket, $totalMoney*$numTicket, $dateBook);
            // }
            echo "<script>alert('a')</script>";
            //echo "<script>window.location.href='../user/index.php';</script>";
        }
        
        break;
    }
    
}
$db->close();

?>