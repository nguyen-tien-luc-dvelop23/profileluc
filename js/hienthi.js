<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submit").addEventListener("click", function() {
        var form = document.getElementById("contact-form");

        // Gửi dữ liệu biểu mẫu bằng AJAX
        fetch(form.action, {
            method: "POST",
            body: new FormData(form)
        })
        .then(function(response) {
            if (response.ok) {
                // Hiển thị thông báo thành công
                document.getElementById("success-message").style.display = "block";
                // Reset form
                form.reset();
            } else {
                throw new Error("Network response was not ok");
            }
        })
        .catch(function(error) {
            console.error("There was a problem with your fetch operation:", error);
        });
    });
});
</script>
