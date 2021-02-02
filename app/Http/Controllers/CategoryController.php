<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// menambahkan library Validator
use Validator;
// menambahkan library session
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $paginate = 2;
        $data = [
            'categories' => \App\Models\Category::all()
        ];
        return view('admin.category.index', $data);
    } 
    
    public function create()
     {
         return view('admin.category.create');
     }

     public function store(Request $request)
     {
        // setting validasi data
        $rules = [
            'name' => 'required',
            'status' => 'required'
        ];
        // menyiapkan pesan error
        $messages = [
            'name.required' => 'Nama category wajib diisi',
            'status.required' => 'Status category wajib diisi'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        //cek apakah ada error validasi atau tidak
        if($validator->fails()){
            return redirect()->to('category/create')->withErrors($validator);
        }

        // simpan data
        $category = new \App\Models\Category;
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        Session::flash('success', 'Category berhasil disimpan');
        return redirect()->to('category');
     }

     public function show($id = null)
     {
         $data = [
             // select * from categories Where id = $id
             // findorfail - sama query di atas, hanya saja menambahkan redirect 404
             'category' => \App\Models\Category::findOrfail($id)
         ];
     return view('admin.category.show', $data);
    }

     public function edit($id = null)
     {
         $data = [
             // select * from categories Where id = $id
             // findorfail - sama query di atas, hanya saja menambahkan redirect 404
             'category' => \App\Models\Category::findOrfail($id)
         ];
     return view('admin.category.edit', $data);

        }
        public function update(Request $request, $id = null)
        {       // setting validasi data
               $rules = [
                'name' => 'required',
                'status' => 'required'
            ];
            // menyiapkan pesan error
            $messages = [
                'name.required' => 'Nama category wajib diisi',
                'status.required' => 'Status category wajib diisi'
            ];
    
            $validator = Validator::make($request->all(),$rules,$messages);
    
            //cek apakah ada error validasi atau tidak
            if($validator->fails()){
                return redirect()->to('category/'.$id.'/edit')->withErrors($validator);
            }
    
            // update data
            $category = \App\Models\Category::findOrFail($id);
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
    
            Session::flash('info', 'Category berhasil diubah');
            return redirect()->to('category');
     
        }
        public function destroy($id = null)
        {
            $category = \App\Models\Category::findOrFail($id);
            $category->delete();
    
            Session::flash('warning', 'Category berhasil dihapus');
            return redirect()->to('category');
        }
}
