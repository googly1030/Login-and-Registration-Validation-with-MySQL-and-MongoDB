$(document).ready(function() {
  $("#myForm").submit(function(event) {
    // Prevent default form submission behavior
    event.preventDefault();

    // Get form data
    var formData = {
      'Username': $('input[name=Username]').val(),
      'age': $('input[name=age]').val(),
      'dob': $('input[name=dob]').val(),
      'contact': $('input[name=contact]').val(),
      'address': $('input[name=address]').val(),
      'about': $('input[name=about]').val(),


      
    };
    // Send AJAX POST request to signup.php and move to registerpage.html
    $.ajax({
      type: 'POST',
      url: 'profile.php',
      data: formData,
      dataType: 'json',
      encode: true
    })
    .done(function(data) {
      console.log(data);
      if (data.success == true) {
        window.location.href = 'login.html';
      }
      else {
        alert(data.message);
      }
    });
  });
});

  