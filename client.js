$( () => {
  $('#auth').click( () => {
    var nick = $('#nick').val();
    $('#nick').remove();
    $('#auth').remove();
    var HOST = location.origin.replace(/^http/, 'ws')
    var sock = new WebSocket(HOST);
    sock.onopen = () => {
      var msg = {
        who: nick,
        towho: "server",
        data: "I am"
      };
      sock.send(JSON.stringify(msg));
      var msgbox = $('#msgbox');
      sock.onmessage = function (event) {
        msgbox.append($('<p>Server answer: ' + event.data));
      };
      $('body').append($('<h2>'+ nick + '</h2>'));
      $('body').append($('<div id="msgbox"></div>'));
      $('body').append($('<div tabindex="0" contenteditable="true" id="message" role="textbox" aria-multiline="true"></div>')); 
      $('body').append($('<button id="sendbtn">Send</button>'));
    }
  });
});
