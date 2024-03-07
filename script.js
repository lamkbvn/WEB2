function updateUserInfo() {
  var userId = document.getElementById("userId").value;
  var newInfo = document.getElementById("newInfo").value;

  // Thay đổi url thành địa chỉ tuyệt đối của máy chủ và tài nguyên xử lý yêu cầu
  var url = "http://127.0.0.1:5500/index.html?userId=" + encodeURIComponent(userId) + "&newInfo=" + encodeURIComponent(newInfo);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
          if (this.status == 200) {
              var responseData = userId;
              displayResult(responseData);
          } else {
              displayResult("Đã xảy ra lỗi. Mã lỗi: " + this.status);
          }
      }
  };

  xhttp.open("GET", url, true);
  xhttp.send();
}

function displayResult(result) {
  document.getElementById("result").innerHTML = result;
}
