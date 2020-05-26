(function() {

	function getURL(path) {
		return "/pm-guidebook/"+path;
	}

	function surveyTool() {
		getResources(function(resources)) {

			getSurveyResponse(function(survey) {
				var userData = findUserByEmail(survey);
				var resourcesHtml;
				resources = surveyToResourceAlogrithm(userData, resources);

				resourcesHtml = Handlebars.compile( $("#resourceItem").html() )(resources);
				$("#resources-results").html( resourcesHtml );
			});	
		}
	}

	function getSurveyResponse(callback) {
		$.get( getURL("survey-response.json.php", function( data ) {
		  callback( JSON.parse(data) );
		});	
	}

	function getParams() {
		var search = location.search.substring(1);
		return JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}')
	}

	function findUserByEmail(surveyData) {
		var params = getParams();
		var email = params["email"];
		var userData;

		if (!surveyData || surveyData.length === 0) {
			return;
		}

		surveyData.forEach(function(response)) {
			if (response.email === email) {
				userData = response;
			}
		}

		return userData || null;
	}

	function surveyToResourceAlogrithm(surveyData, resources) {
		var skills = [];
		var map = getQuestionToSkillMap();
		var results = [];

		if (!surveyData || !resources) {
			return [];
		}

		surveyData.forEach(function(surveyResponse) {
			if (surveyResponse.rating <= 3) {
				skills.push(surveyResponse);
			}
		});

		skills.map(function(qualifiedSurveyResponse)) {
			return map[qualifiedSurveyResponse.id];
		}

		skills.forEach(function(skill) {
			results.push( responses[skill] );
		});

		return results;
	}

	function getQuestionToSkillMap() {
		return survey_resource_map;
	}

	function getResources(callback) {
		$.get( getURL("resources.php", function( data ) {
		  callback( JSON.parse(data) );
		});	
	}
	surveyTool();

})();
