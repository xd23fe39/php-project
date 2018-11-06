<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$now = date("Y-m-d H:i:s");

session_start();

if ( $_REQUEST["action"] == "add" ) {
  array_push($_SESSION['TODO'], array("Item_01"));
}

?>
<!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
    <script src="/test/todo.js"></script>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    <h2>Todo</h2>
    <div ng-controller="TodoListController as todoList">
      <span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span>
      [ <a href="" ng-click="todoList.archive()">archive</a> ]
      [ <a href="" ng-click="todoList.export()">export</a> ]
      <ul class="unstyled">
        <li ng-repeat="todo in todoList.todos">
          <label class="checkbox">
            <input type="checkbox" ng-model="todo.done">
            <span class="done-{{todo.done}}">{{todo.text}}</span>
          </label>
        </li>
      </ul>
      <form ng-submit="todoList.addTodo()">
        <input type="text" ng-model="todoList.todoText"  size="30"
               placeholder="add new todo here">
        <input class="btn-primary" type="submit" value="add">
        <input type="hidden" name="action" value="add">
      </form>
    </div>
    <div>
    <?php foreach ($_SESSION['TODO'] as $item) : ?>
    <li><?=print_r($item)?></li>
    <?php endforeach ?>
    </div>
  </body>
</html>