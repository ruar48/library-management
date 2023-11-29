
    document.addEventListener('DOMContentLoaded', () => {
      let btn = document.querySelector('#btn-submit')
          btn.addEventListener('click', (event) => {
              event.preventDefault();

              const lastName = document.querySelector('input[id=lastName]').value;
             
              console.log(lastName);

              const firstName = document.querySelector('input[id=firstName]').value;
          
              console.log(firstName);
              const middleName = document.querySelector('input[id=middleName]').value;
           
              console.log(middleName);
              const email = document.querySelector('input[id=email]').value;
              console.log(email);
              const age = document.querySelector('input[id=age]').value;
              console.log(age); 
              const gender = document.querySelector('select[id=gender]').value;
              console.log(gender);
              const role = document.querySelector('select[id=role]').value;
              console.log(role);
              const password = document.querySelector('input[id=password]').value;
              console.log(password); 
              const repeatPass = document.querySelector('input[id=repeat]').value;
              console.log(repeatPass); 
              var photoInput = document.querySelector('input[id=photo]');
var photo = photoInput.files[0];

              console.log("Before Validation");
              function isValidFullname() {
                var pattern = /^[a-zA-Z ]+$/;
                var lastname = $("#lastName").val();
                var firstname = $("#firstName").val();
                var middlename = $("#middleName").val();

                if (pattern.test(lastname) && pattern.test(firstname) && (middlename === "" || pattern.test(middlename))) {
                  $("#lastName, #firstName, #middleName").removeClass("is-invalid").addClass("is-valid");
                  $("#lastNameError, #firstNameError, #middleNameError").css({
                    "color": "green",
                    "font-size": "14px",
                    "display": "none"
                  });
                  return true;
                } else {
                  $("#lastName, #firstName").removeClass("is-valid").addClass("is-invalid");
                  $("#lastNameError, #firstNameError").html("Required Field");
                  $("#lastNameError, #firstNameError").css({
                    "color": "red",
                    "font-size": "14px"
                  });
                  return false;
                }
              }
              


              function isValidAge() {
                var age = $("#age").val();
                var agePattern = /^[1-9][0-9]*$/;
              
                if (agePattern.test(age)) {
                  $("#age").removeClass("is-invalid").addClass("is-valid");
                  $(".age-error").css({
                    "color": "green",
                    "font-size": "14px",
                    "display": "none"
                  });
                  return true;
                }else if(age === ""){
                    $("#age").removeClass("is-valid").addClass("is-invalid");
                    $("#age-error").html("Required age");
                    $("#age-error").css({
                      "color": "red",
                      "font-size": "14px"
                    });
                    return false;
                } else {
                  $("#age").removeClass("is-valid").addClass("is-invalid");
                  $("#age-error").html("Invalid Age");
                  $("#age-error").css({
                    "color": "red",
                    "font-size": "14px"
                  });
                  return false;
                }
              }
              
           function isValidEmail(){
             
                 var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
                 var email_address = $("#email").val().trim();
                 if(pattern.test(email_address) && email_address !== ""){
                    $("#email").removeClass("is-invalid").addClass("is-valid");
                    $(".email-error").css({
                     "color": "green",
                     "font-size": "14px",
                     "display": "none"
                   });
                    return true;

                 }else if(email_address === ""){
                   $("#email").removeClass("is-valid").addClass("is-invalid");
                   $("#email-error").html("Required Email address");
                     $("#email-error").css({
                       "color": "red",
                       "font-size": "14px"
                     });
                 }else{
                   $("#email").removeClass("is-valid").addClass("is-invalid");
                   $("#email-error").html("Please input Unique Email Address");
                     $("#email-error").css({
                     "color": "red",
                     "font-size": "14px",
                     "display": "block"
                   });

                 };

              }
              function isValidGender() {
                var gender = $("#gender").val();
                var genderPattern = /^(Male|Female)$/i;
              
                if (genderPattern.test(gender)) {
                  $("#gender").removeClass("is-invalid").addClass("is-valid");
                  $("#gender-error").css({
                    "color": "green",
                    "font-size": "14px",
                    "display": "none"
                  });
                  return true;
                } else {
                  $("#gender").removeClass("is-valid").addClass("is-invalid");
                  $("#gender-error").html("Pleaser Select Gender");
                  $("#gender-error").css({
                    "color": "red",
                    "font-size": "14px"
                  });
                  return false;
                }
              }
              
              function isValidRole() {
                var selectedRole = $("#role").val();
                var rolePattern = /^(Admin|Staff)$/i;
              
                if (rolePattern.test(selectedRole)) {
                  $("#role").removeClass("is-invalid").addClass("is-valid");
                  $("#role-error").css({
                    "color": "green",
                    "font-size": "14px",
                    "display": "none"
                  });
                  return true;
                } else {
                  $("#role").removeClass("is-valid").addClass("is-invalid");
                  $("#role-error").html("Please select a valid role (Admin or Staff)");
                  $("#role-error").css({
                    "color": "red",
                    "font-size": "14px"
                  });
                  return false;
                }
              }
              

function isValidPassword() {
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

  var password = $("#password").val();
  var reEnterPassword = $("#repeat").val();

  // Check if the password matches the pattern
  if (passwordPattern.test(password)) {
    $("#password").removeClass("is-invalid").addClass("is-valid");
    $(".password-error").css({
      "color": "green",
      "font-size": "14px",
      "display": "none"
    });
    

                // Check if the re-entered password matches the original password
                if (password === reEnterPassword) {
                $("#repeat").removeClass("is-invalid").addClass("is-valid");
                $("#reEnterPassword-error").css({
                    "color": "green",
                    "font-size": "14px",
                    "display": "none"
                });
                return true;
            } else if (reEnterPassword === "") {
                $("#repeat").removeClass("is-valid").addClass("is-invalid");
                $("#reEnterPassword-error").html("Re-enter the passwords");
                $("#reEnterPassword-error").css({
                  "color": "red",
                  "font-size": "14px"
                });
                return false;
              } else {
                $("#repeat").removeClass("is-valid").addClass("is-invalid");
                $("#reEnterPassword-error").html("Passwords do not match");
                $("#reEnterPassword-error").css({
                    "color": "red",
                    "font-size": "14px"
                });
                return false;
                }
  } else {
    // Display an error if the password doesn't meet the criteria
    $("#password").removeClass("is-valid").addClass("is-invalid");
    $("#password-error").html("Invalid password format");
    $("#password-error").css({
      "color": "red",
      "font-size": "14px"
    });
    return false;
  }
}


function isValidImageFile() {
  var filename = $("#photo").val().trim();
  var allowedExtensions = /\.(jpg|jpeg|png|gif)$/i;

  // If no file is selected, consider it as a valid state
  if (filename === "") {
      $("#photo").removeClass("is-invalid").addClass("is-valid");
      $("#photo-error").css({
          "color": "green",
          "font-size": "14px",
          "display": "none"
      });
      return true;
  } else if (allowedExtensions.test(filename)) {
      // If the file has a valid extension, consider it as a valid state
      $("#photo").removeClass("is-invalid").addClass("is-valid");
      $("#photo-error").css({
          "color": "green",
          "font-size": "14px",
          "display": "none"
      });
      return true;
  } else {
      // If the file has an invalid extension, display an error
      $("#photo").removeClass("is-valid").addClass("is-invalid");
      $("#photo-error").html("Please input a valid image file");
      $("#photo-error").css({
          "color": "red",
          "font-size": "14px"
      });
      return false;
  }
}

  

            isValidFullname();
            isValidEmail();
            isValidAge();
            isValidGender();
            isValidRole();
            isValidPassword();
            isValidImageFile();
            console.log("Before Validation");
          
            var data = new FormData(document.querySelector('form'));

            data.append('lastName', lastName);
            data.append('firstName', firstName);
            data.append('middleName', middleName);
            data.append('email', email)
            data.append('age', age)
            data.append('gender', gender)

            data.append('role', role)
            data.append('password', password)
            data.append('photo', photo)



            if (isValidFullname() && isValidEmail() && isValidAge() && isValidGender() && isValidRole() && isValidPassword() && isValidImageFile()) {
              console.log("Sending AJAX Request");
  
              $.ajax({
                  url: '../config/add-staff.php',
                  type: "POST",
                  data: data,
                  processData: false,
                  contentType: false,
                  async: false,
                  cache: false,
                  success: function(res) {
                      console.log('==================res===========');
                      console.log(res);
                      $('#msg').html(res);
                  },
                  error: function(res) {
                      console.error("Failed Insert:", res);
                      alert("Failed")

                  }
              });
          }
          

           });
     });