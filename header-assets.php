<?php ?>

<head>
    <script type="text/javascript" src="./assets/v2/js/index.js"> </script>
    <script type="text/javascript">

        function selectHandler(val) {
            const vv = val === 'npr' ? 1 : val === "aud" ? 2 : val === "usd" ? 3 : val === "eur" ? 4 : 1
            $.ajax({
                url: "changecurrency.php?val=" + vv, type: 'GET', cache: false,
                success: function () {
                    location.reload();
                }
            });
        }

        function openDrawer(drawerId) {
            console.log(drawerId, "clicked")
            document.getElementById('menu-toggle').style.display = 'none'
            document.getElementById('drawer-close-toggle').innerHTML = `<image class="icons" onclick="closeDrawer('${drawerId}')" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/close.png" alt="menu icon" />`;
            document.getElementById(drawerId).classList.add('open')
        }

        function closeDrawer(drawerId) {
            document.getElementById('drawer-close-toggle').innerHTML = ``;
            document.getElementById(drawerId).classList.remove('open')
            document.getElementById('menu-toggle').style.display = 'block'
        }
    </script>
    <script>
         window.addEventListener("load", function() {
        document.getElementById("loader").style.display = "none";
    });
    </script>
    <style id="antiClickjack">
        body {
            display: none !important;
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
    <style>
        * {
            box-sizing: border-box;
            font-family: "Mulish", sans-serif;
            font-optical-sizing: auto;
        }

        #loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(10px);   /* Blur effect */
        background: rgba(255, 255, 255, 0.3); /* Slight white tint */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        transition: opacity 0.5s ease;
    }

    /* Spinner */
    .spinner {
        width: 60px;
        height: 60px;
        border: 6px solid #ddd;
        border-top-color: #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    /* Animation */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    #loader.fade-out {
        opacity: 0;
        pointer-events: none;
    }

        /* primary-color:#3892C6 */

        /* predefined */

        .button {
            height: unset;
            padding: 8px 15px;
            background: white;
            border: 2px solid black;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
        }

        .rounded {
            border-radius: 8px;
        }

        .button.primary {
            background: #3892C6;
            color: white;
            border: 2px solid #3892C6;
        }

        .button.primary:hover {
            background: white;
            color: #3892C6;
            border: 2px solid #3892C6;
        }

        .button.secondary {
            background: gray;
            color: white;
            border: 2px solid gray;
        }

        .button.secondary:hover {
            background: white;
            color: gray;
            border: 2px solid gray;
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            text-transform: capitalize;
            margin: 5px;
        }

        .description {
            font-size: 16px;
            margin: 5px;
            margin-bottom: 15px;
        }

        .flex {
            display: flex;
            width: 100%;
        }

        .menu-sub-cat-flex .overlay-menu-list {
            margin-top: -20px;
        }

        .menu-sub-cat-flex {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .gifting-sub-menu {
            display: flex;
            gap: 50px;
            flex-wrap: wrap;
        }

        .gifting-sub-menu a.item {
            text-decoration: none;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .gifting-sub-menu a.item:hover {
            font-weight: 600;
        }

        .gifting-sub-menu a.item:hover img {
            transform: scale(1.1)
        }

        .gifting-sub-menu .cat-image {
            width: 80px;
            aspect-ratio: 5/4;
        }

        .col-9 {
            width: 75%;
        }

        .col-8 {
            width: 60%;
        }

        .col-4 {
            width: 40%;
        }

        .col-6 {
            width: 50%;
        }

        .col-3 {
            width: 25%;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-evenly {
            justify-content: space-evenly;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .align-center {
            align-items: center;
        }

        /* navbar  */

        .navigation-bar {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 12;
            -webkit-box-shadow: 0px 1px 5px 1px rgba(125, 121, 121, 0.32);
        }

        .navbar>div {
            display: flex;
            padding: 0 20px;
            gap: 10px;
            justify-content: space-between;
            align-items: center;
        }

        .menu-drawer-toggle {
            margin-top: -8px;
        }

        .logo-menu-container {
            width: 60%;
        }

        .slide_viewer {
            margin-top: 12px !important;
        }

        .search-info-container {
            width: 40%;
        }

        .logo {
            width: 150px;
            aspect-ratio: 7/2;
            margin-right: 20px;
        }

        .menus {
            display: flex;
            gap: 10px;
            margin-bottom: -25px;
        }

        .menu-items {
            text-transform: uppercase;
            font-size: .7rem;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            padding-bottom: 15px;
            cursor: pointer;
            transition: border-bottom .5s ease-in-out;
        }

        .menu-items:hover {
            color: #3892C6;
            border-bottom: 2px solid #3892C6;
        }

        .overlay-menu-list {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            gap: 10px;
        }

        .overlay-menu-list.sub-cat {
            height: 60vh;
            overflow-y: auto;
        }

        .overlay-menu-list a {
            text-decoration: none;
            color: black;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
        }

        .overlay-menu-list a:hover {
            font-weight: 600;
        }

        .overlay-menu-list a .cat-image {
            width: 50px;
            margin-top: -10px;
        }

        .custom-dropdown:hover .menu-items {
            color: #3892C6;
            border-bottom: 2px solid #3892C6;
        }

        .custom-dropdown-content {
            visibility: hidden;
            position: absolute;
            background-color: white;
            width: 100%;
            height: 0;
            overflow: hidden;
            transition: height .5s linear, visibility 0.5s ease-in;
            left: 0;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .custom-dropdown-content .menu-cover-container {
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .custom-dropdown-content .menu-cover {
            margin-top: 30px;
            width: 100%;
            aspect-ratio: 1/1;
            background-size: contain;
            object-position: center;
            background-repeat: no-repeat;
        }


        .custom-dropdown:hover .custom-dropdown-content {
            display: block;
            visibility: visible;
            pointer-events: auto;
            height: 70vh;
            z-index: 2;
        }

        .section-header {
            text-transform: uppercase;
            display: flex !important;
            border-bottom: 3px solid #3892C6;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .nav-spacer {
            height: 90px;
        }

        /* nav search  */

        .nav-search {
            height: 50px;
            font-size: 12px;
            padding: 8px 16px;
            padding-left: 30px;
            border-radius: 8px;
            background-position: 8px center;
            background-size: 15px 15px;
            background-repeat: no-repeat;
            border: 2px solid #3892C6;
        }

        .search-icon-container {
            position: absolute;
            z-index: 10;
            top: 0;
            bottom: 0;
            height: 100%;
            display: flex;
            align-items: center;
            padding-left: 10px;
        }

        .nav-search:focus {
            outline: none;
        }

        .tt-suggestion.tt-selectable {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* user dropdown  */
        .user-dropdown {
            position: relative;
        }

        .user-dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            width: 350px;
            height: auto;
            padding: 40px;
            right: -50px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .user-dropdown-content.more-info {
            padding: 10px;
            width: max-content;
        }

        .user-dropdown-content.more-info a {
            text-decoration: none;
            color: black;
        }

        .user-dropdown:hover .user-dropdown-content {
            display: block;
        }

        .icons {
            margin-top: 15px;
            width: 20px;
            aspect-ratio: 1/1;
            cursor: pointer;
        }

        /* currency selector  */

        #curr-temp {
            display: none;
            transition: all 1s ease-in;
        }

        .curr-select {
            display: flex;
            width: 70px;
            position: relative;
            cursor: pointer;
            border: 1px solid black;
            border-radius: 50px;
            padding: 5px;
            cursor: pointer;
        }

        #curr-temp:checked+label.curr-select {
            padding-bottom: 10px;
            margin-top: 5px;
            border-radius: 15px 15px 0 0;
        }

        .curr-opt {
            position: absolute;
            background: white;
            font-size: 12px;
            top: 84%;
            left: -1px;
            width: 70px;
            display: none;
            border-radius: 0 0 20px 20px;
            padding: 10px;
            padding-top: 0;
            border: 1px solid black;
            border-top: 0.5px solid rgba(148, 148, 148, 0.493);
        }

        #curr-temp:checked+label>.curr-opt {
            display: block;
        }

        /* #curr-temp:checked+label>.down {
    display: none;
}

#curr-temp:checked+label>.up {
    display: block;
}

#curr-temp+label>.down {
    display: block;
}

#curr-temp+label>.up {
    display: none;
} */

        .curr-opt-item {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 10px;
        }

        .curr-opt-item .icons {
            width: 20px;
            height: 20px;
        }

        .default-curr {
            display: flex;
            gap: 5px;
            font-size: 12px;
            align-items: flex-end;
            margin-top: -15px;
            margin-right: 10px;
        }

        .default-curr .icons {
            width: 20px;
            height: 20px;
        }

        .menu-toggle {
            display: none;
        }

        /* top bar styles */

        .topbar {
            background: #3892C6;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 5px 10px;
        }

        .topbar button {
            border: 1px solid white;
            background: white;
            color: #3892C6;
            font-size: 12px;
            font-weight: 600;
            border-radius: 8px;
            padding: 3px 10px;
            cursor: pointer;
        }

        .topbar button:hover {
            background: #3892C6;
            color: white;
        }

        .topbar-item {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .topbar-item:hover {
            color: rgba(255, 255, 255, 0.664);
        }

        .topbar-item-img {
            width: 20px;
            height: 20px;
        }

        .no-margin {
            margin: 0px;
        }

        /* modal styles */

        .modal-info-list {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .modal-info {
            display: flex;
            margin: 20px 0;
            gap: 20px;
        }

        .whatsapp-qr {
            width: 25%;
        }

        .modal-info-list-item {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .jwell-sell-modal-content {
            display: flex;
            gap: 20px;
        }

        .modal-cover {
            aspect-ratio: 7/3;
        }

        .jwell-sell-modal-content .modal-cover {
            aspect-ratio: 7/3;
            background-size: cover;
            background-position: center;
            object-position: center;
            object-fit: cover;
            width: 100%;
        }

        .jwell-sell-modal-content .modal-info {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .jwell-sell-modal-content .modal-info-list-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .jwell-sell-modal-content .modal-info .whatsapp-qr {
            width: 40%;
            aspect-ratio: 1/1;
            margin-bottom: -10px;
        }

        .jwell-sell-modal-content .modal-info .phone-link {
            margin: -10px 0;
        }

        .jwell-sell-modal-content .modal-info .phone-info {
            margin: -10px 0;
            font-weight: 700;
        }

        .jwell-sell-modal-content .modal-info .modal-info-list {
            font-size: 12px;
        }

        .modal-content {
            width: 50vw !important;
            height: unset !important;
        }

        #custom-menu-drawer {
            display: none;
            background: white;
            position: fixed;
            top: 90px;
            height: calc(100vh - 100px);
            overflow-y: scroll;
            right: 0;
            left: 0;
            z-index: 14;
            -webkit-box-shadow: 0px 1px 5px 1px rgba(125, 121, 121, 0.02);
        }

        #custom-menu-drawer.open {
            display: block;
            height: 100%;
            transition: all 1s ease-in-out;
        }

        .hidden-big-screen {
            display: none;
        }

        .menu-footer {
            display: none;
        }

        .custom-menu-drawer-title {
            display: flex;
            gap: 20px;
            justify-content: center;
            position: fixed;
            z-index: 5;
            width: 100%;
            padding: -10px auto;
            background-color: #96d8fe;
            border-bottom: 0.5px solid gray;
        }

        .custom-menu-drawer-title .icons {
            width: 20px;
            height: 50px;
            padding-top: 10px;
            padding-bottom: -10px;
            margin-top: 20px;
            margin-top: 10px
        }

        .custom-menu-drawer-title .fa-user-lock {
            margin-top: 25px;
        }

        .contains-number {
            position: relative;
            z-index: 3;
            transform: translateY(-10px);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: black;
        }

        .contains-number span {
            margin-top: 5px;
        }

        .number-data {
            position: absolute;
            top: -2px;
            left: 15px;
            background: #3892C6;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
            z-index: 2;
        }

        /* custom-accordion styles  */


        .accordion-container {
            margin-top: 90px;
            margin-bottom: 100px;
        }

        .accordion {
            cursor: pointer;
            background: white;
            padding: 5px 18px;
            color: black;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            margin-top: -20px;
        }

        .accordion.active {
            background-color: #96d8fe;
        }

        .accordion:after {
            content: '\203A';
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .accordion.active:after {
            content: "\203A";
            transform: rotate(90deg);
        }

        .panel {
            padding: 0px 18px;
            padding-left: 25px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .panel a {
            text-decoration: none;
            color: black;
            padding: 5px 0;
            font-size: 14px;
        }

        .product-list-wrapper {
            display: flex;
            gap: 20px;
        }

        .filter-wrapper {
            width: 30%;
        }

        .product-container {
            width: 70%;
        }

        .video-background {
            margin-bottom: 0px !important;
            height: unset !important;
            aspect-ratio: 7/3 !important;
        }

        .jwell-sell-modal-content .modal-info-info {
            display: flex;
            flex-direction: column;
            gap: 30px;
            justify-content: center;
        }

        /* gold rate  */
        .gold-rate-container {
            height: 300px;
            width: 100%;
            margin-left: 20%;
            overflow: hidden;
        }

        .user-detail {
            display: flex;
            flex-direction: column;
            padding: 10px;
            gap: 20px;
        }

        .user-detail-avatar-wrapper {
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 5px;
            justify-content: center;
            align-items: center;
        }

        .user-detail-avatar {
            position: relative;
        }

        .user_setting_container {
            background-image: url("https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/setting.png");
            border-radius: 50%;
            width: 30px;
            height: 30px;
            border: 4px solid white;
            cursor: pointer;
            position: absolute;
            object-fit: cover;
            background-size: cover;
            object-position: center;
            background-repeat: no-repeat;
            transition: border .2s ease-in-out;
            top: 15px;
            right: 4px;
        }

        .user_setting_container:hover {
            border: 2px solid #3892C682;
        }

        .user-action-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin: 20px 0;
            padding-top: 20px;
            border-top: 2px solid gray;
        }

        .user-action-container button {
            width: 100%;
        }

        @media (width < 830px) {
            .gold-rate-container {
                height: 500px;
                width: 100%;
                margin-left: 0;
            }
        }

        /* media query  */
        @media (width < 1100px) {
            .menu-items {
                font-size: .6rem;
            }

            .logo-menu-container {
                width: 64%;
            }

            .search-info-container {
                width: 46%;
            }
        }

        @media (width < 1024px) {
            .logo {
                width: 90px;
                aspect-ratio: 7/2;
                margin-right: 10px;
            }

            .nav-spacer {
                height: 80px;
            }

            .search-icon-container {
                padding-left: 5px !important;
            }

            .search-icon-container .search-icon {
                font-size: 12px;
            }

            .logo-menu-container {
                width: 50%;
            }

            .search-info-container {
                width: 50%;
            }

            .menu-items {
                font-size: .5rem;
            }

            .nav-search {
                height: 30px;
                font-size: 10px;
                padding: 5px 10px;
                padding-left: 20px;
                background-position: 5px center;
                background-size: 10px 10px;
                background-repeat: no-repeat;
                border: 1px solid #3892C6;
            }

            .default-curr {
                gap: 5px;
                font-size: 10px;
                align-items: flex-end;
                margin-top: -15px;
                margin-right: 10px;
            }

            .default-curr .icons {
                width: 15px;
                height: 15px;
            }

            .curr-opt {
                font-size: 10px;
            }

            .slider-spacing {
                margin-top: -10px;
                margin-bottom: -10px;
                padding-bottom: 20px;
            }

            .slider {
                margin-top: 0 !important;
            }

            .modal-content {
                width: 60vw !important;
                height: unset !important;
            }

        }

        @media screen and (max-width: 767px) {
            .product-list-wrapper {
                flex-direction: column;
            }

            .slider {
                margin-bottom: 180px !important;
            }

            .slide_viewer {
                aspect-ratio: 7/4 !important;
                height: max-content !important;
            }

            .filter-wrapper {
                width: 100%;
            }

            .product-container {
                width: 100%;
            }

            .steps:not(.is-horizontal):not(.is-short) {
                height: 75% !important;
            }

            body {
                padding-bottom: 0em !important;
            }

            .jwell-sell-modal-content {
                flex-direction: column;
            }

            .jwell-sell-modal-content .modal-info {
                flex-direction: row;
            }

            .modal-content {
                width: 90vw !important;
                height: unset !important;
            }

            .slide-img {
                margin-top: 0;
            }

            .user-detail {
                flex-direction: row;
            }
        }


        @media (width < 980px) {
            .menus {
                display: none;
            }

            .hidden-big-screen {
                display: block;
            }

            .menu-toggle {
                display: block;
            }

            .logo-menu-container {
                width: 25%;
            }

            .search-info-container {
                width: 75%;
            }

            .search-info-container .info {
                display: none;
            }

            .search-info-container>div>.info {
                display: none;
            }

            .logo {
                width: 80px;
            }

            .contains-number.small-screen {
                transform: translateY(0)
            }

            .contains-number.big-screen .number-data {
                display: none;
            }

            .contains-number.small-screen .number-data {
                top: 5px;
            }

            .modal-content {
                width: 80vw !important;
                height: unset !important;
            }

        }

        @media screen and (max-width: 640px) {
            .menus {
                display: none;
            }

            .slider {
                margin-bottom: 20% !important;
            }

            .logo-menu-container {
                width: 25%;
            }

            .search-info-container {
                width: 75%;
            }

            .topbar-item {
                font-size: 10px;
            }

            .topbar-item-img {
                width: 15px;
                height: 15px;
            }

            .topbar button {
                font-size: 10px;
                border-radius: 8px;
                padding: 3px 10px;
            }

            .nav-search {
                width: 100px;
            }

            .gold-rate-container {
                height: 450px;
                width: 100%;
                margin-left: 0;
            }

            .user-detail {
                flex-direction: column;
            }

            .user-action-container button {
                width: 100%;
            }
        }
    </style>

</head>

<?php
$menus = [
    [
        'title' => 'Diamond',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/diamond-cover.webp',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Ring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-ring.png', 'path' => 'search.php?term=diamond%20ring'],
                    ['title' => 'Eartop', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-eartop.png', 'path' => 'search.php?term=diamond%20eartop'],
                    ['title' => 'Juli', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Diamond-Juli.png', 'path' => 'search.php?term=diamond%20juli'],
                    ['title' => 'Necklace', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Diamond-Necklace.png', 'path' => 'search.php?term=diamond%20necklace'],
                    ['title' => 'Locket / Pendant', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond%20pendant.png', 'path' => 'search.php?term=diamond%20pendant'],
                    ['title' => 'Nosepin', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Diamond-nosepin.png', 'path' => 'search.php?term=diamond%20nosepin'],
                    ['title' => 'Bracelet', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-bracelet.png', 'path' => 'search.php?term=diamond%20bracelet'],
                    ['title' => 'Bangles', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-bangles.png', 'path' => 'search.php?term=diamond%20bangles'],
                    ['title' => 'Mangalsutra', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-mangalsutra.png', 'path' => 'search.php?term=diamond%20mangalsutra'],
                    ['title' => 'Earring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-earring.png', 'path' => 'search.php?term=diamond%20earring'],
                    ['title' => 'Brooch', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-brooch.png', 'path' => 'search.php?term=diamond%20brooch'],
                ]
            ],
            [
                'title' => 'Shop By preference',
                'data' => [
                    ['title' => 'For Men', 'image' => '', 'path' => 'search.php?term=%20diamond%20&tags[]=men'],
                    ['title' => 'For Women', 'image' => '', 'path' => 'search.php?term=%20diamond%20&tags[]=women'],
                    ['title' => 'For Kids', 'image' => '', 'path' => 'search.php?term=%20diamond%20&tags[]=kid'],
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?term=%20diamond%20&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?term=%20diamond%20&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?term=%20diamond%20&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?term=%20diamond%20&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20diamond%20&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20diamond%20&price=6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Gold',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/gold-cover.jpg',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Ranihaar', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold_ranihaar.png', 'path' => 'search.php?term=gold%20ranihaar'],
                    ['title' => 'Necklace', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-Necklace.png', 'path' => 'search.php?term=gold%20necklace'],
                    ['title' => 'Jhumka / Earring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold_Jhumka.png', 'path' => 'search.php?term=gold%20jhumka'],
                    ['title' => 'Ring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-ring.png', 'path' => 'search.php?term=gold%20ring'],
                    ['title' => 'Sirbandi', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-shirbandi.png', 'path' => 'search.php?term=gold%20sirbandi'],
                    ['title' => 'Tillhari', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-Tilhari.png', 'path' => 'search.php?term=gold%20tillhari'],
                    ['title' => 'Low Weight Necklace', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-low-weight-necklace.png', 'path' => 'search.php?term=gold%20low%20weight%20necklace'],
                    ['title' => 'Bangles', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-Bangle.png', 'path' => 'products/gold-bangles'],
                    ['title' => 'Juli', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-Juli.png', 'path' => 'search.php?term=gold%20juli'],
                    ['title' => 'Anklet', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-anklet.png', 'path' => 'search.php?term=gold%20anklet'],
                    ['title' => 'Chandrama', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-chandrama.png', 'path' => 'search.php?term=gold%20chandrama'],
                    ['title' => 'Chain', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold%20chain.png', 'path' => 'products/gold-chain'],
                    ['title' => 'Bracelet', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold-Bracelet.png', 'path' => 'search.php?term=gold%20bracelet'],
                    ['title' => 'Locket', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/gold%20locket.png', 'path' => 'search.php?term=gold%20locket'],
                    ['title' => 'Mundra', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/gold%20mundra.png', 'path' => 'search.php?term=gold%20mundra'],
                    ['title' => 'Top', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/gold%20top.png', 'path' => 'search.php?term=gold%20top'],
                    ['title' => 'Brooch', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/gold%20brooch.png', 'path' => 'search.php?term=gold%20brooch'],
                ]
            ],
            [
                'title' => 'Shop By preference',
                'data' => [
                    ['title' => 'For Men', 'image' => '', 'path' => 'search.php?term=%20gold%20&tags[]=men'],
                    ['title' => 'For Women', 'image' => '', 'path' => 'search.php?term=%20gold%20&tags[]=women'],
                    ['title' => 'For Kids', 'image' => '', 'path' => 'search.php?term=%20gold%20&tags[]=kid'],
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?term=%20gold%20&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?term=%20gold%20&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?term=%20gold%20&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?term=%20gold%20&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20gold%20&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20gold%20&price=6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Silver',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/silver-cover.jpg',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Ranihaar', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20ranihaar.png', 'path' => 'search.php?term=silver%20ranihaar'],
                    ['title' => 'Necklace', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20necklace.png', 'path' => 'search.php?term=silver%20necklace'],
                    ['title' => 'Eartop / Earring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20eartop.png', 'path' => 'search.php?term=silver%20eartop'],
                    ['title' => 'Jhumka / Earring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20jhumka.png', 'path' => 'search.php?term=silver%20earrings'],
                    ['title' => 'Ring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20ring.png', 'path' => 'search.php?term=silver%20ring'],
                    ['title' => 'Bangles', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20kada.png', 'path' => 'search.php?term=silver%20bangles'],
                    ['title' => 'Juli', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20juli.png', 'path' => 'search.php?term=silver%20juli'],
                    ['title' => 'Anklet', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20anklet.png', 'path' => 'search.php?term=silver%20anklet'],
                    ['title' => 'Chain', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20chain.png', 'path' => 'search.php?term=silver%20chain'],
                    ['title' => 'Bracelet', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20bracelet.png', 'path' => 'search.php?term=silver%20bracelet'],
                    ['title' => 'Locket', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20locket.png', 'path' => 'search.php?term=silver%20pendent'],
                    ['title' => 'Brooch / Saripin', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20brooch.png', 'path' => 'search.php?term=silver%saree%20pin'],
                    ['title' => 'Silver Kada', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20kada.png', 'path' => 'search.php?term=silver%20kada'],
                    ['title' => 'Bicchi', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20bichhi.png', 'path' => 'search.php?term=silver%20bicchi'],
                ]
            ],
            [
                'title' => 'Shop By preference',
                'data' => [
                    ['title' => 'For Men', 'image' => '', 'path' => 'search.php?term=%20silver%20&tags[]=men'],
                    ['title' => 'For Women', 'image' => '', 'path' => 'search.php?term=%20silver%20&tags[]=women'],
                    ['title' => 'For Kids', 'image' => '', 'path' => 'search.php?term=%20silver%20&tags[]=kid'],
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?term=%20silver%20&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?term=%20silver%20&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?term=%20silver%20&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?term=%20silver%20&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20silver%20&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20silver%20&price=6'],
                ]
            ],

        ]
    ],
    [
        'title' => 'Rings',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/ring-cover.jpg',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Engagement', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/engagement%20ring.png', 'path' => 'products/engagement'],
                    ['title' => 'Daily Wear', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/daily%20wear%20ring.png', 'path' => 'products/daily-wear'],
                    ['title' => 'Couple Ring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/couple%20ring.png', 'path' => 'products/couple-ring'],
                    ['title' => 'Cocktail', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/cocktail%20ring.png', 'path' => 'products/cocktail'],
                    ['title' => 'Infinity', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/infinity%20ring.png', 'path' => 'products/infinity'],
                    ['title' => 'Bands', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/bands%20ring.png', 'path' => 'products/bands'],
                    ['title' => 'Promise Ring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/promise%20ring.png', 'path' => 'products/promise-ring'],
                    ['title' => 'Adjustable Rings', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/adjustable-ring.png', 'path' => 'products/adjustable-rings'],
                ]
            ],
            [
                'title' => 'Shop By preference',
                'data' => [
                    ['title' => 'For Men', 'image' => '', 'path' => 'search.php?term=%20ring&tags[]=men'],
                    ['title' => 'For Women', 'image' => '', 'path' => 'search.php?term=%20ring&tags[]=women'],
                    ['title' => 'For Kids', 'image' => '', 'path' => 'search.php?term=%20ring&tags[]=kid'],
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?term=%20ring&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?term=%20ring&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?term=%20ring&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?term=%20ring&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20ring&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20ring&price=6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Earrings',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/earring-cover.jpg',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Gold Earring', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/gold%20earring.png', 'path' => 'products/gold-earrings'],
                    ['title' => 'Daily Wear', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond-earring.png', 'path' => 'products/dailywear-earrings'],
                    ['title' => 'Studs', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/studs%20earring.png', 'path' => 'products/studs'],
                    ['title' => 'Jhumkas', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold_Jhumka.png', 'path' => 'products/studs'],
                    ['title' => 'Earcuffs', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/earcuffs%20earring.png', 'path' => 'products/earcuffs'],
                    ['title' => 'Pearl', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/pearl%20earring.png', 'path' => 'products/pearl-earring'],
                    ['title' => 'Chandbali', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/chandbali%20earring.png', 'path' => 'products/chandbali-earrings'],
                    ['title' => 'Drops', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/drop%20earring.png', 'path' => 'products/drops'],
                    ['title' => 'Hoops and huggies', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/hoops.png', 'path' => 'products/hoops-and-huggies'],
                    ['title' => 'Suidhaga', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/sui%20dhaga%20earring.png', 'path' => 'products/suidhaga'],
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?term=%20earrings&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?term=%20earrings&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?term=%20earrings&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?term=%20earrings&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20earrings&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%20earrings&price=6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'More Jwellery',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/more-jwell-cover.png',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Utensils', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Utensils.png', 'path' => 'products/utensils-'],
                    ['title' => 'Diamond Nosepin', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Diamond-nosepin.png', 'path' => 'products/diamond-nosepin-'],
                    ['title' => 'Diamond Pendant', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/diamond%20pendant.png', 'path' => 'products/diamond-pendent'],
                    ['title' => 'Silver Murti', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/silver%20murti.png', 'path' => 'products/silver-murti'],
                    ['title' => 'Gold Chain', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/nav/Gold%20chain.png', 'path' => 'products/gold-chain']
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?term=%&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?term=%&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?term=%&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?term=%&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?term=%&price=6'],
                ]
            ],
        ]
    ],
    [
        'title' => 'Gifting',
        'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/gift-cover.webp',
        'children' => [
            [
                'title' => 'Shop By Style',
                'data' => [
                    ['title' => 'Birthday Gifts', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/b-g.jpg', 'path' => 'search.php?tags[]=gift2'],
                    ['title' => 'Anniversary Gifts', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/a-g.png', 'path' => 'search.php?tags[]=gift1'],
                    ['title' => 'Wedding Gifts', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/w-g.png', 'path' => 'search.php?tags[]=gift3'],
                    ['title' => 'Paasni Gifts', 'image' => 'https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/home/p-g.png', 'path' => 'search.php?tags[]=gift4'],
                ]
            ],
            [
                'title' => 'Shop By preference',
                'data' => [
                    ['title' => 'For Men', 'image' => '', 'path' => 'search.php?tags[]=gift&tags[]=men'],
                    ['title' => 'For Women', 'image' => '', 'path' => 'search.php?tags[]=gift&tags[]=women'],
                    ['title' => 'For Kids', 'image' => '', 'path' => 'search.php?tags[]=gift&tags[]=kid'],
                ]
            ],
            [
                'title' => 'Shop By price',
                'data' => [
                    ['title' => 'Below Rs. 10,000', 'image' => '', 'path' => 'search.php?tags[]=gift&price=1'],
                    ['title' => 'Rs. 10,000 to Rs. 20,000', 'image' => '', 'path' => 'search.php?tags[]=gift&price=2'],
                    ['title' => 'Rs. 20,000 to Rs. 50,000', 'image' => '', 'path' => 'search.php?tags[]=gift&price=3'],
                    ['title' => 'Rs. 50,000 to Rs. 1,00,000', 'image' => '', 'path' => 'search.php?tags[]=gift&price=4'],
                    ['title' => 'Rs. 1,00,000 to Rs. 2,00,000', 'image' => '', 'path' => 'search.php?tags[]=gift&price=5'],
                    ['title' => 'Above Rs. 2,00,000', 'image' => '', 'path' => 'search.php?tags[]=gift&price=6'],
                ]
            ],
        ]
    ],
];
?>
<?php include 'header-functions.php'; ?>

<?php ?>