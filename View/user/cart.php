<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/user/cart.css">
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
                                $totalPrice = $row['num_bought'];
                                $amount = $row['amount'];
                                $status = $row['status'];
                                $id_product = $row['id_product'];

                                // Xuất các trường nhập ẩn để gửi dữ liệu liên quan đến các mặt hàng được chọn khi biểu mẫu được gửi đi
                                echo '<input type="hidden" name="id_product" value="' . $id_product . '">';
                                echo '<input type="hidden" name="numTicket" value="' . $amount . '">';
                                echo '<input type="hidden" name="totalMoney" value="' . $totalPrice . '">';
                                echo '<input type="hidden" name="date" value="' . $tourDate . '">';

                                
                                echo '<div class="shopping-cart-item">
                                    <div class="shopping-cart-item_body">
                                        <div class="shopping-cart-item_body-left">
                                            <input type="checkbox" name="selected_tour" value="' . $id_product . '" />
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
                        <span class="total-price">₫ ' . $totalPrice . '</span>
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
    <form action="../../Controller/user/index.php" method="get" id="form-book-tour">
        <h2>Vui lòng điền thông tin
        </h2>
        <input type="hidden" name="action" value="book-tour">

        <div class="container-field">
            <label for="">Họ tên</label> </br>
            <input type="text" class="inputField-tourForm hoTen" name="hoTen">
            <span class="validation">Họ tên không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Email</label> </br>
            <input type="text" class="inputField-tourForm email" name="email">
            <span class="validation">Email không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Số điện thoại</label> </br>
            <input type="text" class="inputField-tourForm sodienthoai" name="sodienthoai">
            <span class="validation">Số điện thoại không hợp lệ</span>
        </div>
        <div class="container-field">
            <label for="">Địa chỉ</label> </br>
            <input type="text" class="inputField-tourForm diachi" name="diachi">
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
    return total;
}

// cập nhật tổng tiền lại sp dc check
function updateTotalPrice() {
    totalPriceSpan.textContent = '₫' + calculateTotalPrice().toLocaleString();
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

</html>