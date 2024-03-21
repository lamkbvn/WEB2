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

	// register
	public function registerAcount($user_name, $password, $id_role, $status)
	{
		$sql = "INSERT INTO acount (user_name, password, id_role, status) VALUES ('$user_name', '$password', '$id_role', '$status')";
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

	public function checkLogin($username, $password)
	{
		$sql = "SELECT * FROM acount WHERE user_name = '$username' AND password = '$password'";

		$result = $this->execute($sql);
		if ($this->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Thêm phương thức kiểm tra tài khoản đã tồn tại vào lớp Database
	public function checkExistingAccount($username)
	{
		$sql = "SELECT * FROM acount WHERE user_name = '$username'";
		$result = $this->execute($sql);
		if ($this->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
