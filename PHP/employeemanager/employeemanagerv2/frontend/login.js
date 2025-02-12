$(document).ready(function () {
    $('#login-button').click(function () {
        let email = $("#email").val();
        let password = $("#password").val();

        if (!email || !password) {
            alert("Please provide both email and password.");
            return;
        }

        $.ajax({
            url: "../backend/login.php",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Login succesful");
                    localStorage.setItem('jwt', response.token);
                    window.location.href = "index.html";
                } else {
                    alert("Login failed: " + response.message);
                }
            },
            error: function () {
                alert("An error ocurred. Please try again.");
            }
        });
    });
});
