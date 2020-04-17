<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content" ng-app="myApp" ng-controller="myCtrl">
                <div class="title m-b-md">
                    Laravel 
                </div>

                <br>
                <input type="text" name="name" ng-model="name"><br>
                <button type="button" ng-click="save()">save</button>
            </div>
        </div>
            <script type="text/javascript">
                //Model
                var app = angular.module('myApp',[]);
                //Controller
                app.controller('myCtrl',function($scope,$http){
                    $scope.save = function(){
                        console.log($scope.name);
                        $http({
                            url    : "http://127.0.0.1:8000/api/insert",
                            method : "POST",
                            data   : {
                                "name" : $scope.name
                            } 
                        }).then(function(response){
                            alert('success');
                        },function(response){
                            alert('failed');
                        });
                     }
                });
            </script>
    </body>
</html>
