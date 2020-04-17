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
            if(data != comment_number)
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
