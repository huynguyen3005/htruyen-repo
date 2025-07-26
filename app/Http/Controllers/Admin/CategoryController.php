<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Fetch and store categories from the API
    public function fetchAndStoreCategories()
    {
        $apiUrl = "https://otruyenapi.com/v1/api/the-loai";
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $data = $response->json();

            if (!empty($data['data'])) {
                foreach ($data['data']['items'] as $item) {
                    // save into database
                    DB::table('categories')->updateOrInsert(
                        ['category_id' => $item['_id']],
                        [
                            'name' => $item['name'],
                            'slug' => $item['slug'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                }
            }
        } else {
            return response()->json(['message' => 'Failed to fetch data from API'], 500);
        }
        return response()->json(['message' => 'Categories fetched and stored successfully!'], 200);
    }
}
