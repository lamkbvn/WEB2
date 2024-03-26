

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
          offEditProfile(event);
      }
  });
}

