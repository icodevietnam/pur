$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ tạo được người dùng mới."),'alert-info');
	createUserForm.init();
});

var createUserForm = {
	init : function(){
		this.validate();
		$('input[name=active]').button();
	},
	currentUrl : function(){
		window.open(window.location.href+'','_self');
	},
	validate : function(){
		$('#createForm').validate({
			rules : {
				username :{
					required :true,
					minlength : 5,
					remote : {
						url : DIR + 'user/~checkUsername',
						type : 'GET',
						data : {
							username : function(){
							return $("input[name=username]").val();
							}
						}
					}
				},
				password : {
					required : true,
					minlength : 6
				},
				confirmPassword : {
					required : true,
					equalTo : '.password'
				},
				email : {
					required : true,
					email : true,
					remote : {
						url : DIR + 'user/~checkEmail',
						type : 'GET',
						data : {
							email : function(){
							return $("input[name=email]").val();
							}
						}
					}
				},
				fullName : {
					required : true
				}
			},
			messages: {
				username : {
					required : 'Không được để trống',
					minlength : 'Độ dài tối thiểu là 5',
					remote : 'Tên đăng nhập đã tồn tại'
				},
				password : {
					required : 'Không được để trống',
					minlength : 'Độ dài tối thiểu là 6'
				},
				confirmPassword : {
					required : 'Không được để trống',
					equalTo : 'Mật khẩu và xác nhận mật khẩu không giống nhau'
				},
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
	submit : function(){
		var form = $('#createForm');
		var formData =  new FormData(form[0]);
		formData.append('token',TOKEN);
		formData.append('active',$("input[name='active']:checked").val());
		if(form.valid()){
			$.ajax({
				url: DIR + "user/~create",
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

