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
    <?php include "View/layout/header-showproduct.php"; ?>
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

                        <?php foreach ($listCart as $itemCart) : ?>

                        <div class="shopping-cart-item">
                            <div class="shopping-cart-item_body">
                                <div class="shopping-cart-item_body-left">
                                    <input type="checkbox" class="selected_tour" name="selected_tour"
                                        value="<?php echo $itemCart['id_product']; ?>" />
                                    <input type="hidden" name="id_product"
                                        value="<?php echo $itemCart['id_product']; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $itemCart['amount']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $itemCart['price']; ?>">
                                    <input type="hidden" name="date" value="<?php echo $itemCart['create_at']; ?>">
                                </div>
                                <div class="shopping-cart-item_body-right">
                                    <div class="left">
                                        <div class="banner-box"></div>
                                        <div class="middle-info-box">
                                            <a>
                                                <p><?php echo $itemCart['title']; ?></p>
                                                <p><?php echo $itemCart['content']; ?> </p>
                                                <p name="date"><?php echo $itemCart['create_at']; ?></p>
                                                <span class="tagging-tag_text">
                                                    <!-- <span><?php echo $discount; ?></span> -->
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
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512">
                                                                <path
                                                                    d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                                                            </svg>
                                                        </i>
                                                    </div>
                                                    <div class="counter-input">
                                                        <input type="text" id="counterValue" readonly="readonly"
                                                            name="numBook" value="<?php echo $itemCart['amount']; ?>" />
                                                    </div>
                                                    <div class="counter-increase">
                                                        <i class="icon" onclick="increaseValue()">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512">
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
                                        <a
                                            href="index.php?controller=trang-chu&action=cart&id=<?php echo $itemCart['id']; ?>">
                                            <span>Xóa</span>
                                        </a>
                                    </div>
                                    <div class="right">
                                        <div class="price-box">
                                            <span class="total-saving"></span>
                                            <span
                                                class="total-price"><?php echo $itemCart['price'] * $itemCart['amount']; ?>đ</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                <?php
                $idUser = $_SESSION['idUserLogin'];
                $sqlUserInfo= 'select * from nguoidung where id_acount = ' . $idUser;
                $resultUserInfo = $db->execute($sqlUserInfo);
                if ($resultUserInfo && $resultUserInfo->num_rows > 0) {
                    // Lấy thông tin người dùng từ kết quả truy vấn
                    $userInfo = $resultUserInfo->fetch_assoc();
                    $fullname = $userInfo['fullname'];
                    $email = $userInfo['email'];
                    $phone_number = $userInfo['phone_number'];
                    $address = $userInfo['address'];
                } else {
                    $fullname = "";
                    $email = "";
                    $phone_number = "";
                    $address = "";
                }
                ?>
                <form id="form_book_tour">
                    <h2>Vui lòng điền thông tin</h2>
                    <input type="hidden" name="action" value="book-tour">
                    <input type="hidden" class="totalMoneyMain" name="totalMoneyMain" value="1">
                    <div class="container-field">
                        <label for="">Họ tên</label> <br>
                        <input type="text" class="inputField-tourForm hoTen" name="hoTen"
                            value="<?php echo $fullname; ?>">
                        <span class="validation">Họ tên không hợp lệ</span>
                    </div>
                    <div class="container-field">
                        <label for="">Email</label> <br>
                        <input type="text" class="inputField-tourForm email" name="email" value="<?php echo $email; ?>">
                        <span class="validation">Email không hợp lệ</span>
                    </div>
                    <div class="container-field">
                        <label for="">Số điện thoại</label> <br>
                        <input type="text" class="inputField-tourForm sodienthoai" name="sodienthoai"
                            value="<?php echo $phone_number; ?>">
                        <span class="validation">Số điện thoại không hợp lệ</span>
                    </div>
                    <div class="container-field">
                        <label for="">Địa chỉ</label> <br>
                        <input type="text" class="inputField-tourForm diachi" name="diachi"
                            value="<?php echo $address; ?>">
                        <span class="validation">Địa chỉ không được rỗng</span>
                    </div>
                    <div class="container-field">
                        <label for="">Ghi chú</label> <br>
                        <input type="text" class="inputField-tourForm note-book-tour" name="note-book-tour"><br>
                    </div>
                    <input type="submit" name="buy-now" class="buy-now btn-submit-option" value="Mua ngay">

                </form>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="js/User/cart.js"></script>

</html>