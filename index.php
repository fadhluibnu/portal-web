<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <title>Portal Dagang</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-light bg-white fixed-top">
        <div class="container pt-2 pb-2 flex-column flex-sm-row">
            <a href="" class="navbar-brand d-none d-lg-block nav text-dark">
                Portal <span class="text-primary">Dagang</span>
            </a>
            <form class="d-flex me-2 form">
                <input class="form-control me-2" name="input" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" name="cari" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <!-- <form class="container-fluid justify-content-start"> -->
            <!-- <button href="" class="btn bg-light mt-2 mt-sm-0 me-2 user text-dark" type="button"><i class="bi bi-person me-2"></i>Username<i class="ms-2 bi bi-chevron-down"></i></button> -->
            <!-- </form> -->
            <div class="dropdown">
                <button class="btn bg-light mt-2 mt-sm-0 me-2 user text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person me-2"></i>Username
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-5 pb-5">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="bg-white">
                    menu
                </div>
            </div>
            <div class="col-8 ">
                <div class="bg-white">
                    postingn
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>