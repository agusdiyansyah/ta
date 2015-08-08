var expand = true;

// Default
var 
	module = 'jadwal',
	title  = 'BIMBOL';
$.ajax({
    url: module,
    cache: false,
    dataType: 'html',
    success: function(html) {
        $(".content").html(html);
        $(".title").html(title);
    }
})
.fail(function() {
    alert( "error" );
    console.log("error");
});

$(document).ajaxStart(function(evt, jqXHR, settings){
	$('#myModal').modal({
	    backdrop: 'static',
	    keyboard: false
	});
});
$(document).ajaxComplete(function(evt, jqXHR, settings){

	// hide modal
	$('#myModal').modal('hide');

	// hiver action (edit | hapus)
	$("tr, .panel-title").hover(
		function () {
			$(this).find(".aksi").show();
		},
		function () {
			$(this).find(".aksi").hide();
		}
	);

	// menu bimbol
	$(".menu").click(function() {
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


});


function small () {
	$("#wrapper").css('padding-left', '50px');
	$(".side-nav").css('width', '50px');
	$(".navbar-ex1-collapse span").css('display', 'none');
	expand = true;
}

