<?php
class Database
{
  private $hostname = 'localhost';
  private $username = 'root';
  private $pass = '';
  private $dbname = 'web2';

  private $conn = NULL;
  private $result = NULL;

  public function connect()
  {
    $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
    if ($this->conn->connect_error) {
      echo "Kết nối cơ sở dữ liệu thất bại: " . $this->conn->connect_error;
      exit();
    } else {
      mysqli_set_charset($this->conn, 'utf8');
    }
    return $this->conn;
  }

  public function disconnect()
  {
    $this->conn->close();
  }


  //thực thi câu truy vấn
  public function execute($sql)
  {
    $this->result = $this->conn->query($sql);
    return $this->result;
  }

  public function getTenNguoiDung()
  {
    $idUser = $_SESSION['idUserLogin'];
    $sql = 'select * from nguoidung where id_acount = ' . $idUser;
    $this->result = $this->conn->query($sql);
    $name = $this->getData();
    return $name['fullname'];
  }

  public function foreignKey($tableChil, $columnChil, $tableParent, $columnParent)
  {
    $sql = 'alter table ' . $tableChil .
      ' add constraint fk_' . $columnChil . '_' . $columnParent .
      ' foreign key (' . $columnChil . ') ' .
      ' references ' . $tableParent . '(' . $columnParent . ')';
    $result = $this->execute($sql);
    if ($result)
      echo 'thanh cong';
  }

  //lấy dữ liệu
  public function getData()
  {
    if ($this->result) {
      $data = mysqli_fetch_array($this->result);
    } else {
      $data = 0;
    }
    return $data;
  }

  //lấy dữ liệu
  public function getDataId($table, $id)
  {
    $sql = "SELECT * FROM $table WHERE id = '$id'";
    $this->execute($sql);
    if ($this->num_rows() != 0) {
      $data = mysqli_fetch_array($this->result);
    } else {
      $data = 0;
    }
    return $data;
  }


  //đếm bản ghi
  public function num_rows()
  {
    if ($this->result) {
      $num = mysqli_num_rows($this->result);
    } else {
      $num = 0;
    }
    return $num;
  }

  //lấy toàn bộ dữ liệu
  public function getAllData($table)
  {
    $sql = "SELECT * FROM $table";
    $this->execute($sql);
    if ($this->num_rows() == 0) {
      $data = 0;
    } else {
      while ($datas = $this->getData()) {
        $data[] = $datas;
      }
    }
    return $data;
  }

  // thêm user
  public function insertUserData($fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)
  {
    $sql = "INSERT INTO nguoidung (fullname, email, phone_number, create_at, status, address, id_acount) 
        VALUES ('$fullname', '$email', '$phone_number', '$create_at', '$status', '$address', '$id_acount')";
    return $this->execute($sql);
  }

  // edit user
  public function updateEditData($id, $fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)
  {
    $sql = "UPDATE nguoidung SET fullname='$fullname', email='$email', phone_number='$phone_number', create_at='$create_at', status='$status', address='$address', id_acount='$id_acount' WHERE id='$id'";
    return $this->execute($sql);
  }
  public function roleAccount($id, $role)
  {
    $sql = "UPDATE acount SET id_role = '$role' WHERE id = '$id'";

    return $this->execute($sql);
  }
  // delete user
  public function deleteUser($table, $id)
  {
    $sql = "DELETE FROM $table Where id = '$id'";
    return $this->execute($sql);
  }

  // block user
  function blockUser($id)
  {
    $sql = "UPDATE nguoidung SET status = 0 WHERE id = '$id'";
    $this->execute($sql);
  }

  //unblock user
  function unblockUser($id)
  {
    $sql = "UPDATE nguoidung SET status = 1 WHERE id = '$id'";
    $this->execute($sql);
  }

  public function getDataWithLimit($tableName, $startFrom, $limit)
  {

    $query = "SELECT * FROM $tableName LIMIT $startFrom, $limit";
    $result = $this->conn->query($query);
    $data = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }

    return $data;
  }


  public function checkLogin($username, $password)
  {
    $sql = "SELECT * FROM acount WHERE user_name = '$username' AND password = '$password'";
    return $this->execute($sql);
  }

  public function getRole()
  {
    $sql = "SELECT * FROM role";
    $this->execute($sql);

    $roles = array();

    while ($row = $this->getData()) {
      $roles[] = $row;
    }

    return $roles;
  }

  public function getAllAccounts()
  {
    $sql = "SELECT * FROM acount";
    $this->execute($sql);

    $accounts = array();

    while ($row = $this->getData()) {
      $accounts[] = $row;
    }

    return $accounts;
  }

  public function getAllNguoiDung()
  {
    $sql = "SELECT * FROM nguoidung";
    $this->execute($sql);

    $accounts = array();

    while ($row = $this->getData()) {
      $accounts[] = $row;
    }

    return $accounts;
  }

  public function registerAcount($username, $password, $id_role, $status)
  {
    $sql = "INSERT INTO acount (user_name, password, id_role, status) VALUES ('$username', '$password', '$id_role', '$status')";
    return $this->execute($sql);
  }
  public function registerAcountWithGoogle($username, $password, $id_role, $status, $id_google)
  {
    $sql = "INSERT INTO acount (user_name, password, id_role, status, idGoogle) VALUES ('$username', '$password', '$id_role', '$status', '$id_google')";
    return $this->execute($sql);
  }

  public function registerNguoiDung($fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)
  {
    $sql = "INSERT INTO nguoidung (fullname, email, phone_number, create_at, status, address, id_acount) VALUES ('$fullname', '$email', '$phone_number', '$create_at', '$status', '$address', '$id_acount')";
    return $this->execute($sql);
  }

  public function num_row()
  { // co them s-> thieus 
    if ($this->result) {

      $num = mysqli_num_rows($this->result);
    } else {
      $num = 0;
    }
    return $num;
  }
  public function getAllDataBySql($sql)
  {
    $this->execute($sql);
    if ($this->num_rows() == 0) {
      $data = 0;
    } else {
      while ($datas = $this->getData()) {
        $data[] = $datas;
      }
    }
    return $data;
  }
  // thêm giỏ hàng
  public function InsertCart($id_user, $id_product, $amount, $status)
  {
    $sql = "INSERT INTO cart (id_user, id_product, amount, status) VALUES ('$id_user', '$id_product', '$amount', '$status')";
    return $this->execute($sql);
  }

  // thêm orrder
  public function InsertOrder($id, $id_user, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, $id_discount)
  {
    $sql = "INSERT INTO orders (id, id_user, fullname, email, phone_number, address, note, date_order, total_money, status, id_discount)
    VALUES ('$id', '$id_user', '$hoten', '$email', '$sdt', '$diachi', '$note', '$date', '$totalPrice','1', '$id_discount')";
    return $this->execute($sql);
  }

  // xóa voucher
  public function XoaVoucherKhiAddMa($idVou, $idUser)
  {
    $sql = "delete from discountuser where id_user = $idUser and id_discount = $idVou";
    return $this->execute($sql);
  }

  // thêm detailOrder
  public function InsertDetailOrder($id_order, $id_pro, $price, $amount, $totalmoney, $dateGo)
  {
    $sqlTangSoLuongMua = "UPDATE product SET num_bought = num_bought + $amount, soLuongConLai = soLuongConLai-1 WHERE id = $id_pro";
    $this->execute($sqlTangSoLuongMua);
    $sql = "INSERT INTO order_detail (id_order, id_product, price, amount, total_money, date_go)
    VALUES ( '$id_order', '$id_pro', '$price', '$amount', '$totalmoney', '$dateGo')";
    return $this->execute($sql);
  }
  // lấy ảnh sản phẩm
  public function GetImgProduct($product_id)
  {
    $sql = "SELECT * FROM image_product WHERE id_product = $product_id";
    return $this->execute($sql);
  }
  // thêm bình luận
  public function InsertCmt($user_id, $product_id, $cmt, $create_at, $num_star)
  {
    $sql = "INSERT INTO feedback (user_id, product_id, note, create_at, num_star)
    VALUES ('$user_id', '$product_id', '$cmt', '$create_at', '$num_star')";
    return $this->execute($sql);
  }

  // cập nhật số sao của sản phẩm
  public function updateStarOfTour($product_id)
  {
    $sql = "SELECT ROUND(AVG(num_star), 1) AS avgStar FROM feedback WHERE product_id = '$product_id'";
    $result = $this->execute($sql);
    $row = $result->fetch_assoc();
    $avgStar = $row["avgStar"];
    $update_sql = "UPDATE product SET star_feedback = '$avgStar' WHERE id = '$product_id'";
    return $this->execute($update_sql);
  }
  // phần của admin
  // thêm tour mới
  public function InsertTour($id, $id_cate, $id_user, $id_provin, $title, $price, $content, $address, $datecreate, $acount)
  {
    $sql = "INSERT INTO product (id, id_category, id_user, id_provincial, title, price, content, create_at, num_bought, status, address, soLuongConLai, star_feedback)
    VALUES ('$id','$id_cate', '$id_user', '$id_provin', '$title', '$price', '$content', '$datecreate', '0', '1', '$address', '$acount', '0')";
    $this->execute($sql);
    return mysqli_affected_rows($this->conn);
  }
  // lấy id cuối cùng của tour
  public function getLastID($table)
  {
    $sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
    return $this->execute($sql);
  }
  //edit Tour
  public function UpdateTour($id, $id_cate, $id_user, $id_provin, $title, $price, $content, $dateUpdate, $address, $acount)
  {
    $sql = "UPDATE product SET 
            id_category = '$id_cate', 
            id_user = '$id_user', 
            id_provincial = '$id_provin', 
            title = '$title', 
            price = '$price', 
            content = '$content',
            update_at = '$dateUpdate',  
            address = '$address', 
            soLuongConLai = '$acount' 
            WHERE id = '$id'";
    $this->execute($sql);
    return mysqli_affected_rows($this->conn);
  }

  //xóa tour
  public function DeleteTour($id)
  {
    $sql = "DELETE FROM product WHERE id = $id";
    return $this->execute($sql);
  }
  // thêm ảnh
  public function InsertImg($id_product, $id_user, $img)
  {
    $sql = "INSERT INTO image_product (id_product, id_user, image) VALUES ('$id_product', '$id_user', '$img')";
    return $this->execute($sql);
  }
  public function UpdateImg($id, $img)
  {
    $sql = 'Update image_product SET image = "' . $img . '"  WHERE id = ' . $id;
    return $this->execute($sql);
  }

  // thêm chức năng
  public function InsertChucNang($name)
  {
    $sql = "INSERT INTO chucnang (decription) VALUES ('$name')";
    return $this->execute($sql);
  }
  // sửa chức năng
  public function UpdateNameChucNang($id, $name)
  {
    $sql = "UPDATE chucnang SET decription = '$name' WHERE id = $id";
    return $this->execute($sql);
  }
  //xóa chức năng
  public function DeleteChucNang($id)
  {
    $sql = "DELETE FROM chucnang WHERE id = $id";
    return $this->execute($sql);
  }

  // thêm quyền
  public function InsertRole($name)
  {
    $sql = "INSERT INTO role (decription) VALUES ('$name')";
    $this->execute($sql);
    return mysqli_affected_rows($this->conn);
  }
  // update role
  public function UpdateNameRole($id, $name)
  {
    $sql = "UPDATE role SET decription = '$name' WHERE id = $id";
    $this->execute($sql);
    return mysqli_affected_rows($this->conn);
  }
  // tìm role theo id
  public function FindRole($idRole)
  {
    $sql = "select * from phanquyenlinhdong where id_role = $idRole";
    return $this->execute($sql);
  }
  //xóa role
  public function DeleteRole($id)
  {
    $sql1 = "DELETE FROM phanquyenlinhdong WHERE id_role = $id";
    $this->execute($sql1);
    $sql = "DELETE FROM role WHERE id = $id";
    return $this->execute($sql);
  }
  public function DeleteRoleLinhDong($id)
  {
    $sql1 = "DELETE FROM phanquyenlinhdong WHERE id_role = $id";
    return $this->execute($sql1);
  }
  public function UpdateRoleLinhDong($idRole, $id_CN, $HD)
  {
    $sql = "INSERT INTO phanquyenlinhdong (id_role, id_chucNang, HD) values ('$idRole', '$id_CN', '$HD')";
    return $this->execute($sql);
  }
  public function InsertRoleLinhDong($id_CN, $HD)
  {
    $selectId = "SELECT id FROM role ORDER BY id DESC LIMIT 1";
    $result = $this->execute($selectId);
    $row = $result->fetch_assoc();
    $last_role_id = $row["id"];
    $sql = "INSERT INTO phanquyenlinhdong (id_role, id_chucNang, HD) values ('$last_role_id', '$id_CN', '$HD')";
    return $this->execute($sql);
  }
  // check quyền mới cho nhấn tabAdmin
  public function checkRoleAdmin($idAccount)
  {
    $sql = "SELECT * 
  FROM acount
  JOIN phanquyenlinhdong ON acount.id_role = phanquyenlinhdong.id_role 
  WHERE acount.id = $idAccount;";
    $result = $this->execute($sql);
    $roles = array(); // Mảng chứa các role

    while ($row = mysqli_fetch_array($result)) {
      $roles[] = $row; // Thêm hàng dữ liệu vào mảng roles
    }

    return $roles;
  }

  public function resultThongKe($orderby, $selectCategory, $dateStart, $dateEnd, $namecoll)
  {

    if ($selectCategory == 0) {
      $sql = 'select * from category';
      $result = $this->execute($sql);
      $objects = array();
      $id = 0;
      while ($row = mysqli_fetch_array($result)) {
        $key = 'key' . $id;
        $objects[$key][0] = $row['name_category'];
        $sql = 'SELECT SUM(amount) as total
                FROM order_detail AS od , product AS p
                WHERE p.id = od.id_product AND p.id_category = ' . $row['id'];
        $result1 = $this->execute($sql);
        $row1 = mysqli_fetch_array($result1);
        $objects[$key][1] = $row1['total'];

        $sql = 'SELECT SUM(total_money) as total
        FROM order_detail AS od , product AS p
        WHERE p.id = od.id_product AND p.id_category = ' . $row['id'];
        $result1 = $this->execute($sql);
        $row1 = mysqli_fetch_array($result1);
        $objects[$key][2] = $row1['total'];

        if ($objects[$key][1] == null) {
          $objects[$key][2] = 0;
          $objects[$key][1] = 0;
        }
        $objects[$key][3] = $id + 1;
        ++$id;
      }
      $listOrder = [
        'title' => 0,
        'amount' => 1,
        'total_money' => 2,
        'id' => 3,
      ];
      if ($namecoll != '' && $namecoll != 'price' && $namecoll != 'date_go') {
        $column = [];
        foreach ($objects as $keyx => $value) {
          $column[$keyx] = $value[$listOrder[$namecoll]]; // Chỉ lấy giá trị cột 1
        }
        // Sắp xếp mảng dựa trên giá trị của cột
        if ($orderby == 'ASC')
          array_multisort($column, SORT_ASC, $objects);
        else
          if ($orderby == 'DESC')
            array_multisort($column, SORT_DESC, $objects);
      }

      return $objects;
    }

    $sql = ' SELECT  od.id, p.title ,od.price , od.amount , od.total_money , od.date_go
              FROM product as p , order_detail as od
              where p.id = od.id_product ';
    ///chon san pham theo ten loai
    if ($selectCategory != 0)
      $sql = $sql . ' and p.id_category = ' . $selectCategory;
    ///loc san pham theo ngay di nho  nhat
    if ($dateStart != '') {
      $sql = $sql . ' and od.date_go >= ? ';
    }

    //loc san pham theo ngay di lon nhat
    if ($dateEnd != '') {
      $sql = $sql . ' and od.date_go <= ? ';
    }

    $result = null;
    if ($dateStart != '' && $dateEnd == '') {
      // Chuẩn bị câu lệnh SQL và bind tham số
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("s", $dateStart);

      // Thực thi câu lệnh SQL
      $stmt->execute();

      // Lấy kết quả
      $result = $stmt->get_result();
    } elseif ($dateEnd != '') {
      // Chuẩn bị câu lệnh SQL và bind tham số
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("ss", $dateStart, $dateEnd);

      // Thực thi câu lệnh SQL
      $stmt->execute();

      // Lấy kết quả
      $result = $stmt->get_result();
    } else
      $result = $this->execute($sql);


    $listOrder = [
      'id' => 0,
      'title' => 1,
      'price' => 2,
      'amount' => 3,
      'total_money' => 4,
      'date_go' => 5
    ];
    $objects = array();
    $id = 1;
    while ($row = mysqli_fetch_array($result)) {
      $key = 'key' . $id;
      $objects[$key][0] = $id;
      $objects[$key][1] = $row['title'];
      $objects[$key][2] = $row['price'];
      $objects[$key][3] = $row['amount'];
      $objects[$key][4] = $row['total_money'];
      $objects[$key][5] = $row['date_go'];
      ++$id;
    }

    if ($namecoll != '') {
      $column = [];
      foreach ($objects as $keyx => $value) {
        $column[$keyx] = $value[$listOrder[$namecoll]]; // Chỉ lấy giá trị cột 1
      }
      // Sắp xếp mảng dựa trên giá trị của cột
      if ($orderby == 'ASC')
        array_multisort($column, SORT_ASC, $objects);
      else
        if ($orderby == 'DESC')
          array_multisort($column, SORT_DESC, $objects);
    }

    return $objects;
  }

  public function resultEmailUser($idUser, $emailChange)
  {
    $sql = 'select * from nguoidung where id = ' . $idUser;
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_array($result);

    $fullemailprofile = $row['email'];
    if ($emailChange != '') {
      $fullemailprofile = $_POST['emailChange'];
      $sql = 'Update nguoidung SET email = "' . $fullemailprofile . '"  WHERE id = ' . $idUser;
      mysqli_query($this->conn, $sql);
    }
    echo $fullemailprofile;
  }
  public function getIdByEmail($email)
  {
    $sql = "SELECT id FROM nguoiDung WHERE email = '" . $email . "'";
    $result = mysqli_query($this->conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      return $row['id'];
    } else {
      return null; // Trả về null nếu không tìm thấy bất kỳ kết quả nào
    }
  }

  public function updatePasswordById($id, $newPassword)
  {
    $sql = "UPDATE acount SET password = '" . $newPassword . "' WHERE id = " . $id;
    $this->execute($sql);
  }






  public function resultNameUser($idUser, $nameChange)
  {
    $sql = 'select * from nguoidung where id = ' . $idUser;
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_array($result);

    $fullnameprofile = $row['fullname'];
    if ($nameChange != '') {
      $fullnameprofile = $_POST['nameChange'];
      $sql = 'Update nguoidung SET fullname = "' . $fullnameprofile . '"  WHERE id = ' . $idUser;
      mysqli_query($this->conn, $sql);
    }
    echo $fullnameprofile;
  }

  public function resultsdtUser($idUser, $sdtChange)
  {
    $sql = 'select * from nguoidung where id = ' . $idUser;
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_array($result);

    $sdtprofile = $row['phone_number'];
    if ($sdtChange != '') {
      $sdtprofile = $_POST['sdtChange'];
      $sql = 'Update nguoidung SET phone_number = ' . $sdtprofile . '  WHERE id = ' . $idUser;
      mysqli_query($this->conn, $sql);
    }
    echo $sdtprofile;
  }

  public function resultSearchDiscount($searchTerm, $idUser)
  {
    $result = mysqli_query($this->conn, "SELECT * FROM discount as d,discountuser as du where id_user = " . $idUser . " and du.id_discount = d.id  ");
    if ($searchTerm != '') {
      $stringFind = $searchTerm;
      $query = "SELECT * FROM discount as d,discountuser as du where code like '%$stringFind%'and date_end > CURRENT_DATE and id_user = " . $idUser . " and du.id_discount = d.id  ";
      $result = mysqli_query($this->conn, $query);
    }
    return $result;
  }
  public function getAll()
  {
    if (!$this->result) {
      $data = 0;
    } else {
      while ($datas = $this->getData()) {
        $data[] = $datas;
      }
    }
    return $data;
  }
  public function deleteComment($commentId)
  {
    $this->connect();

    // Chuẩn bị truy vấn xóa
    $sql = "DELETE FROM feedback WHERE id = $commentId";
    $result = $this->execute($sql);

    return $result;
  }
  public function deleteVoucher($VoucherId)
  {
    $this->connect();

    // Chuẩn bị truy vấn xóa
    $sql = "DELETE FROM discount WHERE id = $VoucherId";
    $result = $this->execute($sql);

    return $result;
  }

  public function updateVoucher($id, $discount_name, $code, $percent, $date_start, $date_end, $description, $status)
  {
    $sql = "UPDATE discount SET discount_name='$discount_name', code='$code', percent='$percent', date_start='$date_start', date_end='$date_end', description='$description',status='$status' WHERE id='$id'";
    return $this->execute($sql);
  }
  public function insertVoucher($discount_name, $code, $percent, $date_start, $date_end, $description)
  {
    $sql = "INSERT INTO discount ( discount_name,code,percent,date_start,date_end,description, status) 
            VALUES ( '$discount_name', '$code', '$percent', '$date_start', '$date_end', '$description','1')";
    return $this->execute($sql);
  }
  // Add this method to your DBConfig class
  public function getVoucherDetailsById($voucherId)
  {
    if ($voucherId > 0) {
      $sql = "SELECT * FROM discount WHERE id = $voucherId";
      $result = $this->execute($sql);

      if ($result && $result->num_rows > 0) {

        $voucherDetails = $result->fetch_assoc();
        return $voucherDetails;
      }
    }
    return false;
  }

  public function getUserById($userID)
  {
    if ($userID > 0) {
      $sql = "SELECT * FROM nguoidung WHERE id = $userID";
      $result = $this->execute($sql);

      if ($result && $result->num_rows > 0) {

        $voucherDetails = $result->fetch_assoc();
        return $voucherDetails;
      }
    }
    return false;
  }
  public function deleteItemCart($ItemId)
  {
    $this->connect();

    // Chuẩn bị truy vấn xóa
    $sql = "DELETE FROM cart WHERE id = $ItemId";
    $result = $this->execute($sql);

    return $result;
  }
  public function deleteOrder($orderId)
  {
    $this->connect();
    // Chuẩn bị truy vấn xóa
    $sql = "DELETE FROM orders WHERE id = $orderId";
    $result = $this->execute($sql);
    $sql = "DELETE FROM order_detail WHERE id_order = $orderId";
    $result = $this->execute($sql);
    $this->disconnect();
    return $result;
  }
  public function getDetailOrderByOrderId($orderId)
  {
    $this->connect();
    $sql = "select * from orders o, order_detail d, product p, discount c where o.id = d.id_order and o.id = $orderId and p.id = d.id_product and c.id = o.id_discount";
    $result = $this->execute($sql);
    return $result;
  }
  public function getStatusOrderByOrderId($orderId)
  {
    $this->connect();
    $sql = "select status from orders where id = $orderId";
    $result = $this->execute($sql);
    return $result->fetch_assoc()['status'];
  }
  public function getNameVocherByOrderId($orderId)
  {
    $this->connect();
    $sql = "select * from discount d, orders o where o.id = $orderId and o.id_discount = d.id";
    $result = $this->execute($sql);
    return $result->fetch_assoc()['discount_name'];
  }
  public function getInfoPersonOrder($orderId)
  {
    $this->connect();
    $sql = "select u.id as idUser, u.phone_number, u.email, u.address, u.fullname as nameUser from orders o, nguoiDung u where o.id = $orderId and u.id = o.id_user";
    $result = $this->execute($sql);
    return $result;
  }
  public function updateOrder($orderId, $status)
  {
    $sql = "update orders set status = $status where id = $orderId";
    return $this->execute($sql);
  }
  public function getMailByIdOrder($orderId)
  {
    $this->connect();
    $sql = "select * from orders o, nguoiDung u where o.id = $orderId and o.id_user = u.id";
    $result = $this->execute($sql);
    return $result->fetch_assoc()['email'];
  }
  public function getTotalMoneyByIdOrder($orderId)
  {
    $this->connect();
    $sql = "select * from orders o where o.id = $orderId";
    $result = $this->execute($sql);
    return $result->fetch_assoc()['total_money'];
  }

  public function getDataDonHang($idUser)
  {
    $sql = "select * from orders where id_user = " . $idUser;
    $result = $this->execute($sql);
    return $result;
  }

  public function getDataChiTietDonHang($idOrder)
  {
    $sql = 'select p.title , p.content , od.total_money , od.date_go from order_detail as od , product as p where od.id_product = p.id and od.id_order = ' . $idOrder;
    $result = $this->execute($sql);
    return $result;
  }

  public function getSoLuong($table, $condi)
  {
    $sql = "SELECT COUNT(*) AS count FROM $table WHERE $condi";
    $result = $this->execute($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
  }

  public function getCountYesterday($table, $date)
  {
    $yesterday = date("Y-m-d", strtotime("-1 day"));
    $sql = "SELECT COUNT(*) AS count FROM $table WHERE DATE(DATE_FORMAT($date, '%Y-%m-%d')) = '$yesterday' && id > 0";
    $result = $this->execute($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
  }

  public function getCountToday($table, $date)
  {
    $sql = "SELECT COUNT(*) AS count FROM $table WHERE DATE(DATE_FORMAT($date, '%Y-%m-%d')) = CURDATE() && id > 0";
    $result = $this->execute($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
  }


  // thống kê: hàm lấy ra các tour bán và ngày bán
  public function getTourSellThisWeek()
  {
    $sql = "SELECT 
    DATE_FORMAT(orders.date_order, '%W') AS day_of_week,
    COUNT(order_detail.id_product) AS total_tours_sold
FROM 
    orders
JOIN 
    order_detail ON orders.id = order_detail.id_order
WHERE 
    WEEK(orders.date_order) = WEEK(CURDATE())
    GROUP BY 
    DATE_FORMAT(orders.date_order, '%W')
ORDER BY 
    MIN(orders.date_order);
";
    return $this->execute($sql);
  }

  // Hàm để lấy dữ liệu cho mảng dataPoints2 từ cơ sở dữ liệu
  public function getTourSellLastWeek()
  {
    // Thực hiện truy vấn SQL để lấy số lượng tour bán được trong mỗi ngày trong tuần trước
    $sql = "SELECT 
    DATE_FORMAT(orders.date_order, '%W') AS day_of_week,
    COUNT(order_detail.id_product) AS total_tours_sold
FROM 
    orders
JOIN 
    order_detail ON orders.id = order_detail.id_order
WHERE 
    WEEK(orders.date_order) = WEEK(CURDATE()) - 1
GROUP BY 
    DATE_FORMAT(orders.date_order, '%W')
ORDER BY 
    MIN(orders.date_order);
";

    // Thực hiện truy vấn và trả về kết quả
    return $this->execute($sql);
  }

  // lấy ra id sản phẩm bán được hôm nay
  public function getTourSellToday()
  {
    $sql = "SELECT 
    order_detail.id_product, 
    COUNT(order_detail.id_product) AS total_quantity, 
    product.title
FROM 
    orders
JOIN 
    order_detail ON orders.id = order_detail.id_order
JOIN 
    product ON order_detail.id_product = product.id
WHERE 
WEEK(orders.date_order) = WEEK(CURDATE())
GROUP BY 
    order_detail.id_product
ORDER BY 
    total_quantity DESC;";
    return $this->execute($sql);
  }
  // Hàm lấy dữ liệu số lượng tour bán được trong mỗi tháng của năm trước
  public function getMonthlySalesLastYear() {
    $sql = "SELECT 
                DATE_FORMAT(orders.date_order, '%Y-%m') AS month_year,
                COUNT(order_detail.id_product) AS total_quantity
            FROM 
                orders
            JOIN 
                order_detail ON orders.id = order_detail.id_order
            WHERE 
                YEAR(orders.date_order) = YEAR(CURDATE())
            GROUP BY 
                DATE_FORMAT(orders.date_order, '%Y-%m')
            ORDER BY 
                month_year";
    $result = $this->execute($sql);
    $sales_data = array();
    while ($row = $result->fetch_assoc()) {
        $sales_data[$row['month_year']] = $row['total_quantity'];
    }
    return $sales_data;
}
}

