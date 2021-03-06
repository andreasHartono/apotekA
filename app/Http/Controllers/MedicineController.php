<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      // eloquent model orm
      $result = Medicine::all();
      $categories = Category::all();
      // dengan compact
      //return view('medicine.index', compact('result'));

      // dengan menamai parameter
      return view('medicine.index', ['data' => $result, 'categories' => $categories]);
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::all();
      return view('medicine.create', compact('categories'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $data = new Medicine();
      $data->generic_name = $request->get('name');
      $data->form = $request->get('form');
      $data->restriction_formula = $request->get('restriction_formula');
      $data->price = $request->get('price');
      $data->description = $request->get('description');
      $data->category_id = $request->get('category');
      $data->faskes1 = 0;
      $data->faskes2 = 1;
      $data->faskes3 = 1;
      $data->image = $request->get('name') . 'jpg';
      $data->save();
      return redirect()->route('medicines.index')->with('status', 'data medicines berhasil di tambah');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Medicine  $medicine
    * @return \Illuminate\Http\Response
    */
   public function show($id_medicine)
   {
      $data = Medicine::find($id_medicine);
      return view('medicine.index', compact('data'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Medicine  $medicine
    * @return \Illuminate\Http\Response
    */
   public function edit(Medicine $medicine)
   {
      $data = $medicine;
      $categories = Category::all();
      return view('medicine.edit', compact('data', 'categories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Medicine  $medicine
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Medicine $medicine)
   {
      $this->authorize('delete-permission');
      $data = new Medicine();
      $data->generic_name = $request->get('name');
      $data->form = $request->get('form');
      $data->restriction_formula = $request->get('restriction_formula');
      $data->price = $request->get('price');
      $data->description = $request->get('description');
      $data->category_id = $request->get('category');
      $data->faskes1 = 0;
      $data->faskes2 = 1;
      $data->faskes3 = 1;
      $data->image = $request->get('name') . 'jpg';
      $data->save();
      return redirect()->route('medicines.index')->with('status', 'data medicines berhasil di ubah');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Medicine  $medicine
    * @return \Illuminate\Http\Response
    */
   public function destroy(Medicine $medicine)
   {
      $this->authorize('delete-permission');
      try {
         $medicine->delete();
         return redirect()->route('medicines.index')
            ->with('status', 'data berhasil dihapus');
      } catch (\PDOException $e) {
         return redirect()->route('medicines.index')
            ->with('error', 'Data Gagal dihapus. Pastikan data child tidak berhubungan');
      }
   }

   public function getEditForm(Request $request)
   {
      $id = $request->get('id');
      $data = Medicine::find($id);
      $categories = Category::all();
      // dd($data);
      return response()->json(array(
         'status' => 'oke',
         'msg' => view('medicine.getEditForm', compact('data', 'categories'))->render()
      ), 200);
   }

   public function saveData(Request $request)
   {
      //dd($request);
      $this->authorize('delete-permission');
      $id = $request->get('id');
      $supplier = Medicine::find($id);
      $supplier->name = $request->get('name');
      $supplier->address = $request->get('address');
      $supplier->save();
      return redirect()->json(array(
         'status' => 'ok',
         'msg' => 'data medicine berhasil diupdate melalui modal'
      ), 200);
   }

   public function deleteData(Request $request)
   {
      $this->authorize('delete-permission', $request->get('id'));
      try {
         $id = $request->get('id');
         $supplier = Medicine::find($id);
         $supplier->delete();
         return redirect()->json(array(
            'status' => 'ok',
            'msg' => 'data medicine berhasil dihapus'
         ), 200);
      } catch (\PDOException $e) {
         return redirect()->json(array(
            'status' => 'error',
            'msg' => 'Data Gagal dihapus. Silahkan hubungi administrator'
         ), 200);
      }
      //dd($request);
   }
   
   public function cart()
   {
      return view('frontend.cart');
   }
   
   public function front_index()
   {
      $result = Medicine::all();
      $categories = Category::all();
      return view('frontend.product', ['data' => $result, 'categories' => $categories]);
   }

   public function addToCart($id)
   {
      $m = Medicine::find($id);
      $cart = session()->get('cart');
      if (!isset($cart[$id])) 
      {
         $cart[$id]=[
            "name"=>$m->generic_name,
            "quantity"=>1,
            "price"=>$m->price,
            "photo"=>$m->image
         ];
      }
      else {
         $cart[$id]['quantity']++;
      }
      session()->put('cart',$cart);
      return redirect()->back()->with('success','Medicine berhasil ditambahkan ke cart!');
   }

   
   
   public function coba1()
   {
      // query builder filter
      $result = DB::table('medicines')
         ->where('generic_name', 'like', '%fen%')
         ->get();
      // query builder group
      // $result = DB::table('medicines')
      //    ->select('generic_name')
      //    ->groupBy('generic_name')
      //    ->having('generic_name', '>', 1)
      //    ->get();
      // agregate jumlah row
      //$result = DB::table('medicines')->count(); // result = 16
      // agregate price termahal
      //$result = DB::table('medicines')->max('price'); // result = 35k
      // filter + agregate
      //$result = DB::table('medicines')
      //   ->where('price', '<', 20000)
      //   ->count();
      // join 
      // $result = DB::table('medicines')
      //    ->join('categories', 'medicines.categories_id', '=', 'categories.id')
      //    ->orderBy('price', 'desc')
      //    ->get();

      // eloquent
      $result = Medicine::where('price', '>', 20000)
         ->orderBy('price', 'desc')
         ->get();
      dd($result);
   }

   public function coba2()
   {
      // query 1 table
      // 1. show all drug category data
      $res = Category::all();
      // show all medicine names,formulas, and prices
      // 2. cara 1 pake query builder
      $res = DB::table('medicines')
         ->select('generic_name', 'restriction_formula', 'price')
         ->get();
      // cara 2 pake eloquent
      $res = Medicine::select(['generic_name', 'restriction_formula', 'price'])->get();
      // query 2 table
      // Show all medicines names, formulas, and category names
      $res = DB::table('medicines')
         ->join('categories', 'medicines.category_id', '=', 'categories.id')
         ->select('medicines.generic_name', 'medicines.restriction_formula', 'categories.name')
         ->get();
      // aggregation of sum, count 2 tables
      // 1. display number of categories that have data on medicines
      $res = Category::has('medicines')->count();

      // 2. show the name of the category that does not have any medicines data
      $res = Category::select(['name'])->doesntHave('medicines')->get();

      // 3. show the average price of each drug category
      $res = Medicine::select(DB::raw('avg(medicines.price) as average_price'))->has('category')->get();
      $price = 0;
      if (!$res) $price = 0;

      // 4. show drug categories that have only 1 medicine product
      $res = DB::table('medicines')
         ->join('categories', 'medicines.category_id', '=', 'categories.id')
         ->select('categories.name')
         ->groupBy('categories.name')
         ->having(DB::raw('count(medicines.category_id)'), '<', 2)
         ->get();

      // 5. show drugs that have one form
      $res = DB::table('medicines')
         ->groupBy('generic_name')
         ->having(DB::raw('count(form)'), 1)
         ->get();
      // 6. display category and name of the drug that has the highest price

      $sub = DB::table('medicines')
         ->select(DB::raw('MAX(price) AS tertinggi'));

      $res = DB::table('medicines')
         ->join('categories', 'medicines.category_id', '=', 'categories.id')
         ->joinSub($sub, 'm2', function ($join) {
            $join->on('medicines.price', '=', 'm2.tertinggi');
         })->get();

      // dd($sub);
      dd($res);
   }

   public function showgrid()
   {
      $result = Medicine::all();
      return view('medicine.showgrid', compact('result'));
   }

   public function showlisthighestprice()
   {
      $sub = DB::table('medicines')
         ->select(DB::raw('MAX(price) AS tertinggi'));

      $result = DB::table('medicines')
         ->join('categories', 'medicines.category_id', '=', 'categories.id')
         ->joinSub($sub, 'm2', function ($join) {
            $join->on('medicines.price', '=', 'm2.tertinggi');
         })->get();

      return view('report.list_medicine_highest_price', compact('result'));
   }

   public function showInfo()
   {
      $result = Medicine::orderBy('price', 'desc')->first();
      return response()->json(array(
         'status' => 'oke',
         'msg' => "<div class='alert alert-danger'>
                     Did you know? <br>
                     Harga obat termahal adalah " .
            $result->generic_name . " " . $result->form .
            " dengan harga " . $result->price
      ), 200);
   }
}