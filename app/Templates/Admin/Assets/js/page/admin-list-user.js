$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn có thể thêm xoá sửa người dùng trang admin."),'alert-info');
	User.displayTable();
});

var User = {
	object : 'users',
    displayTable: function() {
        var dataItems = [];
        $.ajax({
            url: DIR + "user/~getAll",
            type: "GET",
            dataType: "JSON",
            beforeSend : function(){
                $('#pleaseWaitDialog').modal('show');
            },
            success: function(response) {
                var i = 0;
                $.each(response, function(key, value) {
                    i++;
                    dataItems.push([
                        i,
                        value.username,value.fullname,value.email,value.active == 1 ? "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>" : "",
                        "<a class='btn btn-crud btn-sm btn-info' href='"+ DIR +"admin/~showInfo?id="+ value.id +"&token="+ TOKEN +"&object="+ User.object +"' ><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a>" +
                        "<a class='btn btn-crud btn-sm btn-default' href='user/~showInfo?userId="+ value.id +"&token="+ TOKEN +"' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></a>" +
                        "<button class='btn btn-crud btn-sm btn-danger' onclick='deleteItem(" + value.id + ");'><span class='glyphicon glyphicon-trash' aria-hidden='true'></button>"
                    ]);
                });
                $('#tblItems').dataTable({
                    "bDestroy": true,   
                    "bSort": true,
                    "bFilter": true,
                    "bLengthChange": true,
                    "bPaginate": true,
                    "sDom": '<"top">rt<"bottom"flp><"clear">',
                    "aaData": dataItems,
                    "aaSorting": [],
                    "aoColumns": [{
                        "sTitle": "No"
                    }, {
                        "sTitle": "Tên đăng nhập"
                    }, {
                        "sTitle": "Tên đầy đủ"
                    }, {
                        "sTitle": "Thư điện tử"
                    }, {
                        "sTitle": "Đang hoạt động"
                    }, {
                        "sTitle": "Hành động"
                    }]
                });
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


