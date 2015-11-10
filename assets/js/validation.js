$(document).ready(function(){
    $('#submit').on('click',function(){

        var name = $('#InputName').val();
        var email = $('#InputEmail').val();
        var subject = $('#InputSubject').val();
        var message = $('#InputMessage').val();

        var fields = [name,email,subject,message]
        for(var i in fields)
        {
            if(fields[i] == null || fields[i] == '')
            {
                $('.validation').html('<p class="alert alert-danger">Полетата с *  за задължителни!</p>').fadeOut(7000);
            }
        }
    });
});