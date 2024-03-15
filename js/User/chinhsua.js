

function onEditProfile(event){
    let parent = event.target.parentNode.parentNode;
    parent.querySelector('.row1').style.display = 'none';
    parent.querySelector('.row2').style.display = 'none';
    parent.querySelector('.row3').style.display = 'block';
}

function offEditProfile(event){
  let parent = event.target.parentNode.parentNode.parentNode;
  parent.querySelector('.row1').style.display = 'flex';
  parent.querySelector('.row2').style.display = 'block';
  parent.querySelector('.row3').style.display = 'none';
}


function sendRequest(event) {

  let textHo = document.querySelector('.textHo').value;
  let textTen = document.querySelector('.textTen').value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
          if (this.status == 200) {
              var responseData =  textHo + ' ' + textTen;
              displayResult(responseData,event);
              changeNameProfile(responseData);
          } else {
              displayResult("Đã xảy ra lỗi. Mã lỗi: " + this.status,event);
          }
      }
  };
  // Thay đổi url thành đường dẫn của máy chủ và tài nguyên xử lý yêu cầu
  var url =  "index.php?pageuser=cs&textHo=" + encodeURIComponent(textHo) + "&textTen=" + encodeURIComponent(textTen);
  xhttp.open("GET", url, true);
  xhttp.send();
}

function displayResult(result,event) {
  // Hiển thị kết quả trong phần tử có id là "result"
  document.querySelector('.name-user').innerHTML =result;
  offEditProfile(event);
}

function changeNameProfile(string){
  var nameChange = string;
  console.log(nameChange);
  $.ajax({
      type: 'POST',
      url: './Controller/User.php',
      data: {
        action : 'nameUser',
        nameChange: nameChange },
      success: function(response) {
          $('.profile-name-user').html(response);
      }
  });
}

