<?php
class Database
{
  private $hostname = 'localhost';
  private $username = 'root';
  private $pass = '';
  private $dbname = 'web2';

  private $conn = NULL;
  private $result = NULL;
  // kết nối csdl
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
    $sql = 'select * from nguoidung where id = ' . $idUser;
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

  public function getDataNguoiDung()
  {
    $sql = "SELECT * FROM nguoidung";

    $result = $this->execute($sql);
    $data = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }

    // Trả về dữ liệu
    return $data;
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

  public function registerAcount($username, $password, $id_role, $status)
  {
    $sql = "INSERT INTO acount (user_name, password, id_role, status) VALUES ('$username', '$password', '$id_role', '$status')";
    return $this->execute($sql);
  }

  public function registerNguoiDung($fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)
  {
    $selectId = "SELECT id FROM acount ORDER BY id DESC LIMIT 1";
    $result = $this->execute($selectId);
    $row = $result->fetch_assoc();
    $last_role_id = $row["id"];
    $sql = "INSERT INTO nguoidung (fullname, email, phone_number, create_at, status, address, id_acount) VALUES ('$fullname', '$email', '$phone_number', '$create_at', '$status', '$address', '$last_role_id')";
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
    if ($this->num_row() == 0) {
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

  // thêm detailOrder
  public function InsertDetailOrder($id_order, $id_pro, $price, $amount, $totalmoney, $dateGo)
  {
    $sql = "INSERT INTO order_detail (id_order, id_product, price, amount, total_money, date_go)
    VALUES ( '$id_order', '$id_pro', '$price', '$amount', '$totalmoney', '$dateGo')";
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
public function InsertTour($id, $id_cate, $id_user, $id_provin, $title, $price, $content, $address, $datecreate, $acount){
    $sql = "INSERT INTO product (id, id_category, id_user, id_provincial, title, price, content, create_at, num_bought, status, address, soLuongConLai, star_feedback)
    VALUES ('$id','$id_cate', '$id_user', '$id_provin', '$title', '$price', '$content', '$datecreate', '0', '1', '$address', '$acount', '0')";
    return $this->execute($sql);
  }
  // thêm ảnh
  public function InsertImg($id_product, $id_user, $img)
  {
    $sql = "INSERT INTO image_product (id_product, id_user, image) VALUES ('$id_product', '$id_user', '$img')";
    return $this->execute($sql);
  }

  // thêm quyền
  public function InsertRole($name)
  {
    $sql = "INSERT INTO role (decription) VALUES ('$name')";
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

  public function resultThongKe($orderby, $selectCategory, $dateStart, $dateEnd)
  {
    $sql = 'SELECT p.title ,p.price , od.amount , od.total_money , od.date_go
              FROM product as p , order_detail as od
              where p.id = od.id_product ';
    if ($selectCategory != 0)
      $sql = $sql . ' and p.id_category = ' . $selectCategory;
    if ($dateStart != '') {
      $sql = $sql . ' and od.date_go >= ? ';
    }
    if ($dateEnd != '') {
      $sql = $sql . ' and od.date_go <= ? ';
    }
    if ($orderby == 'ASC')
      $sql = $sql . ' ORDER BY od.amount';
    if ($orderby == 'DESC')
      $sql = $sql . ' ORDER BY od.amount DESC';
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
    while ($row = mysqli_fetch_array($result)) {
      echo '
        <tr>
          <td class ="nameTour">' . $row['title'] . '</td>
          <td>' . $row['price'] . '</td>
          <td class = "num-bought">' . $row['amount'] . '</td>
          <td>' . $row['total_money'] . '</td>
          <td class ="slcl">' . $row['date_go'] . '</td>
        </tr>';
    }
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

    if (mysqli_num_rows($result) == 0) {
      echo '
            <div class="no-find-discount">
              <div class="title-no-find1">
                Mã mời khuyến mãi mới
              </div>
              <div class="title-no-find2">
                Bạn có mã ưu đãi? Nhập vào để lưu ở bên trên.Hoặc bạn có thể mời bạn bè sử dụng Klook và kiếm điểm thưởng.
              </div>
            </div>
            ';
      return;
    }
    while ($row = mysqli_fetch_array($result)) {
      $timezone = new DateTimeZone('Asia/Ho_Chi_Minh');
      // Tạo đối tượng DateTime cho hai mốc thời gian
      $now = new DateTime('now', $timezone); // Thời điểm hiện tại
      $futureDate = new DateTime($row['date_end'] . ' 23:59:59'); // Mốc thời gian trong tương lai
      if ($futureDate < $now) {
        continue;
      }
      // Tính khoảng thời gian giữa hai mốc
      $interval = $now->diff($futureDate);

      // Lấy số ngày còn lại từ DateInterval
      $daysRemaining = $interval->days;
      $hoursRemaining = $interval->h;
      echo '
                <div class="discount-card">
                <div class="infor-card">
                  <div class="infor-card-main">
                    <div class="title-infor-card">
                      ' . $row['discount_name'] . '
                    </div>
                    <div class="detail-infor-card">
                    ' . $row['description'] . '
                    </div>
                    <div class="hansudung">
                      Hạn sử dụng : Còn lại ' . ($daysRemaining > 0 ? $daysRemaining : $hoursRemaining / 3) . ($daysRemaining > 0 ? ' ngày' : ' giờ') . '
                    </div>
                  </div>
                </div>
                <div class="cac-hinh-tron">
                  <div class="hinhtron"></div>
                  <div class="hinhtron"></div>
                  <div class="hinhtron"></div>
                  <div class="hinhtron"></div>
                  <div class="hinhtron"></div>
                </div>
                <div class="use-card">
                  <div class="title-use-card">
                    Mã ưu đãi
                  </div>
                  <div class="code-use-card">
                  ' . $row['code'] . '
                  </div>
                  <button class="btn-use-card" onclick ="useDiscount(event)">Sử dụng</button>
                </div>
              </div>
                ';
    }

    //kiet

  }
}
