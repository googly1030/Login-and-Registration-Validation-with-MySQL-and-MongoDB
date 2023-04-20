$(document).ready(function() {
  $("#myForm").submit(function(event) {
    // Prevent default form submission behavior
    event.preventDefault();

    // Get form data
    var formData = {
      'Email': $('input[name=Email]').val(),
      'password': $('input[name=password]').val(),
      
    };
    // Send AJAX POST request to signup.php and move to registerpage.html
    $.ajax({
      type: 'POST',
      url: 'login.php',
      data: formData,
      dataType: 'json',
      encode: true
    })
    .done(function(data) {
      console.log(data);
      if (data.success == true) {
        window.location.href = 'profile.html';
      }
      else {
        alert(data.message);
      }
    });
  });
});


