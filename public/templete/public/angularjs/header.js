app = angular.module('myApp');
app.controller('HeaderController',[
    '$scope',
    '$rootScope',
    '$http',
    function($scope,$rootScope,$http){
        $scope.name= "uchiha";
        $scope.hasCart = true;
        $scope.countCart = 0;
        $scope.carts = [];
        $scope.getCart = function(){
        	$http({
		        method : "GET",
		        url : "http://127.0.0.1:8000/api/cart"
		    }).then(function mySuccess(response) {
		        // $scope.myWelcome = response.data;
		        console.log(response)
		        if(response.data.success){
		        	$scope.hasCart = true;
		        	$scope.carts = response.data.data;
		        	$scope.countCart = response.data.length;
		        	console.log(response.data)
		        	console.log(response.data.data)
		        	// console.log(response.data.data.length)
		        	// console.log(response.data.length)
		        	console.log($scope.carts.length);
		        }else{
		        	$scope.hasCart = true;
		        }
		    }, function myError(response) {
		    	console.log(response)
		    });
        }
        $scope.getCart();
}]);