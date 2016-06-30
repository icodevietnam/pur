$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ sửa thông tin quyền mới."),'alert-info');
	updateRoleForm.init();
});

var updateRoleForm = {
	init : function(){
		this.validate();
	},
	validate : function(){
		$('#editForm').validate({
			rules : {
				name : {
					required : true
				},
				description : {
					required : true
				},
				icon : {
					required : true
				}
			},
			messages: {
				name : {
					required : 'Không được để trống'
				},
				description : {
					required : 'Không được để trống'
				},
				icon : {
					required : 'Không được để trống'
				}
			}
		});
	},
	currentUrl : function(){
		window.open(window.location.href+'','_self');
	},
	submit : function(){
		var form = $('#editForm');
		var formData =  new FormData(form[0]);
		formData.append('token',TOKEN);
		if(form.valid()){
			$.ajax({
				url: DIR + "role/~edit",
	            type: "POST",
	            data : formData , 
	            processData : false,
	            contentType : false,
	            dataType: "JSON" ,
	            beforeSend : function(){
	                $('#pleaseWaitDialog').modal('show');
	            },
	            success : function(data){
	            	alert(data.message,'Hệ thống');
	            	Url.redirect('admin/~role');
	            },
	            complete : function(){
	                $('#pleaseWaitDialog').modal('hide');
	            },
	            error : function(jqXHR, textStatus, errorThrown){
                	if(jqXHR.status !== '200'){                
                		StringUtil.setMessage(escapeHtml('Có lỗi xảy ra : không gọi được dịch vụ. Loại lỗi:'+ jqXHR.status),'alert-danger');
                	}
            	}
			});
		}
	}
}