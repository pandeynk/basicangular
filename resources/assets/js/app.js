var learnhub = angular.module('LearnHub', []);

learnhub.controller("LearnhubController", ['$scope', '$http', function($scope, $http) {
    $scope.categories = [];
    $scope.origCourses = [];
    $scope.courses = [];
    $scope.sort = '';
    $scope.titleFilter = '';
    $scope.filteredCourses = [];
    $scope.pages = [];
    $scope.page = 1;
    $scope.name;

    $scope.init = function() {
        $http.get("/data").then(function(response) {
            $scope.categories = response.data[1];
            $scope.origCourses = response.data[0];
            $scope.courses = response.data[0];
            $scope.filteredCourses = response.data[0];
            $scope.pages.push($scope.courses[0]);
            $scope.pages.push($scope.courses[1]);
        });
    }

    $scope.appliedCategories = [];

    $scope.updateCategory = function(data) {
        if (data.category == true) {
            $scope.appliedCategories.push(data.value);
        } else {
            $scope.appliedCategories.splice($scope.appliedCategories.indexOf(data.value), 1);
        }
        if ($scope.appliedCategories.length <= 0) {
            $scope.courses = $scope.origCourses;
        } else {
            $scope.courses = [];
            $scope.origCourses.forEach(function(val, index, arr) {
                $scope.appliedCategories.forEach(function(va, ind, ar) {
                    if (va.category == val.category) {
                        $scope.courses.push(val);
                    }
                });
            });
        }
        $scope.filteredCourses = $scope.courses;
        if ($scope.sort == "rating") {
            $scope.sortByRating({});
        } else {
            $scope.sortByPrice({});
        }
    }

    $scope.sortByRating = function(data) {
        $scope.courses.sort(function(a, b) {
            return a.rating - b.rating;
        });
        $scope.filteredCourses = $scope.courses;
    }

    $scope.sortByPrice = function(data) {

        $scope.courses.sort(function(a, b) {
            c = a.price;
            d = b.price;
            if (c != 0) {
                c = parseFloat((c.substr(3)).replace(",", ""));
            }
            if (d != 0) {
                d = parseFloat((d.substr(3)).replace(",", ""));
            }
            return c - d;
        });
        $scope.filteredCourses = $scope.courses;
    }

    $scope.searchByTitle = function(data) {
        $scope.courses = $scope.filteredCourses;
        var temp = [];
        $scope.courses.forEach(function(val, ind, arr) {
            if (val.title.indexOf(data.titleFilter) != -1) {
                temp.push(val);
            }
        });
        $scope.courses = temp;
    }

    $scope.paginate = function(data) {
        console.log(data);
        if (data.control == "next") {
            if ($scope.page < (Math.ceil($scope.courses.length / 2))) {
                $scope.page++;
            }
        } else if (data.control == "prev") {
            if ($scope.page > 1) {
                $scope.page--;
            }
        }
        $scope.pages = [];
        for (i = 0; i < 2; i++) {
            if (typeof $scope.courses[(2 * ($scope.page - 1)) + i] !== 'undefined') {
                $scope.pages.push($scope.courses[(2 * ($scope.page - 1)) + i]);
            }
        }
    }

}]);
