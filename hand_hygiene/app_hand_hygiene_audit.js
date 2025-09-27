var app = angular.module('ehandorApp', []);
// adf 
app.controller('PatientFeedbackCtrl', function ($rootScope, $scope, $http, $location, $window) {
	$scope.typel = 'english';
	$scope.type2 = 'English';
	$scope.feedback = {};



	$rootScope.loader = false;
	$rootScope.overallScore = [];
	$rootScope.baseurl_main = window.location.origin + '/api';
	$scope.step0 = true;
	$scope.step1 = false;
	$scope.step4 = false;


	$rootScope.language = function (type) {
		$scope.typel = type;
		if (type == 'english') {
			$http.get('language/english.json').then(function (responsedata) {

				$rootScope.lang = responsedata.data;
				$scope.type2 = 'English'
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
		$scope.feedback.langsub = type;


	}
	$scope.language('english');
	window.setTimeout(function () {
		$(window).scrollTop(0);
	}, 0);

	var ehandor = JSON.parse($window.localStorage.getItem('ehandor'));
	if (ehandor) {
		// Assign the data to scope variables
		$scope.loginemail = ehandor.email;
		$scope.loginid = ehandor.empid;
		$scope.loginname = ehandor.name;
		$scope.loginnumber = ehandor.mobile;



		console.log($scope.loginemail);
		console.log($scope.loginid);
		console.log($scope.loginname);
		console.log($scope.loginnumber);
		// Similarly, assign other properties as needed
	} else {
		// Handle if data doesn't exist
		console.log('Data not found in local storage');
	}

	$scope.setupapplication = function () {
		var url = window.location.href;
		var id = url.substring(url.lastIndexOf('=') + 1);

		$http.get($rootScope.baseurl_main + '/audit_load_hand_designation.php?patientid=' + id, { timeout: 20000 }).then(function (responsedata) {
			$scope.designation = responsedata.data;
			$scope.action = responsedata.data;
			$scope.compliance = responsedata.data;
			$scope.indication = responsedata.data;

			// Custom order for indication titles
			const customOrder = [
				"Before procedure",
				"Before touching patient",
				"After procedure/body fluid exposure",
				"After touching a patient",
				"After touching patients surroundings"
			];

			if ($scope.indication && $scope.indication.indication) {
				$scope.indication.indication.sort(function (a, b) {
					const indexA = customOrder.indexOf(a.title);
					const indexB = customOrder.indexOf(b.title);
					return (indexA === -1 ? 999 : indexA) - (indexB === -1 ? 999 : indexB);
				});
			}

			console.log($scope.indication);
		},
			function myError(response) {
				$rootScope.loader = false;
			});
	};

	$scope.setupapplication();


	$scope.setupapplication1 = function () {
		//$rootScope.loader = true;
		var url = window.location.href;
		//console.log(url);
		var id = url.substring(url.lastIndexOf('=') + 1);
		//alert(id);
		$http.get($rootScope.baseurl_main + '/audit_load_safety_department.php?patientid=' + id, { timeout: 20000 }).then(function (responsedata) {
			$scope.safety_inseption = responsedata.data;
			console.log("API Response:", $scope.safety_inseption);

            // ✅ Load setup into global scope if exists
            if (responsedata.data && responsedata.data.setup) {
                $rootScope.GLOBALSETUP = responsedata.data.setup;
                console.log("GLOBALSETUP Loaded:", $rootScope.GLOBALSETUP);
            }
		},
			function myError(response) {
				$rootScope.loader = false;

			}
		);

	}

	$scope.setupapplication1();




	$scope.next1 = function () {

		$scope.step0 = false;
		$scope.step1 = true;
		$(window).scrollTop(0);

	}

	$scope.feedback = {
		designation: 'Designation',
		department: 'Department',
		indication: 'Indication',
		action: 'HH Action',
		compliance: 'Compliance'
	};





	$scope.currentMonthYear = getCurrentMonthYear();



	// Navigate to a specific page
	$scope.prev = function () {

		window.location.href = '/audit_forms';
	};


	//color for time based on comparision
	const benchmark = (4 * 3600);
	function convertToSeconds(timeStr) {
		const [hours, minutes, seconds] = timeStr.split(':').map(Number);
		return (hours * 3600) + (minutes * 60) + seconds;
	}

	$scope.getTextColor = function () {
		const calculatedSeconds = convertToSeconds($scope.calculatedResult);
		return calculatedSeconds <= benchmark ? 'green' : 'red';
	};




	// re-size of textarea based on long text
	function autoResizeTextArea(textarea) {
		// Reset height to auto to allow expansion
		textarea.style.height = 'auto';

		// Set the height to the scrollHeight to auto-resize
		textarea.style.height = textarea.scrollHeight + 'px';
	}





	var d = new Date();
	$scope.feedback.datetime = d.getTime();
	var params = new URLSearchParams(window.location.search);
	var srcValue = params.get('src');
	$scope.savefeedback = function () {

		function isFeedbackValid() {
			if ($scope.feedback.testname == '' || $scope.feedback.testname == undefined) {
				alert("Please enter name");
				return false;
			}
			if ($scope.feedback.designation == '' || $scope.feedback.designation == undefined) {
				alert("Please select designation");
				return false;
			}
			if ($scope.feedback.department == '' || $scope.feedback.department == undefined) {
				alert("Please select department");
				return false;
			}
			if ($scope.feedback.indication == '' || $scope.feedback.indication == undefined) {
				alert("Please select indication");
				return false;
			}
			if ($scope.feedback.action == '' || $scope.feedback.action == undefined) {
				alert("Please select hand hygiene action");
				return false;
			}
			if ($scope.feedback.compliance == '' || $scope.feedback.compliance == undefined) {
				alert("Please select compliance");
				return false;
			}
			return true;
		}

		// Check if required fields are filled
		if (!isFeedbackValid()) {
			return;
		}



		$rootScope.loader = true;

		$scope.feedback.name = $scope.loginname;

		$scope.feedback.contactnumber = $scope.loginnumber;
		$scope.feedback.email = $scope.loginemail;


		// $scope.feedback.questioset = $scope.questioset;
		$http.post($rootScope.baseurl_main + '/savepatientfeedback_hand_hygiene.php?patient_id=' + $rootScope.patientid + '&administratorId=' + $rootScope.adminId, $scope.feedback).then(function (responsedata) {
			if (responsedata.status = "success") {
				$rootScope.loader = false;
				// navigator.showToast('Patient Feedback Submitted Successfully');
				//$location.path('/thankyou');
				$scope.step0 = false;
				$scope.step4 = true;
				$(window).scrollTop(0);
			}
			else {
				alert("Feeback already submitted for this patient!!")
			}


		}, function myError(response) {
			$rootScope.loader = false;

			alert("Please check your internet and try again!!")
		});


	}


})

