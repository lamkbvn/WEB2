<?php
?>

<body>
    <?php
    require_once("View/layout/header.php");
    require_once('includes/handle_mail.php');
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
                    <?php $count = 0; ?>
                    <?php foreach ($dataHotProduct as $product) : ?>
                        <?php if ($count < 4) : ?>
                            <div class="highlighted-activities--item">
                                <img src="<?php echo $product['id']; ?>" alt="<?php echo $product['title']; ?>" class="highlighted-activities--img">
                                <div class="highlighted-activities--info">
                                    <p class="highlighted-activities--desc"><?php echo $product['content']; ?></p>
                                    <p class="highlighted-activities--title"><?php echo $product['title']; ?></p>
                                    <p class="highlighted-activities--price">Từ <?php echo $product['price']; ?></p>
                                </div>
                            </div>
                            <?php $count++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <?php if (count($dataHotProduct) > 4) : ?>
                    <button id="load-more">Xem thêm</button>
                <?php endif; ?>



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
    <div class="blog-page">
        <div class="container">
            <div class="blog-page--inner">
                <div class="blog-page--list">
                    <div class="blog-page--item">
                        <img src="css/icons/blog-page-01.png" alt="" class="blog-page--img">
                        <h4 class="blog-page--heading">Xem blog của Klook</h4>
                        <p class="blog-page--desc">Klook gợi ý cho bạn các xu hướng du lịch, lịch trình chi tiết và các mẹo hữu ích</p>
                        <button class="blog-page--btn">Xem ngay</button>
                    </div>
                    <div class="blog-page--item">
                        <img src="css/icons/blog-page-01.png" alt="" class="blog-page--img">
                        <h4 class="blog-page--heading">Xem blog của Klook</h4>
                        <p class="blog-page--desc">Klook gợi ý cho bạn các xu hướng du lịch, lịch trình chi tiết và các mẹo hữu ích</p>
                        <button class="blog-page--btn">Xem ngay</button>
                    </div>
                    <div class="blog-page--item">
                        <img src="css/icons/blog-page-01.png" alt="" class="blog-page--img">
                        <h4 class="blog-page--heading">Xem blog của Klook</h4>
                        <p class="blog-page--desc">Klook gợi ý cho bạn các xu hướng du lịch, lịch trình chi tiết và các mẹo hữu ích</p>
                        <button class="blog-page--btn">Xem ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("View/layout/footer.php");
    ?>

</body>
<script src="js/animate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#submitBtn').on('click', function() {
            var email = $('#email').val();
            if (email.trim() !== '') {
                $.ajax({
                    type: 'POST',
                    url: 'includes/handle_mail.php',
                    data: {
                        email: email
                    },
                    success: function(response) {
                        alert("gui thanh cong")
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                alert('Vui lòng nhập địa chỉ email.');
            }
        });
    });
</script>

</html>