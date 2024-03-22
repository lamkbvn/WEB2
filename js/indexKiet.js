// chọn loại tour
let chosseTour = document.getElementsByClassName('type-tour');
for (var i = 0; i < chosseTour.length; i++) {
    chosseTour[i].addEventListener('click', function (e) {
        for (var j = 0; j < chosseTour.length; j++) chosseTour[j].classList.remove('chose-tour');
        this.classList.add('chose-tour')
    });
}

// chọn số lượng vé
let numTicketphp = document.getElementsByName('numTicketphp')[0];
let totalMoneyphp = document.getElementsByName('totalMoneyphp')[0];// cập nhật tiền để dùng php
let btnPlus = document.getElementById('btn-plus');
let btnMinus = document.getElementById('btn-minus');
let numTicket = document.getElementById('numTicket');
let num = numTicket.textContent;
btnPlus.addEventListener('click', function (e) {
    num++;
    numTicket.textContent = num;
    numTicketphp.value = num;
    capnhatTongTien();
});
btnMinus.addEventListener('click', function (e) {
    if (num > 0) {
        num--;
        numTicket.textContent = num;
        numTicketphp.value = num;
        capnhatTongTien();
    }
});

function capnhatTongTien() {
    //bỏ validation
    if (num > 0) {
        spanValidationNumticket.style.display = 'none';
    }
    let gia1ve = document.getElementsByClassName('money-tamtinh')[0].id;
    let tongtienView = document.getElementById('totalMoney');
    let x = gia1ve * num;
    totalMoneyphp.value = x;
    x = x.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    tongtienView.textContent = x;
}

// chọn ngày, validation phải sau ngày hiện tại
let datePhp = document.getElementsByName('datePhp')[0]; // cập nhật ngày để dùng php
let btnChonNgay = document.getElementById('select-date');
let spanValidationDate = document.getElementsByClassName('validation')[0];
btnChonNgay.addEventListener('change', function () {
    // Lấy ngày hiện tại
    var today = new Date();

    // Lấy giá trị ngày được chọn từ input
    var selectedDate = new Date(document.getElementById("select-date").value);

    // Kiểm tra xem ngày được chọn có sau ngày hôm nay không
    if (selectedDate <= today) {
        spanValidationDate.textContent = "Không được chọn ngày đã qua";
        spanValidationDate.style.display = 'block';
        // Đặt giá trị của input ngày thành rỗng để yêu cầu người dùng nhập lại
        document.getElementById("select-date").value = "";
    } else {
        spanValidationDate.style.display = 'none';
        var formattedDate = selectedDate.getFullYear() + '-' + ('0' + (selectedDate.getMonth() + 1)).slice(-2) + '-' + ('0' + selectedDate.getDate()).slice(-2);
        datePhp.value=formattedDate;
    }
})

// scroll đến gói dịch vụ
let btnScrollDichVu = document.getElementsByClassName('btn-chosse-dichvu')[0];
btnScrollDichVu.addEventListener('click', function () {
    var targetDiv = document.getElementsByClassName("package-option")[0];
    var offsetTop = targetDiv.offsetTop - 60; // 100px độ lệch từ đỉnh của div
    window.scrollTo({ top: offsetTop, behavior: 'smooth' });
})

// validation các trường dịch vụ
let btnBuyNow = document.getElementsByClassName('buy-now')[0];
let btnAddCart = document.getElementsByClassName('add-cart')[0];
let btnBuyNow2 = document.getElementsByClassName('buy-now')[1];
let flag2=0;
let spanValidationNumticket = document.getElementsByClassName('validation')[1];
btnBuyNow.addEventListener('click', function (e) {
    flag2=0;
    if (btnChonNgay.value == "") {
        e.preventDefault();
        spanValidationDate.textContent = "Vui lòng chọn ngày đi";
        spanValidationDate.style.display = 'block';
        flag2++;
    }
    if (num == 0) {
        e.preventDefault();
        spanValidationNumticket.style.display = 'block';
        flag2++;
    }
    if(flag2==0){
        formBookTour.style.display='block';
        nenDen.style.display='block';
        setTimeout(function() {
            formBookTour.style.transform = 'translate(0%, 0%) scale(1)';
        }, 50);
    }
})
btnAddCart.addEventListener('click', function (e) {
    let flag3=0;
    if (btnChonNgay.value == "") {
        e.preventDefault();
        spanValidationDate.textContent = "Vui lòng chọn ngày đi";
        spanValidationDate.style.display = 'block';
        flag3++;
    }
    if (num == 0) {
        e.preventDefault();
        spanValidationNumticket.style.display = 'block';
        flag3++;
    }
    if(flag3==0){
        //e.preventDefault();
        // alert('e')
        animationAddCart(this);
        addToCart();
        // setTimeout(function() {
        //     document.getElementById('submitAddcart').submit();
        // }, 1000);
    }
})
let formBookTour = document.getElementById('form-book-tour');
let hoTen = document.getElementsByClassName('hoTen')[0];
let email = document.getElementsByClassName('email')[0];
let sodienthoai = document.getElementsByClassName('sodienthoai')[0];
let diachi = document.getElementsByClassName('diachi')[0];
let spanValidation2 = document.getElementsByClassName('validation')[2];
let spanValidation3 = document.getElementsByClassName('validation')[3];
let spanValidation4 = document.getElementsByClassName('validation')[4];
let spanValidation5 = document.getElementsByClassName('validation')[5];
let spanValidation6 = document.getElementsByClassName('validation')[6];
let flag = 0;
function valiHoten() {
    let regexChuoiKhongRong = /^(?!\s*$).+/;
    if (!regexChuoiKhongRong.test(hoTen.value) || hoTen.value == "") {
        spanValidation2.style.display = 'block';
        flag++;
    } else {
        spanValidation2.style.display = 'none';
    }
}

hoTen.addEventListener('blur', function () {
       valiHoten(); 
})
function valiEmail() {
    let regexEmail = /^\S+@\S+\.\S+$/;
    if (!regexEmail.test(email.value)) {
        spanValidation3.style.display = 'block';
        flag++;
    } else {
        spanValidation3.style.display = 'none';
    }
}
email.addEventListener('blur', function () {
    valiEmail();
})
function valiSodienthoai() {
    let regexSDT = /^0\d{9}$/;
    if (!regexSDT.test(sodienthoai.value)) {
        spanValidation4.style.display = 'block';
        flag++;
    } else {
        spanValidation4.style.display = 'none';
    }
    
}
sodienthoai.addEventListener('blur', function () {
        valiSodienthoai();
})
function valiDiachi() {
    let regexChuoiKhongRong = /^(?!\s*$).+/;
    if (!regexChuoiKhongRong.test(diachi.value) || diachi.value == "") {
        spanValidation5.style.display = 'block';
        flag++;
    } else {
        spanValidation5.style.display = 'none';
    }
    
}
diachi.addEventListener('blur', function () {
      valiDiachi();  
})
btnBuyNow2.addEventListener('click', function (e) {
    flag=0;
    valiHoten();
    valiEmail();
    valiSodienthoai();
    valiDiachi();
    if(flag!=0){
        e.preventDefault();
    }
})

// click vào nền đen thì ẩn đi form
let nenDen=document.getElementsByClassName('nen-den')[0];
nenDen.addEventListener('click', function(){
    nenDen.style.display='none';
    formBookTour.style.display='none';
    vouchers.style.display='none';
    formBookTour.style.transform = 'translate(0%, 0%) scale(0)';
    vouchers.style.transform = 'translate(0%, 0%) scale(0)';
})



// css khi nhấn vào ô input thì hiện border ra từ từ
let inputFieldForm = document.getElementsByClassName('inputField-tourForm');
for (var i = 0; i < inputFieldForm.length; i++) {

    inputFieldForm[i].addEventListener('focus', function () {
        this.classList.add('input-focus'); // Thêm class 'input-focus' khi focus
    });

    // Thêm sự kiện blur
    inputFieldForm[i].addEventListener('blur', function () {
        this.classList.remove('input-focus'); // Loại bỏ class 'input-focus' khi blur
    });
}

// fixed nút tạm tính bên phải
window.addEventListener('scroll', function() {
    var myDiv = document.getElementsByClassName('tam-tinh')[0];
    var scrollTop = window.scrollY;
    if (scrollTop >= 630) {
        myDiv.style.position = 'fixed';
        myDiv.style.right = '182px';
        myDiv.style.top = '110px';
    } else {
        myDiv.style.position = 'absolute';
        myDiv.style.right = '-310px';
        myDiv.style.top = '0';
    }
});


// test hiệu ứng
function animationAddCart(e){
    var btn = e;
    var cartIcon = document.getElementById('cartIcon');
    var cartCount = document.getElementById('numCart');
    //console.log(cartIcon)
    // Tính toán vị trí của biểu tượng giỏ hàng
    var cartIconRect = cartIcon.getBoundingClientRect();
    var cartIconX = cartIconRect.left + (cartIconRect.width / 2)+ window.pageXOffset;
    var cartIconY = cartIconRect.top + (cartIconRect.height / 2)+ window.scrollY;
    console.log(cartIconX+" "+cartIconY)
    // Tạo khối di chuyển
    var movingBlock = document.createElement('div');
    movingBlock.id = 'moving-block';
    document.body.appendChild(movingBlock);

    // Lấy kích thước của nút "Thêm vào giỏ hàng"
    var btnRect = btn.getBoundingClientRect();
    var btnX = btnRect.left + (btnRect.width / 2)+ window.pageXOffset;
    var btnY = btnRect.top + (btnRect.height / 2)+ window.scrollY;
    //console.log(btnX + " " + btnY)
    
    // Thiết lập vị trí ban đầu cho khối di chuyển
    movingBlock.style.left = btnX + 'px';
    movingBlock.style.top = btnY + 'px';
    movingBlock.style.display = 'block';
    //console.log(movingBlock)
    // Di chuyển khối đến vị trí của biểu tượng giỏ hàng
    setTimeout(function() {
        movingBlock.style.transition = 'left 1s, top 1s';
        movingBlock.style.left = cartIconX + 'px';
        movingBlock.style.top = cartIconY + 'px';
    }, 50);

    // Xóa khối di chuyển sau khi hoàn thành
    setTimeout(function() {
        movingBlock.parentNode.removeChild(movingBlock);
        var count = cartCount.textContent;
        count++;
        cartCount.textContent = count;
        cartIcon.classList.add('shake');
        setTimeout(function() {
            cartIcon.classList.remove('shake');
        }, 500);
    }, 900);
};
// nếu nhập cmt thì mới hiện nút gửi
let btnSendCmt = document.getElementsByName('send-cmt')[0];
let txtareaCmt = document.getElementsByClassName('text-cmt')[0];
btnSendCmt.addEventListener('click', function(e){
    if(txtareaCmt.value.length==0){
        e.preventDefault();
    }
})

// js cho chọn số sao bình luận
const stars = document.querySelectorAll('.star');
const ratingValue = document.getElementById('rating-value');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const value = parseInt(star.getAttribute('data-value'));
        ratingValue.value = value;
        console.log(ratingValue.value)
        highlightStars(value);
    });
});

function highlightStars(value) {
    stars.forEach(star => {
        const starValue = parseInt(star.getAttribute('data-value'));
        if (starValue <= value) {
            star.classList.add('selected');
        } else {
            star.classList.remove('selected');
        }
    });
}

// chọn voucher
let btnVoucher = document.getElementsByClassName('discount')[0];
let vouchers = document.getElementsByClassName('vouchers')[0];
btnVoucher.addEventListener('click', function(){
    vouchers.style.display = 'block';
    nenDen.style.display = 'block';
    setTimeout(function() {
        vouchers.style.transform = 'translate(0%, 0%) scale(1)';
    }, 50);
})


// AJAX add cart
function addToCart() {
    var formData = new FormData(document.getElementById('submitAddcart'));
    var queryString = "";
    for (var pair of formData.entries()) {
        queryString += encodeURIComponent(pair[0]) + '=' + encodeURIComponent(pair[1]) + '&';
    }
    queryString = queryString.slice(0, -1); // Loại bỏ ký tự '&' cuối cùng

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Xử lý phản hồi từ server
            console.log(this.responseText);
            // Cập nhật giao diện nếu cần
        }
    };
    xhr.open("GET", "/WEB2/Controller/User/chitietTour/buyTour.php?" + queryString, true);
    xhr.send();
}

