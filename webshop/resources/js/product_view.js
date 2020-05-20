$(document).ready(function () {
    $('.panel-heading').click(function () {
        if(!$('.panel-body').hasClass('collapse show')) {
            $('.downbutton').removeClass('fa fa-chevron-right');
            $('.downbutton').addClass('fa fa-chevron-down');

        }
        else
        {
            $('.downbutton').removeClass('fa fa-chevron-down');
            $('.downbutton').addClass('fa fa-chevron-right');
        }
    });
    setInterval(kommentTimer, 3000);

    function kommentTimer()
    {
        $.post("/product/get_comment", {'_token': $('meta[name=csrf-token]').attr('content'), 'id': id, 'comment_number':comment_number,type: "phase1" }).done(function( data ) {
            if(data > comment_number)
            {
                $.post("/product/get_comment", {'_token': $('meta[name=csrf-token]').attr('content'), 'id': id, 'comment_number':comment_number,type:"phase2"}).done(function(data){
                    data.forEach(function(item){
                        console.log(item);
                        var div = $.parseHTML("<li class='list-group-item'> <div class='row'> <div class='col-xs-10 col-md-11'> <div> <div class='mic-info'>By: <a href='#'>"+item['user']+"</a> <span style='float:right'> "+item['date']['date'].split('.')[0]+" </span></div> </div> <div class='comment-text'>"+item['message']+"</div> </div> </div> </li>")
                        comment_number++;
                        $("#addcomment").prepend(div);
                    });
                    $("#comment_count").text(comment_number);

            });
            }
        });
    }

});

window.new_comment= function(id){
    $.post("/product/new_comment", {'_token': $('meta[name=csrf-token]').attr('content'), 'id': id, 'message':$('#comment-message').val()}).done(function( data ) {

    });
    $("#comment-message").val(null);
}

$(document).ready(function () {
    setInterval(makeTimer, 1000);
    function makeTimer() {
			var now = new Date();
			now = (Date.parse(now) / 1000);

			var timeLeft = endTime - now;

            if(timeLeft == 0) {
                location.reload(true);
            } else if (timeLeft > 0) {
                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") { hours = "0" + hours; }
                if (minutes < "10") { minutes = "0" + minutes; }
                if (seconds < "10") { seconds = "0" + seconds; }
                if (days > 0){
                $("#days").html(days + " nap");
                }
                $("#hours").html(hours + " óra");
                $("#minutes").html(minutes + " perc");
                $("#seconds").html(seconds + " másodperc");
            }
    }
})
