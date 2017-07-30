var ICON_REF = {user: "fa-user"}

var USER_ID = 1;
var PROJECT_ID = 15;
var ALERTS = []

var USER;
var PROJECT;

$(document).ready(function(){
	API.Users.getById(USER_ID, function(data) {
		USER = data;
		API.Projects.getById(PROJECT_ID, function(data) {
			PROJECT = data;

			$("#projectname").text(PROJECT.name);
			$("#description").text(PROJECT.description);
			$("#fullname").text(USER.first_name + " " + USER.last_name);
			$("#thumbnail").attr("src", PROJECT.thumbnail);
			$("#thumbnail").removeAttr("hidden");
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

			PROJECT.members.forEach(function(uuid) {
				console.log(uuid);
				API.Users.getById(uuid, function(user) {
					var tags = "";
					user.skills.forEach(function(tag) {
						tags += `<span class="label label-info">#${tag}</span>&nbsp`;
					});
					$("#members").append(`
						<div class="member panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">${user.first_name} ${user.last_name}</h3>
							</div>
							<div class="panel-body">
								<h4 class="tags">
									${tags}
								</h4>
							</div>
						</div>
					`);
				});
			});
		});
	});

});
