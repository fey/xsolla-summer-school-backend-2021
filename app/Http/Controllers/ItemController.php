<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate();

        return new ResourceCollection($items);
    }

    public function store(Request $request)
    {
        $item = new Item();
        $data = $this->validate($request, [
            'sku' => ['required', 'string', 'max:255', Rule::unique('items', 'sku')],
            'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
        ]);

        $item->fill($request->all());
        $item->save();

        return response($item->only('sku'), 201);
    }

    public function show(Item $item)
    {
        return JsonResource::make($item);
    }

    public function update(Request $request, Item $item)
    {
        $data = $this->validate($request, [
            'sku' => ['required', 'string', 'max:255', Rule::unique('items', 'sku')->ignoreModel($item)],
            'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
        ]);

        $item->fill($data);
        $item->save();

        return response(status: 204);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return response(status: 204);
    }
}
