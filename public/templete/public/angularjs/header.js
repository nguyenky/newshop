app = angular.module('myApp');
app.controller('HeaderController',[
    '$scope',
    '$rootScope',
    '$http',
    'baseurl',
    function($scope,$rootScope,$http,baseurl){
        $scope.name= "uchiha";
        $scope.hasCart = true;
        $scope.countCart = 0;
        $scope.carts = [];
        var data = ['ád','ád','ád'];
        console.log(data.length)
        console.log(data)
        $scope.getCart = function(){
        	$http({
		        method : "GET",
		        url : baseurl.api + 'cart'
		    }).then(function mySuccess(response) {
		        // $scope.myWelcome = response.data;
		        console.log(response)
		        // if(response.data.success){
		        // 	$scope.hasCart = true;
		        // 	$scope.carts = response.data.data;
		        // 	$scope.countCart = response.data.length;
		        // 	console.log(response.data)
		        // 	console.log(response.data.data)
		        // 	// console.log(response.data.data.length)
		        // 	// console.log(response.data.length)
		        // 	console.log($scope.carts.length);
		        // }else{
		        // 	$scope.hasCart = true;
		        // }
		    }, function myError(response) {
		    	console.log(response)
		    });
        }
        $scope.getCart();
}]);