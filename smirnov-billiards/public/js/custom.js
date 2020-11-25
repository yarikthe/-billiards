
$(document).ready(function() {

$('select[name="turnir_id"]').on('change', function(){
    var countryId = $(this).val();
    if(countryId) {
        $.ajax({
            url: '/user/raund/get/'+countryId,
            type:"GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType:"json",

            success:function(data) {

                $('select[name="raund_id"]').empty();

                $.each(data, function(key, value){

                    $('select[name="raund_id"]').append('<option value="'+ key +'">' + value + '</option>');

                });
            },
        });
    } else {
        $('select[name="raund_id"]').empty();
    }

});

$('select[name="raund_id"]').on('change', function(){
    var countryId2 = $(this).val();
    if(countryId2) {
        $.ajax({
            url: '/user/player/get/'+countryId2,
            type:"GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType:"json",

            success:function(data) {

                $('select[name="player_id"]').empty();

                $.each(data, function(key, value){

                    $('select[name="player_id"]').append('<option value="'+ key +'">' + value + '</option>');

                });
            },
        });
    } else {
        $('select[name="player_id"]').empty();
    }

});

});