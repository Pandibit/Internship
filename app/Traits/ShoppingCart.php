<?php

namespace App\Traits;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

trait ShoppingCart
{
    protected $cartCookieName = "shoppingCart";

    public function getShoppingCart(): array
    {
        $shoppingCart = json_decode(Cookie::get($this->cartCookieName, '[]'), true);
        return $shoppingCart;
    }

    public function prepareCookie(array $shoppingCart)
    {
        Cookie::queue($this->cartCookieName, json_encode($shoppingCart), 60 * 24);
    }

    public function forgetCookie()
    {
        Cookie::queue(Cookie::forget($this->cartCookieName));
    }

    public function sendEmail(Order $order)
    {
        Mail::to(Auth::user())->queue(new OrderMail($order));
    }

}
