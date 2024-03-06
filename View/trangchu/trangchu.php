<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/stylelam.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@100;200;300;400;600;700;800;900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<?php
include_once("modules/DBConfig.php");

$db = new Database;
$db->connect();

?>

<body>

</body>

<body>
    <?php
    require_once("View/layout/header.php");
    ?>

    <header class="header">
        <div class="header-inner">
            <img src="css/icons/previous-svgrepo-com.svg" alt="" class="header-previous header-icon" />
            <div class="header-info">
                <h1 class="header-heading">THẾ GIỚI TRỌN NIỀM VUI</h1>
                <p class="header-desc">
                    Khám phá niềm vui của bạn mọi lúc mọi nơi - từ những
                    chuyến du lịch ngẫu hứng tới những cuộc phiêu lưu khắp
                    thế giới
                </p>
                <div class="header-find">
                    <img src="css/icons/find-magnifier-search-zoom-look-svgrepo-com.svg" alt="" class="find-icon" />
                    <input type="text" class="find-input" placeholder="Thành phố HCM - Tour" />
                    <button class="find-btn">Khám phá</button>
                </div>
            </div>
            <img src="css/icons/next-svgrepo-com.svg" alt="" class="header-next header-icon" />
        </div>
    </header>
    <div class="attractive-offer">
        <div class="container">
            <div class="attractive-offer--inner">
                <img class="attractive-offer__pre attractive-offer-img" onclick="previousSlide()" src="css/icons/previous-back-svgrepo-com (1).svg" />
                <h3 class="attractive-offer--heading">Ưu đãi hấp dẫn</h3>
                <ul class="attractive-offer--list">
                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-01.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>
                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-02.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>

                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-03.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>

                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-03.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>
                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-02.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>
                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-03.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>
                    <li class="attractive-offer--item">
                        <img src="css/icons/banner-03.png" alt="">
                        <button class="attractive-offer--btn">Xem thêm</button>
                    </li>
                </ul>
                <img src="css/icons/previous-back-svgrepo-com (1).svg" class="attractive-offer__next attractive-offer-img" onclick="nextSlide()" />
            </div>
        </div>
    </div>
    <div class="why-choose-klook">
        <div class="container">
            <div class="why-choose-klook--inner">
                <h3 class="why-choose-klook--heading">Vì sao bạn nên chọn Klook
                </h3>
                <ul class="why-choose-klook--list">
                    <li class="why-choose-klook--item">
                        <img src="css/icons/why-choose-01.webp" alt="" class="why-choose-klook--img">
                        <div class="why-choose-klook--info">
                            <h4 class="why-choose-klook--title">Vô vàn lựa chọn</h4>
                            <p class="why-choose-klook--desc">Tìm kiếm niềm vui với gần nửa triệu điểm tham quan, phòng khách sạn và nhiều trải nghiệm thú vị</p>
                        </div>
                    </li>
                    <li class="why-choose-klook--item">
                        <img src="css/icons/why-choose-02.webp" alt="" class="why-choose-klook--img">
                        <div class="why-choose-klook--info">
                            <h4 class="why-choose-klook--title">Chơi vui, giá tốt</h4>
                            <p class="why-choose-klook--desc">Trải nghiệm chất lượng với giá tốt. Tích luỹ Klook credit để được thêm ưu đãi</p>
                        </div>
                    </li>
                    <li class="why-choose-klook--item">
                        <img src="css/icons/why-choose-03.webp" alt="" class="why-choose-klook--img">
                        <div class="why-choose-klook--info">
                            <h4 class="why-choose-klook--title">Dễ dàng và tiện lợi</h4>
                            <p class="why-choose-klook--desc">Đặt vé xác nhận ngay, miễn xếp hàng, miễn phí hủy, tiện lợi cho bạn tha hồ khám phá</p>
                        </div>
                    </li>
                    <li class="why-choose-klook--item">
                        <img src="css/icons/why-choose-04.webp" alt="" class="why-choose-klook--img">
                        <div class="why-choose-klook--info">
                            <h4 class="why-choose-klook--title">Đáng tin cậy</h4>
                            <p class="why-choose-klook--desc">Tham khảo đánh giá chân thực. Dịch vụ hỗ trợ tận tình, đồng hành cùng bạn mọi lúc, mọi nơi</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="highlighted-activities">
        <div class="container">
            <div class="highlighted-activities--inner">
                <h3 class="highlighted-activities--heading">Các hoạt động nổi bật</h3>
                <div class="highlighted-activities--list">

                    <div class="highlighted-activities--item">
                        <img src="" alt="" class="highlighted-activities--img">
                        <div class="highlighted-activities--info">
                            <p class="highlighted-activities--desc"> </p>
                            <p class="highlighted-activities--title"></p>
                            <p class="highlighted-activities--price">Từ </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="product-list--hot">
        <div class="container">
            <div class="product-list--hot__inner">
                <h3 class="product-list--hot--heading">Hot nhất tại Klook
                </h3>
                <div class="list--hot">
                    <div class="product-hot-item">
                        <h3 class="product-hot-item--heading">Hoạt Động Du Lịch Việt Nam Bán Chạy</h3>
                        <div class="sub-hot-list">
                            <div class="sub-hot-item">
                                <img src="" alt="" class="sub-hot-item--img">
                                <div class="sub-hot-item--info">
                                    <h4 class="sub-hot-item--heading"></h4>
                                    <p class="sub-hot-item--desc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-hot-item">
                        <h3 class="product-hot-item--heading">Hoạt Động Du Lịch Việt Nam Bán Chạy</h3>
                        <div class="sub-hot-list">

                            <div class="sub-hot-item">
                                <img src="" alt="" class="sub-hot-item--img">
                                <div class="sub-hot-item--info">
                                    <h4 class="sub-hot-item--heading"></h4>
                                    <p class="sub-hot-item--desc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-hot-item">
                        <h3 class="product-hot-item--heading">Hoạt Động Du Lịch Việt Nam Bán Chạy</h3>
                        <div class="sub-hot-list">
                            <div class="sub-hot-item">
                                <img src="" alt="" class="sub-hot-item--img">
                                <div class="sub-hot-item--info">
                                    <h4 class="sub-hot-item--heading"></h4>
                                    <p class="sub-hot-item--desc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="explorer-collection">
        <div class="container">
            <div class="explorer-collection--inner">
                <h3 class="explorer-collection--heading">Thêm nhiều khám phá thú vị</h3>
                <div class="explorer-collection--block">
                    <div class="explorer-collection--info">
                        <h4 class="explorer-collection--info__heading">Giảm 5% cho đơn hàng đầu tiên trên ứng dụng</h4>
                        <p class="explorer-collection--info__desc">Trải nghiệm tiện lợi với ứng dụng Klook. Sử dụng mã "BetterOnApp" để được giảm giá</p>
                        <form id="explorer-collection--send-email" class="explorer-collection--send-email">
                            <label for="email" class="explorer-collection--email-label">Nhận & gửi magic link đến email của bạn</label>
                            <div class="explorer-collection--place-input">
                                <input type="email" placeholder="Email" name="email" id="email" class="explorer-collection--input">
                                <button type="button" id="submitBtn" class="explorer-collection--btn">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../js/animate.js"></script>

</html>