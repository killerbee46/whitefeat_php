<?php ?>
<style>
.filter {
    padding: 10px 20px;
    border-radius: 10px;
    border: 2px solid #3892C6;
    position: relative;
    overflow: hidden;
}
.product-container{
    margin-left:20px;
    display:flex;
    flex-wrap:wrap;
    gap:10px;
}
.product-container .product-card-container{
    width:32%;
}
.filter{
    position: sticky;
    top: 120px;
	box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
}

.filter-title {
    position: absolute;
    top: 0;
    left: 0;
    height: 50px;
    background: #3892C6;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 18px;
    font-weight: 600;
    gap: 10px;
}

.icon {
    height: 20px;
}

.filter-title-spacer {
    height: 50px;
}

.form-field {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.form-item {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-item label {
    font-weight: 500;
    color: #3892C6;
}

.form-item select {
    font-size: 16px;
    padding: 5px 10px;
    cursor: pointer;
    border-color: #3892C6;
    border-radius: 8px;
}

.form-controls {
    margin: 30px auto;
    display: flex;
    gap: 20px;
    justify-content: center;
}

.button.danger {
    background: crimson;
    color: white;
    border: 2px solid crimson;
}

.button.danger:hover {
    background: white;
    color: crimson;
}

@media only screen and (max-width: 1024px) {
    .form-controls {
        flex-direction: column;
        gap: 10px;
        margin: 20px 0;
    }

    .form-field {
        gap: 10px;
    }
    .product-container .product-card-container{
    width:48%;
}
}

@media only screen and (max-width: 768px) {
    .form-controls {
        flex-direction: column;
        gap: 10px;
        margin: 20px 0;
    }

    .form-field {
        gap: 10px;
    }

    .filter-title-container {
        display: none;
    }

    .filter {
        background: #3892C6;
    }

    .form-field {
        flex-direction: row;
        justify-content: space-between;
    }

    .form-item {
        width: 30%;
    }

    .form-item select {
        text-overflow: ellipsis;
        font-size: 12px;
    }

    .form-item label {
        font-weight: 500;
        color: white;
    }

    .filter .button.primary {
        background: white;
        color: #3892C6;
        border: 2px solid white;
    }

    .filter .button.primary:hover {
        background: #3892C6;
        color: white;
    }

    .form-controls {
        flex-direction: row;
        justify-content: flex-end;
    }
    .button {
    padding: 5px 10px;
    font-weight: 600;
    font-size: 12px;
}
.product-container{
    margin-left:0px;
    gap:20px;
}
    .product-container .product-card-container{
    width:46%;
}
}

@media only screen and (max-width: 480px) {
    .form-field{
        width: 100%;
        flex-wrap: wrap;
    }
    .form-item.price-field {
        width: 100%;
    }
    .form-item {
        width: 45%;
    }
    .product-container{
        gap:30px;
    }
    .product-container .product-card-container{
    width:100%;
}
}
</style>
<script>

let tempUrl = ''
var defaultFilters = {}

const url = new URL(document.location.href)
function filterSelectorHandle(e, filter_name) {
    const value = e.value
    const searchParams = url.searchParams
    if (value === "0") {
        searchParams.delete(filter_name)
    }
    else {
        searchParams.set(filter_name, value)
        window.location.href = url
    }
    window.location.href = url
}

function onSubmit() {
    window.location.href = tempUrl
}

function onReset() {
    const term = url.searchParams.get('term')
    const tags = url.searchParams.getAll('tags[]')
    const newUrl = url.origin+url.pathname
    const temp = new URL(newUrl)
    if (term) {
        temp.searchParams.append('term',term)
    } else {
        tags.forEach(tag => {
           temp.searchParams.append('tags[]',tag) 
        });
    }
    window.location.href = temp
}

</script>

<?php ?>