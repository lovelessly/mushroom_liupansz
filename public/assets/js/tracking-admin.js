     var deleteButton = $(".deleteButton");

     var appendDOM = function(){

        var template = "<tr><td></td><td><input class='inputCell' type='text'><span><button type='button' class='deleteButton btn btn-danger'><i class='fa fa-minus-circle'></i></button></span></td></tr>",
            Dom = $(template)
            dt = new Date($.now()),
            time = dt.getFullYear()+"-"+ (dt.getMonth()+1) +"-"+ dt.getDate()+" "+ dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

        $("#infoTable").append(Dom)

        Dom.find(">:first-child").html(time);

        deleteButton = $(".deleteButton");

        deleteButton.click(function(){
            $(this).parents("tr").remove()
        });

     };

     $("#addButton").click(appendDOM);

     deleteButton.click(function(){
        $(this).parents("tr").remove()
     })
