<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $search = $request->input('search');
        if ($search) {
            $category = $category->where('name', 'like', '%' . $search . '%');
        }
        $list = $category->orderBy('id', 'desc')->paginate($request->input('limit'));

        return $this->apiSuccess($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->name = (string)$request->input('name');
        $category->status = (int)$request->input('status');
        $category->save();
        return $this->apiSuccess($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Role $category)
    {
        return $this->apiSuccess($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->name = (string)$request->input('name');
        $category->status = (int)$request->input('status');
        $category->save();
        return $this->apiSuccess($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->apiSuccess($category);
    }

    public function kv(Role $category)
    {
        return $this->apiSuccess($category->kv());
    }
}
