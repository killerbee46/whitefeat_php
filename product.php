<?php {
  $customer = '0';
  $cookid = '0';
  include 'db_connect.php';
  include 'ajax_cookie.php';
  include_once('make_url.php');
  include_once('get_url.php');
  $productname = get_url($_GET['pack']);
  $sqlpd = "Select * from `whitefeat_wf_new`.`package` WHERE p_name='" . $productname . "'";
  $displaypd = mysqli_query($con, $sqlpd);
  $countpd = mysqli_num_rows($displaypd);
  if ($countpd <= 0) {
    header('location:index.php');
  }
  $rowpd = mysqli_fetch_array($displaypd);
  ?><!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Cache-control" content="public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $rowpd['p_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/css.css">

    <link href="assets/hover/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="assets/hover/test.js" type="text/javascript"></script>

    <style type="text/css">
      html {
        position: relative;
        min-height: 100%;
      }

      body {
        position: absolute;
        left: 0;
        right: 0;
        min-height: 100%;
        background: #fff;
        margin: 0;
        padding: 0;
      }

      body,
      td {}

      h1 {
        font-size: 1.5em;
        font-weight: normal;
        color: #555;
      }

      h2 {
        font-size: 1.3em;
        font-weight: normal;
        color: #555;
      }

      h2.caption {
        margin: 2.5em 0 0;
      }

      h3 {
        font-size: 1.1em;
        font-weight: normal;
        color: #555;
      }

      h3.pad {
        margin: 2em 0 1em;
      }

      h4 {
        font-size: 1em;
        font-weight: normal;
        color: #555;
      }

      p.pad {
        margin-top: 1.5em;
      }

      a {
        outline: none;
      }


      .cfg-btn {
        background-color: rgb(55, 181, 114);
        color: #fff;
        border: 0;
        box-shadow: 0 0 1px 0px rgba(0, 0, 0, 0.3);
        outline: 0;
        cursor: pointer;
        width: 200px;
        padding: 10px;
        font-size: 1em;
        position: relative;
        display: inline-block;
        margin: 10px auto;
      }

      .cfg-btn:hover:not([disabled]) {
        background-color: rgb(37, 215, 120);
      }

      .mobile-magic .cfg-btn:hover:not([disabled]) {
        background: rgb(55, 181, 114);
      }

      .cfg-btn[disabled] {
        opacity: .5;
        color: #808080;
        background: #ddd;
      }

      .cfg-btn.btn-preview,
      .cfg-btn.btn-preview:active,
      .cfg-btn.btn-preview:focus {
        font-size: 1em;
        position: relative;
        display: block;
        margin: 10px auto;
      }

      .cfg-btn,
      .preview,
      .app-figure,
      .api-controls,
      .wizard-settings,
      .wizard-settings .inner,
      .wizard-settings .footer,
      .wizard-settings input,
      .wizard-settings select {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }

      .preview,
      .wizard-settings {
        padding: 10px;
        border: 0;
        min-height: 1px;
      }

      .preview {
        position: relative;
      }

      .api-controls {
        text-align: center;
      }

      .api-controls button,
      .api-controls button:active,
      .api-controls button:focus {
        width: 80px;
        font-size: .7em;
        white-space: nowrap;
      }

      .app-figure {
        width: 80% !important;
        margin: 0px auto;
        border: 0px solid red;
        padding: 20px;
        position: relative;
        text-align: center;
      }

      .selectors {
        margin-top: 10px;
      }

      .selectors .mz-thumb img {
        max-width: 56px;
      }

      .app-code-sample {
        max-width: 80%;
        margin: 30px auto 0;
        text-align: center;
        position: relative;
      }

      .app-code-sample input[type="radio"] {
        display: none;
      }

      .app-code-sample label {
        display: inline-block;
        padding: 2px 12px;
        margin: 0;
        font-size: .8em;
        text-decoration: none;
        cursor: pointer;
        color: #666;
        border: 1px solid rgba(136, 136, 136, 0.5);
        background-color: transparent;
      }

      .app-code-sample label:hover {
        color: #fff;
        background-color: rgb(253, 154, 30);
        border-color: rgb(253, 154, 30);
      }

      .app-code-sample input[type="radio"]:checked+label {
        color: #fff;
        background-color: rgb(110, 110, 110) !important;
        border-color: rgba(110, 110, 110, 0.7) !important;
      }

      .app-code-sample label:first-of-type {
        border-radius: 4px 0 0 4px;
        border-right-color: transparent;
      }

      .app-code-sample label:last-of-type {
        border-radius: 0 4px 4px 0;
        border-left-color: transparent;
      }

      .app-code-sample .app-code-holder {
        padding: 0;
        position: relative;
        border: 1px solid #eee;
        border-radius: 0px;
        background-color: #fafafa;
        margin: 15px 0;
      }

      .app-code-sample .app-code-holder>div {
        display: none;
      }

      .app-code-sample .app-code-holder pre {
        text-align: left;
        white-space: pre-line;
        border: 0px solid #eee;
        border-radius: 0px;
        background-color: transparent;
        padding: 25px 50px 25px 25px;
        margin: 0;
        min-height: 25px;
      }

      .app-code-sample input[type="radio"]:nth-of-type(1):checked~.app-code-holder>div:nth-of-type(1) {
        display: block;
      }

      .app-code-sample input[type="radio"]:nth-of-type(2):checked~.app-code-holder>div:nth-of-type(2) {
        display: block;
      }

      .app-code-sample .app-code-holder .cfg-btn-copy {
        display: none;
        z-index: -1;
        position: absolute;
        top: 10px;
        right: 10px;
        width: 44px;
        font-size: .65em;
        white-space: nowrap;
        margin: 0;
        padding: 4px;
      }

      .copy-msg {
        font: normal 11px/1.2em 'Helvetica Neue', Helvetica, 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, sans-serif;
        color: #2a4d14;
        border: 1px solid #2a4d14;
        border-radius: 4px;
        position: absolute;
        top: 8px;
        left: 0;
        right: 0;
        width: 200px;
        max-width: 70%;
        padding: 4px;
        margin: 0px auto;
        text-align: center;
      }

      .copy-msg-failed {
        color: #b80c09;
        border-color: #b80c09;
        width: 430px;
      }

      .mobile-magic .app-code-sample .cfg-btn-copy {
        display: none;
      }

      #code-to-copy {
        position: absolute;
        width: 0;
        height: 0;
        top: -10000px;
      }

      .lt-ie9-magic .app-code-sample {
        display: none;
      }

      .wizard-settings {
        background-color: #4f4f4f;
        color: #a5a5a5;
        position: absolute;
        right: 0;
        width: 340px;
      }

      .wizard-settings .inner {
        width: 100%;
        margin-bottom: 30px;
      }

      .wizard-settings .footer {
        color: #c7d59f;
        font-size: .75em;
        width: 100%;
        position: relative;
        vertical-align: bottom;
        text-align: center;
        padding: 6px;
        margin-top: 10px;
      }

      .wizard-settings .footer a {
        color: inherit;
        text-decoration: none;
      }

      .wizard-settings .footer a:hover {
        text-decoration: underline;
      }

      .wizard-settings a {
        color: #cc9933;
      }

      .wizard-settings a:hover {
        color: #dfb363;
      }

      .wizard-settings table>tbody>tr>td {
        vertical-align: top;
      }

      .wizard-settings table {
        min-width: 300px;
        max-width: 100%;
        font-size: .8em;
        margin: 0 auto;
      }

      .wizard-settings table caption {
        font-size: 1.5em;
        padding: 16px 8px;
      }

      .wizard-settings table td {
        padding: 4px 8px;
      }

      .wizard-settings table td:first-child {
        white-space: nowrap;
      }

      .wizard-settings table td:nth-child(2) {
        text-align: left;
      }

      .wizard-settings table td .values {
        color: #a08794;
        font-size: 0.8em;
        line-height: 1.3em;
        display: block;
        max-width: 126px;
      }

      .wizard-settings table td .values:before {
        content: '';
        display: block;
      }

      .wizard-settings input,
      .wizard-settings select {
        width: 126px;
      }

      .wizard-settings input {
        padding: 0px 4px;
      }

      .wizard-settings input[disabled] {
        color: #808080;
        background: #a7a7a7;
        border: 1px solid #a7a7a7;
      }

      .preview {
        width: 70%;
        float: left;
      }

      @media (min-width: 0px) {
        .preview {
          width: 100%;
          float: none;
        }
      }

      @media (min-width: 1024px) {
        .preview {
          width: calc(100% - 340px);
        }

        .wizard-settings {
          top: 0;
          min-height: 100%;
        }

        .wizard-settings .inner {
          margin-top: 60px;
        }

        .wizard-settings .footer {
          position: absolute;
          bottom: 0;
          left: 0;
        }

        .wizard-settings .settings-controls {
          position: fixed;
          top: 0;
          right: 0;
          width: 340px;
          padding: 10px 0 0;
          text-align: center;
          background-color: inherit;
        }
      }

      @media screen and (max-width: 1024px) {

        .api-controls button,
        .api-controls button:active,
        .api-controls button:focus {
          width: 70px;
        }
      }

      @media screen and (max-width: 1023px) {
        .app-figure {
          width: 98% !important;
          margin: 50px auto;
          padding: 0;
        }

        .app-code-sample {
          display: none;
        }

        .wizard-settings {
          width: 100%;
        }
      }

      @media screen and (max-width: 600px) {
        .mz-thumb img {
          max-width: 39px;
        }
      }

      @media screen and (max-width: 560px) {
        .api-controls .sep {
          content: '';
          display: table;
        }
      }

      @media screen and (min-width: 1600px) {
        .preview {
          padding: 10px 160px;
        }
      }

      .mz-thumb-selected img {
        -webkit-filter: brightness(100%);
        filter: brightness(100%);
    </style>

    <script type="text/javascript">
      var mzOptions = {};
      mzOptions = {
        onZoomReady: function () {
          // console.log('onReady', arguments[0]);
        },
        onUpdate: function () {
          // console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
        },
        onZoomIn: function () {
          // console.log('onZoomIn', arguments[0]);
        },
        onZoomOut: function () {
          // console.log('onZoomOut', arguments[0]);
        },
        onExpandOpen: function () {
          // console.log('onExpandOpen', arguments[0]);
        },
        onExpandClose: function () {
          // console.log('onExpandClosed', arguments[0]);
        }
      };
      var mzMobileOptions = {};

      function isDefaultOption(o) {
        return magicJS.$A(magicJS.$(o).byTag('option')).filter(function (opt) {
          return opt.selected && opt.defaultSelected;
        }).length > 0;
      }

      function toOptionValue(v) {
        if (/^(true|false)$/.test(v)) {
          return 'true' === v;
        }
        if (/^[0-9]{1,}$/i.test(v)) {
          return parseInt(v, 10);
        }
        return v;
      }

      function makeOptions(optType) {
        var value = null, isDefault = true, newParams = Array(), newParamsS = '', options = {};
        magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
          .concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
          .forEach(function (param) {
            value = ('checkbox' == param.type) ? param.checked.toString() : param.value;

            isDefault = ('checkbox' == param.type) ? value == param.defaultChecked.toString() :
              ('SELECT' == param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

            if (null !== value && !isDefault) {
              options[param.name] = toOptionValue(value);
            }
          });
        return options;
      }

      function updateScriptCode() {
        var code = '&lt;script&gt;\nvar mzOptions = ';
        code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g, "$1:") + ';';
        code += '\n&lt;/script&gt;';

        magicJS.$('app-code-sample-script').changeContent(code);
      }

      function updateInlineCode() {
        var code = '&lt;a class="MagicZoom" data-options="';
        code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(/\{([^{}]*)\}/, "$1").replace(/\s*$/, '');
        code += '"&gt;';

        magicJS.$('app-code-sample-inline').changeContent(code);
      }

      function applySettings() {
        MagicZoom.stop('Zoom-1');
        mzOptions = makeOptions('params');
        mzMobileOptions = makeOptions('mobile-params');
        MagicZoom.start('Zoom-1');
        updateScriptCode();
        updateInlineCode();
        try {
          prettyPrint();
        } catch (e) { }
      }

      function copyToClipboard(src) {
        var
          copyNode,
          range, success;

        if (!isCopySupported()) {
          disableCopy();
          return;
        }
        copyNode = document.getElementById('code-to-copy');
        copyNode.innerHTML = document.getElementById(src).innerHTML;

        range = document.createRange();
        range.selectNode(copyNode);
        window.getSelection().addRange(range);

        try {
          success = document.execCommand('copy');
        } catch (err) {
          success = false;
        }
        window.getSelection().removeAllRanges();
        if (!success) {
          disableCopy();
        } else {
          new magicJS.Message('Settings code copied to clipboard.', 3000,
            document.querySelector('.app-code-holder'), 'copy-msg');
        }
      }

      function disableCopy() {
        magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function (node) {
          node.disabled = true;
        });
        new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.', 3000,
          document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
      }

      function isCopySupported() {
        if (!window.getSelection || !document.createRange || !document.queryCommandSupported) { return false; }
        return document.queryCommandSupported('copy');
      }
    </script>
    <style>
      .MagicZoom {
        display: none;
      }

      .MagicZoom.Active {
        display: block;
      }

      .zoom-img-inner {
        max-height: 65px !important;
      }
    </style>





  </head>

  <body style="letter-spacing:0.02em;">
    <div id="loader" class="center">
    </div>
    <?php include 'header.php'; ?>


    <div class="container is-fluid mt-3">

      <div class="columns mt-5">

        <div class="column is-5" style="border-right:1px solid #eee; ">

          <div id="megadiv " style="overflow-x:hidden;padding-top:20px;">


            <div class="app-figure p-0 m-0" id="zoom-fig" style="">

              <?php

              $sqlsp = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowpd['id_pack'] . "' limit 1";
              $displaysp = mysqli_query($con, $sqlsp);
              $rowsp = mysqli_fetch_array($displaysp);
              if (!empty($rowsp) && array_key_exists('s_path', $rowsp)) {
                echo '<a id="Zoom-1" class="MagicZoom Active" title="Product Gallery"
            href="assets/images/product/thumb/' . $rowsp['s_path'] . '">
		
            <img src="assets/images/product/thumb/' . $rowsp['s_path'] . '?scale.height=400" alt=""/>
        </a>';

                echo '
		<a id="Zoom-1x" class="MagicZoom Active2" title=""
            href="assets/images/product/thumb/' . $rowsp['s_path'] . '">
		
            <img src="assets/images/product/thumb/' . $rowsp['s_path'] . '?scale.height=400" alt=""/>
        </a>';

              } else {
                echo '<a id="Zoom-1" class="MagicZoom Active" title="Product Gallery"
            href="assets/v2/images/no-image.avif">
		
            <img src="assets/v2/images/no-image.avif?scale.height=400" alt=""/>
        </a>';

                echo '
		<a id="Zoom-1x" class="MagicZoom Active2" title=""
            href="assets/v2/images/no-image.avif">
		
            <img src="assets/v2/images/no-image.avif?scale.height=400" alt=""/>
        </a>';
              }


              echo '
        <div class="selectors">';

              ?>



              <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
                integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
              <script>
                $('#vid-custom').click(function () {

                  //alert('yellow');
                  $('.MagicZoom.Active').hide();
                  $('.MagicZoom.Active2').html('<div id="iframe"><iframe width="560" height="400" src="https://www.youtube.com/embed/<?php echo $rowpd['p_vpath']; ?>?autoplay=1" allow="autoplay" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>');
                  $('.MagicZoom.Active2').show();


                });

                $('.zoom-img').click(function () {
                  $('.MagicZoom.Active').show();
                  $('.MagicZoom.Active2').hide();
                  $('.MagicZoom.Active2').html('');
                  //$('#iframe').remove();			 
                  console.log($('#Zoom-1').html());
                  /*$('#Zoom-1').html('<figure class="mz-figure mz-hover-zoom" style=""><div class="mz-lens" style="top: 0px; transform: translate(-10000px, -10000px); width: 107px; height: 160px;"><img src="https://magictoolbox.sirv.com/images/magiczoomplus/jeans-3-z.jpg?scale.height=400" style="position: absolute; top: 0px; left: 0px; width: 266px; height: 400px; transform: translate(-160px, -21.2px);"></div><div class="mz-hint mz-hint-hidden"><span class="mz-hint-message">Click to expand</span></div><img src="https://magictoolbox.sirv.com/images/magiczoomplus/jeans-3-z.jpg?scale.height=400" style="position: absolute; inset: 0px; width: 100%; height: 100%;"><img src="https://magictoolbox.sirv.com/images/magiczoomplus/jeans-4-z.jpg?scale.height=400" style="max-width: 266px; position: relative; top: 0px; left: 0px; opacity: 0; min-width: 266px; height: 400px;"></figure>');
                  */
                });

              </script>

            </div>
          </div>







        </div>


      </div>



      <div class="column is-7 ml-2 scroll-filter-product" style="margin-top:2.2em; height:80VH; overflow-y:scroll;">

        <div class="columns pl-5" id="stop">
          <div class="is-6">

            <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
            <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
            <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
            <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>
            <small><small><small><i class="fas fa-star" style="color:#EBB837;"></i></small></small></small>

            <span href="#" class="has-text-dark"><small><small>&nbsp; <?php echo rand(1, 50); ?> Ratings /
                  Reviews</small></small></span>

          </div>
        </div>

        <div class="columns pl-3">
          <div class="column is-9 letter-spacing">

            <h2 class="letter-spacing is-size-4 has-text-weight-semibold" style="color:#333;">
              <?php echo $rowpd['p_name']; ?></h2>
            <small><small><a href="#" class="scrollto" data-target="product_details"><u>Product
                    Details</u></a></small></small>

          </div>

          <div class="column is-3 letter-spacing">


            <?php
            $sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpd['id_pack'] . "' ";
            $displaywl = mysqli_query($con, $sqlwl);
            $countw = mysqli_num_rows($displaywl);
            if ($countw > 0) {
              echo '
  <a href="wishlist"><i class="fas fa-heart is-size-4" style="color:#3892C6; font-size:1.2rem; z-index:11;"></i></a>&nbsp; &nbsp; ';
            } else {
              echo '	 <span class="has-tooltip-arrow has-tooltip-multiline has-tooltip-bottom pb-1" data-tooltip="Add to wishlist"><i class="far fa-heart  add_wish_product is-size-4" data-id="' . $rowpd['id_pack'] . '" style="color:#3892C6; cursor:pointer;"></i></span>&nbsp; &nbsp;';
            }

            ?>



            <span class="has-tooltip-arrow has-tooltip-multiline has-tooltip-bottom pb-1 modal-smv"
              data-tooltip="View similar products" data-target="modal-smp"><i class="far fa-clone is-size-4"
                style="color:#3892C6;"></i></span>


            <div class="modal" id="modal-smp">
              <div class="modal-background"></div>
              <div class="column modal-content has-background-white p-0 h-fit">
                <h2 class="m-0 px-2 pt-2">Similar Products</h2>
                  <hr class="m-0 my-2 mb-4" />
                  <section class="modal-card-body">
                <div class="owl-carousel owl-theme owl-smv w-[99%]">


                  <?php

                  $sqlpw = "Select * from `whitefeat_wf_new`.`package` where visible='1' and active='1' and status='1' and cat_id='" . $rowpd['cat_id'] . "'";
                  $displaypw = mysqli_query($con, $sqlpw);
                  while ($rowpw = mysqli_fetch_array($displaypw)) {
                    $sqlpw2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowpw['id_pack'] . "' limit 1";
                    $displaypw2 = mysqli_query($con, $sqlpw2);
                    $rowpw2 = mysqli_fetch_array($displaypw2);

                    echo '
		      <div class="relative">
  <a href="' . make_url($rowpw['p_name']) . '">
  <img src="assets/images/product/thumb/' . $rowpw2['thumb'] . '" style="border:1px solid #eee; border-radius:2.5%;aspect-ratio:4/5;" class="image is-fullwidth"/>';

                    $sqlwl = "Select * from `whitefeat_wf_new`.`wishlist` where cookie_id='" . $GLOBALS['cookid'] . "' and id_pack='" . $rowpw['id_pack'] . "' ";
                    $displaywl = mysqli_query($con, $sqlwl);
                    $countw = mysqli_num_rows($displaywl);
                    if ($countw > 0) {
                          echo '
  <a href="wishlist" class="added_wishlist" style="color:crimson;position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;font-size:18px;"><i class="fas fa-heart"></i></a>';
                        } else {
                          echo '<a href="#" style="position:absolute; top:3%; right: 5%; margin-top:0px; margin-left:0px;" title="Add to wishlist" class="add_wish_owl" data-id="' . $rowpw['id_pack'] . '"><i class="far fa-heart " style=""></i></a>';
                        }





                    echo '<br>';

                    // currency 
                    $sel_cur = 1;
                    $cnot = '';
                    $crate = 1;
                    if ($GLOBALS['customer'] != 0) {
                      $sqlcrc = "Select cur_id from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
                      $displaycrc = mysqli_query($con, $sqlcrc);
                      $rowcrc = mysqli_fetch_array($displaycrc);
                      $sel_cur = $rowcrc['cur_id'];
                    } else {
                      $sqlcrc = "Select cookie_currency from `whitefeat_wf_new`.`cookie_status` where cookie_id='" . $GLOBALS['cookid'] . "'";
                      $displaycrc = mysqli_query($con, $sqlcrc);
                      $rowcrc = mysqli_fetch_array($displaycrc);
                      $sel_cur = $rowcrc['cookie_currency'];
                    }
                    $sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $sel_cur . "'";
                    $displaycrc2 = mysqli_query($con, $sqlcrc2);
                    $rowcrc2 = mysqli_fetch_array($displaycrc2);
                    $cnot = $rowcrc2['cur_name'];
                    $crate = ($rowcrc2['cur_rate']);

                    $dynamicPrices = dynamicPriceCalculator($productname, $crate);

                    if ($rowpw['offer'] > 0) {
                      $newprice = $dynamicPrices['originalPrice'] - $dynamicPrices['discount'];
                      echo '
  <span class="p-2"><Strong class="letter-spacing price-off ">';

                      echo $cnot . " " . round(($newprice), 2);

                      echo '</strong>
  <small><small><strike class="price-off">' . $cnot . " " . round(($dynamicPrices['originalPrice']), 2) . '</strike></small></small>';
                    } else {
                      echo '<span class="p-2"><Strong class="letter-spacing price-off ">';
                      echo $cnot . " " . round(($dynamicPrices['originalPrice']), 2);
                      echo '</strong>';
                    }
                    echo '<br> <span style="font-size:0.9rem; color:#555;" class="p-2">' . strtoupper($rowpw['p_name']) . '</span> </span>
  </a>
  </div>
		  
		  ';

                  }



                  ?>







                  <div class="owl-nav" style="display:none;">
                    <div class='nav-button owl-prev'>
                      <i class='fas fa-chevron-circle-left'
                        style='position:absolute; font-size:2em; margin-top:-250px; margin-left:0.5%;'></i>
                    </div>
                    <div class='nav-button owl-next'>
                      <i class='fas fa-chevron-circle-right'
                        style='position:absolute; font-size:2em; margin-left:97%; margin-top:-250px;'></i>
                    </div>
                  </div>
                </div>
                </section>


              </div>
              <button class="modal-close is-large" aria-label="close"></button>
            </div>




          </div>


        </div>


        <div class="columns pl-3">

          <?php

          if ($rowpd['ps_id'] != '0') {
            echo '
			 <div class="column is-4 ">
	<h6 class="mb-1"><small>Select Size: &nbsp;  &nbsp; &nbsp; &nbsp;</small></h6>
	<div class="control has-icons-left" >
  <div class="select is-info is-fullwidth mb-1">
    <select class="size-select">
	<option selected disabled value="0">-Size list-</option>
	
	';

            $sqlpsm = "Select * from `whitefeat_wf_new`.`package_sizes_measure` where ps_id='" . $rowpd['ps_id'] . "'";
            $displaypsm = mysqli_query($con, $sqlpsm);
            while ($rowpsm = mysqli_fetch_array($displaypsm)) {

              echo '<option value="' . $rowpsm['psm_id'] . '">' . $rowpsm['psm_info'] . '</option>';
            }


            echo '</select>
  </div>
  <span class="icon is-left">
    <i class="fas fa-hand-scissors"></i>
  </span>';

            if ($rowpd['ps_id'] == '4') {
              echo '<a href="post/ringsize"><small style="float:left;"><small class="has-text-info style="font-size:0.5em;">';
              echo "Don't know the ";

              echo 'ring size?</small></small></a> ';
            }


            if ($rowpd['ps_id'] == '5') {
              echo '<a href="post/banglesize"><small style="float:left;"><small class="has-text-info style="font-size:0.5em;">';
              echo "Don't know the ";

              echo 'bangle size?</small></small></a> ';
            }




            echo '</div></div>
			';

          }




          ?>





          <?php


          if ($rowpd['pmt_id'] != '0') {
            $sqlpsm = "Select * from `whitefeat_wf_new`.`package_metal` where pmt_id='" . $rowpd['pmt_id'] . "'";
            $displaypsm = mysqli_query($con, $sqlpsm);
            $rowpsm = mysqli_fetch_array($displaypsm);

            echo '<div class="column is-4">
	<h6 class="mb-1"><small>Metal: </small></h6>
	<div class="control has-icons-left" >
  <div class="select is-info is-fullwidth">
    <select>';

            echo '<option value="' . $rowpd['pmt_id'] . '" selected>' . $rowpsm['pmt_name'] . '</option>';

            echo '</select>
  </div>
  <span class="icon is-left">
    <i class="fas fa-check-circle"></i>
  </span>
</div></div>';

          }
          ?>





        </div>





        <div class="columns pl-3">


          <div class="column is-4">


            <?php

            if ($rowpd['pm_id'] == 1) {
              echo '
				 <h6 class="mb-1">
	<img src="assets/images/extra/diamond.png" style="height:18px;"/><small>&nbsp; &nbsp;Diamond  <small style="font-size:0.7em;">(certified)</small> 
	</small>
	
	<br><a href="post/diamondguide"><small style=""><i><small class="has-text-info" style="font-size:0.7em;">&nbsp; (Diamond Guide)</small></i></small></a></h6>
				 ';
            }
            if ($rowpd['pm_id'] == 2) {
              echo '
				 <h6 class="mb-1">
	<img src="assets/images/extra/gold.png" style="height:18px;"/><small>&nbsp; &nbsp; GOLD <small style="font-size:0.7em;">(certified)</small> 
	</small></h6>
				 ';
            }
            if ($rowpd['pm_id'] == 3) {
              echo '
				 <h6 class="mb-1">
	<img src="assets/images/extra/Rhodium.png" style="height:18px;"/><small>&nbsp; &nbsp;Rhodium 
	</small></h6>
				 ';
            }
            if ($rowpd['pm_id'] == 4) {
              echo '
				 <h6 class="mb-1">
	<img src="assets/images/extra/silver.png" style="height:18px;"/><small>&nbsp; &nbsp; Silver <small style="font-size:0.7em;">(certified)</small> 
	</small></h6>
				 ';

            }




            ?>





          </div>

        </div>

        <br>


        <?php


        $sqltg = "Select * from `whitefeat_wf_new`.`tag_package` where id_pack='" . $rowpd['id_pack'] . "'";
        $displaytg = mysqli_query($con, $sqltg);
        $countgW = mysqli_num_rows($displaytg);
        $rowtg = mysqli_fetch_array($displaytg);

        if ($countgW > 0) {
          $sqltg2 = "Select * from `whitefeat_wf_new`.`tags` where tag_id='" . $rowtg['tag_id'] . "' and tag_type='0'";
          $displaytg2 = mysqli_query($con, $sqltg2);
          $countg = mysqli_num_rows($displaytg2);
          $rowtg2 = mysqli_fetch_array($displaytg2);

          if ($countg > 0) {
            echo '<div class="columns pl-3 mt-0 mb-0">
  <div class="column">
  <div class="tags has-addons">
  <span class="tag"><i class="fas fa-star has-text-dark" style="color:#;"></i></span>
  <span class="tag is-';
            if ($rowtg2['tag_id'] == '1') {
              echo 'primary';
            }
            if ($rowtg2['tag_id'] == '2') {
              echo 'warning';
            }
            if ($rowtg2['tag_id'] == '3') {
              echo 'danger';
            }
            if ($rowtg2['tag_id'] > '3') {
              echo 'info';
            }
            echo '">' . strtoupper($rowtg2['tag_name']) . '</span>
</div>
  </div>
 
 </div>';

          }
        }
        ?>




        <div class="columns pl-3 mb-0">
          <div class="column">

            <?php

            // currency 
            $sel_cur = 1;
            $cnot = '';
            $crate = 1;
            if ($GLOBALS['customer'] != 0) {
              $sqlcrc = "Select cur_id from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
              $displaycrc = mysqli_query($con, $sqlcrc);
              $rowcrc = mysqli_fetch_array($displaycrc);
              $sel_cur = $rowcrc['cur_id'];
            } else {
              $sqlcrc = "Select cookie_currency from `whitefeat_wf_new`.`cookie_status` where cookie_id='" . $GLOBALS['cookid'] . "'";
              $displaycrc = mysqli_query($con, $sqlcrc);
              $rowcrc = mysqli_fetch_array($displaycrc);
              $sel_cur = $rowcrc['cookie_currency'];
            }
            $sqlcrc2 = "Select * from `whitefeat_wf_new`.`currency` where cur_id='" . $sel_cur . "'";
            $displaycrc2 = mysqli_query($con, $sqlcrc2);
            $rowcrc2 = mysqli_fetch_array($displaycrc2);
            $cnot = $rowcrc2['cur_name'];
            $crate = ($rowcrc2['cur_rate']);
            $dynamicPrices = dynamicPriceCalculator($productname, $crate);
            $newprice = $dynamicPrices['originalPrice'];
            if ($rowpd['offer'] > 0) {
              $newprice = $dynamicPrices['originalPrice'] - $dynamicPrices['discount'];
            }

            //b2b check
            $b2b_check = 0;
            if ($GLOBALS['customer'] != 0) {
              $sqlb2b = "Select b2b from `whitefeat_wf_new`.`customer` where c_id='" . $GLOBALS['customer'] . "'";
              $displayb2b = mysqli_query($con, $sqlb2b);
              $rowb2b = mysqli_fetch_array($displayb2b);
              if ($rowb2b['b2b'] == 1) {
                $b2b_check = 1;
                $newprice = $rowpd['price_b2b'];
              }

            }


            echo '
   <h3 class="is-size-4 has-text-weight-semibold" style="color:#333;">';
            echo $cnot . " " . round(($newprice), 2);

            echo '&nbsp;';
            if ($b2b_check == 1) {
              echo '<span class="has-text-weight-normal is-size-6" style="opacity:0.6;"><small><small>B2B rate</small></small></span>';
            }
            if ($rowpd['offer'] > 0 && $b2b_check == 0) {
              echo '<del class="has-text-weight-normal is-size-5" style="opacity:0.5;"><small><small>';
              echo $cnot . " " . round(($dynamicPrices['originalPrice']), 2);
              echo '</small></small></del>';
            }
            echo '</h3>';

            ?>


          </div>



        </div>

        <div class="columns pl-3" style="margin-top:-1.5em; margin-bottom:2em;">
          <div class="column is-4">
            <?php
            if ($rowpd['offer'] > 0 && $b2b_check == 0) {
              echo '<small>' . $rowpd['offer'] . '% off on diamond</small>';
            }
            ?>
          </div>


          <div class="column is-4 pl-3 letter-spacing" style="margin-top:-1.2em; letter-spacing:1.5px;">
            <button class="button is-success is-normal is-fullwidth add_cart" data-ref="<?php echo $rowpd['id_pack']; ?>">
              <span>ADD TO CART</span>
              <span class="icon is-small">
                <i class="fas fa-shopping-cart"></i>
              </span>
            </button>

          </div>


        </div>


        <hr style="color:#eee;border:0;height:1px;">
        <div class="columns pl-3" style="margin-top:2em;">


          <h3 class="is-size-4 letter-spacing"><i class="fas fa-hand-point-right has-text-info"></i> Try before you Buy:
          </h3>

        </div>


        <div class="" style="display:flex;flex-direction:column;gap:20px;">


          <div class="">
            <span class="box is-rounded" style="background:rgba(72,199,142,0.2);">
              <div class="field">
                <label class="label"><i class="fas fa-video has-text-success"></i> &nbsp; Want a closer look?</label>
                <div class="control">
                  <small><small>Get on a live video call with our design consultants.</small></small>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <button class="button is-primary schedule-button" data-target="modal-ter">Start a video call</button>

                  <div class="modal" id="modal-ter">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                      <header class="modal-card-head pl-2 pr-2"
                        style="max-height:100px!important; margin-bottom:-20px; background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
                        <p class="modal-card-title">

                          <span class="is-size-4 has-text-weight-bold "> &nbsp; <i class="fas fa-video"></i>&nbsp; START A
                            CALL&nbsp; </span>




                        </p>

                        <button class="delete" aria-label="close"></button>
                      </header>
                      <section class="modal-card-body">

                        <div class="columns">

                          <div class="column is-6">


                            <figure class="image is-400x400">
                              <img src="assets/images/qr-code.png" class="">
                            </figure>


                            <div class="p-0 has-background-light" style="border:0px dotted #eee; overflow:hidden;">



                              <div class="columns p-0">



                                <div class="column is-6 p-5 has-text-centered" style="background:rgba(72,199,142,0.2);">
                                  <figure class="image pl-2 has-text-centered">
                                    <img src="assets/images/whatsapp.png"
                                      style="height:auto; width:40%; min-height:40px;" />
                                  </figure>
                                  Whatsapp
                                </div>



                                <div class="column is-6 p-5 " style="background:rgba(62,142,208,0.2);">
                                  <figure class="image pl-2 has-text-centered">
                                    <img src="assets/images/viber.png" style=" height:auto; margin-top:5px; width:40%;" />
                                  </figure>
                                  &nbsp;&nbsp;Viber
                                </div>


                              </div>



                              <div class="columns p-0 pb-2">
                                <div class="column is-3">&nbsp;</div>
                                <div class="column is-9">
                                  <span
                                    class=" is-large is-secondary is-light is-fullwidth no-letter-spacing is-size-4"><strong><small>SCAN
                                        ME</small></strong> &nbsp;

                                  </span>
                                </div>
                              </div>




                            </div>

                          </div>
                          <div class="column is-6 pt-5">


                            <p class="is-size-7 letter-spacing" style="font-size:0.8em;">
                              <i class="fas fa-check-circle has-text-success"></i>&nbsp; Get on a live video call with our
                              design consultants.<br>
                              <BR>

                              <i class="fas fa-check-circle has-text-success"></i>&nbsp; Live Available On
                              <strong>Whatsapp, Viber & Messenger!</strong><br><br>

                              <span class="has-text-weight-light ">
                                <i class="fas fa-check-circle has-text-success"></i>&nbsp; SUN - SAT &nbsp;
                                ( 9am to 6pm )
                                <br>
                                <br>
                                <small><i class="fas fa-check-circle has-text-success"></i>&nbsp; OPENS 365 DAYS! &nbsp;
                                  <Strong><a href="#">Location map</a>
                                  </strong>
                                </small>
                              </span>

                            </p>

                          </div>

                        </div>

                      </section>
                      <!--
    <footer class="modal-card-foot">
      <button class="button is-danger is-light modal-close-button">Cancel</button>
    </footer>-->
                    </div>
                  </div>

                </div>
              </div>

            </span>

          </div>








          <div class="">
            <span class="box is-rounded" style="background:rgba(62,142,208,0.2);">
              <div class="field">
                <label class="label"><i class="fas fa-home has-text-info"></i> &nbsp; Try it on at home</label>
                <div class="control">
                  <small><small>Book a free appointment to try this jewellery at your home.</small></small>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <button class="button is-info appointment-button" data-target="modal-ter2">Book Home
                    Appointment</button>

                  <div class="modal" id="modal-ter2">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                      <header class="modal-card-head"
                        style="background: rgb(241,243,244);
background: linear-gradient(90deg, rgba(241,243,244,1) 0%, rgba(226,225,219,1) 34%, rgba(80,225,255,1) 80%, rgba(116,228,250,1) 98%);">
                        <p class="modal-card-title"><i class="fas fa-house-user"></i> Home Appointment Form</p>
                        <button class="delete" aria-label="close"></button>
                      </header>
                      <section class="modal-card-body">

                        <h4 class="mb-2 has-background-light p-2"><i class="fas fa-tag has-text-info"></i>
                          &nbsp;<?php echo ucfirst($rowpd['p_name']); ?></h4>


                        <?php

                        if ($GLOBALS['customer'] == 0) {
                          echo '<div class="field">
  <label class="label">Name <span class="has-text-danger">*</span>
</label>
  <div class="control">
  <div class="control has-icons-left has-icons-right">
    <input class="input home_name" type="text" placeholder="Your Full Name">
	<span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
	</div>
  </div>
</div>

<div class="field">
  <label class="label">Full Address <span class="has-text-danger">*</span></label>
  <div class="control has-icons-left has-icons-right">
    <input class="input home_add" type="text" placeholder="Your Full Address" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-map-marker"></i>
    </span>
    
  </div>
</div>

<div class="field">
  <label class="label">Contact number <span class="has-text-danger">*</span></label>
  <div class="control has-icons-left has-icons-right">
    <input class="input home_phone" type="text" placeholder="+97798XXXXXXXX" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-mobile"></i>
    </span>
    
  </div>
</div>';

                        }

                        ?>



                        <div class="field">
                          <label class="label">Message <small class="is-size-7"></small></label>
                          <div class="control">
                            <textarea class="textarea home_msg"
                              placeholder="Please Write Jewelleries you want to try..."></textarea>
                          </div>
                        </div>

                        <div class="field">
                          <div class="control">
                            <label class="checkbox">

                              <i class="fas fa-check-circle"></i> &nbsp;I agree to the <a href="post/terms"
                                target="_blank">terms and conditions</a>
                            </label>
                          </div>
                        </div>


                        <div class="field is-grouped mt-2">
                          <div class="control">
                            <button class="button is-info send_home_appoint_product"
                              data-ref="<?php echo $rowpd['id_pack']; ?>">Submit Form</button>
                          </div>
                          <!--
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>-->
                        </div>




                      </section>
                    </div>
                  </div>

                </div>
              </div>

            </span>

          </div>





        </div>



      </div>




    </div>


    <!--
<div class="columns mt-2" style="background-color:#F9F9FA; height:15em;">

  
  <div class="column is-6 is-centered has-background-info ">
  <figure class="image has-text-centered is-centered">
  <img class="is-rounded is-centered" src="assets/images/product/slider/1.jpg" style="width:200px;">
</figure>
  </div>


</div>
-->



    </div>



    <div class="container is-fluid mt-5 scroll-area " id="product_details"
      style="background-color:#F9F9FA; min-height:20em;">
      <h3 class="letter-spacing is-size-4 has-text-weight-semibold p-3 pl-4" style="color:#333;"> Product Details</h3>

      <div>
        <div style="display:flex;gap:30px;flex-wrap:wrap;justify-contents:space-between;margin-bottom:20px;">
          <div class="columns">
            <div style="display:flex;gap:30px;flex-wrap:wrap;justify-contents:space-between;">
              <div class="column">
                <h4 class="letter-spacing is-size-7 p-3 pl-4 has-text-weight-normal"> <u>Full information</u></h4>
              </div>
              <div class="column">
                <h4 class="is-size-6 has-text-weight-light letter-spacing"> <?php echo $rowpd['p_des']; ?> </h4>
              </div>
              <div class="column">
                SKU: <span class="has-text-info"><?php echo 'WFST#' . $rowpd['id_pack'] . ''; ?></span>
              </div>
            </div>
            <div class="pack-png">
              <img src="assets/images/pack.png" />
            </div>
          </div>
        </div>

      </div>



      <div class="columns  pl-4">
        <div class="column is-9">

          <?php echo $rowpd['p_text']; ?>


        </div>
      </div>





    </div>




    <?php include('footer.php'); ?>

    <!-- end body part -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/owl/owl.carousel.min.js"></script>
    <?php include('js.php'); ?>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prettify/188.0.0/prettify.min.js"></script>
    <script>try { prettyPrint(); } catch (e) { }</script>

    <script type="text/javascript">

      document.addEventListener('DOMContentLoaded', () => {
        // Functions to open and close a modal
        function openModal($el) {
          $el.classList.add('is-active');
        }

        function closeModal($el) {
          $el.classList.remove('is-active');
        }

        function closeAllModals() {
          (document.querySelectorAll('.modal') || []).forEach(($modal) => {
            closeModal($modal);
          });
        }

        // Add a click event on buttons to open a specific modal here add class name
        (document.querySelectorAll('.schedule-button, .appointment-button') || []).forEach(($trigger) => {
          const modal = $trigger.dataset.target;
          const $target = document.getElementById(modal);

          $trigger.addEventListener('click', () => {
            openModal($target);
          });
        });


        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-close-button') || []).forEach(($close) => {
          const $target = $close.closest('.modal');

          $close.addEventListener('click', () => {
            closeModal($target);
          });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
          const e = event || window.event;

          if (e.keyCode === 27) { // Escape key
            closeAllModals();
          }
        });
      });
    </script>
    <script>
      $('.scrollto').click(function () {
        $('html, body').animate({
          scrollTop: eval($('#' + $(this).attr('data-target')).offset().top - 120)
        }, 1000);
      });
    </script>
    <a href="#" id="autocomplete_trigger"></a>
  </body>

  </html>


<?php } ?>