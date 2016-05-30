$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ tạo được người dùng mới."),'alert-info');
	createRoleForm.init();
});

var createRoleForm = {
	init : function(){
		this.validate();
	},
	currentUrl : function(){
		window.open(window.location.href+'','_self');
	},
	validate : function(){
		$('#createForm').validate({
			rules : {
				name :{
					required :true
				},
				description : {
					required : true
				},
				icon : {
					required : true,
				}
			},
			messages: {
				name : {
					required : 'Không được để trống',
				},
				description : {
					required : 'Không được để trống',
				},
				icon : {
					required : 'Không được để trống',
				},
			}
		});
	},
	submit : function(){
		var form = $('#createForm');
		var formData =  new FormData(form[0]);
		formData.append('token',TOKEN);
		if(form.valid()){
			$.ajax({
				url: DIR + "role/~create",
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
	            	console.log(jqXHR.status);
	            	StringUtil.setMessage(escapeHtml('Có lỗi xảy ra : không gọi được dịch vụ. Loại lỗi:'+ jqXHR.status),'alert-danger');
	            }
			});
		}
	}
}