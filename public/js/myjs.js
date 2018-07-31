$(document).ready(function() {
    $(document).on('click', '#reply', function(event){
        event.preventDefault();
        var $x = $("#rp");
        $x.css({ 'display' : 'block'});
    });
    $(document).on('click','#binhluan', function(event){
        event.preventDefault();
        var $y = $('#noidung').val();
        var $z = $('#binhluan').attr('duongdan');
        $.ajax({
            url: $z,
            type: 'get',
            data : {
                'content': $y
            },
            success: function(response) {
                $("#bi").html(response);
            }
          });
    });
    $(document).on('click','#traloi', function(event){
        event.preventDefault();
        var $y1 = $('#reply1').val();
        var $z1 = $('#traloi').attr('duongdan');
        $.ajax({
            url: $z1,
            type: 'get',
            data : {
                'content': $y1
            },
            success: function(response) {
                alert(response);
            }
          });
    });
});