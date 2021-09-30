<?php
if ($this->session->login != TRUE) {
    redirect(base_url());
}
$this->load->view('nav');
// dd($prods);
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
            <form method="post" action="<?php echo base_url("updateproduct?id=$prods->id"); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product name</label>
                    <input name="name" type="text" class="form-control" value="<?= $prods->name; ?>" placeholder="Product Name">
                </div>

                <div class="form-group">
                    <select class="selectpicker form-control" name="type_id">
                        <option value="<?= $prods->type_id; ?>"> <?= $prods->Prod_type; ?></option>
                        <?php foreach ($type as $s) {
                        ?>
                            <option value="<?= $s->id; ?>"><?= $s->Prod_type; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="selectpicker form-control" name="sub_id">
                        <option value="<?= $prods->sub_id; ?>"> <?= $prods->sub_name ?> </option>
                        <?php foreach ($sub as $p) {
                        ?>
                            <option value="<?php echo $p->id; ?>"><?php echo $p->sub_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Description</label>
            <textarea class="form-control" placeholder="Product Description" name="desc_prod" rows="3"> <?= $prods->desc_prod; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Pricee</label><i class="fas fa-rupee-sign"></i>
            <input type="float" value=" <?= $prods->price; ?>" name="price" class="form-control" placeholder="Product Price">

        </div>
        <div class="form-group">
            <label for="quantity">Product Quantity</label>
            <input type="int" name="quantity" value=" <?= $prods->quantity; ?>" class="form-control" placeholder="Product Quantity">
        </div>

        <div class="form-group">
            <button type="submit" name="update_prod" class="btn btn-primary btn-block">Update Product</button>
        </div>
        </form>
    </div>
    </div>
    <script>
        CKEDITOR.replace('desc_prod');
    </script>

</body>


</html>