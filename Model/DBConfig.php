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
	// Kiểm tra xem $username và $password có tồn tại trong bảng acount hay không
	public function checkCredentials($username, $password)
	{
		// Sử dụng câu truy vấn để lấy thông tin từ bảng acount
		$sql = "SELECT * FROM acount WHERE user_name = '$username' AND password = '$password'";

		// Thực thi câu truy vấn
		$this->execute($sql);

		// Kiểm tra số lượng bản ghi trả về từ câu truy vấn
		if ($this->num_rows() != 0) {
			// Nếu có bản ghi tồn tại, tức là tài khoản hợp lệ
			return true;
		} else {
			// Ngược lại, tài khoản không hợp lệ
			return false;
		}
	}
}
