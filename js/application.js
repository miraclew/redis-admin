$(function(){
	pjaxRegister();
	// ul switch
	$('ul.nav li').live('click', function(){
		$('ul.nav li').removeClass('active');
		$(this).addClass('active');
	});	
});

function connectRedis(id, host) {
	$('ul.nav').append("<li><a class='pjax' href='console.php?id="+id+"'>"+host+"</a></li>");
	return false;
}

function pjaxRegister() {
	$('a.pjax').pjax('#main',{'timeout':30000});
	$('#main').on('pjax:start', function() {    		
		$('#main').toggleClass('slideout'); 
    	$('#loading').show(); 
    }).on('pjax:end',   function() {
        $('#loading').hide();
        $('#main').toggleClass('slideout');
	});	
}

function saveKeyspace(id) {
	$value = $('#keyspace').val();
	$.post("connections.php?a=savekeyspace", { id: id, keyspace: $value } , function(data) {
		console.log(data);
	});
}