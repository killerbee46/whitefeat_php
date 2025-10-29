<?php
include 'db_connect.php';
// $search = (isset($_GET['cat_id'])) ? " and cat_id = ".$_GET['cat_id'];
$category = (isset($_GET['cat_id'])) ? " and cat_id = " . $_GET['cat_id'] . " " : "";
$sqlslt2 = "Select * from `whitefeat_wf_new`.`package` where " . ((isset($_GET['term'])) ? " lower(p_name) LIKE '%" . $_GET['term'] . "%'" : ' 1 ' . $category . "order by id_pack desc limit 12");
$displayslt2 = mysqli_query($con, $sqlslt2);
$countslt2 = (!empty($displayslt2) && $displayslt2 !== true) ? mysqli_num_rows($displayslt2) : 0;
?>

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
            </div><input onkeydown="debounceSearch(this)" class="nav-search" placeholder="Search..."
                style="height: 100%;" />
        </div>
    </div>
</div>
<hr style="color: gainsboro;margin-top:0;margin-bottom:20px" />
<div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:20px;">
    <?php
    if ($countslt2 === 0) {
        include 'no-data.php';
    }
    $sn = 1;
    while ($rowslt2 = (!empty($displayslt2) && $displayslt2 !== true) ? mysqli_fetch_array($displayslt2) : 0) { ?>
        <div class="product_card"
            style="border:1px solid bisque;width:33%;max-width:300px;border-radius:8px;overflow:hidden;cursor:pointer;">
            <div class="product_image" style="
        width:100%;
        border-bottom:0.5px solid gainsboro;
        max-width:300px;
        aspect-ratio:1/1;
        /* background: url(https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?php
        $sqlpw2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowslt2['id_pack'] . "' limit 1";
        $displaypw2 = mysqli_query($con, $sqlpw2);
        $rowpw2 = mysqli_fetch_array($displaypw2);
        if (isset($rowslt2['image'])) {
            echo $rowslt2['image'];
        } else if (!empty($rowpw2) && array_key_exists('s_path', $rowpw2)) {
            echo $rowpw2['s_path'];
        } else {
            echo "no-image.png";
        }
        ?>); */
        object-position:center;
        object-fit:cover;
        background-size:cover;
        background-repeat:no-repeat;
        ">
                <img width="100%" height="100%" src="https://whitefeatherbucket.s3.ap-south-1.amazonaws.com/product_images/thumb/<?php
                $sqlpw2 = "Select * from `whitefeat_wf_new`.`package_slider` where id_pack='" . $rowslt2['id_pack'] . "' limit 1";
                $displaypw2 = mysqli_query($con, $sqlpw2);
                $rowpw2 = mysqli_fetch_array($displaypw2);
                if (isset($rowslt2['image'])) {
                    echo $rowslt2['image'];
                } else if (!empty($rowpw2) && array_key_exists('s_path', $rowpw2)) {
                    echo $rowpw2['s_path'];
                } else {
                    echo "no-image.png";
                }
                ?>" />
            </div>
            <div class="product_details" style="padding:10px;">
                <div class="product_prices" style="display:flex;justify-content:space-between;">
                    <div class="b2c" style="font-weight:550;font-size:14px;color:gray !important;">
                        <div style="color:blueviolet">B2C</div>
                        <div><small>RS</small>45000</div>
                    </div>
                    <div class="b2b" style="font-weight:550;font-size:14px;color:gray !important;">
                        <div style="color:blueviolet">B2B</div>
                        <div><small>RS</small>45000</div>
                    </div>
                </div>
                <div class="product_name" style="margin:7px auto;font-weight:600;font-size:16px;font-style:italic;text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;">
                    <?php echo $rowslt2['p_name'] ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    const url = new URL(document.location.href)
    function filterSelectorHandle(e, filter_name) {
        const value = e.value
        const searchParams = url.searchParams
        if (value === "0") {
            searchParams.delete(filter_name)
        }
        else {
            searchParams.set(filter_name, value)
        }
        window.location.href = url
    }

    function debounceSearch(search) {
        let timer;
            clearTimeout(timer);
            timer = setTimeout(() => {
                if (search.value !== "") {
                    filterSelectorHandle(search,"search")
                }
            }, 1000);
    }
</script>
<?php ?>