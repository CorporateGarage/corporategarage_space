var ICON_REF = {user: "fa-user"}

var PAGE_TITLE = "Timeline";
var USER_ID = 1;
var PROJECT_ID = 8;
var ALERTS = []

$(document).ready(function(){
	API.Users.getById(USER_ID, function(USER) {
		API.Projects.getById(PROJECT_ID, function(PROJECT) {

			$("#projectname").text(PROJECT.name);
			$("#pagetitle").text(PAGE_TITLE);
			$("#fullname").text(USER.first_name + " " + USER.last_name);
			ALERTS.forEach(function(alert){
				var icon = ICON_REF[alert.icon];
				$("#alerts").append(`
					<li>
						<a href="#">
						<i class="fa fa-fw ${icon}"></i>
							${alert.name}
						</a>
					</li><hr class="alert-seperator">
				`);
			});
		});
	});

});
