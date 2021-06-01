<?php

namespace App\Http\Controllers;

class ShopController extends Controller
{
	public function archive()
	{
		return view('shop.shop');
	}

	public function single()
	{
		return view('shop.single');
	}

	public function shop()
	{
		return view('shop.page');
	}
}
