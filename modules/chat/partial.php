

	<link href="/modules/chat/style.css" rel="stylesheet" type="text/css" />


	<!-- chat box -->
	<div class="box box-warning direct-chat direct-chat-warning">
				  <div class="box-header with-border">
					<h3 class="box-title">Direct Chat</h3>
					<div class="box-tools pull-right">
					  <span data-toggle="tooltip" title="" class="badge bg-yellow msg-count" data-original-title="0 New Messages">0</span>
					  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"><i class="fa fa-comments"></i></button>
					  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				  </div><!-- /.box-header -->
				  <div class="box-body" style="display: block;">

					<!-- Conversations are loaded here -->
					<div class="direct-chat-messages">
					</div><!--/.direct-chat-messages-->


					<!-- Contacts are loaded here -->
					<div class="direct-chat-contacts">
					  <ul class="contacts-list">
						<li>
						  <a href="#">
							<img class="contacts-list-img" src="img/user1-128x128.jpg">
							<div class="contacts-list-info">
							  <span class="contacts-list-name">
								Count Dracula
								<small class="contacts-list-date pull-right">2/28/2015</small>
							  </span>
							  <span class="contacts-list-msg">How have you been? I was...</span>
							</div><!-- /.contacts-list-info -->
						  </a>
						</li><!-- End Contact Item -->
						<li>
						  <a href="#">
							<img class="contacts-list-img" src="img/user7-128x128.jpg">
							<div class="contacts-list-info">
							  <span class="contacts-list-name">
								Sarah Doe
								<small class="contacts-list-date pull-right">2/23/2015</small>
							  </span>
							  <span class="contacts-list-msg">I will be waiting for...</span>
							</div><!-- /.contacts-list-info -->
						  </a>
						</li><!-- End Contact Item -->
						<li>
						  <a href="#">
							<img class="contacts-list-img" src="img/user3-128x128.jpg">
							<div class="contacts-list-info">
							  <span class="contacts-list-name">
								Nadia Jolie
								<small class="contacts-list-date pull-right">2/20/2015</small>
							  </span>
							  <span class="contacts-list-msg">I'll call you back at...</span>
							</div><!-- /.contacts-list-info -->
						  </a>
						</li><!-- End Contact Item -->
						<li>
						  <a href="#">
							<img class="contacts-list-img" src="img/user5-128x128.jpg">
							<div class="contacts-list-info">
							  <span class="contacts-list-name">
								Nora S. Vans
								<small class="contacts-list-date pull-right">2/10/2015</small>
							  </span>
							  <span class="contacts-list-msg">Where is your new...</span>
							</div><!-- /.contacts-list-info -->
						  </a>
						</li><!-- End Contact Item -->
						<li>
						  <a href="#">
							<img class="contacts-list-img" src="img/user6-128x128.jpg">
							<div class="contacts-list-info">
							  <span class="contacts-list-name">
								John K.
								<small class="contacts-list-date pull-right">1/27/2015</small>
							  </span>
							  <span class="contacts-list-msg">Can I take a look at...</span>
							</div><!-- /.contacts-list-info -->
						  </a>
						</li><!-- End Contact Item -->
						<li>
						  <a href="#">
							<img class="contacts-list-img" src="img/user8-128x128.jpg">
							<div class="contacts-list-info">
							  <span class="contacts-list-name">
								Kenneth M.
								<small class="contacts-list-date pull-right">1/4/2015</small>
							  </span>
							  <span class="contacts-list-msg">Never mind I found...</span>
							</div><!-- /.contacts-list-info -->
						  </a>
						</li><!-- End Contact Item -->
					  </ul><!-- /.contatcts-list -->
					</div><!-- /.direct-chat-pane -->
				  </div><!-- /.box-body -->
				  <div class="box-footer" style="display: block;">
					<form action="#" method="post" id="form-chat">
					  <div class="input-group">
						<input type="text" name="message" placeholder="Type Message ..." class="form-control msg-send">
						<span class="input-group-btn">
						  <button type="button" class="btn btn-warning btn-flat btn-send">Send</button>
						</span>
					  </div>
					</form>
				  </div><!-- /.box-footer-->
	</div><!-- /.chat box -->



	<script>
		'use strict'
		$(function() {
			var msg_data = [ // [0] user_name, [1] date, [2] jpg, [3]  message
				[ "Alexander Pierce", "23 Jan 2:00 pm",  "user1-128x128.jpg",  "Is this template really for free? That's unbelievable!" ],
				[ "Sarah Bullock", "23 Jan 2:05 pm", "user3-128x128.jpg", "You better believe it!" ],
			]
		function push_message( nbr, msg_arr, show_left ){
			var $messages_content = $('.direct-chat-messages')
			var messages_div = document.createElement( 'div' )
			messages_div.className = 'direct-chat-msg msg-'+nbr
			$messages_content.append( messages_div )
			var message_html
			var $div = $('.msg-'+nbr)
			if ( show_left ) {
				message_html =
					 '  <!-- Message. Default to the left -->'
					+'  <div class="direct-chat-msg">'
					+'	<div class="direct-chat-info clearfix">'
					+'	  <span class="direct-chat-name pull-left">'+msg_arr[0]+'</span>'
					+'	  <span class="direct-chat-timestamp pull-right">'+msg_arr[1]+'</span>'
					+'	</div><!-- /.direct-chat-info -->'
					+'	<img class="direct-chat-img" src="/img/'+msg_arr[2]+'" alt="message user image"><!-- /.direct-chat-img -->'
					+'	<div class="direct-chat-text">'
					+   msg_arr[3]
					+'	</div><!-- /.direct-chat-text -->'
					+'  </div><!-- /.direct-chat-msg -->'
			} else {
				message_html =
					 '  <!-- Message to the right -->'
					+'  <div class="direct-chat-msg right">'
					+'	<div class="direct-chat-info clearfix">'
					+'	  <span class="direct-chat-name pull-right">'+msg_arr[0]+'</span>'
					+'	  <span class="direct-chat-timestamp pull-left">'+msg_arr[1]+'</span>'
					+'	</div><!-- /.direct-chat-info -->'
					+'	<img class="direct-chat-img" src="/img/'+msg_arr[2]+'" alt="message user image"><!-- /.direct-chat-img -->'
					+'	<div class="direct-chat-text">'
					+   msg_arr[3]
					+'	</div><!-- /.direct-chat-text -->'
					+'  </div><!-- /.direct-chat-msg -->'
				}
			$div.html( message_html )
			var $msg_count = $('.msg-count')
			$msg_count.text( nbr )
		}

		var i // numéro du message push
		function left_right( i ) { return (i%2==true) }

		for( i=0; i<msg_data.length; i++ ){
			push_message( i+1, msg_data[i], left_right(i) )
		}

		var $form_chat = $('#form-chat')
		$form_chat.on('submit',function(event){
			event.preventDefault()
		})


		var $btn_send = $('.btn-send')
		$btn_send.on('click',function(e){
			var msg = $('.msg-send').val()
			push_message( i+1, ['fred','13h30','user4-128x128.jpg', msg], left_right(i) )
			$('.msg-send').val('')
			i++
		})

		 function getMessages() {
		     var xhr = $.getJSON('/modules/chat/ajax.php')
		     //console.log( 'ici' )

		     xhr.done(function (data) {
		       console.log( 'là' )
		       //var messageList = '';
		      /* data.messages.reverse().forEach(function (message) {
		         console.log( 'message' );
		       });
		       $messages
		         .empty()
		         .html(messageList);*/
		     })

			xhr.fail(function(jqXHR, textStatus, error){
				console.log( textStatus +' --- '+ error)
			})

		 }
		 setInterval(getMessages, 1000)



		})
	</script>

<?php
// $_SESSION['user_id']
 ?>
