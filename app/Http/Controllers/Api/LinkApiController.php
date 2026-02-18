<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Http\Resources\LinkResource;
use Illuminate\Http\Request;

class LinkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();
        return response()->json([
            'status' => 'success',
            'data' => LinkResource::collection($links),
            'message' => 'Data links retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|string|max:255|url',
            'short_url' => 'sometimes|string|max:255'
        ]);

        $link = Link::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => new LinkResource($link),
            'message' => 'Link created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $link = Link::find($id);

        if (!$link) {
            return response()->json([
                'status' => 'error',
                'message' => 'Link not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new LinkResource($link),
            'message' => 'Link retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $link = Link::find($id);

        if (!$link) {
            return response()->json([
                'status' => 'error',
                'message' => 'Link not found'
            ], 404);
        }

        $validated = $request->validate([
            'url' => 'sometimes|string|max:255|url',
            'short_url' => 'sometimes|string|max:255'
        ]);

        $link->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new LinkResource($link),
            'message' => 'Link updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $link = Link::find($id);

        if (!$link) {
            return response()->json([
                'status' => 'error',
                'message' => 'Link not found'
            ], 404);
        }

        $link->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Link deleted successfully'
        ], 200);
    }
}
