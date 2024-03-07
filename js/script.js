function searchDiscount(value) {
  var searchTerm = value;
  console.log(searchTerm);
  $.ajax({
      type: 'POST',
      url: './Controller/User/searchDiscount.php',
      data: { searchTerm: searchTerm },
      success: function(response) {
          $('.find-discount').html(response);
      }
  });
}






