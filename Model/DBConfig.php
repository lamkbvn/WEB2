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
		if (!$this->conn) {
			echo "ket noi that bai";
			exit();
		} else mysqli_set_charset($this->conn, 'utf8');
		return $this->conn;
	}

	//thực thi câu truy vấn
	public function execute($sql)
	{
		$this->result = $this->conn->query($sql);
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

	// index.php

	// Hàm blockUser() để cập nhật trạng thái của tài khoản
	function blockUser($id)
	{
		// Chuẩn bị câu truy vấn SQL UPDATE
		$sql = "UPDATE nguoidung SET status = 0 WHERE id = '$id'";
		$this->execute($sql);
	}

	function unblockUser($id)
	{
		// Chuẩn bị câu truy vấn SQL UPDATE
		$sql = "UPDATE nguoidung SET status = 1 WHERE id = '$id'";
		$this->execute($sql);
	}

	// Get the last inserted ID
	public function getLastInsertId()
	{
		return $this->conn->insert_id;
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
}
