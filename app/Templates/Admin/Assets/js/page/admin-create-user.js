$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ tạo được người dùng mới."),'alert-info');
});

var createUserForm = {
	init : function(){

	},
	validate : function(){
		$('#createForm').validate(){
			rules : {
				username :{
					required :true,
					minlength : 6,
					remote : {

					}
				}
				password : {
					required : true,
					minlength : 6
				},
				confirmPassword : {
					required : true,
					equalTo : '.password'
				}
			},
			messages: {

			}
		}
	}
}

