<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
// menambahkan library session
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id = $request->query('category');
        $keyword = $request->query('keyword');
        $paginate = 2;

        
        $where = [];
        $or_where1 = [];
        $or_where2 = [];
        $or_where3 = [];

        // Jika category_id tidak kosong
        if(!empty($category_id)){
            $where[] = ['category_id', '=', $category_id];
        }

        // jika keyword tidak kosong
        if(!empty($keyword)){
            $where[] = ['name', 'LIKE', "%{$keyword}%"];
            $or_where1[] = ['aku', 'LIKE', "%{$keyword}%"];
            $or_where2[] = ['price', 'LIKE', "%{$keyword}%"];
            $or_where3[] = ['description', 'LIKE', "%{$keyword}%"];
        }

        if(empty($category_id) && empty($keyword)){
            $products =\App\Models\Product::paginate($paginate);
        } else {
            $products =\App\Models\Product::where($where)->orWhere($or_where1)->orWhere($or_where2)->orWhere($or_where3)->paginate($paginate);
        }

        $data = 
        [
            'products' => $products,
            'cat_id' => $category_id,
            'keyword' => $keyword,
            'categories' => \App\Models\Category::pluck('name', 'id')
        ];
        return view('admin.product.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // setting validasi data
        $rules = [
            'category_id' => 'required',
            'status' => 'required|string',
            'price' => 'required|numeric',
            'aku' => 'required|unique:products',
            'status' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'description' => 'required'

        ];
        // menyiapkan pesan error
        $messages = [
            'category_id.required' => 'category wajib diisi',
            'name.required' => 'Nama produk wajib diisi',
            'price.required' => 'Harga Produk wajib diisi',
            'aku.required' => 'Kode Produk wajib diisi',
            'status.required' => 'Status Produk wajib diisi',
            'image.required' => 'Gambar Produk wajib diisi',
            'description.required' => 'Deskripsi Produk wajib diisi'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        //cek apakah ada error validasi atau tidak
        if($validator->fails()){
            return redirect()->route('product.create')->withInput($request->all())->withErrors($validator);
        }

        // simpan data
        $product = new \App\Models\Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->aku = $request->aku;
        $product->status = $request->status;
        $product->description = $request->description;

        // handle image save and set location to storage
        $image = $request->file('image')->store('products', 'public');
        $product->image = $image;

        $product->save();

        Session::flash('success', 'Product berhasil disimpan');
        return redirect()->route('product.index');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            // select * from categories Where id = $id
            // findorfail - sama query di atas, hanya saja menambahkan redirect 404
            'product' => \App\Models\Product::findOrfail($id)
        ];
    return view('admin.product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            // select * from categories Where id = $id
            // findorfail - sama query di atas, hanya saja menambahkan redirect 404
            'product' => \App\Models\Product::findOrfail($id),
            'categories' => \App\Models\Category::pluck('name', 'id')
        ];
    return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'category_id' => 'required',
            'status' => 'required|string',
            'price' => 'required|numeric',
            'aku' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif',
            'description' => 'required'

        ];
        // menyiapkan pesan error
        $messages = [
            'category_id.required' => 'category wajib diisi',
            'name.required' => 'Nama produk wajib diisi',
            'price.required' => 'Harga Produk wajib diisi',
            'aku.required' => 'Kode Produk wajib diisi',
            'status.required' => 'Status Produk wajib diisi',
            'description.required' => 'Deskripsi Produk wajib diisi'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        //cek apakah ada error validasi atau tidak
        if($validator->fails()){
            return redirect()->route('product.edit', $id)->withInput($request->all())->withErrors($validator);
        }

        // simpan data
        $product = \App\Models\Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->aku = $request->aku;
        $product->status = $request->status;
        $product->description = $request->description;

        // handle image save and set location to storage
        if(!empty($request->file('image'))){
            $image = $request->file('image')->store('products', 'public');
            $product->image = $image;
        }

        $product->save();

        Session::flash('info', 'Product berhasil diubah');
        return redirect()->route('product.index');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Models\Product::findOrFail($id);
            $product->delete();
    
            Session::flash('warning', 'Product berhasil dihapus');
            return redirect()->route('product.index');
    }
}
