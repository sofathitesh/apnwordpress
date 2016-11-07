(function(){
	angular
	.module("shareMarket")
	.service("getChartData",["$http",function($http){
		return {
			getData:function(type){
			return $http({method:"post",url:"http://52.66.21.162/hitesh/newWd/wp-content/plugins/shareMarket/g.php?data="+type+"&host=yahoo",async:false});
			},
			getGoogleData:function(type){	
			return $http({method:"post",url:"http://52.66.21.162/hitesh/newWd/wp-content/plugins/shareMarket/g.php?dataGoogle="+type+"&host=google",async:false});
			}
		}
		
	}]);
})();
