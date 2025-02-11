$(document).ready(function () {
    $("#employee-form").submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = {
            name: $("#name").val(),
            address: $("#address").val(),
            salary: $("#salary").val()
        };

        // Clear previous errors
        $(".text-danger").text("");
        $("#error-message").hide();

        $.ajax({
            url: "../backend/create.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Employee added successfully!");
                    window.location.href = "index.html"; // Redirect to list page
                } else {
                    if (response.errors.name) {
                        $("#name-error").text(response.errors.name);
                    }
                    if (response.errors.address) {
                        $("#address-error").text(response.errors.address);
                    }
                    if (response.errors.salary) {
                        $("#salary-error").text(response.errors.salary);
                    }
                    if (response.errors.length > 0) {
                        $("#error-message").text(response.errors.join(" ")).show();
                    }
                }
            },
            error: function () {
                $("#error-message").text("An error occurred. Please try again.").show();
            }
        });
    });
});
