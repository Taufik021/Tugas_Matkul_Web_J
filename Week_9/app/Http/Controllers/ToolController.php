<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()->orderBy('name')->get();

        $tools = Tool::query()
            ->with('category')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('slug', $request->input('category'));
                });
            })
            ->when($request->filled('q'), function ($query) use ($request) {
                $keyword = $request->string('q')->trim()->toString();

                $query->where(function ($toolQuery) use ($keyword) {
                    $toolQuery
                        ->where('name', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%")
                        ->orWhereHas('category', function ($categoryQuery) use ($keyword) {
                            $categoryQuery->where('name', 'like', "%{$keyword}%");
                        });
                });
            })
            ->orderBy('name')
            ->get();

        return view('tools.index', compact('categories', 'tools'));
    }
}
