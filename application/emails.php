<?php
$this->load->view('nav');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send emails</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="container">

        <div class="form-group">
            <h3>Compose new Mails</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="to">To:</label>
                    <input name="to" type="text" class="form-control" placeholder="To">
                </div>

                <div class="form-group">
                    <input name="subject" type="text" class="form-control" placeholder="Subject">
                </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Body</label>
            <textarea class="form-control" placeholder="Product Description" name="desc" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="file">Select</label>
            <input type="file" name="upload" multiple class="form-control-file">
        </div>
        <div class="form-group">
            <button type="submit" name="Send" class="btn btn-primary btn-block">Send Mails</button>
        </div>
        </form>
    </div>
    </div>
    <script>
        CKEDITOR.replace('desc');
    </script>

</body>


</html>