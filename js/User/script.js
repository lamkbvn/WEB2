let isMuc = false;
let quaylaisidebar = document.querySelector('.quay-lai-profile');
let sidebar = document.querySelector('.side-bar-main');
let display = document.querySelector('.display-detail');

function OnOff() {
  quaylaisidebar = document.querySelector('.quay-lai-profile');
  sidebar = document.querySelector('.side-bar-main');
  display = document.querySelector('.display-detail');
  if(screen.width > 620){
    sidebar.style.display = 'flex';
    display.style.display = 'block';
    quaylaisidebar.style.display = 'none'; //

  }
  if(screen.width <= 620){
    display.style.display = 'none';
  }
  if(screen.width <= 620 && isMuc){
    sidebar.style.display = 'none';
    quaylaisidebar.style.display = 'block'; //
    display.style.display = 'block';
  }
}
setInterval(OnOff, 1);

function onSideBar(){
    sidebar.style.display = 'flex';
    quaylaisidebar.style.display = 'none'; //
    display.style.display = 'none';
    isMuc = false;
    display.innerHTML = "";
}

function searchDiscount(value) {
  var searchTerm = value;
  console.log(searchTerm);
  $.ajax({
      type: 'POST',
      url: './Controller/User.php',
      data: {
        action : 'searchDiscount',
        searchTerm: searchTerm },
      success: function(response) {
          $('.find-discount').html(response);
      }
  });
}

function selectPageUser(event){
  let button = event.target;
  const listPageUser =[
    "mud",
    "dg",
    "dh",
    "cs"
  ];
  var pageuser = "";
  for(let i = 0; i < listPageUser.length; i++)
    if(button.classList.contains(listPageUser[i]))
    {
      pageuser = listPageUser[i];
      isMuc = true;
      break;
    }

    if(screen.width <= 620){
      let sidebar = document.querySelector('.side-bar-main');
      let display = document.querySelector('.display-detail');
      sidebar.style.display = 'none';
      display.style.display = 'block';
    }

    $.ajax({
      type: 'POST',
      url: './Controller/User.php',
      data: {
        pageuser: pageuser },
      success: function(response) {
          $('.display-detail').html(response);
      }
  });
}

function useDiscount(event){
  let button =event.target;
  let parent =  button.parentNode;
  console.log(parent.querySelector('.code-use-card').value);
}

function exitDetailDH(event){
  let button = event.target;
  let parent = button.parentNode.parentNode;
  parent.classList.add('hide-on');
}

function displayDetailDH(event){
  let button = event.target;
  let parent = button.parentNode.parentNode.parentNode.parentNode;
  let display =  parent.querySelector('.detail-item-dh');
  display.classList.remove('hide-on');

  let idOrder = button.parentNode.parentNode.classList[1];
  console.log(idOrder);
  $.ajax({
    type: 'POST',
    url: './Controller/User.php',
    data: {
      idOrder : idOrder,
      action : 'orderDetail' },
    
    success: function(response) {
      $('.container-dh').html(response);
    }
});

}

function destroyDetailDH(event){
  let button = event.target;

  let idOrder = button.parentNode.parentNode.classList[1];
  console.log(idOrder);
  $.ajax({
    type: 'POST',
    url: './Controller/User.php',
    data: {
      idOrder : idOrder,
      action : 'destroyOrder' },
    
    success: function(response) {
      $('.body-dh').html(response);
    }
});

}

