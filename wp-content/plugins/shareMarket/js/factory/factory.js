(function(){
	angular
	.module("shareMarket")
	.factory("getServiceData",function(getChartData){
		var getData ={
				getYahoo:function(type){
					return getChartData.getData(type);
				},
				getGoogle:function(type){
					return getChartData.getGoogleData(type);
				}
		}
		return getData;
	});
})();
