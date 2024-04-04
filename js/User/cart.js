function increaseValue() {
  var value = parseInt(document.getElementById('counterValue').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('counterValue').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('counterValue').value, 10);
  value = isNaN(value) ? 0 : value;
  if (value > 1) {
    value--;
    document.getElementById('counterValue').value = value;
  }
}

let paymentButton = document.getElementById('payment-button');
let formBookTour = document.getElementById('form_book_tour');
let checkboxes = document.querySelectorAll(
  '.shopping-cart-item_body-left input[type="checkbox"]'
);
let totalPriceSpan = document.querySelector('.price-detail');
let nenDen = document.getElementsByClassName('dark')[0];
let checkboxAll = document.getElementById('checkboxAll');

//--------------------------------------//
// Validation functions
let hoTen = document.querySelector('.hoTen');
let email = document.querySelector('.email');
let sodienthoai = document.querySelector('.sodienthoai');
let diachi = document.querySelector('.diachi');
let spansValidation = document.querySelectorAll('.validation');

function validateField(input, regex, span) {
  if (!regex.test(input.value) || input.value === '') {
    span.style.display = 'block';
    return false;
  } else {
    span.style.display = 'none';
    return true;
  }
}
hoTen.addEventListener('blur', function () {
  validateField(hoTen, /^(?!\s*$).+/, spansValidation[0]);
});

email.addEventListener('blur', function () {
  validateField(email, /^\S+@\S+\.\S+$/, spansValidation[1]);
});

sodienthoai.addEventListener('blur', function () {
  validateField(sodienthoai, /^0\d{9}$/, spansValidation[2]);
});
diachi.addEventListener('blur', function () {
  validateField(diachi, /^(?!\s*$).+/, spansValidation[3]);
});

// Form submission validation
formBookTour.addEventListener('submit', function (event) {
  let isValid = true;
  spansValidation.forEach(function (span) {
    if (span.style.display === 'block') {
      isValid = false;
    }
  });
  if (!isValid) {
    event.preventDefault();
  } else {
  }
});

///-------------------------------------------///
//selected_tour
let btnMuaNgay = document.getElementsByClassName('buy-now')[0];
btnMuaNgay.addEventListener('click', function (e) {
  e.preventDefault();
  let selectedProducts = [];
  $('.selected_tour').each(function () {
    if ($(this).is(':checked')) {
      var productDetails = $(this).closest('.shopping-cart-item_body-left');

      var id_product = productDetails.find('input[name="id_product"]').val();

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
        amount: amount,
        price: price,
        date: date,
        hoTen: hoTen,
        email: email,
        sodienthoai: sodienthoai,
        diachi: diachi,
        note_book_tour: note_book_tour,
        tongTien: tongTien,
      });
    }
  });
  console.log(JSON.stringify(selectedProducts));
  let isValid = true;
  if (
    validateField(hoTen, /^(?!\s*$).+/, spansValidation[0]) ||
    validateField(email, /^\S+@\S+\.\S+$/, spansValidation[1]) ||
    validateField(sodienthoai, /^0\d{9}$/, spansValidation[2]) ||
    validateField(diachi, /^(?!\s*$).+/, spansValidation[3])
  ) {
    isValid = true;
  } else isValid = false;
  if (isValid) {
    $.ajax({
      url: 'Controller/cart/cartController.php', // Thay đổi thành URL của server endpoint của bạn
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(selectedProducts),
      success: function (response) {
        // Xử lý phản hồi từ server nếu cần
        console.log(response);
        alert('Giao dịch thành công!');
      },
      error: function (xhr, status, error) {
        // Xử lý lỗi nếu có
        console.error('Lỗi: ' + error);
      },
    });
  }
});

//-----------------------------------//

//tắt nền đen và ẩn form
nenDen.addEventListener('click', function () {
  nenDen.style.display = 'none';
  formBookTour.style.display = 'none';
  formBookTour.style.transform = 'translate(0%, 0%) scale(0)';
});

//nhấn nút thanh toán thì hiện form
paymentButton.addEventListener('click', function () {
  formBookTour.style.display = 'block';
  nenDen.style.display = 'block';
  setTimeout(function () {
    formBookTour.style.transform = 'translate(0%, 0%) scale(1)';
  }, 50);
});

//------------------------------//

// tính tổng tiền sp dựa trên item được check
function calculateTotalPrice() {
  let total = 0;
  checkboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      let itemPrice = checkbox
        .closest('.shopping-cart-item')
        .querySelector('.total-price').textContent;
      total += parseInt(
        itemPrice.replace('₫', '').trim().replace(/\./g, '').replace(',', '')
      );
    }
  });
  //totalMoneyMain lưu giá trị tổng tiền của các sp dc chọn
  document.getElementsByName('totalMoneyMain')[0].value = total;
  return total;
}
// cập nhật tổng tiền lại sp dc check
function updateTotalPrice() {
  totalPriceSpan.textContent = calculateTotalPrice().toLocaleString();
}

// luôn thay đổi theo checkbox dc check
checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener('change', function () {
    updateTotalPrice();
  });
});
checkboxAll.addEventListener('change', function () {
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = checkboxAll.checked;
  });
  updateTotalPrice();
  updatePaymentButtonState();
});
//----------------------------------//

// Hàm kiểm tra xem ít nhất một checkbox đã được chọn hay không
function atLeastOneCheckboxChecked() {
  let checked = false;
  checkboxes.forEach(function (checkbox) {
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
checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener('change', function () {
    updatePaymentButtonState();
  });
});
// Khi trang tải lần đầu, cập nhật trạng thái của nút thanh toán
updatePaymentButtonState();
