function redirectJS($url, $delay = 1){
	return '
	<script>
		setTimeout(function() {
			location.href= "'.$url.'";
		}, '.($delay * 1000).');
	</script> ';
}

