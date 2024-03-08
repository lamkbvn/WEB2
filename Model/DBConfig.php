<?php
class Database
{
	private $hostname = 'localhost';
	private $username = 'root';
	private $pass = '';
	private $dbname = 'web_tour';

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
	public function insertUserData($id_role, $user_name, $fullname, $email, $password, $phone_number, $create_at, $status, $address)
	{
		$sql = "INSERT INTO users (id_role, user_name, fullname, email, password, phone_number, create_at, status, address) 
        VALUES ('$id_role', '$user_name', '$fullname', '$email', '$password', '$phone_number', '$create_at', '$status', '$address')";
		return $this->execute($sql);
	}

	// edit user
	public function updateEditData($id, $id_role, $user_name, $fullname, $email, $password, $phone_number, $create_at, $status, $address)
	{
		$sql = "UPDATE users SET id_role='$id_role', user_name='$user_name', fullname='$fullname', email='$email', password='$password', phone_number='$phone_number', create_at='$create_at', status='$status', address='$address' WHERE id='$id'";
		return $this->execute($sql);
	}

	// delete user
	public function deleteUser($table, $id)
	{
		$sql = "DELETE FROM $table Where id = '$id'";
		return $this->execute($sql);
	}
}
