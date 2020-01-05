<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});
// Home > Blog
Breadcrumbs::for('category', function ($trail,$category) {
    $trail->parent('home');
    $trail->push($category->name, route('category.detail',[$category->id]));
});

Breadcrumbs::for('product', function ($trail,$product) {
    $trail->parent('category',$product->category);
    $trail->push($product->name, route('product.detail',[$product->id]));
});
