$(function() {
	StringUtil.setMessage(escapeHtml("Ghi chú : Bạn có thể thêm xoá sửa thông tin ngôn ngữ."),'alert-info');
	Language.displayTable();
});

var Language = {
	object : 'languages',
    displayTable: function() {
        var dataItems = [];
        $.ajax({
            url: DIR + "language/~getAll",
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
                        value.code,value.description_en,value.description_vi,
                        "<a title='Xem thông tin' class='btn btn-crud btn-sm btn-info' href='"+ DIR +"admin/~showInfo?id="+ value.id +"&token="+ TOKEN +"&object="+ Language.object +"' ><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a>" +
                        "<a title='Chỉnh sửa người dùng' class='btn btn-crud btn-sm btn-default' href='"+ DIR +"admin/~edit?id="+ value.id +"&token="+ TOKEN +"&object="+ Language.object +"' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></a>" +
                        "<a title='Xóa người dùng' class='btn btn-crud btn-sm btn-danger' onclick='Language.delete(" + value.id + ");'><span class='glyphicon glyphicon-trash' aria-hidden='true'></button>"
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
                        "sTitle": "Mã"
                    },{
                        "sTitle": "Tiếng Anh"
                    },{
                        "sTitle": "Tiếng Việt"
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
        confirm('Bạn muốn xóa ?','Xóa','Có',Language.ajaxDelete,id);
    },
    ajaxDelete : function(id){
        $.ajax({
            url: DIR + "language/~delete",
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
                Language.displayTable();
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


