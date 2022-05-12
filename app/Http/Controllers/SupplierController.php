<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Category;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $result = Supplier::all();
      return view('supplier.index', compact('result'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::all();
      return view('supplier.create', compact('categories'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $data = new Supplier();
      $data->name = $request->get('name');
      $data->address = $request->get('address');
      $data->save();
      return redirect()->route('suppliers.index')->with('status', 'Data Supplier Berhasil ditambah');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
   public function show(Supplier $supplier)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
   public function edit(Supplier $supplier)
   {
      $data = $supplier;
      return view('supplier.edit', compact('data'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Supplier $supplier)
   {
      //dd($request);
      $supplier->name = $request->get('name');
      $supplier->address = $request->get('address');
      $supplier->save();
      return redirect()->route('suppliers.index')->with(
         'status',
         'data berhasil diubah'
      );
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
   public function destroy(Supplier $supplier)
   {
      //dd($supplier);
      try {
         $supplier->delete();
         return redirect()->route('suppliers.index')
            ->with('status', 'data berhasil dihapus');
      } catch (\PDOException $e) {
         return redirect()->route('suppliers.index')
         ->with('error', 'Data Gagal dihapus. Pastikan data child tidak berhubungan');
      }
   }
}