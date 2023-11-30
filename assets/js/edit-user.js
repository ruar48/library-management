console.log("Starting")
document.addEventListener('DOMContentLoaded', () => {
    let btn = document.querySelector('#btn-submit');
    btn.addEventListener('click', (event) => {
        event.preventDefault();
              const id = document.querySelector('input[id=id]').value;
              console.log(id);
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
             
              const status = document.querySelector('select[id=status]').value;
              console.log(status);
            
              var photoInput = document.querySelector('input[id=photoInput]');
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
                   $("#email-error").html("Please input Unique Email address");
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



// function isValidImageFile() {
//   var filename = $("#photoInput").val().trim();
//   var allowedExtensions = /\.(jpg|jpeg|png|gif)$/i;

//   // If no file is selected, consider it as a valid state
//   if (filename === "") {
//       $("#photo").removeClass("is-invalid").addClass("is-valid");
//       $("#photo-error").css({
//           "color": "green",
//           "font-size": "14px",
//           "display": "none"
//       });
//       return true;
//   } else if (allowedExtensions.test(filename)) {
//       // If the file has a valid extension, consider it as a valid state
//       $("#photo").removeClass("is-invalid").addClass("is-valid");
//       $("#photo-error").css({
//           "color": "green",
//           "font-size": "14px",
//           "display": "none"
//       });
//       return true;
//   } else {
//       // If the file has an invalid extension, display an error
//       $("#photo").removeClass("is-valid").addClass("is-invalid");
//       $("#photo-error").html("Please input a valid image file");
//       $("#photo-error").css({
//           "color": "red",
//           "font-size": "14px"
//       });
//       return false;
//   }
// }

function isValidStatus() {
    var selectedStatus = $("#status").val();
    var statusPattern = /^(Active|Inactive)$/i;

    if (statusPattern.test(selectedStatus)) {
        $("#status").removeClass("is-invalid").addClass("is-valid");
        $("#status-error").css({
            "color": "green",
            "font-size": "14px",
            "display": "none"
        });
        return true;
    } else {
        $("#status").removeClass("is-valid").addClass("is-invalid");
        $("#status-error").html("Please select a valid status (Active or Inactive)");
        $("#status-error").css({
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
         
            isValidStatus();
            
            // isValidImageFile();
            console.log("Before Validation");
          
            var data = new FormData(document.querySelector('#form'));

            data.append('lastName', lastName);
            data.append('firstName', firstName);
            data.append('middleName', middleName);
            data.append('email', email)
            data.append('age', age)
            data.append('gender', gender)
            
            data.append('status', status)
            // data.append('photo', photo)
            data.append('id', id)



            if (isValidFullname() && isValidEmail() && isValidAge() && isValidGender() && isValidStatus()) {
              console.log("Sending AJAX Request");
  
              $.ajax({
                  url: '../config/edit-user.php',
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
