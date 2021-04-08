function createHTML(responce){
    let val = "";
    let data = "";
    let star = "";
    for (let i = 0; i < responce.length; i++)
    {
        if (responce[i]["mark"] === 1) {
            data = " <div class='row'><div class='col-sm-9'><strike><b><a id='" + responce[i]["id"] + "' class='links' style='color: #1a202c;cursor: pointer;'>" + responce[i]["title"] + "</a></b></strike></div><div class='col-sm-3 text-muted'>" + responce[i]["due_date"] + "</div></div> " + "<p><strike>" + responce[i]["notes"] + "</strike></p>";
        } else {
            data = " <div class='row'><div class='col-sm-9'><b><a id='" + responce[i]["id"] + "' class='links' style='color: #1a202c;cursor: pointer;'>" + responce[i]["title"] + "</a></b></div><div class='col-sm-3 text-muted'>" + responce[i]["due_date"] + "</div></div>" + "<p>" + responce[i]["notes"] + "</p>";
        }
        if (responce[i]["important"] === 1) {
            star = "<i class='star fa fa-star-o text-warning' id='" + responce[i]["id"] + "' aria-hidden='true'></i>";
        } else {
            star = "<i class='star fa fa-star-o ' id='" + responce[i]["id"] + "' aria-hidden='true'></i>";
        }
        val += "<div class='row m-3 border-bottom'>" +
            "<div class='col-lg-1 m-3'>" +
            "<i class='fa fa-bars'></i>" +
            "</div>" + "<div class='col-lg-8'>" + data + "</div>" +
            "<div class='col-lg-1 m-3'>" + star + "</div>" +
            "</div>";
    }

    return val;
}



function list() {
    $.ajax({
        url: "/gettask",
        type: "GET",
        cache: false,
        success: function (responce) {
            $("#subDiv").html(createHTML(responce));
        }
    });
}


window.onload = list();

$(document).ready(function () {
    $("#search").on("keyup",function (){
        $.ajax({
            url: "/search",
            type: "GET",
            cache: false,
            data: {
                "search": $(this).val()
            },
            success: function (responce) {
                $("#subDiv").html(createHTML(responce));
            }
        });
    });

    $(function () {
        $("#subDiv").sortable();
        $("#subDiv").disableSelection();
    });

    $(document).on("click", ".star", function () {
        if ($(this).data('click', true)) {
            id = $(this).attr("id");
            $.ajax({
                url: "/task/" + id,
                type: "GET",
                cache: false,
                success: function (responce) {
                    list();
                }
            });
        }
    });

    $(document).on("click", ".links", function () {
        $("#btnAdd").show();
        if ($(this).data('click', true)) {
            id = $(this).attr("id");
            var action = "/edit/" + id;
            $.ajax({
                url: "/edit/" + id,
                type: "GET",
                cache: false,
                success: function (responce) {
                    console.log(responce);
                    if (responce["mark"] === 1)
                        $("#mark").attr("checked", true);
                    else
                        $("#mark").attr("checked", false);
                    $("#form").attr("action", action);
                    $('#title').val(responce["title"]);
                    $('#start_date').val(responce["start_date"]);
                    $('#due_date').val(responce["due_date"]);
                    $('#notes').val(responce["notes"]);
                }
            });
        }
    });

    $("#btnAdd").on("click", function () {
        $("#btnAdd").hide();
        var action = "/store";
        $("#mark").attr("checked", false);
        $("#form").attr("action", action);
        $('#title').val("");
        $('#start_date').val("");
        $('#due_date').val("");
        $('#notes').val("");
    });

});


