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

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
    public function getEditForm(Request $request)
    {
       $id=$request->get('id');
       $data=Supplier::find($id);
       return response()->json(array(
           'status' => 'oke',
           'msg' => view('supplier.getEditForm',compact('data'))->render()
       ),200);
    }
   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
    public function getEditForm2(Request $request)
    {
       $id=$request->get('id');
       $data=Supplier::find($id);
       return response()->json(array(
           'status' => 'oke',
           'msg' => view('supplier.getEditForm2',compact('data'))->render()
       ),200);
    }
    /* Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
   public function saveData(Request $request)
   {
      //dd($request);
      $id=$request->get('id');
      $supplier=Supplier::find($id);
      $supplier->name = $request->get('name');
      $supplier->address = $request->get('address');
      $supplier->save();
      return redirect()->json(array(
          'status'=>'ok',
          'msg'=>'Supplier data updated'
      ),200);
   }
    /* Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Supplier  $supplier
    * @return \Illuminate\Http\Response
    */
   public function deleteData(Request $request)
   {
       try
       {
            $id=$request->get('id');
            $supplier=Supplier::find($id);
            $supplier->delete();
            return redirect()->json(array(
                'status'=>'ok',
                'msg'=>'Supplier data deleted'
            ),200);
       } catch(\PDOException $e) {
            return redirect()->json(array(
                'status'=>'error',
                'msg'=>'Data Gagal dihapus. Pastikan data supplier tidak digunakan di data medicine'
            ),200);
       }
      //dd($request);

   }

}
