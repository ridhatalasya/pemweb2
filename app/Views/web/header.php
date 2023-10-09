<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <style>
    .navbar {
        background-color: #11999E;
    }

    .navbar a.navbar-brand,
    .navbar a.nav-link {
        color: #FFFFFF;
    }

    .navbar a.navbar-brand:hover,
    .navbar a.nav-link:hover {
        color: #E0DBD1;
    }

    .navbar .btn-outline-success {
        background-color: #057D8C;
        border-color: #057D8C;
        color: #FFFFFF;
    }

    .navbar .btn-outline-success:hover {
        background-color: #4EBDC4;
        /* Different color on hover */
        border-color: #4EBDC4;
        /* Optional: Set border color to match */
        color: #FFFFFF;
        /* White font color for contrast */
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">ADAEVENT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-2">
                <input class="form-control mr-sm-2" type="search" style="width:500px;" placeholder="Cari eventmu disini"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Buat Event <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Daftar Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Daftar</a>
                </li>
            </ul>
        </div>
    </nav>