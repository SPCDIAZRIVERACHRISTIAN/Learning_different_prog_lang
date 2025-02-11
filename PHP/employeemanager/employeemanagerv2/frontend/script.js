$(document).ready(function () {
    fetchEmployees();
});

function fetchEmployees() {
    $.ajax({
        url: "../backend/get_employees.php",  // Fetch data from backend
        type: "GET",
        success: function (response) {
            let tableContent = "";
            if (response.length > 0) {
                response.forEach(employee => {
                    tableContent += `
                        <tr>
                            <td>${employee.name}</td>
                            <td>${employee.address}</td>
                            <td>$${employee.salary}</td>
                            <td>
                                <a href="read.php?id=${employee.id}" class="mr-3" title="View Record" data-toggle="tooltip">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="update.php?id=${employee.id}" class="mr-3" title="Update Record" data-toggle="tooltip">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="delete.php?id=${employee.id}" title="Delete Record" data-toggle="tooltip">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>`;
                });
                $("#employee-table").html(tableContent);
                $("#no-data").hide(); // Hide the error message if data exists
                $('[data-toggle="tooltip"]').tooltip(); // Reinitialize tooltips
            } else {
                $("#employee-table").html(""); // Clear table body
                $("#no-data").show(); // Show error message
            }
        },
        error: function () {
            $("#employee-table").html(""); // Clear table
            $("#no-data").text("Error: Could not fetch data.").show(); // Show error message
        }
    });
}
