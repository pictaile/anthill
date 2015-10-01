/**
 * Created by kostya on 01.10.15.
 */

$(document).ready(base_init)

var auth = new Authorization();

function base_init(){
    AuthUser();

}

function AuthUser(){
    $('#auth_header-form').submit(function(e){
        e.preventDefault();
        auth.send();
    })

}
