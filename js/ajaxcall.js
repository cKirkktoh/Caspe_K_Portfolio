(() => {
    const form = document.querySelector("#contactForm");
    const feedBack = document.querySelector("#responseMessage");

    function handleForm(event) {
        event.preventDefault(); // Prevent form from submitting normally

        const thisForm = event.currentTarget;
        const formData = new URLSearchParams();
        
        // Collect the form data
        formData.append('fname', thisForm.elements.fname.value);
        formData.append('lname', thisForm.elements.lname.value);
        formData.append('email', thisForm.elements.email.value);
        formData.append('number', thisForm.elements.number.value);
        formData.append('message', thisForm.elements.message.value);

        // Basic Validation: Check if fields are empty
        if (!thisForm.elements.fname.value || 
            !thisForm.elements.lname.value || 
            !thisForm.elements.email.value || 
            !thisForm.elements.number.value || 
            !thisForm.elements.message.value) {
            feedBack.innerHTML = '<p>All fields are required!</p>';
            return;
        }

        // Email format validation
        if (!/\S+@\S+\.\S+/.test(thisForm.elements.email.value)) {
            feedBack.innerHTML = '<p>Please enter a valid email address.</p>';
            return;
        }

        // URL for PHP file to handle form submission
        const url = "http://localhost/Caspe_K_Portfolio/adduser.php"; 

        // Send form data via fetch (POST)
        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: formData.toString()
        })
        .then(response => response.json())
        .then(responseText => {
            feedBack.innerHTML = ""; // Clear previous feedback

            if (responseText.errors) {
                // Display errors if any
                responseText.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedBack.appendChild(errorElement);
                });
            } else {
                // If successful, reset the form and display the success message
                form.reset();
                const successElement = document.createElement("p");
                successElement.textContent = responseText.message;
                feedBack.appendChild(successElement);
            }
        })
        .catch(error => {
            console.log(error);
            feedBack.innerHTML = "";
            const errorMessage = document.createElement("p");
            errorMessage.textContent = "Oops, something went wrong. Please try again later.";
            feedBack.appendChild(errorMessage);
        });
    }

    form.addEventListener("submit", handleForm);
})();
