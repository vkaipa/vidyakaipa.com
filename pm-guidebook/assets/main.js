(function() {
	var loadingMessage;
	var getResultsTimer = 0;
	var timesTried = 0;
	const MAX_TIMES_TRIED = 30;

	function getURL(path) {
		return "/pm-guidebook/"+path;
	}

	function getParams() {
		var search = location.search.substring(1);
		return JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}')
	}

	function surveyTool() {
		loadingMessage = new Vue({
			el: '#loadingMessage',
			data: {
				message: 'Processing your responses. It takes several moments to load the first time.'
			}
		});
		$("#loadingMessage").removeClass("hidden");

		getResults();
	}

	function getResults() {
		console.log("Fetching...")
		clearTimeout(getResultsTimer);
		getSurveyResponse(function(survey) {
			timesTried++;

			var userData = findUserByEmail(survey.items);

			if (!userData) {
				if (MAX_TIMES_TRIED == timesTried) {
					loadingMessage.message = "We could not find your results :( Try again later.";
				} else {
					getResultsTimer = setTimeout(getResults, 1000);
				}
			} else {
				surveyToResourceAlgorithm(userData, function(resources) {
					var resourceHTML = "";

					for (var key in resources) {

						if (resources.hasOwnProperty(key)) {
							var data = {
								skill_id: key,
								resources: resources[key],
								skill: resources[key][0].skill,
								image_path: resources[key][0].image_path
							};

							resourceHTML += Handlebars.compile( $("#resources").html() )(data);
						}
					}

					loadingMessage.message = "Your Unique PM Guidebook";
					$("#resources-results").html( resourceHTML );
					setTimeout(function() {
						UIkit.accordion('.uk-accordion').toggle(0, true);
					}, 500);

				});
			}
		});
	}

	function getSurveyResponse(callback) {
		// $.getJSON( getURL("survey-response.json.php"), function( data ) {
		//   callback( JSON.parse(data) );
		// });

		$.ajax({
		  dataType: "json",
		  url: getURL("survey-response.json.php"),
		  success: function(data) {
		  	callback(data);
		  }
		});
	}

	// TODO: Find with code as well.
	function findUserByEmail(surveyData) {
		var params = getParams();
		var emailPlusCode = params["r"];
		var userData;

		if (!surveyData || surveyData.length === 0) {
			return;
		}

		surveyData.forEach(function(response) {
			if (!userData && (response.answers[0].email+'-'+response.answers[1].text) === emailPlusCode) {
				userData = response;
			}
		});

		if (!userData) {
			userData = {}
			userData.answers = getUserDataFromURL();
		}

		return userData || null;
	}

	function getUserDataFromURL() {
		var answers = [];
		var params = getParams();

		for (var key in params) {
			answers.push({
				number: params[key],
				field: {
					id: key
				}
			})
		}

		return answers;
	}

	function surveyToResourceAlgorithm(surveyData, callback) {
		var skills = [];
		var map = getQuestionToSkillMap();
		var results = [];

		if (!surveyData) {
			return [];
		}

		surveyData.answers.forEach(function(answer) {
			if (answer.number <= 3) {
				skills.push(answer);
			}
		});

		skills = skills.map(function(qualifiedSurveyResponse) {
			return map[qualifiedSurveyResponse.field.id];
		});

		getResources(skills.flat(), callback);
	}

	function getQuestionToSkillMap() {
		return surveyResourceMap;
	}

	function getResources(skills, callback) {
		loadingMessage.message = "Creating your customized reading list";

		skills = skills.join(",");
		$.getJSON( getURL("resources.php?skills="+skills), function( data ) {
		  callback( data );
		});
	}


	surveyTool();

})();
