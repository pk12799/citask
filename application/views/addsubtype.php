<?php
if ($this->session->login != TRUE) {
    redirect(base_url());
}
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
    <?php
    $this->load->view('nav');
    ?>
    <div class=" container">
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
        <form method="post" action="atype" class="row">

            <div class="col-md-10 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Product Sub Type" name="sub_name">

                </div>
                <div class="col-4">
                    <button type="submit" name="Addtype" class="btn btn-primary btn-block">Add Product Type</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class=" ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($type as $tp) { ?>
                        <tr class=''>
                            <td scope='row '> <?php echo $tp->id;  ?></td>
                            <td scope='row'><?php echo $tp->sub_name;  ?> </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>