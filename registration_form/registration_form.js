function validUname(uname) {
    let error = 0;
    var length = uname.length;
    var validChars = /\w{3,10}/;
    document.getElementById('username_error').innerHTML = '';
    if (length < 3 || length > 10 || !validChars.test(uname)) {
        error++;
        document.getElementById('username_error').innerHTML = "<em style='color:red'>Please enter valid username</em>";
    }
    return error;
}
function validPass(pass) {
    let error = 0;
    var length = pass.length;
    let digits=/0-9/;
    let sLetters=/a-z/;
    let BLetters=/A-Z/;

    document.getElementById('password_error').innerHTML = '';
    if (length < 6 || !validChars.test(digits) || !validChars.test(sLetters) || !validChars.test(BLetters)) {
        error++;
        document.getElementById('password_error').innerHTML = "<em style='color:red'>Please enter valid password</em>";
    }
    return error;
}
function validPassConfirm(passConfirm, pass) {
    let error = 0;
    document.getElementById('passwordConfirm_error').innerHTML = '';
    if (pass.localeCompare(passConfirm) !== 0) {
        error++;
        document.getElementById('passwordConfirm_error').innerHTML = "<em style='color:red'>Passwords are different</em>";
    }
    return error;

}
function validate() {
    let error = 0;
    var uname = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    var passConfirm = document.getElementById("passwordConfirm").value;
    error += validUname(uname);
    error += validPass(pass);
    error += validPassConfirm(pass, passConfirm);
    if (error > 0) {

        return false;
    }
    else {
        return true;
    }
}