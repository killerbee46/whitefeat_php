<?php
include 'db_connect.php';
// $search = (isset($_GET['cat_id'])) ? " and cat_id = ".$_GET['cat_id'];
$category = (isset($_GET['cat_id'])) ? " and p.cat_id = " . $_GET['cat_id'] . " " : "";
$sqlslt2 = "SELECT  p.id_pack as id, p.p_name,IF(p.image <> '', p.image, (SELECT ps.s_path FROM package_slider ps WHERE ps.id_pack = p.id_pack LIMIT 1)) AS image,(pr.rate/11.664 * p.weight + p.dc_rate * p.dc_qty + IF(p.mk_pp, p.mk_pp, p.mk_gm * p.weight) ) AS dynamic_price FROM package p JOIN package_metal pr ON p.pmt_id = pr.pmt_id where " . (isset($_GET['search']) ? " lower(p.p_name) LIKE '%" . $_GET['search'] . "%'" : ' 1 ') . $category . " order by p.id_pack desc limit 12 offset " . (isset($_GET['page']) ? (int) $_GET['page'] : 1) * 12 - 12;
$countSql = "SELECT  count(*) as total_count from package p where " . (isset($_GET['search']) ? " lower(p.p_name) LIKE '%" . $_GET['search'] . "%'" : ' 1 ') . $category;
$displayCount = mysqli_query($con, $countSql);
$rowCount = mysqli_fetch_array($displayCount);
$total_count = $rowCount['total_count'];
$displayslt2 = mysqli_query($con, $sqlslt2);
$countslt2 = (!empty($displayslt2) && $displayslt2 !== true) ? mysqli_num_rows($displayslt2) : 0;

// pagination handler

?>

<head>
    <style>
        .actions {
            visibility: hidden;
        }

        .product_card:hover .actions {
            visibility: visible;
        }

        .pagination {
            display: flex;
            gap: 6px;
            margin: 20px 0;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .pagination a,
        .pagination span.page-btn {
            padding: 7px 12px;
            border: 1px solid #ddd;
            background: #fff;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
        }

        .pagination a:hover {
            background: #4a90e2;
            color: #fff;
            border-color: #4a90e2;
        }

        .pagination .active {
            background: #4a90e2;
            color: #fff;
            border: 1px solid #4a90e2;
            padding: 7px 12px;
            border-radius: 5px;
        }

        .pagination .disabled {
            background: #eee;
            color: #aaa;
            border: 1px solid #ddd;
            cursor: not-allowed;
        }

        .pagination .dots {
            padding: 7px 10px;
            color: #777;
        }
    </style>
</head>

<div style="display:flex;justify-content:space-between;align-items:center;padding-bottom:20px;">
    <div style="font-size:18px;font-weight:600;">Product List</div>
    <div style="display:flex; gap:20px;align-items:center;">
        <div>
            <select class="category_select" style="cursor:pointer;" onchange="filterSelectorHandle(this,'cat_id')">
                <option <?= isset($_GET['cat_id']) && 0 < ($_GET['cat_id']) ? "selected" : "" ?> disabled>Categories
                </option>
                <option value="0">NONE</option>
                <?php
                $sql1 = "Select * from `whitefeat_wf_new`.`package_category` order by cat_name";
                $display = mysqli_query($con, $sql1);
                while ($row = mysqli_fetch_array($display)) { ?>
                    <option <?= isset($_GET['cat_id']) && $row['cat_id'] == $_GET['cat_id'] ? "selected" : "" ?>
                        value="<?= $row['cat_id'] ?>"><b><?= ucfirst($row['cat_name']) ?></b></option>
                <?php } ?>
            </select>
        </div>
        <div style="position:relative;">
            <div class="search-icon-container"
                style="position:absolute;z-index:10;top:0;bottom:0;height:100%;display:flex; align-items: center;padding-left:10px;">
                <i class="fas fa-search search-icon"></i>
            </div><input value="<?= $_GET["search"] ?? null ?>" id="product_search" type="search" class="nav-search"
                placeholder="Search..." style="height: 100%;" />
        </div>
    </div>
</div>
<hr style="color: gainsboro;margin-top:0;margin-bottom:20px" />
<div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:20px;">
    <?php
    if ($countslt2 === 0) {
        include '../no-data.php';
    }
    $sn = 1;
    while ($rowslt2 = (!empty($displayslt2) && $displayslt2 !== true) ? mysqli_fetch_array($displayslt2) : 0) { ?>
        <div class="product_card"
            style="border:1px solid bisque;width:33%;max-width:300px;border-radius:8px;overflow:hidden;cursor:pointer;position:relative;">
            <div class="actions" style="display:flex;gap:10px; position:absolute;right:10px; top:10px;">
                <div title="Edit"><a style="padding: 10px;background:white;border-radius:50%;"
                        href="/wfs/product_edit.php?id=<?= $rowslt2['id'] ?>" target="_blank"><i class="fas fa-pen"></i></a>
                </div>
                <div title="Delete">
                    <a href="#" class=" del_product" style="padding: 10px;background:white;border-radius:50%;">
                        <i class="fas fa-trash-alt" style="color:crimson"></i>
                    </a>
                </div>
            </div>
            <div class="product_image" style="
        width:100%;
        border-bottom:0.5px solid gainsboro;
        max-width:300px;
        aspect-ratio:1/1;
        object-position:center;
        object-fit:cover;
        background-size:cover;
        background-repeat:no-repeat;
        ">
                <img width="100%" height="100%" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?php
                if (isset($rowslt2['image'])) {
                    echo $rowslt2['image'];
                } else {
                    echo "no-image.png";
                }
                ?>" />
            </div>
            <div class="product_details" style="padding:10px;">
                <div class="product_prices" style="display:flex;justify-content:space-between;">
                    <div class="b2c" style="font-weight:550;font-size:14px;color:gray !important;">
                        <div style="color:blueviolet">B2C</div>
                        <div><small>RS </small><?= number_format($rowslt2['dynamic_price'], 2) ?></div>
                    </div>
                    <div class="b2b" style="font-weight:550;font-size:14px;color:gray !important;">
                        <div style="color:blueviolet">B2B</div>
                        <div><small>RS </small>45000</div>
                    </div>
                </div>
                <div class="product_name" style="margin:7px auto;font-weight:600;font-size:16px;font-style:italic;text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;">
                    <?= $rowslt2['p_name'] ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div>

</div>
<div style="display:flex; justify-content: center;margin: 20px auto;">
    <?php
    // Example values (set dynamically from DB queries)
    $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $totalPages = 50;
    $adjacent = 2; // pages shown on each side of current page
    
    echo '<div class="pagination">';

    // Previous Button
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '" class="page-btn">Prev</a>';
    } else {
        echo '<span class="disabled page-btn">Prev</span>';
    }

    // Page numbers with ellipsis
    if ($currentPage > ($adjacent + 1)) {
        echo '<a href="?page=1">1</a>';
        if ($currentPage > ($adjacent + 2))
            echo '<span class="dots">…</span>';
    }

    for ($i = max(1, $currentPage - $adjacent); $i <= min($totalPages, $currentPage + $adjacent); $i++) {
        if ($i == $currentPage) {
            echo '<span class="active">' . $i . '</span>';
        } else {
            echo '<a href="#" onclick=filterSelectorHandle(' . $i . ',"page")>' . $i . '</a>';
        }
    }

    if ($currentPage < ($totalPages - $adjacent)) {
        if ($currentPage < ($totalPages - $adjacent - 1))
            echo '<span class="dots">…</span>';
        echo '<a href="?page=' . $totalPages . '">' . $totalPages . '</a>';
    }

    // Next Button
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '" class="page-btn">Next</a>';
    } else {
        echo '<span class="disabled page-btn">Next</span>';
    }

    echo '</div>';
    ?>
</div>
<script>
    const url = new URL(document.location.href)
    function filterSelectorHandle(e, filter_name) {
        const value = e.value
        const searchParams = url.searchParams
        if (filter_name === "page") {
            searchParams.set(filter_name, e)
        }
        else {
            if (value === "0") {
                searchParams.delete(filter_name)
            }
            else {
                searchParams.set(filter_name, value)
            }
        }
        window.location.href = url
    }

    var searchInput = document.getElementById('product_search')
    searchInput.onkeypress = function (e) {
        if (!e) e = window.event;
        var keyCode = e.code || e.key;
        if (keyCode == 'Enter') {
            filterSelectorHandle(searchInput, "search")
            return false;
        }
    }
</script>
<?php ?>