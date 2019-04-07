
var chartx=document.getElementById('linechart');
console.log(chartx);
var lineChart=new Chart(chartx, {

  type:'line',
  data:{
    labels:["January","February","March","April","May","June","July"],
    dataset:[{
      label: "My First Dataset",
      fill:false,
      lineTension:0.1,
      backgroundColor:"rgba(75,192,192,0.4)",
      borderColor:"rgba(75,192,192,1)",
      borderCapStyle:'butt',
      borderDash:[],
      borderDashOffset:0.0,
      borederJoinStyle:'miter',
      pointBorderColor:"rgba(75,192,192,1);",
      pointBackgroundColor: "#fff",
      pointBorderWidth:1,
      pointHoverRadius:5,
      pointHoverBackgroundColor:"rgba(97,192,192,1)",
      pointerHoverBorderColor:"(220,220,220,1)",
      pointHoverBorderWidth:2,
      pointRadius:1,
      pointHitRadius:10,
      data:[65,59,80,81,56,55,40],
    }]
  }
});
