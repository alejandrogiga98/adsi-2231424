<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;

class CategoryController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        /* Cuando son muchas categorias */
        $categories = Category::paginate(10); 
        return view('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        //$request->all();
        //Metodo ORM
        $category = new Category;
        $category->name = $request->name;
        $category->description =$request->description;
        if ($request->hasFile('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $file);
            $category->image = 'images/' . $file;
        }
        if($category->save()){
            return redirect('categories')->with('message', 'The category: ' . $category->name . ' was successfully added!');
        }
    }

    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);
    }

    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->description =$request->description;
        if ($request->hasFile('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $file);
            $category->image = 'images/' . $file;
        }
        if($category->save()){
            return redirect('categories')->with('message', 'The category: ' . $category->name . ' was successfully edited!');
        }
    }

    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect('categories')->with('message', 'The category: ' . $category->name . ' was successfully deleted!');
        }
    }

    function search(Request $request){
        $categories = Category::names($request->q)
        ->orderBy('id')
        ->paginate(10);

        return view('categories.search')->with('categories', $categories);
    }

    public function pdf() {
        $categories = Category::all();
        $pdf = PDF::loadView('categories.pdf', compact('categories'));
        return $pdf->download('allcategories.pdf');
    }

    public function excel() {
        return \Excel::download(new CategoryExport, 'allcategories.xlsx');
    }

    public function import(Request $request) {
        $file = $request->file('file');
        \Excel::import(new CategoryImport, $file);
        return redirect()->back()->with('message', 'Categories importeds successfully!');
        }
}
