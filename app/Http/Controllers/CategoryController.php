<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::All();
        
        return view('admin.categories.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|min:5',
            'slug'          => 'required|min:5|unique:categories',
            'description'   => 'required|max:50'
        ]);
        $categories = Category::create($request->only('title','description','slug'));
        return back()->with('message', 'Categoría agregada exitosamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $slug
     * @return \Illuminate\Http\Response
     */
     public function edit($slug)
    {   
        $category = new category;
        $category = Category::where('slug', $slug)->first();

        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->save();
        return $this->index();
    }
    
    /**
     * Soft delete the specified resource from storage.
     *
     * @param  \App\Category  $slug
     * @return \Illuminate\Http\Response
     */
    public function trash($slug)
    {
        $category = Category::where('slug', $slug);
        $category->delete();
        return redirect()->back()->with('message','Categoría en papelera!!!');
    }

    /**
     * Show trashed categories.
     * 
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trashed', compact('categories'));
    }

    /**
     * Restore trashed categories.
     * 
     * @return \Illuminate\Http\Response
     */
    public function restore($slug)
    {
        $category = Category::where('slug', $slug);
        $category->restore();
        return redirect()->back()->with('message','Categoría restaurada exitosamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
        $category = Category::where('slug', $slug);
        $category->forceDelete();
        return redirect()->back()->with('message','Categoría eliminada definitivamente!!!');
    }
}
