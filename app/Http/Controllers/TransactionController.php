<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class TransactionController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $result = Transaction::all();
      return view('transaction.index', ['data' => $result]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Transaction  $transaction
    * @return \Illuminate\Http\Response
    */
   public function show(Transaction $transaction)
   {
      return view('transaction.show',compact('transaction'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Transaction  $transaction
    * @return \Illuminate\Http\Response
    */
   public function edit(Transaction $transaction)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Transaction  $transaction
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Transaction $transaction)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Transaction  $transaction
    * @return \Illuminate\Http\Response
    */
   public function destroy(Transaction $transaction)
   {
      //
   }

   public function showAjax(Request $request)
   {
      $id = ($request->get('id'));
      $data = Transaction::find($id);
      $medicine=$data->medicines;
      return response()->json(array(
         'msg' => view('transaction.showmodal',compact('data','medicine'))->render()
      ),200);
   }

   public function form_submit_front()
   {
      $this->authorize('checkmember');
      return view('frontend.checkout');
   }

   public function submit_front()
   {
      $this->authorize('checkmember');

      $cart = session()->get('cart');
      $user = Auth::user();

      $t = new Transaction;
      $t->user_id = $user->id;
      $t->buyer_id = 1;
      $t->transaction_date = Carbon::now()->toDateTimeString();
      $t->save();

      // $totalharga = $t->insertProduct($cart,$user);
      // $t->total = $totalharga;
      // $t->save();

      session()->forget('cart');
      return redirect('/');
   }

   public function print_detail($id_transaction) 
   {
      $transaction = Transaction::find($id_transaction);
      $pdf = PDF::loadView('frontend.detailpdf',['transaction'=>$transaction]);
      $name="laporan-pemesanan".$transaction->id.$transaction->transaction_date."-pdf";
      return $pdf->download($name);
   }
}