(function() {

	function getURL(path) {
		return "/pm-guidebook/"+path;
	}

	function getParams() {
		var search = location.search.substring(1);
		return JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}')
	}

	function surveyTool() {
		getSurveyResponse(function(survey) {
			var userData = findUserByEmail(survey.items);

			surveyToResourceAlogrithm(userData, function(resources) {
				var resourceHTML = "";

				for (var key in resources) {
					if (resources.hasOwnProperty(key)) {
						resourceHTML += "<h3>Skill id: "+ key+"</h3>";
						resources[key].forEach(function(resource) {
							resourceHTML += Handlebars.compile( $("#resourceItem").html() )(resource);
						});
					}
				}

				$("#resources-results").html( resourceHTML );
			});

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

	function findUserByEmail(surveyData) {
		var params = getParams();
		var email = params["email"];
		var userData;

		if (!surveyData || surveyData.length === 0) {
			return;
		}

		surveyData.forEach(function(response) {
			if (!userData && response.answers[0].email === email) {
				userData = response;
			}
		});

		return userData || null;
	}

	function surveyToResourceAlogrithm(surveyData, callback) {
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
		skills = skills.join(",");

		$.getJSON( getURL("resources.php?skills="+skills), function( data ) {
		  callback( data );
		});	
	}
	surveyTool();

})();
