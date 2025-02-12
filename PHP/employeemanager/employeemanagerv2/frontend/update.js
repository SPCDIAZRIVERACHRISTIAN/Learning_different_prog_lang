$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const employeeId = urlParams.get("id");

    if (!employeeId) {
        $("#error-message").text("Invalid request. No employee ID provided.").show();
        return;
    }

    // Fetch employee data
    $.ajax({
        url: "../backend/update.php?id=" + employeeId,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                $("#employee-id").val(response.id);
                $("#name").val(response.name);
                $("#address").val(response.address);
                $("#salary").val(Math.trunc(response.salary));
            } else {
                $("#error-message").text(response.errors.join(" ")).show();
            }
        },
        error: function () {
            $("#error-message").text("An error occurred while fetching data.").show();
        }
    });

    // Handle form submission
    $("#update-form").submit(function (e) {
        e.preventDefault();

        let formData = {
            id: $("#employee-id").val(),
            name: $("#name").val(),
            address: $("#address").val(),
            salary: $("#salary").val()
        };

        // Clear previous errors
        $(".text-danger").text("");
        $("#error-message").hide();

        $.ajax({
            url: "../backend/update.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Employee updated successfully!");
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
