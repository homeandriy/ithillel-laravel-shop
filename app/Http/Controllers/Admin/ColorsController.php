<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Attributes\Color;

class ColorsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $colors = Color::orderByDesc( 'id' )->paginate( 5 );

        return view(
            'admin.colors.index',
            compact( 'colors' )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'admin.colors.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( CreateColorRequest $request ) {
        $fields = $request->validated();

        Color::create( $fields );

        return redirect()->route( 'admin.colors.index' );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Color $color ) {
        return view( 'admin.colors.edit', compact( 'color' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateColorRequest $request, Color $color ) {
        $color->updateOrFail( $request->validated() );

        return redirect()->route( 'admin.colors.edit', $color );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Color $color ) {
        $this->middleware( 'permission:' . config( 'permission.access.categories.delete' ) );

        $color->deleteOrFail();

        return redirect()->route( 'admin.colors.index' );
    }
}
