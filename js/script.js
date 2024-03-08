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
      break;
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






