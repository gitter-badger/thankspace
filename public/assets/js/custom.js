$(function() {
	var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function(){
		var index =  $('.bs-component').index( $(this).parent() );
		$.get(window.location.href, function(data){
			var html = $(data).find('.bs-component').eq(index).html();
			html = cleanSource(html);
			$("#source-modal pre").text(html);
			$("#source-modal").modal();
		})
	});
	
	$('.bs-component [data-toggle="popover"]').popover();
	$('.bs-component [data-toggle="tooltip"]').tooltip();
	
	$(".bs-component").hover(function(){
		$(this).append($button);
		$button.show();
	}, function(){
		$button.hide();
	});
	
	function cleanSource(html) {
		var lines = html.split(/\n/);
		
		lines.shift();
		lines.splice(-1, 1);
		
		var indentSize = lines[0].length - lines[0].trim().length,
			re = new RegExp(" {" + indentSize + "}");
			
		lines = lines.map(function(line){
			if (line.match(re)) {
				line = line.substring(indentSize);
			}
			
			return line;
		});
		
		lines = lines.join("\n");
		return lines;
	}
	
	$(".icons-material .icon").each(function() {
		$(this).after("<br><br><code>" + $(this).attr("class").replace("icon ", "") + "</code>");
	});
	
	$.material.init();
	
	$(".shor").noUiSlider({
		start: 40,
		connect: "lower",
		range: {
			min: 0,
			max: 100
		}
	});
	
	$(".svert").noUiSlider({
		orientation: "vertical",
		start: 40,
		connect: "lower",
		range: {
			min: 0,
			max: 100
		}
	});
	
	$('#jumlahbox').change(function () {
		var style = $(this).val() == 21 ? 'block' : 'none';
		$('#many_box').css('display', style);
	});
	
	$('#wowstuffs').change(function () {
		var style = $(this).val() == 4 ? 'block' : 'none';
		$('#wowstuffsother').css('display', style);
	});
	
	$('#Wowdiv').hide();
	$('#div2').show();
	
	$('#id_radio1').click(function () {
		$('#div2').hide('fast');
		$('#Wowdiv').show('fast');
	});
	
	$('#id_radio2').click(function () {
		$('#Wowdiv').hide('fast');
		$('#div2').show('fast');
	});
	
	$('.start-intro').click(function(e)
	{
		e.preventDefault();
		var intro = introJs();
		intro.setOption('showProgress', 'true');
		
		intro.setOptions({
			steps: [
				{
					element: '#step1',
					intro: "<img class=img-responsive src=assets/img/tour-1.png width=125> <br> Hai, saya Antoni, di sini saya akan membantu Anda mengenal ThankSpace. klik Next untuk melanjutkan!",
					position: 'right'
				},
				{
					element: '#step2',
					intro: "Untuk lebih memahami layanan ThankSpace, Anda bisa mencoba melihat explanation video dari kami. <i>wasn't</i> that fun?",
					position: 'left'
				},
				{
					element: '#step3',
					intro: 'Saat ini, layanan on-demand storage ThankSpace melayani dua kota besar di Indonesia',
				},
				{
					element: '#step4',
					intro: 'Harga yang sesuai dengan kebutuhan'
				},
				{
					element: '#step5',
					intro: 'Satu langkah lagi untuk membuat. Klik Done dan Klik Order'
				}
			]
		});
		
		intro.setOption('showBullets', 'true');
		intro.start();
	});
	
	$('[data-toggle="tooltip"]').tooltip();

	$(document).on('change', '.re-pwd', function(){
		if ($('.re-pwd').val() != $('.pwd').val()) {
			this.setCustomValidity('Passwords must match.');
		} else {
			this.setCustomValidity('');
		}
	});
	
	$(document).on('submit', '.sign-up-form', function(e){
		var err = '';
		e.preventDefault();
		$('.regis').button('loading');
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			data: $(this).serialize(),
			success: function (result) {
				if ( result['status'] == 200 ) {
					window.location.href = result['redirect'];
				} else {
					for (var i = 0; i < result.length; i++ ) {
						err += '<i class="fa fa-meh-o fa-4"></i> '+result[i]+'<br>';
					};
					$('.regis-err').html(err);
					$('.regis').button('reset');
				}
			},
		});
	});
	
	$(document).on('submit', '.sign-in-form', function(e){
		e.preventDefault();
		$('.login').button('loading');
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			data: $(this).serialize(),
			success: function (result) {
				if ( result['status'] == 200 ) {
					window.location.href = result['redirect'];
				} else {
					$('.login-err').html(result);
					$('.login').button('reset');
				}
			},
		});
	});

	
	$(document).on('submit', '.reset-password-form', function(e){
		e.preventDefault();
		$('.btn-reset-password').button('loading...');
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			data: $(this).serialize(),
			success: function (result) {

				if ( result['status'] == 200 ) {
					$('.reset-password-scs').html(result['message']);
					$('.reset-password-err').html('');
					$('.btn-reset-password').button();
				}
				else
				{
					$('.reset-password-err').html(result);
					$('.reset-password-scs').html('');
					$('.btn-reset-password').button('reset');
				}

			},
		});
	});

	
	$(document).on('submit', '.update-profile-form', function(e){
		var err = '';
		e.preventDefault();
		$('.update-profile').button('loading');
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			data: $(this).serialize(),
			success: function (result) {
				if ( result['status'] == 200 ) {
					$('.update-profile-scs').html('<i class="fa fa-smile-o"></i> '+result['message']+'<br>');
					$('.update-profile-err').html('');
				} else {
					$('.update-profile-scs').html('');
					for (var i = 0; i < result.length; i++ ) {
						err += '<i class="fa fa-meh-o"></i> '+result[i]+'<br>';
					};
					$('.update-profile-err').html(err);
				}
				$('.update-profile').button('reset');
			},
		});
	});
	
	$(document).on('change', '.old-pwd', function(){
		var olpwd = this;
		$.ajax({
			url: '/check-password',
			type: "POST",
			data: { old_password : $('.old-pwd').val() },
			success: function (result) {
				if ( result['status'] == 200 ) {
					olpwd.setCustomValidity('');
				} else {
					olpwd.setCustomValidity('Old Password does not match.');
				}
			},
		});
	});
	
	$(document).on('submit', '.update-password-form', function(e){
		var err = '';
		e.preventDefault();
		$('.update-password').button('loading');
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			data: $(this).serialize(),
			success: function (result) {
				if ( result['status'] == 200 ) {
					$('.update-password-scs').html('<i class="fa fa-smile-o"></i> '+result['message']+'<br>');
					$('.update-password-err').html('');
					$('.update-password-form').trigger('reset');
				} else {
					$('.update-password-scs').html('');
					for (var i = 0; i < result.length; i++ ) {
						err += '<i class="fa fa-meh-o fa-4"></i> '+result[i]+'<br>';
					};
					$('.update-password-err').html(err);
				}
				$('.update-password').button('reset');
			},
		});
	});
	
	$(document).on('click', '.konfirmPayment', function(e){
		e.preventDefault();
		$('.invoice-form-list').attr('action', $('.konfirmRoute').val());
		$('.invoice-form-list').submit();
	});
	
	$(document).on('click', '.setStored', function(e){
		e.preventDefault();
		$('.delivery-form-list').submit();
	});
	
	$(document).on('click', '.assignDelivery', function(e){
		e.preventDefault();
		$('.schedule-form-list').submit();
	});
	
	$(document).on('submit', '.return-process-form', function(e){
		var err = '';
		e.preventDefault();
		$('.return-process').button('loading');
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			data: $(this).serialize(),
			success: function (result) {
				if ( result['status'] == 200 ) {
					window.location.href = result['redirect'];
				} else {
					for (var i = 0; i < result.length; i++ ) {
						err += '<i class="fa fa-meh-o fa-4"></i> '+result[i]+'<br>';
					};
					$('.return-process-err').html(err);
					$('.return-process').button('reset');
				}
			},
		});
	});
	
	$(document).on('click', '.assignReturn', function(e){
		e.preventDefault();
		$('.schedule-form-list').submit();
	});
	
	$(document).on('click', '.setReturned', function(e){
		e.preventDefault();
		$('.return-form-list').submit();
	});
});