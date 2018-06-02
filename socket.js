"use strict"; //All my JavaScript written in Strict Mode http://ecma262-5.com/ELS5_HTML.htm#Annex_C

  var socket;

  window.addEventListener('load', function () {
    init();
  }, false);

  var init = function () {
		socket = new WebSocket(document.getElementById("sock-addr").value);
    socket.onclose = document.getElementById("sock-info").innerHTML += "Соединение закрыто ^^<br />";
		socket.onopen = connectionOpen;
		socket.onmessage = messageReceived;
		//socket.onerror = errorOccurred;
		//socket.onopen = connectionClosed;
		
    document.getElementById("sock-send-butt").onclick = function () {
      socket.send(document.getElementById("sock-msg").value);
    };

    document.getElementById("sock-disc-butt").onclick = function () {
      socket.close();
      document.getElementById("sock-info").innerHTML += "Соединение закрыто <br />";
    };

    document.getElementById("sock-recon-butt").onclick = function () {
      socket = new WebSocket(document.getElementById("sock-addr").value);
      socket.onopen = connectionOpen;
      socket.onmessage = messageReceived;
    };
  };

	function connectionOpen() {
	   socket.send("Connection with \""+document.getElementById("sock-addr").value+"\" Подключение установлено обоюдно, отлично!");
	}

	function messageReceived(e) {
	    console.log("Ответ сервера: " + e.data);
        document.getElementById("sock-info").innerHTML += (e.data+"<br />");
	}
