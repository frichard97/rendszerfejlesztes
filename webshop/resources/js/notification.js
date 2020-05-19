$(document).ready(function () {
    setInterval(Notification, 10000);

    function Notification() {
        $.post("/get_notification", {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'notification_number': notification_number,
            type: "phase1"
        }).done(function (data) {
            console.log(data);
            $("#notification_num").html(data['unseen']);
            if (data['notification_number'] > notification_number) {
                $.post("/get_notification", {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'notification_number': notification_number,
                    type: "phase2"
                }).done(function (data) {
                    data.forEach(function (item) {
                        console.log(item);
                        var div = $.parseHTML("<a class='content' href='"+item['href']+"'><div class='notification-item'><div class='item-title'><h4>"+item['name']+"</h4><h5 style='text-align: right'>"+item['date']['date'].split('.')[0]+"</h5></div><div class='item-info'><p>"+item['comment']+"</p></div></div></a>");
                        notification_number++;
                        $("#add_notification").prepend(div);
                    });
                    //$("#comment_count").text(comment_number);

                });
            }
        });
    }
    $("#dLabel").click(function () {
        $.post("/notification_make_seen",{
            '_token': $('meta[name=csrf-token]').attr('content'),
        }).done(function (data){
            console.log("all seen");
            $("#notification_num").html("0");
        });
    });
});
