document.addEventListener('DOMContentLoaded', () => {
    let btn = document.querySelector('#btn-submit')
        btn.addEventListener('click', (event) => {
            event.preventDefault();

            const bookTitle = document.querySelector('input[id=bookTitle]').value;
           
            console.log(bookTitle);
            const authorName = document.querySelector('input[id=authorName]').value;
        
            console.log(authorName);
            const datePublish = document.querySelector('input[id=datePublish]').value;
         
            console.log(datePublish);
            const copies = document.querySelector('input[id=copies]').value;
            console.log(copies);
            const description = document.querySelector('textarea[id=description]').value;
            console.log(description); 
           
            var photoInput = document.querySelector('input[id=photo]');
            
            var photo = photoInput.files[0];
            console.log(photo);

            var data = new FormData(document.querySelector('form'));

            data.append('bookTitle', bookTitle);
            data.append('authorName', authorName);
            data.append('datePublish', datePublish);
            data.append('copies', copies)
            data.append('description', description)
            data.append('photo', photo)



            function isValidBookTitle() {
                var bookTitle = $("#bookTitle").val();
                var titlePattern = /^[a-zA-Z0-9\s]+$/;
            
                if (titlePattern.test(bookTitle)) {
                    $("#bookTitle").removeClass("is-invalid").addClass("is-valid");
                    $("#bookTitle-error").css({
                        "color": "green",
                        "font-size": "14px",
                        "display": "none"
                    });
                    return true;
                } else {
                    $("#bookTitle").removeClass("is-valid").addClass("is-invalid");
                    $("#bookTitle-error").html("Please enter a valid book title");
                    $("#bookTitle-error").css({
                        "color": "red",
                        "font-size": "14px"
                    });
                    return false;
                }
            }

            function isValidAuthorName() {
                var authorName = $("#authorName").val();
                // You can adjust the pattern based on your requirements
                var authorPattern = /^[a-zA-Z\s]+$/;
            
                if (authorPattern.test(authorName)) {
                    $("#authorName").removeClass("is-invalid").addClass("is-valid");
                    $("#authorName-error").css({
                        "color": "green",
                        "font-size": "14px",
                        "display": "none"
                    });
                    return true;
                } else {
                    $("#authorName").removeClass("is-valid").addClass("is-invalid");
                    $("#authorName-error").html("Please enter a valid author name");
                    $("#authorName-error").css({
                        "color": "red",
                        "font-size": "14px"
                    });
                    return false;
                }
            }
            function isValidPublishDate() {
                var datePublish = $("#datePublish").val();
              
            
                if (datePublish == "") {
                    $("#datePublish").removeClass("is-valid").addClass("is-invalid");
                    $("#datePublish-error").html("Please enter a valid publish date (YYYY MM DD)");
                    $("#datePublish-error").css({
                        "color": "red",
                        "font-size": "14px"
                    });
                    return false;
                } else {
                   
                    $("#datePublish").removeClass("is-invalid").addClass("is-valid");
                    $("#datePublish-error").css({
                        "color": "green",
                        "font-size": "14px",
                        "display": "none"
                    });
                    return true;
                }
            }
            
            
            function isValidNumberOfCopies() {
                var copies = $("#copies").val();
                var numberPattern = /^\d+$/;
            
                if (numberPattern.test(copies) && parseInt(copies) > 0 && parseInt(copies) <= 20) {
                    $("#copies").removeClass("is-invalid").addClass("is-valid");
                    $("#copies-error").css({
                        "color": "green",
                        "font-size": "14px",
                        "display": "none"
                    });
                    return true;
                } else {
                    $("#copies").removeClass("is-valid").addClass("is-invalid");
                    $("#copies-error").html("Please enter a valid positive number of copies (up to 20)");
                    $("#copies-error").css({
                        "color": "red",
                        "font-size": "14px"
                    });
                    return false;
                }
            }
            
            function isValidDescription() {
                var description = $("#description").val();
            
                if (description === "") {
                    $("#description").removeClass("is-valid").addClass("is-invalid");
                    $("#description-error").html("Required description");
                    $("#description-error").css({
                        "color": "red",
                        "font-size": "14px"
                    });
                    return false;
                } else {
                    $("#description").removeClass("is-invalid").addClass("is-valid");
                    $("#description-error").css({
                        "color": "green",
                        "font-size": "14px",
                        "display": "none"
                    });
                    return true;
                }
            }
            
            
            
            
            function isValidImageFile() {
                var filename = $("#photo").val().trim();
                var allowedExtensions = /\.(jpg|jpeg|png|gif)$/i;
              
                // If no file is selected, consider it as a valid state
                if (filename === "") {
                    $("#photo").removeClass("is-valid").addClass("is-invalid");
                    $("#photo-error").html("Please input a image file");
                    $("#photo-error").css({
                        "color": "red",
                        "font-size": "14px"
                    });
                    return false;
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
            isValidAuthorName();
            isValidBookTitle();
            isValidDescription();
            isValidImageFile();
            isValidNumberOfCopies();
            isValidPublishDate();


            if(isValidAuthorName() && isValidBookTitle() && isValidDescription() && isValidImageFile && isValidNumberOfCopies() && isValidPublishDate){

                $.ajax({
                    url: '../config/add-book.php',
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