
                        function validateForm() {
                            var firstNameInput = document.getElementById('firstname');
                            var lastNameInput = document.getElementById('lastname');
                            var emailInput = document.getElementById('email');
                            var passwordInput = document.getElementById('password');

                            if (!validateName(firstNameInput.value)) {
                                displayError('firstnameError', 'Invalid firstname , and the name must be greater than 3 characters.');
                                return false;
                            } else {
                                clearError('firstnameError');
                            }

                            if (!validateName(lastNameInput.value)) {
                                displayError('lastnameError', 'Invalid lastname, and the name must be greater than 3 characters.');
                                return false;
                            } else {
                                clearError('lastnameError');
                            }

                            if (!validateEmail(emailInput.value)) {
                                displayError('emailError', 'Invalid email address.');
                                return false;
                            } else {
                                clearError('emailError');
                            }

                            if (!validatePassword(passwordInput.value)) {
                                displayError('passwordError', 'Invalid password. It must contain at least one digit, one lowercase and one uppercase letter, and be at least 8 characters long.');
                                return false;
                            } else {
                                clearError('passwordError');
                            }

                            return true;
                        }

                        function validateName(name) {
                            var regex = /^[A-Za-z]{4,}$/;
                            return regex.test(name);
                        }

                        function validateEmail(email) {
                            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            return regex.test(email);
                        }

                        function validatePassword(password) {
                            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                            return regex.test(password);
                        }

                        function displayError(elementId, errorMessage) {
                            var errorElement = document.getElementById(elementId);
                            errorElement.textContent = errorMessage;
                            errorElement.style.color = 'red';
                        }

                        function clearError(elementId) {
                            var errorElement = document.getElementById(elementId);
                            errorElement.textContent = '';
                        }