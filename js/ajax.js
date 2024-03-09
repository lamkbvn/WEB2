$(document).ready(function () {
    $("#add_user").click(function (e) {
        e.preventDefault();
        navigate("add");
    });

    $("#edit_user").click(function (e) {
        e.preventDefault();
        navigate("edit", { id: $(this).data("id") });
    });

    $("#delete_user").click(function (e) {
        e.preventDefault();
        navigate("delete", { id: $(this).data("id") });
    });

    $("#admin").click(function (e) {
        e.preventDefault();
        navigate("admin");
    });

    function navigate(action, data) {
        $.ajax({
            url: "index.php?action=" + action,
            type: "POST",
            data: data,
            success: function (response) {
                $("#content").html(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});
