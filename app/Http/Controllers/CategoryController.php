<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return Inertia::render('Category/Index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return Inertia::render('Category/Create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        // upload da imagem caso exista
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('categories', 'public');
        }

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Categoria criada com sucesso!');
    }

    public function show(Category $category)
    {
        return Inertia::render('Category/Show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        // Se enviou imagem nova
        if ($request->hasFile('image')) {

            // Remove imagem antiga
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            
            // Salva imagem nova
            $validated['image'] = $request->file('image')
                ->store('categories', 'public');
        }

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoria excluída com sucesso!');
    }
}
