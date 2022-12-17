<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AttributeRepositoryInterface;
use App\Http\Requests\Attribute\StoreAttributeRequest;
use App\Http\Requests\Attribute\UpdateAttributeRequest;

class AttributeController extends Controller
{

    private $attributerepository;

    public function __construct(AttributeRepositoryInterface $attributerepository)
    {
        $this->attributerepository = $attributerepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('searchTerm') && $request->searchTerm != null) {
            $attributes = $this->attributerepository->search($request->column, $request->searchTerm);
            $searchTerm = $request->searchTerm;
        } else {
            $attributes = $this->attributerepository->all();
            $searchTerm = '';
        }

        return view('admin.attributes.index', compact('attributes', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request)
    {
        $this->attributerepository->create($request->validated());

        return to_route('attributes.index')->with('toast_success', 'Create Attribute Successufuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $this->attributerepository->update($attribute->id, $request->validated());

        return to_route('attributes.index')->with('toast_success', 'Update Attribute Successufuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $this->attributerepository->delete($attribute->id);

        return to_route('attributes.index')->with('toast_success', 'Delete Attribute Successufuly');
    }
}
