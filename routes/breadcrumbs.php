<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});
//Home > CategoryMain
Breadcrumbs::for('CategoryMain', function ($trail,$category_mains) {
    $trail->parent('home');
    $trail->push($category_mains->name, route('category.main.client',[$category_mains->id]));
});

// Home > CategoryMain > Category
Breadcrumbs::for('category', function ($trail,$category) {
    $trail->parent('CategoryMain',$category->categoryMain);
    $trail->push($category->name, route('category.detail',[$category->id]));
});

// Home > CategoryMain > Category > type_category
Breadcrumbs::for('CategoryType', function ($trail,$categoryType) {
    $trail->parent('category',$categoryType->category);
    $trail->push($categoryType->name, route('category.view.client',[$categoryType->id]));
});

// Home > CategoryMain > Category > type_category > product
Breadcrumbs::for('product', function ($trail,$product) {
    $trail->parent('CategoryType',$product->type_category);
    $trail->push($product->name, route('product.detail',[$product->id]));
});
