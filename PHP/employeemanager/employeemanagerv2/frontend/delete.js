$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const employeeId = urlParams.get("id");

    if (!employeeId) {
        $("#error-message").text("Invalid request. No employee ID provided.").show();
        return;
    }

    $("#employee-id").val(employeeId);

    $("#confirm-delete").click(function () {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: { id: employeeId },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Employee deleted successfully!");
                    window.location.href = "index.html"; // Redirect to employee list
                } else {
                    $("#error-message").text(response.error).show();
                }
            },
            error: function () {
                $("#error-message").text("An error occurred. Please try again.").show();
            }
        });
    });
});
