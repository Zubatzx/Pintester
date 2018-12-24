<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Cart;
use App\DetailCart;
use App\History;
use App\DetailHistory;

class cartController extends Controller
{
    public function index($id){
    	$cart = Cart::where('userID','=', $id)->first();

        $cartDetailID = DB::table('detail_carts')->where('cartID', $cart->cartID)->select('postID');
        $itemCount = $cartDetailID->count();
        $cartDetail = DB::table('detail_carts')->join('posts', 'posts.postID', '=', 'detail_carts.postID')->join('users', 'posts.userID', '=', 'users.userID')->whereIn('posts.postID', $cartDetailID)->get();
        //kelupaan, harusnya bisa bikin attribute baru di databes

        return view('cart', compact('cart', 'itemCount', 'cartDetail'));
    }

    public function deleteFromCart($id){
        //pilih item yang mau didelete, ambil harganya untuk diupdate, lalu delete itemnya
        $deleteFromCart = DetailCart::find($id);
        $deletedItemPrice = DB::table('posts')->where('postID', '=', $deleteFromCart->postID)->first()->price;
        $deleteFromCart->delete();

        //update harga sekarang
        $cart = Cart::where('userID','=', Session::get('userID'))->first();
        $cart->totalPrice = $cart->totalPrice - $deletedItemPrice;
        $cart->save();

        //panggil fungsi index lg
        $cart = Cart::where('userID','=', Session::get('userID'))->first();

        $cartDetailID = DB::table('detail_carts')->where('cartID', $cart->cartID)->select('postID');
        $itemCount = $cartDetailID->count();
        $cartDetail = DB::table('detail_carts')->join('posts', 'posts.postID', '=', 'detail_carts.postID')->join('users', 'posts.userID', '=', 'users.userID')->whereIn('posts.postID', $cartDetailID)->get();

        return view('cart', compact('cart', 'itemCount', 'cartDetail'));
    }

    public function checkout($id){
        $cart = Cart::find($id);

        //save ke table history
        $history = new History;
        $history->totalPrice = $cart->totalPrice;
        $history->transactionDate = date('Y-m-d H:i:s');
        $history->userID = Session::get('userID');
        $history->save();
        $lastInsertedID = $history->historyID;

        //dapetin isi list barang
        $cartDetailID = DB::table('detail_carts')->where('cartID', $id)->select('postID');
        $cartDetail =  DB::table('detail_carts')->join('posts', 'posts.postID', '=', 'detail_carts.postID')->whereIn('posts.postID', $cartDetailID)->get();

        //simpen ke detail_histories sekaligus hapus dari detail_carts
        foreach ($cartDetail as $detail) {
            $detailHistory = new DetailHistory;
            $detailHistory->historyID = $lastInsertedID;
            $detailHistory->postID = $detail->postID;
            $detailHistory->save();

            $deleteFromCart = DetailCart::find($detail->detailCartID);
            $deleteFromCart->delete();
        }

        //update harga jadi 0
        $cart->totalPrice = 0;
        $cart->save();

        return redirect()->back();
    }
}
