var socket = new WebSocket("wss://cg-websockets.mybluemix.net/");
// var socket = new WebSocket("ws://localhost:8080/");

socket.onmessage = function(event) {
	var data = JSON.parse(event.data);
	console.log(data);

	if (data.room == PROJECT_ID) {
		API.Users.getById(data.uuid, function(user) {
			$("#console").append(`
				<div class="message">
					<p><strong>${user.first_name} ${user.last_name}</strong> ${data.content}</p>
				</div>
			`);
			$("#console").animate({ scrollTop: $('#console').prop("scrollHeight")}, 1000);
		});
	}
};

function message_send() {
	var msg = $("#chat-input").val();
	$("#chat-input").val("");

	if (msg != "") {
		socket.send(JSON.stringify({
			domain: "chat",
			uuid: USER.id,
			room: PROJECT.id,
			content: msg
		}));
	}
}

$(document).ready(function() {
	$("#chat-input").keypress(function(event) {
		if (event.which == 13) message_send();
	});
	$("#send-input").click(message_send);
})
