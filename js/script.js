let muc = document.querySelectorAll('.muc');

let indexold  = -1;
let indexnew = -1;

for(let i = 0 ; i < muc.length ; i++){
    if(muc[i].classList.contains('select-muc'))
    {
      indexold = i ;
      localStorage.setItem('indexold' , indexold);
    }
    muc[i].addEventListener('click',function(e){
      indexnew = i ;
      localStorage.setItem('indexnew' , indexnew);
    });
}
muc[localStorage.getItem('indexold')].classList.remove('select-muc');
muc[localStorage.getItem('indexnew')].classList.add('select-muc');


function sendGetRequest() {
  // Lấy giá trị của các tham số từ form
  var param1Value = document.querySelector('.input-discount').value;

  // Xây dựng URL với thêm tham số mới
  var currentURL = window.location.href.toString();
  var url = currentURL.split('&')[0];
  var newURL = url + "&txtFindDiscount=" + encodeURIComponent(param1Value);

  // Chuyển hướng đến URL mới
  window.location.href = newURL;
}



