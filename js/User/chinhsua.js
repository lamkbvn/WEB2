let errorMess =  document.querySelectorAll('.errorMes');
function onEditProfile(event){
    let parent = event.target.parentNode.parentNode;
    parent.querySelector('.row1').style.display = 'none';
    parent.querySelector('.row2').style.display = 'none';
    parent.querySelector('.row3').style.display = 'block';
}

function offEditProfile(event){
  let parent = event.target.parentNode.parentNode;
  parent.querySelector('.row1').style.display = 'flex';
  parent.querySelector('.row2').style.display = 'block';
  parent.querySelector('.row3').style.display = 'none';
}

function offEditProfile1(event){
  let parent = event.target.parentNode.parentNode.parentNode;
  parent.querySelector('.row1').style.display = 'flex';
  parent.querySelector('.row2').style.display = 'block';
  parent.querySelector('.row3').style.display = 'none';
}

function changeNameProfile(event){
  let textHo = document.querySelector('.textHo').value;
  let textTen = document.querySelector('.textTen').value;
  var nameChange = textHo + ' ' + textTen;
  console.log(nameChange);
  $.ajax({
      type: 'POST',
      url: './Controller/User.php',
      data: {
        action : 'nameUser',
        nameChange: nameChange },
      success: function(response) {
          $('.profile-name-user').html(response);
          $('.tennguoidung').html(response);
          $('.name-user').html(response);
          offEditProfile(event);
      }
  });
}

function changeEmailProfile(event) {
  let emailChange = document.querySelector(".emailProfile").value;
  console.log(emailChange);
  let regexEmail = /^\S+@\S+\.\S+$/;
    if (!regexEmail.test(emailChange)) {
        errorMess[0].innerHTML = 'Email không hợp lệ (vd : abc@test.sgu)';
        errorMess[0].style.color = 'red';
        return ;
    }
  $.ajax({
    type : 'POST',
    url : './Controller/User.php',
    data : {
      action :'emailUser',
      emailChange : emailChange
    },
    success  : function(response) {
      $('.email-user').html(response);
      offEditProfile(event);
      errorMess[0].innerHTML = '';
    }
  })
}

function changesdtProfile(event) {
  let sdtChange = document.querySelector(".sdt").value;
  console.log(sdtChange);
  $.ajax({
    type : 'POST',
    url : './Controller/User.php',
    data : {
      action :'sdtUser',
      sdtChange : sdtChange
    },
    success  : function(response) {
      $('.sdt-user').html(response);
      offEditProfile(event);
    }
  })
}


