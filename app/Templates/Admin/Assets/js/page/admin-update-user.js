$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ sửa thông tin người dùng mới."),'alert-info');
	oldEmail = updateUserForm.getOldEmail();
	updateUserForm.init();
});

var oldEmail;

var updateUserForm = {
	getOldEmail : function(){
		return $("input[name=email]").val();
	},
	init : function(){
		this.validate();
		$('input[name=active]').button();
	},
	validate : function(){
		$('#editForm').validate({
			rules : {
				email : {
					required : true,
					email : true,
					remote : {
						url : DIR + 'user/~checkEmail',
						type : 'GET',
						data : {
							email : function(){
								return $("input[name=email]").val();
							},
							oldEmail : function(){
								return oldEmail;
							}
						}
					}
				},
				fullName : {
					required : true
				}
			},
			messages: {
				email : {
					required : 'Không được để trống',
					email : 'Không đúng định dạng email',
					remote : 'Email đã tồn tại'
				},
				fullName : {
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
		formData.append('active',$("input[name='active']:checked").val());
		if(form.valid()){
			$.ajax({
				url: DIR + "user/~edit",
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
	            	Url.redirect('admin/~user');
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