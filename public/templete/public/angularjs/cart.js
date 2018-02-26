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
        $scope.cartSubTotal = null;
        $scope.getCart = function(){
            $http({
                method : "GET",
                url : baseurl.api.public + 'cart-content'
            }).then(function mySuccess(response) {
                _.each(response.data.data.content, function(val){
                    $scope.carts.push(val);
                });
                $scope.cartSubTotal = response.data.data.sub;
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
            $scope.carts[indexDevice].subtotal = $scope.carts[indexDevice].subtotal + $scope.carts[indexDevice].price;
            $rootScope.hasCart++;
            $scope.updateCart(indexDevice)

        }

        $scope.qtyDown = function(rowId){
            var indexDevice = _.findIndex($scope.carts, function (val) {
                return val.rowId == rowId;
            });

            $scope.carts[indexDevice].qty--;
            $scope.carts[indexDevice].subtotal = $scope.carts[indexDevice].subtotal - $scope.carts[indexDevice].price;
            $rootScope.hasCart--;
            $scope.removeCart(indexDevice);
            
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
            }else{
                $scope.updateCart(index)
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
                $scope.getSubTotal();
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
                $scope.getSubTotal();
                
            }, function myError(response) {
                console.log(response)
            });
        }
        $scope.updateCartSubTotal = function(){
            var sum = _.reduce($scope.carts, function(memo, val){
                return memo + val.subtotal; 
            }, 0);
            console.log(sum);
            $scope.cartSubTotal = sum;
            console.log($scope.cartSubTotal);
        }
        $scope.getSubTotal = function(){
            $http({
                method : "GET",
                url : baseurl.api.public + 'total',
            }).then(function mySuccess(response) {
                $scope.cartSubTotal = parseInt(response.data.data);
                // console.log($scope.cartSubTotal);
                // $scope.checkout(response.data.data);
                
            }, function myError(response) {
                console.log(response)
            });
        }
        $scope.checkout = function(sub){
            // $scope.cartSubTotal = sub;
        }
        $scope.functionUpdate = function(){
            alert('Feature not complete yet ! Something went wrong. Please try again later !');
        }
}]);