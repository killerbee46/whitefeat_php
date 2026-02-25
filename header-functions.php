<?php

function fetchPriceQueries() {
    $actualPrice = "IF(
        isFixedPrice,
        p.fixed_price,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp + p.mk_gm +((p.jarti + gold.lux_tax) / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        (
                            4 * silver.price * p.weight / 11.664
                        ),
                        IF(
                        p.pmt_id = 13,
                        (
                        pr.rate * p.weight
                        ),
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp + p.mk_gm +(p.jarti / 100) * silver.price / 11.664 * p.weight
                        )
                        )
                    )
                ),
                0
            ) +(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price
                ) * dc_qty + p.dc_rate_bce2 * p.dc_qty_bce2
            )
        )
    )";

    $discount = "IF(
        isFixedPrice,
        p.fixed_price * p.offer / 100,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp +(
                            p.mk_gm +(p.jarti / 100) * gold.price / 11.664
                        ) * p.weight
                    ) + (( gold.lux_tax / 100  ) *(
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp +(
                            p.mk_gm +(p.jarti / 100) * gold.price / 11.664
                        ) * p.weight
                    ) 
                    )) ,
                    IF(
                        p.pmt_id = 11,
                        0,
                        IF(
                            p.pmt_id = 13,
                            (pr.rate * p.weight),
                            (
                                pr.purity / 100 * silver.price / 11.664 * p.weight
                            ) +(
                                p.mk_pp + p.mk_gm +(p.jarti / 100) * silver.price / 11.664 * p.weight
                            )
                        )
                    )
                ),
                0
            )
        ) * p.offer / 100 +(
            dia.discount / 100 *(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price
                ) * dc_qty + p.dc_rate_bce2 * p.dc_qty_bce2
            ) + IF(
                p.pmt_id = 11,
                (
                    0.5 * silver.price * p.weight / 11.664
                ),
                0
            )
        )
    )";

    $final_price = $actualPrice ." - ". $discount;

    return [
        "actualPrice"=>$actualPrice,
        "discount"=>$discount,
        "finalPrice"=>$final_price,
    ];
}
function fetchProducts($filters)
{
    $prices = fetchPriceQueries();
    $actualPrice = $prices['actualPrice'];
    $discount = $prices['discount'];
    $finalPrice = $prices['finalPrice'];

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
    ) AS image, 
    ". $actualPrice ." AS actual_price, 
    ". $discount ." AS discount, ". $finalPrice ." AS final_price,
        IF(
        isFixedPrice,
        p.fixed_price,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        (
                            2.5 * silver.price * p.weight / 11.664
                        ),
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            ) +(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            )
        )
    ) AS actual_price_b2b, IF(
        isFixedPrice,
        p.fixed_price * p.offer_b2b / 100,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        0,
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            )
        ) * p.offer_b2b / 100 +(
            dia.discount / 100 *(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            ) + IF(
                p.pmt_id = 11,
                (
                    0.7 * silver.price * p.weight / 11.664
                ),
                0
            )
        )
    ) AS discount_b2b, (
        IF(
        isFixedPrice,
        p.fixed_price,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        (
                            2.5 * silver.price * p.weight / 11.664
                        ),
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            ) +(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            )
        )
    )
        ) - ( 
        IF(
        isFixedPrice,
        p.fixed_price * p.offer_b2b / 100,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        0,
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            )
        ) * p.offer_b2b / 100 +(
            dia.discount / 100 *(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            ) + IF(
                p.pmt_id = 11,
                (
                    0.7 * silver.price * p.weight / 11.664
                ),
                0
            )
        )
    )    
        ) AS final_price_b2b
    FROM
        package p
    JOIN package_metal pr ON
        p.pmt_id = pr.pmt_id
    JOIN package_material pm ON
        p.pm_id = pm.pm_id
    JOIN package_material dia ON
        dia.pm_id = 1
    JOIN package_material gold ON
        gold.pm_id = 2
    JOIN package_material silver ON
        silver.pm_id = 3
    WHERE  " . $filters;
    
    
    return $dynamicPriceSql;

}

function fetchProduct($id)
{
    $prices = fetchPriceQueries();
    $actualPrice = $prices['actualPrice'];
    $discount = $prices['discount'];
    $finalPrice = $prices['finalPrice'];

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
    ) AS image, 
    ". $actualPrice ." AS actual_price, 
    ". $discount ." AS discount, ". $finalPrice ." AS final_price,
        IF(
        isFixedPrice,
        p.fixed_price,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        (
                            2.5 * silver.price * p.weight / 11.664
                        ),
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            ) +(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            )
        )
    ) AS actual_price_b2b, IF(
        isFixedPrice,
        p.fixed_price * p.offer_b2b / 100,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        0,
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            )
        ) * p.offer_b2b / 100 +(
            dia.discount / 100 *(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            ) + IF(
                p.pmt_id = 11,
                (
                    0.7 * silver.price * p.weight / 11.664
                ),
                0
            )
        )
    ) AS discount_b2b, (
        IF(
        isFixedPrice,
        p.fixed_price,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        (
                            2.5 * silver.price * p.weight / 11.664
                        ),
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            ) +(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            )
        )
    )
        ) - ( 
        IF(
        isFixedPrice,
        p.fixed_price * p.offer_b2b / 100,
        (
            IF(
                p.pmt_id > 0,
                IF(
                    p.pmt_id < 10,
                    (
                        pr.purity / 100 * gold.price / 11.664 * p.weight
                    ) +(
                        p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * gold.price / 11.664 * p.weight
                    ),
                    IF(
                        p.pmt_id = 11,
                        0,
                        (
                            pr.purity / 100 * silver.price / 11.664 * p.weight
                        ) +(
                            p.mk_pp_b2b + p.mk_gm_b2b +(p.jarti_b2b / 100) * silver.price / 11.664 * p.weight
                        )
                    )
                ),
                0
            )
        ) * p.offer_b2b / 100 +(
            dia.discount / 100 *(
                IF(
                    p.p_name LIKE '%solitaire%',
                    p.dc_rate,
                    dia.price * .75
                ) * dc_qty + p.dc_rate_b2b_b2e2 * p.dc_qty_b2b_b2e2
            ) + IF(
                p.pmt_id = 11,
                (
                    0.7 * silver.price * p.weight / 11.664
                ),
                0
            )
        )
    )    
        ) AS final_price_b2b
    FROM
        package p
    JOIN package_metal pr ON
        p.pmt_id = pr.pmt_id
    JOIN package_material pm ON
        p.pm_id = pm.pm_id
    JOIN package_material dia ON
        dia.pm_id = 1
    JOIN package_material gold ON
        gold.pm_id = 2
    JOIN package_material silver ON
        silver.pm_id = 3
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
?>