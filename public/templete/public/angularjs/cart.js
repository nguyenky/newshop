app = angular.module('myApp');
app.controller('CartController',[
    '$scope',
    '$rootScope',
    '$http',
    'baseurl',
    '_',
    function($scope,$rootScope,$http,baseurl,_){
        $scope.cart = 'ád';
        $scope.carts=[];
        $scope.getCart = function(){
            $http({
                method : "GET",
                url : baseurl.api.public + 'cart-content'
            }).then(function mySuccess(response) {
                _.each(response.data.data, function(val){
                    $scope.carts.push(val);
                });
            }, function myError(response) {
                console.log(response)
            });
        }
        $scope.getCart();

        $scope.qtyUp = function(rowId){
            var indexDevice = _.findIndex($scope.carts, function (val) {
                return val.rowId == rowId;
            });

            $scope.carts[indexDevice].qty++;
            $rootScope.hasCart++;
            $scope.updateCart(indexDevice)

        }

        $scope.qtyDown = function(rowId){
            var indexDevice = _.findIndex($scope.carts, function (val) {
                return val.rowId == rowId;
            });

            $scope.carts[indexDevice].qty--;
            $rootScope.hasCart--;
            $scope.removeCart(indexDevice);
            $scope.updateCart(indexDevice)
        }

        $scope.delCart = function(rowId){
            var indexDevice = _.findIndex($scope.carts, function (val) {
                return val.rowId == rowId;
            });

            if(indexDevice > -1){
                $scope.removeApiCart(indexDevice);
                // $scope.carts.splice(indexDevice, 1);
                
            };

        }

        $scope.removeCart = function(index){
            if($scope.carts[index].qty == 0){
                // $scope.carts.splice(index, 1);
                $scope.removeApiCart(index);
            }
        }
        $scope.updateCart = function(index){
            var data = {
                rowID:$scope.carts[index].rowId,
                qty:$scope.carts[index].qty,
            };
            $http({
                method : "POST",
                url : baseurl.api.public + 'updatecart',
                data: data,
            }).then(function mySuccess(response) {
                console.log(response.data.data)
            }, function myError(response) {
                console.log(response)
            });
        }
        $scope.removeApiCart = function(index){
            var data = {
                rowID:$scope.carts[index].rowId,
            };
            $http({
                method : "POST",
                url : baseurl.api.public + 'remove',
                data: data,
            }).then(function mySuccess(response) {
                $rootScope.hasCart = $rootScope.hasCart - $scope.carts[index].qty;
                $scope.carts.splice(index, 1);
                
            }, function myError(response) {
                console.log(response)
            });
        }
}]);