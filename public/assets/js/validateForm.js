
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector(".addcat");
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Perform form validation
            var nameInput = document.getElementById('editName');
            var nameValue = nameInput.value.trim();
            var errorElement = document.getElementById('errorMessage');
            if (nameValue === '') {
                errorElement.innerText = "Please fill in input";
                return;
            }
            errorElement.innerText = '';
            form.submit();
        });
    });

