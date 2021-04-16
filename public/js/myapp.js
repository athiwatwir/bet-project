function showPwd(id, el) { // show password
    let x = document.getElementById(id);
    if (x.type === "password") {
      x.type = "text";
      el.className = 'fi fi-eye-disabled field-icon showpwd';
    } else {
      x.type = "password";
      el.className = 'fi fi-eye field-icon showpwd';
    }
  } 