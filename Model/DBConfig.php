<?php

//--------------- database connection--------//
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mydb";
$con = mysqli_connect($hostname, $username, $password);
mysqli_select_db($con, $database);

class DBConfig
{
  private $hostname = 'localhost';
  private $username = 'root';
  private $pass = '';
  private $dbname = 'mydb';

  private $con = NULL;
  private $result = NULL;
  // kết nối csdl
  public function connect()
  {
    $this->con = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
    if (!$this->con) {
      echo "ket noi that bai";
      exit();
    } else
      mysqli_set_charset($this->con, 'utf8');
    return $this->con;
  }

  public function disconnect()
  {
    $this->con->close();
  }

  //thực thi câu truy vấn
  public function execute($sql)
  {
    $this->result = $this->con->query($sql);
    // if (!$this->result) {
    // Nếu câu truy vấn không thành công, in ra thông báo lỗi
    //     echo "Lỗi: " . mysqli_error($this->con);
    // }
    return $this->result;
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

  //lấy toàn bộ dữ liệu
  public function getAllData()
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

  // thêm giỏ hàng
  public function InsertCart($id_user, $id_product, $amount, $status)
  {
    $sql = "INSERT INTO cart (id_user, id_product, amount, status) VALUES ('$id_user', '$id_product', '$amount', '$status')";
    return $this->execute($sql);
  }

  // thêm orrder
  public function InsertOrder($id, $id_user, $order_method_id, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, $id_discount)
  {
    $sql = "INSERT INTO orders (id, id_user, order_method_id, fullname, email, phone_number, address, note, date_order, total_money, status)
      VALUES ('$id', '$id_user', '$order_method_id', '$hoten', '$email', '$sdt', '$diachi', '$note', '$date', '$totalPrice','1')";
    return $this->execute($sql);
  }

  // thêm detailOrder
  public function InsertDetailOrder($id_user, $price, $amount, $totalmoney, $dateGo)
  {
    $sql = "INSERT INTO orders (id_user, price, amount, total_money, date_go)
      VALUES ( '$id_user', '$price', '$amount', '$totalmoney', '$dateGo')";
    return $this->execute($sql);
  }

  // thêm bình luận
  public function InsertCmt($user_id, $product_id, $cmt, $create_at, $num_star)
  {
    $sql = "INSERT INTO feedback (user_id, product_id, note, create_at, num_star)
      VALUES ('$user_id', '$product_id', '$cmt', '$create_at', '$num_star')";
    return $this->execute($sql);
  }

  // phần của admin
  // thêm tour mới
  public function InsertTour($id, $id_cate, $id_user, $id_provin, $title, $price, $content, $datecreate, $acount)
  {
    $sql = "INSERT INTO product (id, id_category, id_user, id_provincial, title, price, content, create_at, num_bought, status, soLuongConLai, star_feedback)
      VALUES ('$id','$id_cate', '$id_user', '$id_provin', '$title', '$price', '$content', '$datecreate', '0', '1', '$acount', '0')";
    return $this->execute($sql);
  }
  // thêm ảnh
  public function InsertImg($id_product, $id_user, $img)
  {
    $sql = "INSERT INTO image_product (id_product, id_user, image) VALUES ('$id_product', '$id_user', '$img')";
    return $this->execute($sql);
  }

  // thêm quyền
  public function InsertRoleLinhDong($idRole, $id_CN, $HD, $name)
  {
    $sql = "INSERT INTO phanquyenlinhdong (id_role, id_chucnang, HD, name) values ('$idRole', '$id_CN', '$HD', '$name')";
    return $this->execute($sql);
  }

  public function resultThongKe($orderby)
  {
    $sql = 'SELECT * FROM product';
    if ($orderby == 'ASC')
      $sql = $sql . ' ORDER BY num_bought';
    if ($orderby == 'DESC')
      $sql = $sql . ' ORDER BY num_bought DESC';
    $result = $this->execute($sql);
    while ($row = mysqli_fetch_array($result)) {
      echo '
      <tr>
        <td> ' . $row['id'] . '</td>
        <td class ="nameTour">' . $row['title'] . '</td>
        <td>' . $row['price'] . '</td>
        <td class = "num-bought">' . $row['num_bought'] . '</td>
        <td>' . $row['star_feedback'] . '</td>
        <td class ="slcl">' . $row['soLuongConLai'] . '</td>
      </tr>';
    }
  }

  public function resultNameUser($idUser, $nameChange)
  {
    $sql = 'select * from nguoidung where id = ' . $idUser;
    $result = mysqli_query($this->con, $sql);
    $row = mysqli_fetch_array($result);

    $fullnameprofile = $row['fullname'];
    if ($nameChange != '') {
      $fullnameprofile = $_POST['nameChange'];
      $sql = 'Update nguoidung SET fullname = "' . $fullnameprofile . '"  WHERE id = ' . $idUser;
      mysqli_query($this->con, $sql);
    }
    echo $fullnameprofile;
  }

  public function resultSearchDiscount($searchTerm, $idUser)
  {
    $result = mysqli_query($this->con, "SELECT * FROM discount as d,discountuser as du where id_user = " . $idUser . " and du.id_discount = d.id  ");
    if ($searchTerm != '') {
      $stringFind = $searchTerm;
      $query = "SELECT * FROM discount as d,discountuser as du where code like '%$stringFind%'and date_end > CURRENT_DATE and id_user = " . $idUser . " and du.id_discount = d.id  ";
      $result = mysqli_query($this->con, $query);
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
  }
}

?>