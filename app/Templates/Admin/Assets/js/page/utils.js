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

var Url = {
    redirect : function(path){
        window.open(DIR + path,'_self');
    }
}

window.alert = function(message, title) {
    if($("#bootstrap-alert-box-modal").length == 0) {
        $("body").append('<div id="bootstrap-alert-box-modal" class="modal fade">\
            <div class="modal-dialog">\
                <div class="modal-content">\
                    <div class="modal-header" style="min-height:40px;">\
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                        <h4 class="modal-title"></h4>\
                    </div>\
                    <div class="modal-body"><p></p></div>\
                    <div class="modal-footer">\
                        <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>\
                    </div>\
                </div>\
            </div>\
        </div>');
    }
    $("#bootstrap-alert-box-modal .modal-header h4").text(title || "");
    $("#bootstrap-alert-box-modal .modal-body p").text(message || "");
    $("#bootstrap-alert-box-modal").modal('show');
};

window.confirm = function(message, title, yes_label, callback,id) {
    $("#bootstrap-confirm-box-modal").data('confirm-yes', false);
    if($("#bootstrap-confirm-box-modal").length == 0) {
        $("body").append('<div id="bootstrap-confirm-box-modal" class="modal fade">\
            <div class="modal-dialog">\
                <div class="modal-content">\
                    <div class="modal-header" style="min-height:40px;">\
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                        <h4 class="modal-title"></h4>\
                    </div>\
                    <div class="modal-body"><p></p></div>\
                    <div class="modal-footer">\
                        <a href="#" class="btn btn-primary">' + (yes_label || 'OK') + '</a>\
                        <a href="#" data-dismiss="modal" class="btn btn-default">Cancel</a>\
                    </div>\
                </div>\
            </div>\
        </div>');
        $("#bootstrap-confirm-box-modal .modal-footer .btn-primary").on('click', function () {
            if(typeof(callback)=== 'function'){
                $("#bootstrap-confirm-box-modal").data('confirm-yes', true);
                $("#bootstrap-confirm-box-modal").modal('hide');
                callback();
                return false;
            }
        });
        $("#bootstrap-confirm-box-modal").on('hide.bs.modal', function () {
             if(callback) callback(id);
        });
    }
 
    $("#bootstrap-confirm-box-modal .modal-header h4").text(title || "");
    $("#bootstrap-confirm-box-modal .modal-body p").text(message || "");
    $("#bootstrap-confirm-box-modal").modal('show');
};
