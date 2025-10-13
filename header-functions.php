<?php
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