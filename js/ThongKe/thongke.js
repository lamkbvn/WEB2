
function selectDateStart(event){
  let inputStart = event.target ;
  console.log(inputStart.value) ;
}

function selectDateEnd(event){
  let inputEnd = event.target;
  let inputStart = inputEnd.parentNode.parentNode.querySelector('.input-date-start');
  if(inputStart.value == '')
  {
    inputEnd.value = null;
    alert('Chọn ngày bắt đầu trước');
  }

  if(inputEnd.value <  inputStart.value)
  {
    inputEnd.value = null;
    alert('Ngày kết thúc phải lớn hơn ngày bắt đầu');
  }
}

function filterThongKe(event){
  let button = event.target;
  let parent = button.parentNode;
  console.log(parent);
  let category = parent.querySelector('.category');
  let selectCategory = category.options[category.selectedIndex].innerText;
  let dateStart = parent.querySelector('.input-date-start').value;
  let dateEnd = parent.querySelector('.input-date-end').value;

  $.ajax({
      type: 'POST',
      url : './Controller/ThongKe.php',
      data :{
        action : 'filter',
        selectCategory : selectCategory,
        dateStart : dateStart,
        dateEnd : dateEnd
      },
      success : function(response){
        $('.bodyTable').html(response);
        DrawChartData();
      }
  });

}


let btnTableData = document.querySelector('.btnTableData');
let btnChartData = document.querySelector('.btnChartData');
let btnOrderByASC = document.querySelector('.btnOrderByASC');
let btnOrderByDECR = document.querySelector('.btnOrderByDECR');
let tableData = document.querySelector('.tableData');
let chartData = document.querySelector('.chartData');


function typeData(event){
  let button  = event.target.value;
  if(button == 0)
  {
    if(tableData.classList.contains('hide')){
      tableData.classList.remove('hide');
      chartData.classList.add('hide');
    }
  }
  else if(button == 1)
  {
    if(chartData.classList.contains('hide')){
      chartData.classList.remove('hide');
      tableData.classList.add('hide');
      DrawChartData();
    }
  }
}

let myChart = null;
function OrderBy(event){
  let button  = event.target.value;
  let orderby ;
  if(button == 0)
    orderby = 'ASC';
  else if(button == 1)
    orderby = 'DESC';
  $.ajax({
    type: 'POST',
    url : './Controller/ThongKe.php',
    data:{
      action : 'thongKe',
      orderby : orderby
    },
    success: function(response) {
      $('.bodyTable').html(response);
      DrawChartData();
  }
  });

}

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function DrawChartData(){


  let nameTour = document.querySelectorAll('.nameTour');
  let numBought = document.querySelectorAll('.num-bought');

  let convertnumBought = [];
  let convertNameTour = [];

  for(let i = 0; i < numBought.length; i++)
  {
    convertnumBought.push(parseInt(numBought[i].innerHTML));
    convertNameTour.push(nameTour[i].innerHTML);
  }

  const ctx = document.getElementById('myChart').getContext('2d');
  let chartStatus = Chart.getChart("myChart"); // <canvas> id
  if (chartStatus != undefined) {
    chartStatus.destroy();
  }
  mychart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels:convertNameTour,
      datasets: [{
        label: "số lượng đã bán",
        data: convertnumBought,
        backgroundColor: Array.from({ length: convertnumBought.length }, () => getRandomColor()),
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}


