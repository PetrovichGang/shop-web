<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;

function getCart(Request $request) {
    return $request->session()->get('cart', []);
}

function setCart(Request $request, $arr) {
    return $request->session()->put('cart', $arr);
}

Route::get('/', function (Request $request) {
    $cart = getCart($request);
    $products = Product::where('model', 'like', '%'.$request->query('q').'%');

    if ($b = $request->query('b'))
        $products = $products->whereIn('brand_id', $b);

    if ($t = $request->query('t'))
        $products = $products->whereIn('type', $t);

    $productsInCart = [];
    foreach ($products->lazy() as $product) {
        $productsInCart[] = [
            'product' => $product,
            'inCart' => isset($cart[$product->id])
        ];
    }

    return view('welcome', [
        'products' => $productsInCart,
        'brands' => Brand::all()
    ]);
});

Route::get('/product/{id}', function (Request $request, $id) {
    $product = Product::where('id', $id)->first();
    return view('product', [
        'product' => $product,
        'inCart' => in_array($product->id, getCart($request))
    ]);
});

Route::post('/order', function (Request $request) {
    $o = new Order;
    $o->name = $request->input('name');
    $o->email = $request->input('email');
    $o->phone = $request->input('phone');
    $o->address = $request->input('address');
    $o->etc = $request->input('etc');
    $o->order_ids = join(',', getCart($request));
    $o->save();
    setCart($request, []);

    return view('info', [
        'title' => 'Заказ выполнен',
        'info' => 'Ожидайте звонка'
    ]);
});

Route::get('/cart', function (Request $request) {
    $cart = getCart($request);
    $products = Product::whereIn('id', array_keys($cart))->get();
    $price = 0;
    foreach ($products as $p)
        $price += $p->price;

    if ($price === 0)
        return view('info', [
            'title' => 'В корзине нет продуктов',
            'info' => 'Добавьте продукты в корзину'
        ]);
    else
        return view('cart', [
            'products' => $products,
            'price' => $price,
            'cart' => $cart
        ]);
});

Route::get('/cart/plus/{id}', function (Request $request, $id) {
    $cart = getCart($request);
    $cart[$id] += 1;
    setCart($request, $cart);

    return back();
});

Route::get('/cart/minus/{id}', function (Request $request, $id) {
    $cart = getCart($request);
    if ($cart[$id] === 1)
        unset($cart[$id]);
    else
        $cart[$id] -= 1;
    setCart($request, $cart);

    return back();
});

Route::get('/cart/add/{id}', function (Request $request, $id) {
    $cart = getCart($request);
    $cart[$id] = 1;
    setCart($request, $cart);

    return back();
});

Route::get('/cart/remove/{id}', function (Request $request, $id) {
    $cart = getCart($request);
    unset($cart[$id]);
    setCart($request, $cart);
    
    return back();
});

Route::get('/cart/clear', function (Request $request) {
    setCart($request, []);
    
    return back();
});