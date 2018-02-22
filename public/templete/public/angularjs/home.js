app = angular.module('myApp');
app.controller('HomeController',[
    '$scope',
    '$rootScope',
    '$http',
    'baseurl',
    function($scope,$rootScope,$http,baseurl){
        $scope.name= "qwewewqe";
        $scope.hasCart = false;
        $scope.countCart = 0;
        $scope.carts = [];
        $scope.product ={
            id:null,
            name:null,
            price:null,
            qty:null,
        }
      //   $scope.getCart = function(){
      //   	$http({
		    //     method : "GET",
		    //     url : baseurl.api.public + 'cart'
		    // }).then(function mySuccess(response) {
		    //     console.log(response.data.data)
		    //     if(response.data.data !=0){
		    //     	$scope.hasCart = response.data.data;
		    //     }else{
		    //     	$scope.hasCart = false;
		    //     }
		    // }, function myError(response) {
		    // 	console.log(response)
		    // });
      //   }
      //   $scope.getCart();
      $scope.addCart = function(id,name,price){
        $scope.product.id = id;
        $scope.product.name = name;
        $scope.product.price = price;
        $scope.product.qty = 1;
        $http({
            method : "POST",
            url : baseurl.api.public + 'addcart',
            data: $scope.product,
        }).then(function mySuccess(response) {
            console.log(response)
            $rootScope.hasCart++;

        }, function myError(response) {
          console.log(response)
        });

        
      }
}]);