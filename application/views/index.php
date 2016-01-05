<!DOCTYPE html>
<html lang="en" >
	<head>
		

		<title>Todo App with CodeIgniter + AngularJS</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo site_url('asset/css/bootstrap.min.css') ?>" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<!-- Custom styles for this template -->
		<link href="<?php echo site_url('asset/css/app.css') ?>" rel="stylesheet">
	</head>

	<body >
	<div class="" data-ng-app="todoApp">
		<div class="container" data-ng-controller="TodoCtrl">
		<!-- Begin page content -->

<!--		<div class="container">-->
		
			<div style="text-align:center">
				<h1>Todo App</h1>
				<h3>{{ $tasks.length}}</h3>
				<h2 data-ng-show="tasks.length == 0">No task yet!</h2>

			</div>

<!--			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>-->

			<form style="form-inline" role="form" ng-submit="addTask()">
				<div class="form-group col-md-10">
					<input type="text" class="form-control" name="fname" ng-model="ngFname" placeholder="Enter task title" required>
					<input type="text" class="form-control" name="email" ng-model="ngEmail" placeholder="Enter task title" required>
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
			</form>
			<div class="col-md-12" data-ng-show="tasks.length > 0">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width:50px">#</th>
							<th>Fname</th>
							<th>Lname</th>
							<th style="width:80px; text-align:center">Email</th>
							<th style="width:80px; text-align:center">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr data-ng-repeat="task in tasks track by $index">
							<td>{{ $index + 1 }}</td>
							<td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].fname"></td>
							<td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].lname"></td>
							<td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].email"></td>
<!--							<td style="text-align:center"><input class="todo" type="checkbox" ng-change="updateTask(tasks[$index])"ng-model="tasks[$index].status" ng-true-value="'1'" ng-false-value="'0'"></td>-->
							<td style="text-align:center"><a class="btn btn-xs btn-default" ng-click="deleteTask(tasks[$index])"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
					</tbody>
				</table>
			</div>



<!---->
<!--			<form style="form-inline" role="form" ng-submit="addTask()">-->
<!--				<div class="form-group col-md-10">-->
<!--					<input type="text" class="form-control" name="fname" ng-model="ngFname" placeholder="Enter task title" required>-->
<!--					<input type="text" class="form-control" name="email" ng-model="ngEmail" placeholder="Enter task title" required>-->
<!--				</div>-->
<!--				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>-->
<!--			</form>-->

		</div>
		</div>






		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
						<form style="form-inline" role="form" ng-submit="addTask()">
							<div class="form-group col-md-10">
								<input type="text" class="form-control" name="title" ng-model="taskTitle" placeholder="Enter task title" required>
								<input type="text" class="form-control" name="position" ng-model="taskPosition" placeholder="Enter task title" required>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>






<!--		<script src="--><?php //echo site_url('asset/js/bootstrap.min.js') ?><!--"></script>-->
		<script src="<?php echo site_url('asset/js/angular.min.js') ?>"></script>
		<script src="<?php echo site_url('asset/js/app.js') ?>"></script>
	</body>
</html>