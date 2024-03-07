<?php
$connect = new mysqli("localhost", "root", "", "web2");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../View/style.css?v=<?php echo time(); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Klook</title>
</head>

<body>
  <header class="header">
    <div class="container">header</div>
  </header>
  <?php include "../../View/big-image.php" ?>
  <?php include "../../View/main.php" ?>
  <footer class="footer">
    <div class="container">
      <p>© 2014-2024 Klook. All Rights Reserved.</p>
      <img src="../../View/icon/logoSGU.jpeg" alt="" class="icon-logo-SGU" />
    </div>
  </footer>
  <div class="background-dark"></div>


</body>

</html>

<script>
  $(document).ready(function () {
    let currentPage = 1;
    var currentAction = 'getData';

    filterDataInForm();

    function filterDataInForm() {
      var action = currentAction;
      var minPriceInForm = $('#price-min').val();
      var maxPriceInForm = $('#price-max').val();
      var page = currentPage;

      var categories = [];
      if (action === "getData") {
        categories = getFilterInForm('category-advance');
      } else if (action === "categoryFilter") {
        // Thực hiện các thao tác khác nếu cần cho action categoryFilter
        console.log("Đã chọn categoryFilter");
        categories = getFilterInForm('category-out-form');
      }

      $.ajax({
        url: 'http://localhost/WEB2/Controller/showproduct/getData.php',
        method: 'POST',
        data: {
          action: action,
          minPrice: minPriceInForm,
          maxPrice: maxPriceInForm,
          categories: categories,
          page: page
        },
        success: function (response) {
          // Xử lý dữ liệu response tùy thuộc vào action
          if (action === "getData") {
            $('.list-product').html(response);
            $('.pagination').empty();
            var totalPages = document.getElementById('total-pages').getAttribute('data-total');
            let pagi = '';
            for (let i = 1; i <= totalPages; i++) {
              pagi += '<li class="pagination-click ' + (i == currentPage ? 'active' : '') + '">' + i + '</li>';
            }
            $('.pagination').append(pagi);

            // Gán sự kiện click cho các nút phân trang mới
            $('.pagination-click').click(function (e) {
              e.preventDefault();
              currentPage = parseInt($(this).text());
              filterDataInForm();
            });

            // Cập nhật lại số lượng sản phẩm lọc được
            var totalProducts = document.getElementById('total-products').getAttribute('data-total');
            $('.quantity-sort .quantity').html(totalProducts + " dịch vụ");
            // Các thao tác khác
          } else if (action === "categoryFilter") {
            // Thực hiện các thao tác khác cho action categoryFilter
            $('.list-product').html(response);
            $('.pagination').empty();
            var totalPages = document.getElementById('total-pages').getAttribute('data-total');
            let pagi = '';
            for (let i = 1; i <= totalPages; i++) {
              pagi += '<li class="pagination-click ' + (i == currentPage ? 'active' : '') + '">' + i + '</li>';
            }
            $('.pagination').append(pagi);

            // Gán sự kiện click cho các nút phân trang mới
            $('.pagination-click').click(function (e) {
              e.preventDefault();
              currentPage = parseInt($(this).text());
              filterDataInForm();
            });

            // Cập nhật lại số lượng sản phẩm lọc được
            var totalProducts = document.getElementById('total-products').getAttribute('data-total');
            $('.quantity-sort .quantity').html(totalProducts + " dịch vụ");
          }

        }
      });
    }

    function getFilterInForm(className) {
      var selectedFilters = [];
      $('.' + className + '.checked').each(function () {
        selectedFilters.push($(this).data('value'));
      });
      console.log("mang id la: " );
      console.log(selectedFilters);
      return selectedFilters;
    }

    // Gán sự kiện click cho các phần tử có lớp là category-out-form
    $(document).on('click', '.category-out-form', function (e) {
      e.preventDefault();
      console.log("Đã click vào category-out-form");
      currentAction = 'categoryFilter'; // Cập nhật action
      filterDataInForm(); // Gọi lại hàm filterDataInForm() để tải dữ liệu mới sau khi click
    });

    // Gán sự kiện click cho nút hiển thị kết quả
    $('.filter-footer .btn-show-result').click(function (e) {
      e.preventDefault();
      toggleFilterAndBackground();
      currentAction = 'getData'; // Cập nhật action
      filterDataInForm();
    });
  });

  // function getCategoryOutForm(className) {
  // // Khởi tạo idCategory với giá trị mặc định
  // let idCategory = null;

  // // Lặp qua tất cả các phần tử có class là className và có class là 'checked'
  // document.querySelectorAll('.' + className + '.checked').forEach(category => {
  //     // Sử dụng sự kiện 'click' để lắng nghe khi người dùng click vào phần tử
  //     category.addEventListener('click', () => {
  //         // Lấy giá trị của thuộc tính 'data-value' từ phần tử và gán cho idCategory
  //         idCategory = category.getAttribute('data-value');
  //         // In ra console để kiểm tra
  //         console.log('Category ID:', idCategory);
  //         // Thực hiện các hành động khác với idCategory ở đây
  //     });
  // });

  // Trả về giá trị của idCategory
  // return idCategory;
  // }

  // =========================
  const btnAllCatagory = document.querySelector('.all-category');
  document.addEventListener('DOMContentLoaded', function () {
    var categories = document.querySelectorAll('.category');

    categories.forEach(function (category) {
      if (!category.classList.contains("all-category") && category.classList.contains("category")) {
        category.addEventListener('click', function () {
          this.classList.toggle('checked');
        });
      }
    });
  });


  btnAllCatagory.addEventListener("click", () => {
    console.log("da click");
    svg = document.querySelector(".all-category .icon-list-bottom");
    svg.classList.toggle('rotate');
    btnAllCatagory.classList.toggle('checked');
    btnAllCatagory.classList.toggle('active');


  })
  const btnFilterPrice = document.querySelector('.filter-price');
  btnFilterPrice.addEventListener("click", () => {
    console.log("da click");
    svg = document.querySelector(".filter-price .icon-list-bottom");
    svg.classList.toggle('rotate');
    btnFilterPrice.classList.toggle('active');
    btnFilterPrice.classList.toggle('checked');
  })
  const backgroundDark = document.querySelector('.background-dark');
  const btnIconKill = document.querySelector('.icon-kill');

  const btnFilterAll = document.querySelector('.filter-all');
  btnFilterAll.addEventListener("click", () => {

    btnFilterAll.classList.toggle('checked');
    backgroundDark.classList.toggle('active');
  })

  function toggleFilterAndBackground() {
    btnFilterAll.classList.toggle('checked');
    backgroundDark.classList.toggle('active');
  }
  btnIconKill.addEventListener("click", toggleFilterAndBackground);
  backgroundDark.addEventListener("click", toggleFilterAndBackground);


  // ==============================
  const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
  let priceGap = 500000;

  priceInput.forEach(input => {
    input.addEventListener("input", e => {
      let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);

      if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
        if (e.target.className === "input-min") {
          rangeInput[0].value = minPrice;
          range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
        } else {
          rangeInput[1].value = maxPrice;
          range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
        }
      }
    });
  });

  rangeInput.forEach(input => {
    input.addEventListener("input", e => {
      let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

      if ((maxVal - minVal) < priceGap) {
        if (e.target.className === "range-min") {
          rangeInput[0].value = maxVal - priceGap
        } else {
          rangeInput[1].value = minVal + priceGap;
        }
      } else {
        priceInput[0].value = minVal;
        priceInput[1].value = maxVal;
        range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
        range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
      }
    });
  });
  // ==============================
  const rangeInputAll = document.querySelectorAll(".range-input-all input"),
    priceInputAll = document.querySelectorAll(".price-input-all input"),
    rangeAll = document.querySelector(".slider-all .progress-all");
  let priceGapAll = 500000;

  priceInputAll.forEach(input => {
    input.addEventListener("input", e => {
      let minPrice = parseInt(priceInputAll[0].value),
        maxPrice = parseInt(priceInputAll[1].value);

      if ((maxPrice - minPrice >= priceGapAll) && maxPrice <= rangeInputAll[1].max) {
        if (e.target.className === "input-min-all") {
          rangeInputAll[0].value = minPrice;
          rangeAll.style.left = ((minPrice / rangeInputAll[0].max) * 100) + "%";
        } else {
          rangeInputAll[1].value = maxPrice;
          rangeAll.style.right = 100 - ((maxPrice / rangeInputAll[1].max) * 100) + "%";
        }
      }
    });
  });

  rangeInputAll.forEach(input => {
    input.addEventListener("input", e => {
      let minVal = parseInt(rangeInputAll[0].value),
        maxVal = parseInt(rangeInputAll[1].value);

      if ((maxVal - minVal) >= priceGapAll) {
        priceInputAll[0].value = minVal;
        priceInputAll[1].value = maxVal;
        rangeAll.style.left = ((minVal / rangeInputAll[0].max) * 100) + "%";
        rangeAll.style.right = 100 - ((maxVal / rangeInputAll[1].max) * 100) + "%";
      } else {
        if (e.target.className === "range-min-all") {
          rangeInputAll[0].value = maxVal - priceGapAll;
        } else {
          rangeInputAll[1].value = minVal + priceGapAll;
        }
      }
    });
  });
  // ========================== js nút xoá các giá trị form =========
  function deleteFormValues() {
    console.log("Đã xóa");

    // Xóa giá trị của các input
    document.querySelector("#price-min").value = 0;
    document.querySelector("#price-max").value = 5000000;

    // Đặt lại vị trí của thanh trượt range và thanh tiến trình
    // rangeAll.style.left = "0%";
    // rangeAll.style.right = "100%";
  }



  // ========================== js phần câu hỏi ==============

  document.addEventListener('DOMContentLoaded', function () {
    const questions = document.querySelectorAll('.container-one-question');
    questions.forEach(function (question) {
      question.addEventListener('click', function () {
        const content = this.querySelector('.content');
        const iconDynamic = this.querySelector(".icon-dynamic");

        iconDynamic.classList.toggle("rotate");

        // Kiểm tra nếu class "rotate" đã được toggle thì thiết lập lại border-bottom của phần tử cha
        if (iconDynamic.classList.contains("rotate")) {
          iconDynamic.parentNode.style.borderBottom = '0';
          // Nếu không, thiết lập border-bottom thành 0
        } else {
          iconDynamic.parentNode.style.borderBottom = '1px solid #e9e6e6'; // Thiết lập border-bottom của phần tử cha
        }

        content.classList.toggle('show-answer');
      });
    });
  });

</script>