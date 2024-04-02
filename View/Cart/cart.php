<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/user/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="dark"></div>
    <?php include "View/layout/header-showproduct.php" ?>
    <div class="container-desktop">
        <div class="wrapper">
            <div class="wrapper-body">
                <div class="wrapper-body-left">
                    <div class="wrapper-body-left_header">
                        <span>
                            <input type="checkbox" name="" id="checkboxAll" />
                            <span>Tất cả</span>
                        </span>
                    </div>
                    <div class="wrapper-body-left_body">
                        <?php
                        $sql = "SELECT cart.*, nguoidung.*, product.* 
                                FROM cart 
                                LEFT JOIN nguoidung ON cart.id_user = nguoidung.id
                                LEFT JOIN product ON cart.id_product = product.id";
                        $result = $db->execute($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Extract data from the current row
                                $fullname = $row['fullname'];
                                $title = $row['title'];
                                $description = $row['content'];
                                $tourDate = $row['create_at'];
                                $price = $row['price'];
                                $amount = $row['amount'];
                                $status = $row['status'];
                                $id_product = $row['id_product'];
                                $totalPricephp = ($price * $amount);

                                echo '<div class="shopping-cart-item">
                                    
                                <div class="shopping-cart-item_body">
                                    <div class="shopping-cart-item_body-left">
                                    <input type="checkbox" class="selected_tour" name="selected_tour" value="' . $id_product . '" />
                                            <input type="hidden" name="priceForTotal" value="' . $totalPricephp . '">
                                            <input type="hidden" name="id_product" value="' . $id_product . '">
                                            <input type="hidden" name="numTicket" value="' . $amount . '">
                                            <input type="hidden" name="totalMoneyphp" value="' . $totalPricephp . '">
                                            <input type="hidden" name="amount" value="' . $amount . '">
                                            <input type="hidden" name="price" value="' . $price . '">
                                            
                                            <input type="hidden" name="date" value="' . $tourDate . '">
                                            </div>
                                            <div class="shopping-cart-item_body-right">
                                                <div class="left">
                                                    <div class="banner-box"></div>
                                                    <div class="middle-info-box">
                                                        <a>
                                                            <p>' . $title . '</p>
                                                            <p>' . $description . '</p>
                                                            <p name="date">' . $tourDate . '</p>
                                                            <span class="tagging-tag_text">
                                                                <span><?php echo $discount; ?></span>
                        </span>
                        </a>
                    </div>
                </div>
                <div class="right">
                    <div class="unit-box">
                        <div class="action-bar">
                            <div class="counter-small">
                                <div class="counter-decrease">
                                    <i class="icon" onclick="decreaseValue()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                                        </svg>
                                    </i>
                                </div>
                                <div class="counter-input">
                                    <input type="text" id="counterValue" readonly="readonly" name="numTicket"
                                        value=' . $amount . ' />
                                </div>
                                <div class="counter-increase">
                                    <i class="icon" onclick="increaseValue()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                        </svg>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-cart-item_footer">
            <div class="operation-box">
                <div class="left">
                    <a href="#">
                        <span>Sửa</span>
                    </a>
                    <span>Xóa</span>
                </div>
                <div class="right">
                    <div class="price-box">
                        <span class="total-saving"></span>
                        <span class="total-price">' . $totalPricephp . '</span>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }
    } else {
    echo "No data found in the cart.";
    }
    ?>
    </div>
    </div>
    <div class="wrapper-body-right">
        <div class="book-section">
            <div class="book-section-content">
                <div class="book-section-content_left">
                    <div class="subtotal">
                        <span>Tổng cộng</span>
                    </div>
                    <div class="price-info-box">
                        <span class="price-detail" name="totalMoney">₫0</span>
                        <!-- <span class="total-saving">Giảm 159,941₫</span> -->
                    </div>
                </div>
                <div class="book-section-content_right">
                    <button id="payment-button">
                        <span>Thanh toán</span>
                    </button>
                    <p>Nhận <b>76</b> credit cho đơn hàng này</p>
                </div>
            </div>
        </div>
    </div>
    <form id="form_book_tour">
        <h2>Vui lòng điền thông tin</h2>
        <input type="hidden" name="action" value="book-tour">
        <input type="hidden" class="totalMoneyMain" name="totalMoneyMain" value="1">
        <div class="container-field">
            <label for="">Họ tên</label> </br>
            <input type="text" class="inputField-tourForm hoTen" name="hoTen" value="">
            <span class="validation">Họ tên không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Email</label> </br>
            <input type="text" class="inputField-tourForm email" name="email" value="">
            <span class="validation">Email không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Số điện thoại</label> </br>
            <input type="text" class="inputField-tourForm sodienthoai" name="sodienthoai" value="">
            <span class="validation">Số điện thoại không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Địa chỉ</label> </br>
            <input type="text" class="inputField-tourForm diachi" name="diachi" value="">
            <span class="validation">Địa chỉ không được rỗng</span>
        </div>
        <div class="container-field">
            <label for="">Ghi chú</label> </br>
            <input type="text" class="inputField-tourForm note-book-tour" name="note-book-tour"></br>

        </div>
        <input type="submit" name="buy-now" class="buy-now btn-submit-option" value="Mua ngay">
        <!-- <a href="index.php?controller=trang-chu&action=cart&buyNow=yes" name="buy-now" class="buy-now btn-submit-option" value="Mua ngay">Mua ngay</a> -->
    </form>
    </div>
    </div>
    </div>
</body>

<script src="js/User/cart.js"></script>