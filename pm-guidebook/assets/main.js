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
			var resourcesHtml;

			surveyToResourceAlogrithm(userData, function(resources) {
				resourcesHtml = Handlebars.compile( $("#resourceItem").html() )(resources);
				$("#resources-results").html( resourcesHtml );
			});

		});
	}

	function getSurveyResponse(callback) {
		$.get( getURL("survey-response.json.php"), function( data ) {
		  callback( JSON.parse(data) );
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

		if (!surveyData || !resources) {
			return [];
		}

		surveyData.answers.forEach(function(answer) {
			if (answer.number <= 3) {
				skills.push(surveyResponse);
			}
		});

		skills.map(function(qualifiedSurveyResponse) {
			return map[qualifiedSurveyResponse.field.id];
		});

		getResources(skills, callback);
	}

	function getQuestionToSkillMap() {
		return surveyResourceMap;
	}

	function getResources(skills, callback) {
		skills = skills.join(",");

		$.get( getURL("resources.php?skills"+skills), function( data ) {
		  callback( JSON.parse(data) );
		});	
	}
	surveyTool();

})();
