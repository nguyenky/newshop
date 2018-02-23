app = angular.module('myApp');
app.controller('HeaderController',[
    '$scope',
    '$rootScope',
    '$http',
    'baseurl',
    function($scope,$rootScope,$http,baseurl){
        $scope.name= "uchiha";
        $rootScope.hasCart = 0;
        $scope.countCart = 0;
        $scope.carts = [];
        $scope.getCart = function(){
        	$http({
		        method : "GET",
		        url : baseurl.api.public + 'cart'
		    }).then(function mySuccess(response) {
		        console.log(response.data.data)
		        if(response.data.data !=0){
		        	$rootScope.hasCart = response.data.data;
		        }else{
		        	$rootScope.hasCart = 0;
		        }
		    }, function myError(response) {
		    	console.log(response)
		    });
        }
        $scope.getCart();
}]);