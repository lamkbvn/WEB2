<?php
class Database
{
	private $hostname = 'localhost';
	private $username = 'root';
	private $pass = '';
	private $dbname = 'tour';

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
		$sql = "INSERT INTO cart(id_user, id_product, amount, status) VALUES ('$id_user', '$id_product', '$amount', '1')";
		return $this->execute($sql);
	}

	// thêm orrder
	public function InsertOrder($id_user, $order_method_id, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, $id_discount)
	{
		$sql = "INSERT INTO orders (id_user, order_method_id, fullname, email, phone_number, address, note, date_order, total_money, status)
            VALUES ( '$id_user', '$order_method_id', '$hoten', '$email', '$sdt', '$diachi', '$note', '$date', '$totalPrice','1')";
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
		$sql = "INSERT INTO feedback_travelplace (user_id, product_id, note, create_at, num_star)
            VALUES ('$user_id', '$product_id', '$cmt', '$create_at', '$num_star')";
		return $this->execute($sql);
	}
}
