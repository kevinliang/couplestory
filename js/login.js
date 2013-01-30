// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
    });
    
    form.mouseup(function() {
    	return false;
    });
    
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            box.hide();
        }
    });
    
});
