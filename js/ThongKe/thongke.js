let inputStartTemp = document.querySelector('.input-date-start');

function selectDateStart(event){
  let inputStart = event.target ;
  let inputEnd = inputStart.parentNode.parentNode.querySelector('.input-date-end');
  let temp = inputStart.value;
  if(inputEnd.value <  inputStart.value && inputEnd.value != '')
      alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
  // console.log(inputStart.value) ;
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
    alert('Ngày kết thúc phải lớn hơn ngày bắt đầu');
}



let btnTableData = document.querySelector('.btnTableData');
let btnChartData = document.querySelector('.btnChartData');
let btnOrderByASC = document.querySelector('.btnOrderByASC');
let btnOrderByDECR = document.querySelector('.btnOrderByDECR');
let tableData = document.querySelector('.tableData');
let chartData = document.querySelector('.chartData');


function filterThongKe(event){
  let button = event.target;
  let parent = button.parentNode.parentNode.parentNode.parentNode;
  let category = parent.querySelector('.category');//chọn loại sản phẩm
  let selectCategory = category.selectedIndex;
  let dateStart = parent.querySelector('.input-date-start').value;//chọn ngày bắt đầu
  let dateEnd = parent.querySelector('.input-date-end').value;//chọn ngày kết thú

  //chọn kiểu sắp xếp
  let orderby ;
  let buttonOrderBy = parent.querySelector('.sapxep');
  buttonOrderBy.classList.remove('hide');
  if(buttonOrderBy.value == 0)
    orderby = 'ASC';
  else if(buttonOrderBy.value == 1)
    orderby = 'DESC';

  //chọn  kiểu hiển thị dữ liệu
  let buttonTypeData  = parent.querySelector('.kieudulieu');
  buttonTypeData.classList.remove('hide');
  if(buttonTypeData.value == 0)
  {
    if(tableData.classList.contains('hide')){
      tableData.classList.remove('hide');
      chartData.classList.add('hide');
    }
  }
  else if(buttonTypeData.value == 1)
  {
    if(chartData.classList.contains('hide')){
      chartData.classList.remove('hide');
      tableData.classList.add('hide');
    }
  }

  console.log(selectCategory ,dateStart, dateEnd ,orderby,buttonTypeData.value);
  let displayTitleTable = document.querySelector('.titleTable');
  displayTitleTable.classList.remove('hide');
  $.ajax({
      type: 'POST',
      url : './Controller/ThongKe.php',
      data :{
        action : 'thongKe',
        selectCategory : selectCategory,
        dateStart : dateStart,
        dateEnd : dateEnd,
        orderby : orderby
      },
      success : function(response){
        $('.bodyTable').html(response);
        DrawChartData();
      }
  });

}

let myChart = null;
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
        backgroundColor: '#49EFE9',
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


