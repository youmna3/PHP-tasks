<?php
require_once(BASE_PATH . 'dal/dal.php');

function getCategories()
{
    return getRows("SELECT c.*,IFNULL(p.product_count,0) product_count FROM categories c 
    LEFT JOIN (SELECT COUNT(0) product_count,category_id FROM products) p ON c.id=p.category_id");

}

function displayCategories($category)
{
    return '<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <a class="text-decoration-none" href="products.php?category_id=' . $category['id'] . ' ">
        <div class="cat-item d-flex align-items-center mb-4">
            <div class="overflow-hidden" style="width: 100px; height: 100px">
                <img class="img-fluid" src="' . $category['image_url'] . '" alt="" />
            </div>
            <div class="flex-fill pl-3">
                <h6>
                    ' . $category['name'] . '
                </h6>
                <small class="text-body">' . $category['product_count'] . '</small>
            </div>
        </div>
    </a>
</div>';
}