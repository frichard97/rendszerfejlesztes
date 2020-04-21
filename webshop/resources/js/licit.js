$(document).ready(function () {
    setInterval(licitTimer, 700);
    function licitTimer() {
        $.post("/product/get_licit", {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'id': id,
            'licit_number': licit_number,
            type: "phase1"
        }).done(function (data) {
            console.log(data,licit_number);
            if (data > licit_number) {
                $.post("/product/get_licit",{
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'id' :id,
                    'licit_number' :licit_number,
                    'type' : "phase2"
                }).done(function (data) {
                    console.log(data);
                    data.forEach(function(item){
                        $("#licit10").remove();
                        let max = 0;
                        if(licit_number >= 10){
                            max = 10;
                        }
                        else
                        {
                            max = licit_number;
                        }
                        for( var i = max; i >= 1; i--)
                        {
                            $("#licit"+i).attr("id","licit"+(i+1));
                        }
                        var div = $.parseHTML("<li class='list-group-item' id='licit1'><div class='row'><div class='col-xs-10 col-md-11'><div><div class='mic-info'>By: <a href='#'>"+item['user']+"</a> <span style='color: green; padding-left: 3%'>"+item['price']+"Ft</span> <span style='float: right'>"+item['date']['date'].split('.')[0]+"</span></div></div></div></div></li>")
                        licit_number++;
                        $("#add_licit").prepend(div);

                    });
                });
            }
        });
    }
});
window.new_licit = function (id) {
    $.post("/product/new_licit", {'_token': $('meta[name=csrf-token]').attr('content'), 'id': id, 'price':$('#licit_price').val()}).done(function( data ) {
        console.log(data);
    });
    $("#comment-message").val(null);
}
