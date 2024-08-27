<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $categories=Category::paginate(20);
        return view('categories.index')->with('categories' , $categories);
    }
    public function create()
    {
        return view('categories.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request->all());

        //Upload file
        if($request->hasFile('image')) {
            $image = time() .'.' .$request->image->extension();
            $request->image->move(public_path('images'), $image);
            }
        //new Category    
            $category = new Category;                
                $category->name = $request->name;
                $category->manufacturer = $request->manufacturer;
                $category->releasedate  = $request->releasedate;
                $category->image = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
                $category->description = $request->description;                
                
            if($category->save()){
                return redirect('categories')
                    ->with('message', 'The category: '. $category->name . ' was successfully added!');
            }   
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // dd($user->toArray());
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->hasfile('image')) {
            if($request->hasFile('image')) {
                $image = time() .'.' .$request->image->extension();
                $request->image->move(public_path('images'), $image);
                }
        }else{
            $image = $request->originphoto;
        }

        $category->name = $request->name;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate  = $request->releasedate;
        $category->image = $image;
        $category->description = $request->description;

        if($category->save()){
            return redirect('categories')
                ->with('message', 'The category: '. $category->name . ' was successfully added!');
        }
    } 
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect('categories')
                ->with('message', 'The category: '. $category->name . ' was successfully deleted!');
        }
    }
    public function search(Request $request) {
        $categories = Category::names($request->q)->paginate(20);
        return view('categories.search')->with('categories' , $categories);        
    }
}
