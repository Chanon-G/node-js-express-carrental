<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // File upload via Ajaxi images
            $("#uploadForm").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete+'%');
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: 'upload.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $(".progress-bar").width('0%');
                        $('#uploadStatus').html('<img src="images/loading.gif"/>');
                    },
                    error:function(){
                        $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                    },
                    success: function(resp){
                        if(resp == 'ok'){
                            $('#uploadForm')[0].reset();
                            $('#uploadStatus').html('<p  style="color:#28A74B;">File has uploaded successfully!</p>');
                        }else if(resp == 'err'){
                            $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                        }
                    }
                });
            });
            
            // File type validation
            $("#fileInput").change(function(){
                var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                var file = this.files[0];
                var fileType = file.type;
                if(!allowedTypes.includes(fileType)){
                    alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
                    $("#fileInput").val('');
                    return false;
                }
            });
        });
        </script>
</head>
<body>
    <div class="container">
        <div class="upload-div">

            <form id="uploadForm" enctype="multipart/form-data">
                <label>Choose File:</label>
                <input type="file" name="image" id="fileInput">
                <input type="submit" name="submit" value="UPLOAD"/>
            </form>

            <!-- Progress bar -->
            <div class="progress">
                <div class="progress-bar"></div>
            </div>

            <!-- Display upload status -->
            <div id="uploadStatus"></div>
        </div>
    </div>
</body>
</html>