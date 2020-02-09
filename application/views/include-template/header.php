<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload File In Codeigniter With ProgressBar</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form-upload.css');?>">
    <script src="<?php echo base_url('assets/file_upload.js'); ?>"></script>

    <script type="text/javascript">
    $(document).ready(function() { 
       $('#imageupload').submit(function(e) { 
        if($('#image_up_id').val()) {
          e.preventDefault();

          $("#progress-bar-status-show").width('0%');
          var file_details    =   document.getElementById("image_up_id").files[0];
          var extension       =   file_details['name'].split(".");
          
       

          

          if(file_details['size'] > 9999999999999999999)
          {
            alert('Please upload a file less than 2 MB');
            return false;
          }
          else
          { 
            if(file_details['size'] < 9999999999999999999)
            {
              $('#loader').show();
              $(this).ajaxSubmit({ 
                target:   '#toshow', 
                beforeSubmit: function() {
                  $("#progress-bar-status-show").width('0%');
                },
                uploadProgress: function (event, position, total, percentComplete){ 
                  $("#progress-bar-status-show").width(percentComplete + '%');
                  $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete +' %</div>');               
                },
                success:function (){
                  $('#loader').hide();
                  $('#imageDiv').show();
                  var url = $('#toshow').text();
                  var img = document.createElement("IMG");
                  img.src = url;
                  img.height = '100';
                  img.width  = '150';
                  document.getElementById('imageDiv').appendChild(img);             
                },
                resetForm: true 
              }); 
              return false;
            }   
          }    
        }
      });
    }); 
    </script>
  </head>
  
  <body>

  <div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="http://www.onlinestudys.com" class="navbar-brand">ONLINESTUDYS.COM</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.onlinestudys.com">Home</a></li>
           
          </ul>
         
        </div>
      </div>
    </div>
    <!-- nvaigation end -->
