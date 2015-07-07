	'use strict'

	$(function() {

	function push_message( nbr, msg_arr, from_user_id ){
		var $messages_content = $('.direct-chat-messages')
		var messages_div = document.createElement( 'div' )
		messages_div.className = 'direct-chat-msg msg-'+nbr
		$messages_content.append( messages_div )
		var message_html
		var $div = $('.msg-'+nbr)
		if ( from_user_id%2==0 ) {
			message_html =
				 '  <!-- Message. Default to the left -->'
				+'  <div class="direct-chat-msg">'
				+'	<div class="direct-chat-info clearfix">'
				+'	  <span class="direct-chat-name pull-left">'+msg_arr['fullname']+'</span>'
				+'	  <span class="direct-chat-timestamp pull-right">'+msg_arr['date_sent']+'</span>'
				+'	</div><!-- /.direct-chat-info -->'
				+'	<img class="direct-chat-img" src="/img/'+msg_arr['photo']+'" alt="message user image"><!-- /.direct-chat-img -->'
				+'	<div class="direct-chat-text">'
				+   msg_arr['message']
				+'	</div><!-- /.direct-chat-text -->'
				+'  </div><!-- /.direct-chat-msg -->'
		} else {
			message_html =
				 '  <!-- Message to the right -->'
				+'  <div class="direct-chat-msg right">'
				+'	<div class="direct-chat-info clearfix">'
				+'	  <span class="direct-chat-name pull-right">'+msg_arr['fullname']+'</span>'
				+'	  <span class="direct-chat-timestamp pull-left">'+msg_arr['date_sent']+'</span>'
				+'	</div><!-- /.direct-chat-info -->'
				+'	<img class="direct-chat-img" src="/img/'+msg_arr['photo']+'" alt="message user image"><!-- /.direct-chat-img -->'
				+'	<div class="direct-chat-text">'
				+   msg_arr['message']
				+'	</div><!-- /.direct-chat-text -->'
				+'  </div><!-- /.direct-chat-msg -->'
			}
		$div.html( message_html )
		var $msg_count = $('.msg-count')
		$msg_count.text( nbr )
	}

	var i // numéro du message push
	function left_right( i ) { return (i%2==true) }

	var $form_chat = $('#form-chat')
	$form_chat.on('submit',function(event){
		event.preventDefault()
		$('.btn-send').click();
	})

	var $btn_send = $('.btn-send')
	$btn_send.on('click',function(e){
		var msg = $('.msg-send').val()
		push_message( i+1, ['fred','13h30','user4-128x128.jpg', msg], left_right(i) )
		$('.msg-send').val('')
		i++
	})

	var last_msg_id = 0 // dernier message reçu

	function getMessages() {
	    var xhr = $.getJSON('/modules/chat/ajax.php')
	    //console.log( 'ici' )

	    xhr.done(function (data) {
	    	console.log( data )
	    	//console.log( data[0]['msg'] )
	    	for (var i=0; i<data.length; i++) {
	    		var msg_id = data[i]['msg_id']
	    		if( msg_id > last_msg_id ) {
	    			push_message( msg_id, data[i], data[i]['user_id'] )
	    			last_msg_id = msg_id
	    		}
			}

	      /* data.messages.reverse().forEach(function (message) {
	         console.log( 'message' );
	       });
	     */
	    })

		xhr.fail(function(jqXHR, textStatus, error){
			console.log( textStatus +' --- '+ error)
		})
	 }

	 setInterval(getMessages, 2000)

	})
