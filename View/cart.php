<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../Css/cart.css" />
</head>

<body>
    <header>
        <h1>header</h1>
    </header>
    <div class="container-desktop">
        <div class="wrapper">
            <div class="wrapper-body">
                <div class="wrapper-body-left">
                    <div class="wrapper-body-left_header">
                        <span>
                            <input type="checkbox" name="" id="" />
                            <span>Tất cả</span>
                        </span>
                    </div>
                    <div class="wrapper-body-left_body">

                        <?php
                        include("../Controller/addValueToCart.php");
                        ?>

                        <div class="shopping-cart-item">
                            <div class="shopping-cart-item_body">
                                <div class="shopping-cart-item_body-left">
                                    <input type="checkbox" name="" id="" />
                                </div>
                                <div class="shopping-cart-item_body-right">
                                    <div class="left">
                                        <div class="banner-box">
                                            <!-- <img src="../IMG/mg1.png" alt="" /> -->
                                        </div>
                                        <div class="middle-info-box">
                                            <a>
                                                <p><?php echo $tourTitle; ?></p>
                                                <p><?php echo $tourDescription; ?></p>
                                                <p><?php echo $tourDate; ?></p>
                                                <span class="tagging-tag_text">
                                                    <span><?php echo $discount; ?></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="unit-box">
                                            <span>Người lớn</span>
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
                                                            value="1" />
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
                                        <a href="#">
                                            <span>Sửa</span>
                                        </a>
                                        <span>Xóa</span>
                                    </div>
                                    <div class="right">
                                        <div class="price-box">
                                            <span class="total-saving">Giảm <?php echo $discountValue; ?></span>
                                            <span class="total-price">₫ <?php echo $totalPrice; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <span class="price-detail">₫ 1,439,465</span>
                                    <span class="total-saving">Giảm 159,941₫</span>
                                </div>
                            </div>
                            <div class="book-section-content_right">
                                <button>
                                    <span>Thanh toán</span>
                                </button>
                                <p>Nhận <b>76</b> credit cho đơn hàng này</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Js/cart.js"></script>

</html>