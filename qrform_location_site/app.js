var app = angular.module('ehandorApp', []);

app.controller('PatientFeedbackCtrl', function ($rootScope, $scope, $http, $location) {
	$scope.typel = 'english';
	$scope.type2 = 'English';
	$scope.feedback = {};
	$rootScope.loader = false;
	$rootScope.overallScore = [];

	$rootScope.baseurl_main = window.location.origin + '/api';
	$scope.step2 = true;

	$rootScope.language = function (type) {
		$scope.typel = type;
		if (type == 'english') {
			$http.get('language/english.json').then(function (responsedata) {

				$rootScope.lang = responsedata.data;
				$scope.type2 = 'English';

			});
		}
		if (type == 'lang2') {
			$http.get('language/lang2.json').then(function (responsedata) {

				$rootScope.lang = responsedata.data;
				$scope.type2 = 'ಕನ್ನಡ';


			});
		}
		if (type == 'lang3') {
			$http.get('language/lang3.json').then(function (responsedata) {

				$rootScope.lang = responsedata.data;
				$scope.type2 = 'മലയാളം';
				//	$scope.type2 = 'தமிழ்';



			});
		}
	}
	$scope.language('english');

	$scope.setupapplication = function () {

		var urlParams = new URLSearchParams(window.location.search);
		var locationValue = urlParams.get("location");
		var siteValue = urlParams.get("site");

		$scope.urlLocation = locationValue;
		$scope.urlSite = siteValue;

		console.log("Location from URL:", locationValue);
		console.log("Site from URL:", siteValue);

		var url = window.location.href;

		var id = url.substring(url.lastIndexOf('=') + 1);

		$http.get($rootScope.baseurl_main + '/ward.php?patientid=' + id, { timeout: 20000 }).then(function (responsedata) {
			$scope.wardlist = responsedata.data;
			// ✅ Load setup into global scope if exists
            if (responsedata.data && responsedata.data.setup) {
                $rootScope.GLOBALSETUP = responsedata.data.setup;
                console.log("GLOBALSETUP Loaded:", $rootScope.GLOBALSETUP);
            }
			$scope.questioset = responsedata.data.question_set;
			$scope.setting_data = responsedata.data.setting_data;
			console.log($scope.feedback);
		},
			function myError(response) {
				$rootScope.loader = false;

			}
		);

	}
	$scope.setupapplication();
});