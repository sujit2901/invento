$(".user-register").on("submit", function (e) {
    e.preventDefault();
  
    const formData = {
      ...Object.fromEntries(new FormData(e.target)),
      user_register: true,
    };
    //   formdata.append("user_register", true);
  
    $.ajax({
      url: "./class/processor.php",
      type: "POST",
      data: formData,
      // cache: false,
      // processData: false,
      beforeSend: function () {
        $("body").append(
          '<div class="site-loader"><div class="bar-loader"><span></span><span></span><span></span><span></span></div></div>'
        );
      },
      complete: function () {
        $(".site-loader").remove();
      },
      success: function (result) {
        var notify = "";
  
        if (result == "Register Successful") {
          notify =
            '<div class="message-box"><div class="show alert alert-success" role="alert">' +
            result +
            "</div></div>";
          $("body").append(notify);
          $(".message-box").fadeOut(5000);
        } else {
          notify =
            '<div class="message-box"><div class="show alert alert-danger" role="alert">' +
            result +
            "</div></div>";
          $("body").append(notify);
          $(".message-box").fadeOut(5000);
        }
      },
    });
  });
$(".user-login").on("submit", function (e) {
    e.preventDefault();
  
    const formData = {
      ...Object.fromEntries(new FormData(e.target)),
      user_login: true,
    };
    //   formdata.append("user_register", true);
  
    $.ajax({
      url: "./class/processor.php",
      type: "POST",
      data: formData,
      // cache: false,
      // processData: false,
      beforeSend: function () {
        $("body").append(
          '<div class="site-loader"><div class="bar-loader"><span></span><span></span><span></span><span></span></div></div>'
        );
      },
      complete: function () {
        $(".site-loader").remove();
      },
      success: function (result) {
        var notify = "";
  
        if (result == "Login Successful") {
          notify =
            '<div class="message-box"><div class="show alert alert-success" role="alert">' +
            result +
            "</div></div><script>function reload(){location.reload();} setTimeout(reload,2000);</script>";
          $("body").append(notify);
          $(".message-box").fadeOut(5000);
        } else {
          notify =
            '<div class="message-box"><div class="show alert alert-danger" role="alert">' +
            result +
            "</div></div>";
          $("body").append(notify);
          $(".message-box").fadeOut(5000);
        }
      },
    });
  });