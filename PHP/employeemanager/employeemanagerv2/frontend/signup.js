$(document).ready(function () {
    $("#signup-form").submit(function (e) {
        e.preventDefault();

        let account = {
            fullName: $("#name").val(),
            email: $("#email").val(),
            password: $("#password").val()
        };

        $(".text-danger").text("");
        $("#error-message").hide();

        $.ajax({
            url: "../backend/signup.php",
            type: "POST",
            data: account,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Account Created!");
                    window.location.href = "login.html";
                } else {
                    let errorText = response.errors.join("\n");
                    $("#error-message").text(errorText).show();
                }
            },
            error: function () {
                $("#error-message").text("An error occurred. Please try again.").show();
            }
        });
    });
});
