var expand = true;

// default
$(".content").load('statistic');
function link (module, title) {
	$.ajax({
		url: module,
		cache: false,
		dataType: 'html',
		beforeSend: function() {
			$('#myModal').modal({
			    backdrop: 'static',
			    keyboard: false
			})
		},
		success:function(html) {
			$('#myModal').modal('hide');
			$("#wrapper").css('padding-left', '225px');
			$(".side-nav").css('width', '225px');
			$(".side-nav span").css('display', 'inline-block');
			$(".content").html(html);
			$(".title").html(title);
		}
	})
	.fail(function() {
		alert( "error" );
		console.log("error");
	});
}


$(".menu").bind('click', function() {
	if (expand) {
		$("#wrapper").css('padding-left', '225px');
		$(".side-nav").css('width', '225px');
		$(".side-nav span").css('display', 'inline-block');
		expand = false;
	} else {
		$("#wrapper").css('padding-left', '50px');
		$(".side-nav").css('width', '50px');
		$(".side-nav span").css('display', 'none');
		expand = true;
	};
});

if (expand == false) {
	$(".side-nav").hover(
		function () {
			$("#wrapper").css('padding-left', '225px');
			$(".side-nav").css('width', '225px');
			$(".side-nav span").css('display', 'inline-block');
		},
		function () {
			$("#wrapper").css('padding-left', '50px');
			$(".side-nav").css('width', '50px');
			$(".side-nav span").css('display', 'none');
		}
	);
};