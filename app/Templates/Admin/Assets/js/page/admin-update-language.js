$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn sẽ sửa thông tin quyền mới."),'alert-info');
	oldCode = updateLanguageForm.getOldCode();
	updateLanguageForm.init();
});

var oldCode;

var updateLanguageForm = {
	init : function(){
		this.validate();
	},
	getOldCode : function(){
		return $("input[name=code]").val();
	},
	validate : function(){
		$('#editForm').validate({
			rules : {
				code : {
					required : true,
					remote : {
						url : DIR + 'language/~checkCode',
						type : 'GET',
						data : {
							code : function(){
								return $("input[name=code]").val();
							},
							oldCode : function(){
								return oldCode;
							}
						}
					}
				},
				desc_en : {
					required : true
				},
				desc_vi : {
					required : true
				},
			},
			messages: {
				code : {
					required : 'Không được để trống',
					remote : "Mã đã tồn tại"
				},
				desc_en : {
					required : 'Không được để trống'
				},
				desc_vi : {
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
				url: DIR + "language/~edit",
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