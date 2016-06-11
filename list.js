var listApp = angular.module('listApp', []);

listApp.controller("listcontroller", function ($scope, $http) {

    $http.get('http://localhost/test1/myscript.php?action1=get_list').then(function (result) {
        //console.log (result.data);
        $scope.list = result.data;

    });

    $scope.episodeslist = function (myvalue1, myvalue2) {
        if (myvalue1) {

            //console.log ('click', myvalue2);
            var response = $http.get('http://localhost/test1/myscript.php?action2=' + myvalue1);
            response.success(function (data, status, headers, config) {

                angular.element(document.querySelectorAll('.episodeslist')).removeClass('display');
                angular.element(document.querySelectorAll('.episodeslist p')).text(myvalue2);

                $scope.episodes = data;

                if (typeof $scope.episodes !== 'object') {

                    angular.element(document.querySelectorAll('.episodeslist')).addClass('display');
                }
            });

        }

    }
    $scope.close = function () {
        //  console.log ('close')         
        angular.element(document.querySelectorAll('.episodeslist')).addClass('display');
    }

});