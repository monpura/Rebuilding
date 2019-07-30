
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('angular');


var app = angular.module('LaravelCRUD', []
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);

app.controller('TaskController', ['$scope', '$http', function ($scope, $http) {
    $scope.tasks = [];
    //console.log("Hello World from controller");
    // List tasks
    $scope.loadTasks = function () {

        $http.get('/tasks')
            .then(function success(e) {
            	//console.log("Hello World from controller123123");
                $scope.tasks = e.data.tasks;
                //console.log($scope.tasks);
            });
    };
    $scope.loadTasks();


	$scope.errors = [];

    $scope.task = {
        name: '',
        description: ''
    };
    $scope.initTask = function () {
        $scope.resetForm();
        $("#add_new_task").modal('show');
    };

    // Add new Task
    $scope.addTask = function () {
        $http.post('/tasks', {
            name: $scope.task.name,
            description: $scope.task.description
        }).then(function success(e) {
            $scope.resetForm();
            $scope.tasks.push(e.data.task);
            $("#add_new_task").modal('hide');

        }, function error(error) {
            $scope.recordErrors(error);
        });
    };

    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if (error.data.errors.name) {
            $scope.errors.push(error.data.errors.name[0]);
        }

        if (error.data.errors.description) {
            $scope.errors.push(error.data.errors.description[0]);
        }
    };

    $scope.resetForm = function () {
        $scope.task.name = '';
        $scope.task.description = '';
        $scope.errors = [];
    };   


     $scope.edit_task = {};
    // initialize update action
    $scope.initEdit = function (index) {
        $scope.errors = [];
        $scope.edit_task = $scope.tasks[index];
        $("#edit_task").modal('show');
    };

    // update the given task
    $scope.updateTask = function () {
        $http.patch('/tasks/' + $scope.edit_task.id, {
            name: $scope.edit_task.name,
            description: $scope.edit_task.description
        }).then(function success(e) {
            $scope.errors = [];
            $("#edit_task").modal('hide');
        }, function error(error) {
            $scope.recordErrors(error);
        });
    };

	// delete the given task
    $scope.deleteTask = function (index) {

        var conf = confirm("Do you really want to delete this task?");

        if (conf === true) {
            $http.delete('/tasks/' + $scope.tasks[index].id)
                .then(function success(e) {
                    $scope.tasks.splice(index, 1);
                });
        }
    };
}]);



app.controller('ActionTypeController', ['$scope', '$http', function ($scope, $http) {
    $scope.action_types = [];
    console.log("Hello World from controller");
    // List action_types
    $scope.loadActionTypes = function () {

        $http.get('api/action_types')
            .then(function success(e) {
                //console.log("Hello World from controller123123");
                $scope.action_types = e.data.action_types;
                //console.log($scope.action_types);
            });
    };
    $scope.loadActionTypes();


    $scope.errors = [];

    $scope.action_type = {
        action_type: '',
        published: ''
    };
    $scope.initActionType = function () {
        $scope.resetForm();
        $("#add_new_action_type").modal('show');
    };

    // Add new ActionType
    $scope.addActionType = function () {
        $http.post('api/action_types', {
            action_type: $scope.action_type.action_type,
            published: $scope.action_type.published
        }).then(function success(e) {
            $scope.resetForm();
            $scope.action_types.push(e.data.action_type);
            $("#add_new_action_type").modal('hide');

        }, function error(error) {
            $scope.recordErrors(error);
        });
    };

    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if (error.data.errors.action_type) {
            $scope.errors.push(error.data.errors.action_type[0]);
        }
    };

    $scope.resetForm = function () {
        $scope.action_type.action_type = '';
        $scope.action_type.published = '';
        $scope.errors = [];
    };   


     $scope.edit_action_type = {};
    // initialize update action
    $scope.initEditActionType = function (index) {
        $scope.errors = [];
        $scope.edit_action_type = $scope.action_types[index];
        $("#edit_action_type").modal('show');
    };

    // update the given ActionType
    $scope.updateActionType = function () {
        $http.patch('api/action_types/' + $scope.edit_action_type.id, {
            action_type: $scope.edit_action_type.action_type,
            published: $scope.edit_action_type.published
        }).then(function success(e) {
            $scope.errors = [];
            $("#edit_action_type").modal('hide');
        }, function error(error) {
            $scope.recordErrors(error);
        });
    };

    // delete the given ActionType
    $scope.deleteActionType = function (index) {

        var conf = confirm("Do you really want to delete this ActionType?");

        if (conf === true) {
            $http.delete('api/action_types/' + $scope.action_types[index].id)
                .then(function success(e) {
                    $scope.action_types.splice(index, 1);
                });
        }
    };
}]);

