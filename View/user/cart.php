<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/user/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="nen-den"></div>
    <header>
        <h1>header</h1>
    </header>
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
                        include("../../Model/DBConfig.php");
                        $db = new DBConfig();
                        $db->connect();
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
    <form id="form-book-tour">
        <h2>Vui lòng điền thông tin</h2>
        <input type="hidden" name="action" value="book-tour">
        <input type="hidden" class="totalMoneyMain" name="totalMoneyMain" value="1">
        <div class="container-field">
            <label for="">Họ tên</label> </br>
            <input type="text" class="inputField-tourForm hoTen" name="hoTen" value="kiet2">
            <span class="validation">Họ tên không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Email</label> </br>
            <input type="text" class="inputField-tourForm email" name="email" value="v@gmail.com">
            <span class="validation">Email không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Số điện thoại</label> </br>
            <input type="text" class="inputField-tourForm sodienthoai" name="sodienthoai" value="0976077913">
            <span class="validation">Số điện thoại không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Địa chỉ</label> </br>
            <input type="text" class="inputField-tourForm diachi" name="diachi" value="binhdinh">
            <span class="validation">Địa chỉ không được rỗng</span>
        </div>
        <div class="container-field">
            <label for="">Ghi chú</label> </br>
            <input type="text" class="inputField-tourForm note-book-tour" name="note-book-tour"></br>

        </div>
        <input type="submit" name="buy-now" class="buy-now btn-submit-option" value="Mua ngay">
    </form>
    </div>
    </div>
    </div>
</body>
<script>
let paymentButton = document.getElementById('payment-button');
let formBookTour = document.getElementById('form-book-tour');
let checkboxes = document.querySelectorAll('.shopping-cart-item_body-left input[type="checkbox"]');
let totalPriceSpan = document.querySelector('.price-detail');
let nenDen = document.getElementsByClassName('nen-den')[0];
let checkboxAll = document.getElementById('checkboxAll');



//selected_tour
let btnMuaNgay = document.getElementsByClassName('buy-now')[0];
btnMuaNgay.addEventListener('click', function(e) {
    e.preventDefault();
    let selectedProducts = [];
    $('.selected_tour').each(function() {
        if ($(this).is(':checked')) {
            var productDetails = $(this).closest('.shopping-cart-item_body-left');

            var id_product = productDetails.find('input[name="id_product"]').val();
            var numTicket = productDetails.find('input[name="numTicket"]').val();
            var totalMoneyphp = productDetails.find('input[name="totalMoneyphp"]').val();
            var amount = productDetails.find('input[name="amount"]').val();
            var price = productDetails.find('input[name="price"]').val();
            var date = productDetails.find('input[name="date"]').val();

            var hoTen = $('.hoTen').val();
            var email = $('.email').val();
            var sodienthoai = $('.sodienthoai').val();
            var diachi = $('.diachi').val();
            var note_book_tour = $('.note-book-tour').val();
            var tongTien = $('.totalMoneyMain').val();

            selectedProducts.push({
                id_product: id_product,
                numTicket: numTicket,
                totalMoneyphp: totalMoneyphp,
                amount: amount,
                price: price,
                date: date,
                hoTen: hoTen,
                email: email,
                sodienthoai: sodienthoai,
                diachi: diachi,
                note_book_tour: note_book_tour,
                tongTien: tongTien
            });
        }
    });
    console.log(JSON.stringify(selectedProducts));
    $.ajax({
        url: '/WEB2/Controller/user/index.php', // Thay đổi thành URL của server endpoint của bạn
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(selectedProducts),
        success: function(response) {
            // Xử lý phản hồi từ server nếu cần
            console.log('Dữ liệu đã được gửi thành công');
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi nếu có
            console.error('Lỗi: ' + error);
        }
    });
})

//-----------------------------------//

//tắt nền đen và ẩn form
nenDen.addEventListener('click', function() {
    nenDen.style.display = 'none';
    formBookTour.style.display = 'none';
    formBookTour.style.transform = 'translate(0%, 0%) scale(0)';
})

//nhấn nút thanh toán thì hiện form
paymentButton.addEventListener('click', function() {

    formBookTour.style.display = 'block';
    nenDen.style.display = 'block';
    setTimeout(function() {
        formBookTour.style.transform = 'translate(0%, 0%) scale(1)';
    }, 50);
});

//------------------------------//

// tính tổng tiền sp dựa trên item được check
function calculateTotalPrice() {
    let total = 0;
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            let itemPrice = checkbox.closest('.shopping-cart-item').querySelector('.total-price').textContent;
            total += parseInt(itemPrice.replace('₫', '').trim().replace(/\./g, '').replace(',', ''));

        }
    });
    document.getElementsByName('totalMoneyMain')[0].value = total;
    return total;
}
// cập nhật tổng tiền lại sp dc check
function updateTotalPrice() {
    totalPriceSpan.textContent = calculateTotalPrice().toLocaleString();
}
// luôn thay đổi theo checkbox dc check
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        updateTotalPrice();
    });
});
checkboxAll.addEventListener('change', function() {
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = checkboxAll.checked;
    });
    updateTotalPrice();
});
//----------------------------------//

// Hàm kiểm tra xem ít nhất một checkbox đã được chọn hay không
function atLeastOneCheckboxChecked() {
    let checked = false;
    checkboxAll.isCheck() || checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checked = true;
        }
    });
    return checked;
}
// Cập nhật trạng thái của nút thanh toán dựa trên checkbox được chọn
function updatePaymentButtonState() {
    if (atLeastOneCheckboxChecked()) {
        paymentButton.disabled = false; // Kích hoạt nút thanh toán
    } else {
        paymentButton.disabled = true; // Vô hiệu hóa nút thanh toán
    }
}
// Thêm sự kiện change cho mỗi checkbox
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        updatePaymentButtonState();
    });
});
// Khi trang tải lần đầu, cập nhật trạng thái của nút thanh toán
updatePaymentButtonState();
//--------------------------------------//
// Validation functions
let hoTen = document.querySelector('.hoTen');
let email = document.querySelector('.email');
let sodienthoai = document.querySelector('.sodienthoai');
let diachi = document.querySelector('.diachi');
let spansValidation = document.querySelectorAll('.validation');

function validateField(input, regex, span) {
    if (!regex.test(input.value) || input.value === "") {
        span.style.display = 'block';
        return false;
    } else {
        span.style.display = 'none';
        return true;
    }
}
hoTen.addEventListener('blur', function() {
    validateField(hoTen, /^(?!\s*$).+/, spansValidation[0]);
});

email.addEventListener('blur', function() {
    validateField(email, /^\S+@\S+\.\S+$/, spansValidation[1]);
});

sodienthoai.addEventListener('blur', function() {
    validateField(sodienthoai, /^0\d{9}$/, spansValidation[2]);
});
diachi.addEventListener('blur', function() {
    validateField(diachi, /^(?!\s*$).+/, spansValidation[3]);
});
// Form submission validation
formBookTour.addEventListener('submit', function(event) {
    let isValid = true;
    spansValidation.forEach(function(span) {
        if (span.style.display === 'block') {
            isValid = false;
        }
    });
    if (!isValid) {
        event.preventDefault();
    }
});
// formBookTour.addEventListener('submit', function(event) {
//     if (validateField(hoTen, /^(?!\s*$).+/, spansValidation[0]) ||
//         validateField(email, /^\S+@\S+\.\S+$/, spansValidation[1]) ||
//         validateField(sodienthoai, /^0\d{9}$/, spansValidation[2]) ||
//         validateField(diachi, /^(?!\s*$).+/, spansValidation[3])) {
//         event.preventDefault();
//     }
// });
</script>
<script src="../../Js/user/cart.js"></script>