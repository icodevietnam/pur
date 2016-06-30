$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn có thể thêm xoá sửa thông tin chung."),'alert-info');
	//Role.displayTable();
});

var Role = {
	object : 'roles',
    displayTable: function() {
        var dataItems = [];
        $.ajax({
            url: DIR + "role/~getAll",
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
                        value.name,value.description,value.icon,
                        "<a title='Xem thông tin' class='btn btn-crud btn-sm btn-info' href='"+ DIR +"admin/~showInfo?id="+ value.id +"&token="+ TOKEN +"&object="+ Role.object +"' ><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a>" +
                        "<a title='Chỉnh sửa người dùng' class='btn btn-crud btn-sm btn-default' href='"+ DIR +"admin/~edit?id="+ value.id +"&token="+ TOKEN +"&object="+ Role.object +"' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></a>" +
                        "<a title='Xóa người dùng' class='btn btn-crud btn-sm btn-danger' onclick='Role.delete(" + value.id + ");'><span class='glyphicon glyphicon-trash' aria-hidden='true'></button>"
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
                        "sTitle": "Tên"
                    }, {
                        "sTitle": "Diễn giải"
                    }, {
                        "sTitle": "Hình"
                    }, {
                        "sTitle": "Hành động"
                    }]
                });
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
    },
    delete : function(id){
        confirm('Bạn muốn xóa ?','Xóa','Có',Role.ajaxDelete,id);
    },
    ajaxDelete : function(id){
        //console.log('Dep trai');
        $.ajax({
            url: DIR + "role/~delete",
            type: "POST",
            data : {
                id : id,
                token : TOKEN
            },
            dataType: "JSON",
            beforeSend : function(){
                $('#pleaseWaitDialog').modal('show');
            },
            success: function(response) {
                Role.displayTable();
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


