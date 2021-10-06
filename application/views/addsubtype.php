<?php
if ($this->session->login != TRUE) {
    redirect(base_url());
}

$this->load->view('nav');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Type</title>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="container">
        <p><?php
            if (!empty($this->session->flashdata('error'))) {
                echo ("<div class='alert alert-danger'>" . $this->session->flashdata('error') . "</div>");
            }
            ?>
            <?php
            if (!empty($this->session->flashdata('success'))) {
                echo ("<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>");
            }
            ?> </p>
        <div class="container">
            <form method="post" action="astype" class="row">
                <div class="form-group ml-3">
                    <select class="selectpicker form-control" name="type_id">

                        <option value=""> Select Product Type </option>
                        <?php foreach ($type as $s) {
                        ?>
                            <option value="<?php echo $s->id; ?>"><?php echo $s->Prod_type; ?></option>
                        <?php } ?>
                    </select>

                </div>
        </div>
        <div class="col-md-10 col-6 ml-2">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Product Sub Type" name="sub_name">

            </div>
            <div class="col-sm-10  col-md-6">
                <button type="submit" name="Addtype" class="btn btn-primary btn-block">Add Product sub Type</button>
            </div>
        </div>
        </form>
    </div>
    <div class="container mt-4">
        <div class=" ">
            <table id="table" class="table ml-3">
                <thead>
                    <tr>
                        <th id="id">ID</th>
                        <th id="sub_name">Name</th>
                        <th id="Prod_type">Type</th>

                    </tr>
                </thead>
                <tbody>


                </tbody>
                </tab>
        </div>
    </div>
    </div>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var data;
            var table = $('#table').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": {
                    url: "<?= base_url('datatable'); ?>",
                    type: "GET",
                    data: "<?= base_url('datatable'); ?>"
                }

            });


        });
    </script>
</body>

</html>