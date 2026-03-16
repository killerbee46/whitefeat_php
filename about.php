<?php {
    /* INITIALIZING GLOBAL VARIABLES FOR CUSTOMERS & COOKIES, SETS VALUE FROM ajax_cookie.php page */
    $customer = '0';
    $cookid = '0';
    $newuser = '1';
    /* CONNECTING DATABASE */
    include 'db_connect.php';
    /* CHECKING COOKIE & SET NEW IF NOT FOUND IN BROWSER */
    include 'ajax_cookie.php';
    /* FOR CREATING SEO FRIENDLY URLS */
    include_once('make_url.php'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Cache-control" content="public">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About || White Feather's Jewellery</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?PHP /* LOADING REQUIRED CSS */ ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/css.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
            integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?PHP /* END => LOADING REQUIRED CSS */ ?>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
        <style id="antiClickjack">
            body {
                display: none !important;
            }
        </style>

        <style>
            .about_container {
                margin: 30px 0;
                display: flex;
                flex-direction: column;
                gap:30px
            }

            .about_item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 40px;
            }

            .about_item .item {
                width: 100%;
            }

            .about_item .item.half {
                width: 50%;
            }

            .about_item .item.big {
                width: 60%;
            }

            .about_item .item.small {
                width: 40%;
            }

            .about_item .item.extra_small {
                width: 30%;
            }

            .about_info {
                display: flex;
                gap:10px;
                flex-direction: column;
                justify-content: center;
                align-items: center
            }

            .about_info .title{
                text-align: center;
            }

            .about_item .about_image {
                background: url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/store.jpg');
                background-size: cover;
                background-position: center;
                object-fit: cover;
                background-repeat: no-repeat;
                margin: 30px;
                aspect-ratio: 1/1;
            }

            .about_item .about_images {
                margin: 30px;
                width: 100%;
                aspect-ratio: 1/1;
                position: relative;
            }

            .about_item .about_images .img {
                width: 40%;
                height: 70%;
                position: absolute;
                right: 25%;
                background-size: cover !important;
                background-position: center !important;
                object-fit: cover !important;
                background-repeat: no-repeat !important;
            }

            .about_item .about_images .img.down {
                background: url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/IMG_5424.JPG');
                bottom: 0;
                right: 50%;
                z-index: 10;
            }

            .about_item .about_images .img.up {
                background: url('https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/IMG_4771.JPG');
            }

            .about_info .title {
                margin: 10px 0 20px 0;
                font-size: 24px;
            }

            .about_info .description {
                font-size: 18px;
                text-align: center;
                letter-spacing: 0.06rem;
            }

            .about_info .description p {
                margin: 10px;
            }

            @media screen and (max-width: 768px) {
                .about_item{
                    flex-direction: column;
                }
                .about_item .item{
                    width: 100% !important;
                }
            }
        </style>

        <!-- clickjacking prevention -->
        <script type="text/javascript">
            if (self === top) {
                var antiClickjack = document.getElementById("antiClickjack");
                var intruder = document.getElementById("intruder");
                antiClickjack.parentNode.removeChild(antiClickjack);
            } else {
                top.location = self.location;
            }
        </script>
    </head>

    <body style="letter-spacing:0.02em;">
        <?php /* CONTAINS MENU */ include('header.php');
        $bannerBg = "https://imgs.search.brave.com/Eb3X0P1LbSx7kz23uiJS_80BMgA0YcJ45LLKiACGGOA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMudmVjdGVlenku/Y29tL3N5c3RlbS9y/ZXNvdXJjZXMvdGh1/bWJuYWlscy8wNjYv/MDY2LzgyNy9zbWFs/bC9lbGVnYW50LXNp/bHZlci1qZXdlbHJ5/LXJlc3Rpbmctb24t/c29mdC1mYWJyaWMt/aW4tYS13ZWxsLWxp/dC1zZXR0aW5nLWR1/cmluZy1kYXlsaWdo/dC1ob3Vycy1waG90/by5qcGVn";
        ?>


        <div class="about_section mt-3">
            <div class="about_banner" style="
            background:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),url('<?= $bannerBg ?>');
            background-repeat:no-repeat;
            background-size:cover;
            background-position:center;
            width:100%;
            aspect-ratio:7/2;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            font-size:30px;
            color:white;
            font-weight:700;
            ">
                <div>About Us</div>
                <!-- <div style="font-weight:500;font-size:16px;color:gainsboro;">White Feather's Jewellery</div> -->
            </div>
            <div class="container">
                <div class="about_container">
                    <div class="about_item">
                        <div class="about_info">
                            <div class="description">
                                <p>
                                    White Feathers Jewellery is a harmonious blend of classic elegance and contemporary
                                    flair,
                                    transcending boundaries
                                    and appealing to the modern-day connoisseur. From delicate necklaces that grace to
                                    dazzling
                                    earrings that catch the
                                    light with every moment, each creation embodies a sense of refined sophistication. It
                                    was
                                    established in 2017 as a
                                    wholesale & retail business. It was the first jewellery business to start the online
                                    culture.
                                    Exporting authentic jewelleries
                                    to 65 different districts all over Nepal since 2017 and also in different parts of the
                                    world. We
                                    have handmade & best
                                    craftsmanship exclusive jewellery.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="about_item">
                        <div class="item small">
                            <div class="about_image">
                            </div>
                        </div>
                        <div class="about_info item big">
                            <div class="title">White Feather’s Goal</div>
                            <div class="description">
                                <p>
                                    Expanding the product range to cater to various
                                    customer preferences and price points is essential.
                                    Offering a diverse selection of jewelry, from everyday
                                    pieces to statement designs, can attract a broader
                                    customer base.
                                </p>
                                <p>
                                    Establishing a strong online presence is crucial in
                                    today’s digital age. Goals may include developing a
                                    user-friendly website, utilizing e-commerce
                                    platforms, and engaging on social media to reach a
                                    wider audience.
                                </p>
                                <p>
                                    Educating customers about jewelry materials, care,
                                    and value can,build trust and loyalty. Establishing
                                    the business as an authority on jewelry can lead to
                                    increased customer confidence in their purchases.
                                </p>
                                <p>
                                    Striving for excellent customer service can set a
                                    jewelry business apart from competitors.
                                    Addressing customer inquiries promptly and
                                    resolving issues efficiently can enhance customer
                                    satisfaction.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="about_item">
                        <div class="about_info item half">
                            <div class="title">
                                White Feather’s Vision
                            </div>
                            <div class="description">
                                <p style="text-align:left">
                                    White Feather’s Jewellery was mainly established to make
                                    online jewellery shopping hassle free and convenient for
                                    customer. We are always focused on designing and
                                    creating jewelry that exceeds our customer's expectations
                                    in quality, value, and service in reliable price. Our website is
                                    designed to bridge the vast gap between the virtual and
                                    the physical world. This has been attained with the help of
                                    the Virtual Try-on feature that permits the users to virtually
                                    put on 1000s of earrings to see just how they look when
                                    placed on the ears. As well as yothe users can customize
                                    their own jewelries
                                </p>
                            </div>
                        </div>
                        <div class="item small">
                            <div class="about_images">
                                <div class="img down"></div>
                                <div class="img up"></div>
                            </div>
                        </div>
                    </div>
                    <div class="about_item">
                        <div class="about_info">
                            <div class="title">
                                White Feather’s <br />
                                Online Jewellery Store
                            </div>

                            <div class="description">
                                <p>
                                    White Feathers Jewellery is a harmonious blend of classic elegance and contemporary
                                    flair,
                                    transcending boundaries
                                    and appealing to the modern-day connoisseur. From delicate necklaces that grace to
                                    dazzling
                                    earrings that catch the
                                    light with every moment, each creation embodies a sense of refined sophistication. It
                                    was
                                    established in 2017 as a
                                    wholesale & retail business. It was the first jewellery business to start the online
                                    culture.
                                    Exporting authentic jewelleries
                                    to 65 different districts all over Nepal since 2017 and also in different parts of the
                                    world. We
                                    have handmade & best
                                    craftsmanship exclusive jewellery.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?PHP /*-- BODY SECTION END --*/ ?>


        <?PHP /* JEQUERY LOAD  */ ?>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <?PHP /* OWL CAROUSEL JS FILE LOAD  */ ?>
        <script src="assets/owl/owl.carousel.min.js"></script>


        <?php
        /* SHOWING COOKIE NOTICE FOR FIRST NEW WEBSITE VISITOR START */
        if ($newuser == 1) {
            echo '<div class="notification is-info is-light is-fullwidth" style="position:fixed; z-index:1111; bottom:-25px; width:100%;">
  <button class="delete"></button>
  We use cookies to <strong>collect data</strong> for providing you better product viewing experience, by closing this dialog you accept with our <a href="#"><strong>content policy</strong></a>

</div>';
        }
        /* SHOWING COOKIE NOTICE FOR FIRST NEW WEBSITE VISITOR END */
        ?>

        <?PHP /* COOKIE NOTIFICATION JS HANDLER START */ ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                    const $notification = $delete.parentNode;

                    $delete.addEventListener('click', () => {
                        $notification.parentNode.removeChild($notification);
                    });
                });
            });
        </script>
        <?PHP /* COOKIE NOTIFICATION JS HANDLER START */ ?>



        <?php /* CONTAINS MENU */ include('footer.php'); ?>
        <?php /* CONTAINS DEPENDENT JS FILES LINKS + SCRIPTS */ include('js.php'); ?>

    </body>

    </html>
<?php } ?>