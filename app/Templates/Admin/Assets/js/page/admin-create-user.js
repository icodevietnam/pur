$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ tạo được người dùng mới."),'alert-info');
	createUserForm.validate();
});

var createUserForm = {
	init : function(){

	},
	validate : function(){
		$('#createForm').validate({
			rules : {
				username :{
					required :true,
					minlength : 6
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
					email : true
				},
				fullName : {
					required : true
				}
			},
			messages: {
				username : {
					required : 'Không được để trống',
					minlength : 'Độ dài tối thiểu là 6',
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
					email : 'Không đúng định dạng email'
				},
				fullName : {
					required : 'Không được để trống'
				}
			}
		});
	},
	submit : function(){
		alert('Dep trai');
	}
}

