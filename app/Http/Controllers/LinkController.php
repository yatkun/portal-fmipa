<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Resources\LinkResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LinkController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $links = Link::orderBy('order')->get();
        return LinkResource::collection($links);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $link = Link::create($validated);
        return new LinkResource($link);
    }

    public function show(Link $link)
    {
        return new LinkResource($link);
    }

    public function update(Request $request, Link $link)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url|max:255',
            'is_active' => 'sometimes|boolean',
            'order' => 'sometimes|integer',
        ]);

        $link->update($validated);
        return new LinkResource($link);
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return response()->json(null, 204);
    }
}
