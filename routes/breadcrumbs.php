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

Breadcrumbs::for('product', function ($trail,$product) {
    $trail->parent('category',$product->category);
    $trail->push($product->name, route('product.detail',[$product->id]));
});
