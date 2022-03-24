<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">

    <style>
        #user-details img {
            width: 110px;
            height: 90px;
        }

        #user-details .card-footer {
            width: 110px;
            font-size: 14px;
            /* white-space: nowrap; */
        }

        .dropdown-toggle::after {
            display: none;
        }
        .profile_page .card{
            display: flex;
            max-height: 100%;
            justify-content: center;
            align-items: center;
        }
        .profile-page img{
            width: 130px;
            height: 130px;
            top: -65px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 50%;
        }
        img.navbar-profile{
            width: 40px;
            height: 40px;
        }
        .home .card-text{
            height: 150px;
            max-lines: 10;
            line-height: 26px;
            overflow-y: scroll;
        }
        .home .add-story{
            height: 487px;
        }
        .home .created_by{
            background-color: rgba(0, 0, 0, 0.50);
            width: 100%;
            display: none;
        }
        .home .card:hover .created_by{
            display: block;
        }
    </style>
</head>

<body>