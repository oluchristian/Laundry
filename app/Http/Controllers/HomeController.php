<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\Cart\EditCartRequest;
use App\Http\Requests\Cart\UpdateAddressRequest;

class HomeController extends Controller
{
    public function home ()
    {
        $services = Service::all();
        return view('home.user-home', compact('services'));
    }

    public function redirect()
    {
        if (Auth::user()->user_type == 1) 
        {
            
            return view('admin.admin-home');
        }
        else
        {
            return view('home.user-home');
        }
    }

    public function cart ()
    {
        return view('home.cart');
    }

    public function viewServices()
    {
        $services = Service::all();
        return view('home.user-view-services', compact('services'));
    }

    public function viewSingleServices($id)
    {
        $services = Service::all();
        return view('home.user-view-services', compact('services'));
    }

    public function addCart(AddToCartRequest $request, $id)
    {
        $checkcart = Cart::where('user_id', Auth::id())
                    ->where('service_id', $request->id)
                    ->first();
        $service = Service::where('id', $id)->first();

        if (!$service) {
            return redirect()->back()->with('message', 'Service not found');
        }

        if ($checkcart) {
            $checkcart->update([
                'service_quantity' => $request->quantity + $checkcart->service_quantity,
                'service_price' => $checkcart->service_price + ($request->quantity * $service->price),
            ]);
        } else {
            $user = User::where('id', Auth::id())->first();
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->user_name = $user->name;
            $cart->user_phone = $user->phone_number;
            $cart->user_email = $user->email;
            $cart->user_address = $user->address;
            $cart->service_id = $id;
            $cart->service_quantity = $request->quantity;
            $cart->service_title = $service->title;
            $cart->service_price = $service->price * $request->quantity;
            $cart->service_discount_price = $service->discount_price;
            $cart->service_imagepath = $service->image_filename;
            $cart->save();

        }
        
        return redirect()->back()->with('message', 'Item has been added to cart');
        
    }

    public function viewCart()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $totalPrice = 0;
        foreach ($cart as $cartz) {
            $totalPrice += $cartz->service_price;
        }
       

        return view('home.cart', compact('cart', 'totalPrice'));
        
    }

    public function viewEditCart($id)
    {
        $oneCartItem = Cart::where('id', $id)->first();
        
        

        return view('home.edit-cart', compact('oneCartItem'));

    }

    public function updateCart(EditCartRequest $request, $id)
    {   
        $updatecart = Cart::find($id);
        $service = Service::where('id', $updatecart->service_id)->first();
        $updatecart->update([
            'service_quantity' => $request->quantity,
            'service_price' => $service->price * $request->quantity,
    ]);

        //external line below
        $cart = Cart::where('user_id', Auth::id())->get();

        //external line below
        $totalPrice = 0;
        foreach ($cart as $cartz) {
            $totalPrice += $cartz->service_price;
        }

        return view('home.cart', compact('cart', 'totalPrice'))->with('message', 'Your cart has been updated');
        
        
    }

    public function destroyCart ($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('message', 'Item has been deleted from cart');
    }

    public function editAddress($id)
    {   
        $cart = Cart::where('user_id', $id)->first();
        if (!$cart) {
            return redirect('login');
        } else {
            return view('home.edit-address', compact('cart'));
        }
        
        
    }

    public function updateAddress(UpdateAddressRequest $request, $id)
    {
        $updatecart = Cart::where('user_id', $id)->get();
        foreach ($updatecart as $item) {
            $item->update([
                'user_address' => $request->address,
                'user_email' => $request->email,
                'user_phone' => $request->phone,
            ]);
        }
                //external line below
         $cart = Cart::where('user_id', Auth::id())->get();
        return view('home.cart', compact('cart'))->with('message', 'Your address has been updated');
    }
}
