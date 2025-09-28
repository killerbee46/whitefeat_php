<?php ?>

<div class="filter-wrapper">
            <div class="filter">
                <div class="filter-title-container">
                    <div class="filter-title"><img class="icon" src="assets/v2/images/filter.png" /><span>Filter Product</span></div>
                    <div class="filter-title-spacer"></div>
                </div>
                <div class="form-field">
                    <div class="form-item price-field">
                        <label for="price">Price:</label>
                        <select name="price" id="filter-price-selector" onchange="filterSelectorHandle(this,'price')">
                            <option value="0" <?php selected("0",'price') ?>>None</option>
                            <option value="1" <?php selected("1",'price') ?>>Below Rs.10,000</option>
                            <option value="2" <?php selected("2",'price') ?>>Rs.10,000 - Rs.20,000</option>
                            <option value="3" <?php selected("3",'price') ?>>Rs.20,000 - Rs.50,000</option>
                            <option value="4" <?php selected("4",'price') ?>>Rs.50,000 - Rs.1,00,000</option>
                            <option value="5" <?php selected("5",'price') ?>>Rs.1,00,000 - Rs.2,00,000</option>
                            <option value="6" <?php selected("6",'price') ?>>Above Rs.2,00,000</option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label for="weight">Weight:</label>
                        <select name="weight" id="filter-weight-selector"
                            onchange="filterSelectorHandle(this,'weight')">
                            <option value="0" <?php selected("0",'weight') ?>>None</option>
                            <option value="1" <?php selected("1",'weight') ?>>Under 2gm</option>
                            <option value="2" <?php selected("2",'weight') ?>>2gm - 5gm</option>
                            <option value="3" <?php selected("3",'weight') ?>>5gm - 10gm</option>
                            <option value="4" <?php selected("4",'weight') ?>>10gm - 20gm</option>
                            <option value="5" <?php selected("5",'weight') ?>>Above 20gm</option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label for="metal">Metal:</label>
                        <select value="2" name="metal" id="filter-metal-selector" onchange="filterSelectorHandle(this,'metal')">
                            <option value="0" <?php selected("0",'metal') ?>>None</option>
                            <option value="1" <?php selected("1",'metal') ?>>Diamond</option>
                            <option value="2" <?php selected("2",'metal') ?>>Gold</option>
                            <option value="3" <?php selected("3",'metal') ?>>Rhodium</option>
                            <option value="4" <?php selected("4",'metal') ?>>Silver</option>
                        </select>
                    </div>
                </div>
                <div class="form-controls">
                    <button onclick="onSubmit()" class="button primary">Apply Filter</button>
                    <button onclick="onReset()" class="button danger">Clear Filter</button>
                </div>
            </div>
        </div>
<?php ?>