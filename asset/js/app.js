var todoApp = angular.module('todoApp', []);

todoApp.controller('TodoCtrl', function ($scope, $http) {
	
	$http.get('api/users').success(function(data){
		$scope.users = data;
	}).error(function(data){
		$scope.users = data;
	});
	
	$scope.refresh = function(){
		$http.get('api/users').success(function(data){
			$scope.users = data;
		}).error(function(data){
			$scope.users = data;
		});
	}
	
	$scope.addTask = function(){
		var newTask = {fname: $scope.ngFname, email: $scope.ngEmail};
		//var taskPos = {position: $scope.taskPosition};
		$http.post('api/users', newTask).success(function(data){
			$scope.refresh();
			$scope.ngFname = '';
			$scope.ngEmail = '';
		}).error(function(data){
			alert(data.error);
		});
	}
	
	$scope.deleteTask = function(user){
		$http.delete('api/users/' + user.id);
		$scope.users.splice($scope.users.indexOf(user),1);
	}
	
	$scope.updateTask = function(user){
		$http.put('api/users', user).error(function(data){
			alert(data.error);
		});
		$scope.refresh();
	}
	
});