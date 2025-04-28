// let paymentButton = document.getElementById('payment-button');
// let formBookTour = document.getElementById('form-book-tour');
// let checkboxes = document.querySelectorAll(
//   '.shopping-cart-item_body-left input[type="checkbox"]'
// );
// let totalPriceSpan = document.querySelector('.price-detail');
// let nenDen = document.getElementsByClassName('nen-den')[0];

// nenDen.addEventListener('click', function () {
//   nenDen.style.display = 'none';
//   formBookTour.style.display = 'none';
//   vouchers.style.display = 'none';
//   formBookTour.style.transform = 'translate(0%, 0%) scale(0)';
//   vouchers.style.transform = 'translate(0%, 0%) scale(0)';
// });

// paymentButton.addEventListener('click', function () {
//   formBookTour.style.display = 'block';
//   nenDen.style.display = 'block';
//   setTimeout(function () {
//     formBookTour.style.transform = 'translate(0%, 0%) scale(1)';
//   }, 50);
// });

// // tính tổng tiền sp dựa trên item được check
// function calculateTotalPrice() {
//   let total = 0;
//   checkboxes.forEach(function (checkbox) {
//     if (checkbox.checked) {
//       let itemPrice = checkbox
//         .closest('.shopping-cart-item')
//         .querySelector('.total-price').textContent;
//       total += parseInt(
//         itemPrice.replace('₫', '').trim().replace(/\./g, '').replace(',', '')
//       );
//     }
//   });
//   return total;
// }

// // cập nhật tổng tiền lại sp dc check
// function updateTotalPrice() {
//   totalPriceSpan.textContent = '₫' + calculateTotalPrice().toLocaleString();
// }

// // luôn thay đổi theo checkbox dc check
// checkboxes.forEach(function (checkbox) {
//   checkbox.addEventListener('change', function () {
//     updateTotalPrice();
//   });
// });

// nenDen.addEventListener('click', function () {
//   nenDen.style.display = 'none';
//   formBookTour.style.display = 'none';
// });

// paymentButton.addEventListener('click', function () {
//   formBookTour.style.display = 'block';
//   nenDen.style.display = 'block';
// });

// // Validation functions
// let hoTen = document.querySelector('.hoTen');
// let email = document.querySelector('.email');
// let sodienthoai = document.querySelector('.sodienthoai');
// let diachi = document.querySelector('.diachi');
// let spansValidation = document.querySelectorAll('.validation');

// function validateField(input, regex, span) {
//   if (!regex.test(input.value) || input.value === '') {
//     span.style.display = 'block';
//     return false;
//   } else {
//     span.style.display = 'none';
//     return true;
//   }
// }

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
  }
});

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
