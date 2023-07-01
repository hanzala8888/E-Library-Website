document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    // Display form values
    var result = document.getElementById("result");
    result.innerHTML = "<p><strong>Name:</strong> " + name + "</p>" +
                       "<p><strong>Email:</strong> " + email + "</p>" +
                       "<p><strong>Message:</strong> " + message + "</p>";
  });