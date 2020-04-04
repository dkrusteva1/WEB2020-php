function AjaxSubmit(){
    const url = "./request.php";
  
    var callback = function (text) {
    console.log(text);
    };
  
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let passwordConfirm = document.getElementById("passwordConfirm").value;
  
    let string = { "Username": username, "Password": password, "ConfirmedPassword": passwordConfirm };
  
    let jsonString = JSON.stringify(string);
  
    ajax(url, { success: callback, data: jsonString });			  
  }
  function ajax(url, settings){
      var xhr = new XMLHttpRequest();
      xhr.onload = function(){
        if (xhr.status == 200) {
          settings.success(xhr.responseText);
        } else {
          console.error(xhr.responseText);
        }
      };
  
      xhr.open("POST", url);
      xhr.setRequestHeader("Content-Type", "application/json;");
      xhr.send(settings.data);
    } 