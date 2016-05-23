$(function(){
	//Make metis menu run
	$('.metismenu').metisMenu();
})

function escapeHtml(unsafe) {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
}

var StringUtil = {
	setMessage : function (message,type){
    	$('.alert').removeClass('alert-info alert-danger').text('');
    	$('.alert').addClass(type).append(message);
    }
}

var History = {
	back : function(){
		window.history.back();
	}
}