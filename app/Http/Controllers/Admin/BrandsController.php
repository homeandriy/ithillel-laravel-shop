<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Attributes\Brand;
use Str;

class BrandsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $brands = Brand::orderByDesc( 'id' )->paginate( 5 );

        return view(
            'admin.brands.index',
            compact( 'brands' )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'admin.brands.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( CreateBrandRequest $request ) {
        $fields         = $request->validated();
        $fields['slug'] = Str::of( $fields['name'] )->slug( '-' );

        Brand::create( $fields );

        return redirect()->route( 'admin.brands.index' );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Brand $brand ) {
        return view( 'admin.brands.edit', compact( 'brand' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateBrandRequest $request, Brand $brand ) {
        $brand->updateOrFail( $request->validated() );

        return redirect()->route( 'admin.brands.edit', $brand );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Brand $brand ) {
        $this->middleware( 'permission:' . config( 'permission.access.categories.delete' ) );

        $brand->deleteOrFail();

        return redirect()->route( 'admin.brands.index' );
    }
}
