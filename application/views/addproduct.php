<?php
$this->load->view('nav');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="container">

        <p><?php
            //add warnings through sessions
            if (!empty($this->session->flashdata('error'))) {
                echo ("<div class='alert alert-danger'>" . $this->session->flashdata('error') . "</div>");
            }
            ?>
            <?php
            if (!empty($this->session->flashdata('success'))) {
                echo ("<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>");
            }
            ?> </p>
        <div class="form-group">
            <form method="post" action="<?php echo base_url('addprodctsin'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Product Name">
                </div>

                <div class="form-group">
                    <select id="type_id" class="selectpicker form-control" name="type_id">
                        <option value=""> Select Product Type </option>
                        <?php foreach ($ptype['type'] as $s) {
                        ?>
                            <option value="<?php echo $s->id; ?>"><?php echo $s->Prod_type; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="selectpicker form-control" id="sub_id" name="sub_id">
                        <option value=""> Select Product sub Type </option>

                    </select>
                </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Description</label>
            <textarea class="form-control" placeholder="Product Description" name="desc_prod" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Product Price</label><i class="fas fa-rupee-sign"></i>
            <input type="number" name="price" class="form-control" placeholder="Product Price">

        </div>
        <div class="form-group">
            <label for="quantity">Product Quantity</label>
            <input type="number" name="quantity" class="form-control" placeholder="Product Quantity">
        </div>
        <div class="form-group">
            <label for="images">Select Images</label>
            <input type="file" name="upload_images[]" onchange="preview_image();" id="gallery-photo-add" multiple class="form-control-file">
            <div class="gallery"></div>
        </div>
        <div class="form-group">
            <button type="submit" name="Add_prod" class="btn btn-primary btn-block">Add Product</button>
        </div>
        </form>
    </div>
    </div>
    <script>
        CKEDITOR.replace('desc_prod');
    </script>
    <script type="text/javascript">
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#type_id').change(function() {
                // var id = document.getElementById('#type');
                // alert(id);
                var id = $('#type_id').val();
                if (id != '') {
                    $.ajax({
                        method: "POST",
                        url: '<?php echo base_url('subty') ?>',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            let html = `<option value= "">select sub type</option>`;
                            $.each(res, function(index, value) {
                                html += `<option value="${value.id}">${value.sub_name}</option>`;
                            });
                            console.log(html, 'htmlhtmlhtmlhtmlhtml')
                            $('#sub_id').html(html);
                        }
                    });
                } else {
                    $('#sub_id').html('<option value="">select type first</option>');
                }
            })
        });
    </script>

</body>


</html>