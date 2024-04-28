// let inputStartTemp = document.querySelector('.input-date-start');

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



// let btnTableData = document.querySelector('.btnTableData');
// let btnChartData = document.querySelector('.btnChartData');
// let btnOrderByASC = document.querySelector('.btnOrderByASC');
// let btnOrderByDECR = document.querySelector('.btnOrderByDECR');


function resetOrder(){
  let asc = document.querySelectorAll('.asc');
  let desc = document.querySelectorAll('.desc');
  for(let i = 0; i < asc.length ; i++)
    {
      if(asc[i].classList.contains('hide'))
        asc[i].classList.remove('hide');
      if(!desc[i].classList.contains('hide'))
        desc[i].classList.add('hide');
    }
}

function filterThongKe(event){
  let tableData = document.querySelector('.tableData');
  let chartData = document.querySelector('.chartData');
  let button = event.target;
  let order =button.parentNode;

  let orderby ;
  let namecoll = order.classList[1];
  if(order.classList.contains("asc"))
    {
      orderby = "ASC";
      resetOrder();
      let asc = order.classList;
      let desc  = order.parentNode.querySelector('.hide').classList;
      asc.add('hide');
      desc.remove('hide');
    }
  else
  if(order.classList.contains("desc"))
    {
      orderby = "DESC";
      resetOrder();
    }
  let parent = document ;
  let category = parent.querySelector('.category');//chọn loại sản phẩm
  let selectCategory = category.selectedIndex;
  let dateStart = parent.querySelector('.input-date-start').value;//chọn ngày bắt đầu
  let dateEnd = parent.querySelector('.input-date-end').value;//chọn ngày kết thú

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

  console.log(selectCategory ,dateStart, dateEnd ,orderby,buttonTypeData,namecoll);
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
        orderby : orderby,
        namecoll : namecoll
      },
      success : function(response){
        $('.bodyTable').html(response);
        DrawChartData();
      }
  });

}

let myChart = null;
let mychart1 =null;

function DrawChartData(){

  let nameTour = document.querySelectorAll('.nameTour');
let numBought = document.querySelectorAll('.num-bought');
let priceTK = document.querySelectorAll('.total-money');
let dateGo = document.querySelectorAll('.date-go');

let convertnumBought = [];
let convertNameTour = [];
let convertpriceTK = [];
let convertDateGo = [];

  //convert data
  for(let i = 0; i < numBought.length; i++)
  {
    convertnumBought.push(parseInt(numBought[i].innerHTML));
    convertNameTour.push(nameTour[i].innerHTML);
    convertpriceTK.push(parseInt(priceTK[i].innerHTML));
    convertDateGo.push(dateGo.innerHTML);
  }
  //lọc các dữ liệu trùng nhau
  for(let i =  0 ; i  < numBought.length - 1 ; i++){
        let name = convertNameTour[i] ;
        for(let j = i + 1 ; j < numBought.length ; j++){
          if(name ==  convertNameTour[j]){
              convertnumBought[i] += convertnumBought[j];
              convertpriceTK[i] += convertpriceTK[j];
              convertNameTour.splice(j, 1);
              convertpriceTK.splice(j, 1);
              convertnumBought.splice(j, 1);
          }
        }

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
        backgroundColor: 'rgba(55, 82, 153, 0.8)',
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

  const ctx1 =document.getElementById('myChart1').getContext('2d');
  chartStatus = Chart.getChart('myChart1');
  if(chartStatus != undefined){
    chartStatus.destroy();
  }

  mychart1 = new Chart(ctx1 , {
    type : 'bar',
    data : {
      labels : convertNameTour ,
      datasets :[{
        label : 'Tổng tiền',
        data : convertpriceTK,
        backgroundColor: 'rgba(55, 153, 153, 0.8)',
        borderWidth: 1
      }]
    },
    option : {
      scales : {
        y : {
          beginAtZero : true
        }
      }
    }
  });
}


