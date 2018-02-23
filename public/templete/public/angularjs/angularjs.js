var app = angular.module('myApp',[]);
app = angular.module('myApp').constant('baseurl', {
    'api': {
        'public': 'https://kyshop.herokuapp.com/api/'
        // 'public': 'http://127.0.0.1:8000/api/'
    },
});
app.factory('_', function() {
	return window._; // assumes underscore has already been loaded on the page
}); 