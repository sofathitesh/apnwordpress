(function(){
	angular
	.module("shareMarket",[])
	.controller("Graph",function($scope,getServiceData){

		function designGraph(type,niftySensex){
			var correctData = '';
			getServiceData.getYahoo(type).then(function(response){
				correctData = JSON.parse(JSON.stringify(response));
				$scope.bseopen = correctData.data["ranges"]["open"]["max"];
				$scope.bseclose = correctData.data["ranges"]["close"]["max"];
				$scope.bseopenMin = correctData.data["ranges"]["open"]["min"];
				$scope.bsecloseMin = correctData.data["ranges"]["close"]["min"];

				var data = []
				var series = correctData.data["series"];
				for(var i=0;i< series.length;i++){
					data.push(series[i].open);
				}
				var res = [];
				for (var i = 0; i < data.length; ++i) {
					res.push([i, data[i]])
				}
				var plot = jQuery.plot("#placeholder", [ res ], {
					series: {
						shadowSize: 0,
						color: "#376b98",	// Drawing is faster without shadows
						lines: { show: true, fill: true, fillColor: "#d6e7f2" },
					},
					grid: {
						borderWidth: 1,
						minBorderMargin: 20,
						labelMargin: 10,
						backgroundColor: {
							colors: ["#fff", "#e4f4f4"]
						},
					},
					yaxis: {
						min:Math.min.apply(Math,data),
						max:Math.max.apply(Math,data)+500
					},
					xaxis: {
						show: false
					}
				});
			});
			getServiceData.getGoogle(niftySensex).then(function(response){
				$scope.companyName = ["SPICE JET","ASHOKLEY LTD","ICICI BANK","IDFC BANK","JINDAL STEL"];
				$scope.open = response.data[0].l_cur.replace("&#8377;","");	
				$scope.gain = response.data[0].c;	
				$scope.cp_fix = response.data[0].cp_fix;
				$scope.allData = new Array();
				for(var i=1;i<response.data.length;i++){
					$scope.allData.push(response.data[i]);
				}
			});
			}
			$scope.bse = function(){
				designGraph("bsesn","BSE:SENSEX");
			}
			$scope.nse = function(){
				designGraph("NSEI","NSE:NIFTY");
			}
		});
})();
