$(document).ready(function () {
    // Get ID from URL
    const urlParams = new URLSearchParams(window.location.search);
    const employeeId = urlParams.get("id");

    if (!employeeId) {
        $("#error-message").text("Invalid request. No employee ID provided.").show();
        return;
    }

    $.ajax({
        url: "read.php?id=" + employeeId,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                $("#name").text(response.name);
                $("#address").text(response.address);
                $("#salary").text("$" + response.salary);
            } else {
                $("#error-message").text(response.error).show();
            }
        },
        error: function () {
            $("#error-message").text("An error occurred. Please try again.").show();
        }
    });
});
