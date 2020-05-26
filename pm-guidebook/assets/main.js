(function() {

	function getURL(path) {
		return "/pm-guidebook/"+path;
	}

	function surveyTool() {
		getResources(function(resources)) {
			getSurveyResponse(function(survey) {
				userData = findUserByEmail(survey);

				resources = surveyToResourceAlogrithm(userData, resources);
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

	function removeQuestionFromDataSet() {}

	function surveyToSkill(surveyId) {

	}

	function surveyToResourceAlogrithm(surveyData, resources) {}

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
