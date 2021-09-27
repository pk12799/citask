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
    <title>ShowProducts</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="row ml-4 ">
        <?php

        foreach ($results as $pd) {
        ?>
            <div class="card m-3" style="width: 22rem;">


                <div id="carouselExampleControls <?php $pd->id; ?>" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $var = 0;
                        $img = $this->User_model->imagesby($pd->id);
                        //print_r($img);
                        foreach ($img as $im) {

                            //print_r($im->prod_id);
                        ?>
                            <div class="carousel-item <?php echo $var == 0 ? 'active' : '';
                                                        ?>">
                                <img src="./assets/uploads/<?php echo $im->i_name;
                                                            ?>" class="d-block w-100 card-img-top " height="250" width="150" alt="...">
                            </div>
                        <?php $var++;
                        }
                        ?>
                    </div>

                </div>
                <!-- read more or less staret -->


                <!-- end read more or less -->
                <div class="card-body">
                    <h1>

                        <a href="product?id=<?php echo $pd->id
                                            ?>">
                            <?php echo $pd->name;
                            ?>
                        </a>
                    </h1>

                    <p class="card-text "><?php echo $pd->desc_prod; ?> </p>



                    <h4 class="card-text  fas fa-rupee-sign"><?php echo $pd->price; ?></h4>
                    <h5 class="card-text">Quantity:
                        <b class="h3"><?php echo $pd->quantity; ?></b>
                    </h5>
                    <h6 class="card-text">Type:
                        <b class=""><?php echo $pd->Prod_type; ?></b>
                    </h6>
                    <h6 class="card-text">sub Type:
                        <b class=""><?php echo $pd->sub_name; ?></b>
                    </h6>

                    <p class="card-text btn btn-danger card-link">
                        <a href="delprod?id=<?php echo $pd->id; ?>" class="btn">delete</a>
                    </p>
                    <span class="span">
                        <p class=" btn btn-primary">
                            <a href="update.php?id=<?php echo $pd->id;
                                                    ?>" class="btn text-light">update</a>
                        </p>
                    </span>
                    <p class=" ">
                        <a href="invoice.php?id=<?php echo $pd->id
                                                ?>" class="">invoice</a>
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- new car -->

        <!-- end -->

    </div>
    <nav aria-label="">
        <ul class="pagination_links">
            <?php
            echo $links;
            ?>
        </ul>
    </nav>
</body>


</html>