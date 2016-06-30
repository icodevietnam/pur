$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ tạo được ngôn ngữ mới."),'alert-info');
	createLanguageForm.init();
});

var createLanguageForm = {
	init : function(){
		this.validate();
	},
	currentUrl : function(){
		window.open(window.location.href+'','_self');
	},
	validate : function(){
		$('#createForm').validate({
			rules : {
				code :{
					required :true,
					remote : {
						url : DIR + 'language/~checkCode',
						type : 'GET',
						data : {
							code : function(){
							return $("input[name=code]").val();
							}
						}
					}
				},
				desc_en : {
					required : true
				},
				desc_vi: {
					required : true
				}
			},
			messages: {
				code : {
					required : 'Không được để trống',
					remote : "Code đã tồn tại"
				},
				desc_en : {
					required : 'Không được để trống',
				},
				desc_vi : {
					required : 'Không được để trống',
				}
			}
		});
	},
	submit : function(){
		var form = $('#createForm');
		var formData =  new FormData(form[0]);
		formData.append('token',TOKEN);
		if(form.valid()){
			$.ajax({
				url: DIR + "language/~create",
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
	            	Url.redirect('admin/~language');
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