<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>White Feathers Jewellery</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            color: #428CC6;
        }
        body{
            height: 100vh;
            overflow: hidden;
            font-family: "Bricolage Grotesque", sans-serif;
        }

        .card {
            border: 1px solid #428CC6;
            border-radius: 10px;
            margin: 20px 30px;
            padding: 20px;
            height: 85%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .row {
            display: flex;
            gap: 20px;
            justify-content: space-between;
            margin-bottom: 30px;
            align-items: center;
            text-align: center;
        }

        .row.vertical {
            flex-direction: column;
            justify-content: space-evenly;
        }

        .row.evenly {
            justify-content: space-evenly;
        }

        .col {
            width: 50%;
        }

        .text {
            font-size: 40px;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: capitalize;
            margin-bottom: 30px;
        }

        .subText {
            font-size: 20px;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .social {
            font-size: 40px;
        }

        .bg-image {}

        @media screen and (max-width: 768px) {
            .bg-image {
                background: linear-gradient(to left, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url('assets/images/underM.jpg');
                background-size: cover;
                object-fit: cover;
                background-repeat: no-repeat;
            }

            .col.image {
                display: none;
            }

            .col {
                width: 100%;
            }
        }
        @media screen and (max-width: 500px) {
.text{
    font-size: 30px;
}
.subText{
    font-size:14px;
}
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="row" style="margin-bottom:30px;">
            <div class="col">
                <img src="assets/images/wflogo.png" width="200px" />
            </div>
        </div>
        <div class="row">
            <div class="col bg-image">
                <div class="row vertical">
                    <div class="text">
                        Website is under maintenance!!!
                    </div>
                    <div class="row evenly">
                        <div class="col">
                            <a class="social" href="https://www.facebook.com/share/1AB77U7eSM/?mibextid=wwXIfr"
                                target="_blank">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a class="social"
                                href="https://www.instagram.com/whitefeathersjewellery?igsh=N2FlbTlwZmk1NXU2"
                                target="_blank">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a class="social"
                                href="https://www.tiktok.com/@whitefeatherjewellery?is_from_webapp=1&sender_device=pc">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="subText">
                        Feel free to visit our socials for any inquiry
                    </div>
                </div>
            </div>
            <div class="col image">
                <img src="assets/images/underM.jpg" width="100%" style="aspect-ratio:7/4" />
            </div>
        </div>
    </div>
</body>

</html>