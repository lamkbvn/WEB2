<?php
$connect = new mysqli("localhost", "root", "", "web2");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./View/style.css" />
  <link rel="stylesheet" href="../View/style.css?v=<?php echo time(); ?>">
  <title>Klook</title>
</head>

<body>
  <header class="header">
    <div class="container">header</div>
  </header>
  <?php include "../View/big-image.php" ?>
  <?php include "../View/main.php" ?>
  <footer class="footer">
    <div class="container">
      <p>© 2014-2024 Klook. All Rights Reserved.</p>
      <img src="../View/icon/logoSGU.jpeg" alt="" class="icon-logo-SGU" />
    </div>
  </footer>
  <div class="background-dark"></div>
  <!-- <script type="text/javascript" src="../View/js.js"></script> -->
  <!-- <script src="/script.js"></script> -->

</body>

</html>

<script>
  const btnAllCatagory = document.querySelector('.all-category');
  btnAllCatagory.addEventListener("click", () => {
    console.log("da click");
    svg = document.querySelector(".all-category .icon-list-bottom");
    svg.classList.toggle('rotate');
    btnAllCatagory.classList.toggle('active');
    btnAllCatagory.classList.toggle('checked');

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
  const btnFilterAll = document.querySelector('.filter-all');
  btnFilterAll.addEventListener("click", () => {
    
    btnFilterAll.classList.toggle('checked');
    backgroundDark.classList.toggle('active');
  })
  const btnIconKill = document.querySelector('.icon-kill');
  btnIconKill.addEventListener("click", () => {
    btnFilterAll.classList.toggle('checked');
    backgroundDark.classList.toggle('active');
  })
  backgroundDark.addEventListener("click", () => {
    btnFilterAll.classList.toggle('checked');
    backgroundDark.classList.toggle('active');
  })
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

  // ==========================

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
  // Hàm này được gọi khi người dùng thay đổi tùy chọn sắp xếp
  function sortBy() {
    // Lấy giá trị của tùy chọn sắp xếp
    var selectedOption = document.getElementById("sortOption").value;
    // Gửi biểu mẫu khi thay đổi tùy chọn
    document.getElementById("sortForm").submit();
  }
  function updateURLParameter(url, param, value) {
    var newURL = new URL(url);
    newURL.searchParams.set(param, value);
    return newURL.toString();
  }

  // Event listener when sort option is changed
  document.getElementById('sortOption').addEventListener('change', function () {
    var sortValue = this.value;
    var currentURL = window.location.href;
    var newURL = updateURLParameter(currentURL, 'sort', sortValue);
    window.location.href = newURL;
  });




  //   document.getElementById('prevPage').addEventListener('click', function(e) {
  //     e.preventDefault();
  //     let currentPage = parseInt('<?php echo $page; ?>');
  //     if (currentPage > 1) {
  //         let prevPage = currentPage - 1;
  //         let url = window.location.href.split('?')[0] + '?option=showproduct&page=' + prevPage;
  //         window.location.href = url;
  //     }
  // });



  // =========== để đấy làm sau
  // const rangeInputs = document.querySelectorAll(".range-input input[type='range']");
  // const form = document.querySelector(".range-input");

  // rangeInputs.forEach(input => {
  //   input.addEventListener("input", () => {
  //     form.dispatchEvent(new Event('submit'));
  //   });
  // });

  // form.addEventListener('submit', (event) => {
  //   event.preventDefault(); // Ngăn chặn hành động mặc định của việc gửi form
  //   // Tại đây, bạn có thể thực hiện việc truy vấn dữ liệu hoặc xử lý dữ liệu trước khi gửi form đi.
  //   console.log('Dữ liệu đã được gửi: ', new FormData(form)); // Ví dụ: Gửi dữ liệu bằng cách sử dụng FormData
  // });
  // =================
</script>