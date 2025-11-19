<?php
function fetchProducts($filters)
{
    $dynamicPriceSql = "SELECT
    p.id_pack AS id_pack,
	p.p_name,
	p.offer,
    IF(
        p.image <> '',
        p.image,
        (
        SELECT
            ps.s_path
        FROM
            package_slider ps
        WHERE
            ps.id_pack = p.id_pack
        LIMIT 1
    )
    ) AS image,(
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) AS actual_price,(
        IF(
            p.offer > 0,
            (
                (
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) *(p.offer / 100)
            ),
            0
        )
    ) AS discount,(
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) - (
        IF(
            p.offer > 0,
            (
                (
                    pr.rate / 11.664 * p.weight +(p.dc_rate * p.dc_qty) +(
                        p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * pr.rate * p.weight
                    )
                ) *(p.offer / 100)
            ),
            0
        )
    ) AS final_price
FROM
    package p
JOIN package_metal pr ON
    p.pmt_id = pr.pmt_id
JOIN package_material pm ON
	p.pm_id = pm.pm_id
	WHERE " . $filters;
    return $dynamicPriceSql;

}

function fetchProduct($id)
{
    $dynamicPriceSql = "SELECT
    p.*,
    IF(
        p.image <> '',
        p.image,
        (
        SELECT
            ps.s_path
        FROM
            package_slider ps
        WHERE
            ps.id_pack = p.id_pack
        LIMIT 1
    )
    ) AS image,(
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) AS actual_price,(
        IF(
            p.offer > 0,
            (
                (
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) *(p.offer / 100)
            ),
            0
        )
    ) AS discount,(
        IF(p.pmt_id = 11, pr.rate,pr.rate / 11.664) * p.weight +(p.dc_rate * p.dc_qty) +(
            p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * ( pm.price * pr.purity / 100 ) * p.weight
        )
    ) - (
        IF(
            p.offer > 0,
            (
                (
                    pr.rate / 11.664 * p.weight +(p.dc_rate * p.dc_qty) +(
                        p.mk_pp + p.mk_gm * p.weight +(p.jarti / 100) * pr.rate * p.weight
                    )
                ) *(p.offer / 100)
            ),
            0
        )
    ) AS final_price
FROM
    package p
JOIN package_metal pr ON
    p.pmt_id = pr.pmt_id
JOIN package_material pm ON
	p.pm_id = pm.pm_id
WHERE 
p.id_pack ='" . $id . "';";
    return $dynamicPriceSql;
}

function getTags()
{
    //   price
    if (array_key_exists('price', $_GET)) {
        if ($_GET['price'] == 1) {
            echo '<span class="tag is-info">PRICE : <small>Less than Rs 10,000</small> </span>';
        }
        if ($_GET['price'] == 2) {
            echo '<span class="tag is-info">PRICE : Rs 10,000 - Rs 20,000</span>';
        }
        if ($_GET['price'] == 3) {
        }
        if ($_GET['price'] == 4) {
            echo '<span class="tag is-info">PRICE : Rs 50,000 - Rs 100,000</span>';
        }
        if ($_GET['price'] == 5) {
            echo '<span class="tag is-info">PRICE : Rs 100,000 - Rs 200,000</span>';
        }
        if ($_GET['price'] == 6) {
            echo '<span class="tag is-info">Over Rs 200,000</span>';
        }
    }

    // wt
    if (array_key_exists('weight', $_GET)) {
        if ($_GET['weight'] == 1) {
            echo '<span class="tag is-info">WEIGHT : <small>Less than 2gm</small> </span>';
        }
        if ($_GET['weight'] == 2) {
            echo '<span class="tag is-info">WEIGHT : 2gm - 5gm</span>';
        }
        if ($_GET['weight'] == 3) {
            echo '<span class="tag is-info">WEIGHT : 5gm - 10gm</span>';
        }
        if ($_GET['weight'] == 4) {
            echo '<span class="tag is-info">WEIGHT : 10gm - 20gm</span>';
        }
        if ($_GET['weight'] == 5) {
            echo '<span class="tag is-info">WEIGHT : <small>Above</small> 20gm</span>';
        }
    }

    // material 
    if (array_key_exists('metal', $_GET)) {
        if ($_GET['metal'] == 1) {
            echo '<span class="tag is-info">MATERIAL : DIAMOND</span>';
        }
        if ($_GET['metal'] == 2) {
            echo '<span class="tag is-info">MATERIAL : GOLD</span>';
        }
        if ($_GET['metal'] == 3) {
            echo '<span class="tag is-info">MATERIAL : RHODIUM</span>';
        }
        if ($_GET['metal'] == 4) {
            echo '<span class="tag is-info">MATERIAL : SILVER</span>';
        }
    }



    if (array_key_exists('sort', $_GET)) {
        if ($_GET['sort'] == 'date') {
            echo '<span class="tag is-link"><i class="fas fa-sort-amount-up"></i> Latest First</span>';
        }
        if ($_GET['sort'] == 'price-lth') {
            echo '<span class="tag is-link"><i class="fas fa-sort-amount-up"></i> Price : Low to High</span>';
        }
        if ($_GET['sort'] == 'price-htl') {
            echo '<span class="tag is-link"><i class="fas fa-sort-amount-up"></i> Price : High to Low</span>';
        }
        if ($_GET['sort'] == 'discounted') {
            echo '<span class="tag is-link"><i class="fas fa-sort-amount-up"></i> Discounted Items First</span>';
        }
    }
}
function dynamicProductPrice($p_name)
{
    $dynamicPriceSql = "
    SELECT 
    offer,
    (pr.rate/11.664 * p.weight + p.dc_rate * p.dc_qty + IF(p.mk_pp, p.mk_pp, p.mk_gm * p.weight) ) AS dynamic_price,
    p.offer*p.dc_rate*p.dc_qty/100 as discount
FROM 
    `whitefeat_wf_new`.`package` p
JOIN 
    `whitefeat_wf_new`.`package_metal` pr ON p.pmt_id = pr.pmt_id 
    
WHERE 
p.p_name ='" . $p_name . "';";
    return $dynamicPriceSql;

}
?>

<?php

function dynamicPriceCalculator($p_name, $c_rate)
{
    include 'db_connect.php';
    $dynamicQuery = dynamicProductPrice($p_name);
    $dynamicDisplay = mysqli_query($con, $dynamicQuery);
    $dynamicRow = (!empty($dynamicDisplay)) ? mysqli_fetch_array($dynamicDisplay) : [];
    $originalPrice = $dynamicRow['dynamic_price'];
    $discount = ($dynamicRow['offer'] > 0) ? ($dynamicRow['discount']) : 0;
    return [
        "originalPrice" => $originalPrice / $c_rate,
        "discount" => $discount / $c_rate
    ];
}
?>