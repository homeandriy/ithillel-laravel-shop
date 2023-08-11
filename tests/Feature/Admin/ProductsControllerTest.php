<?php

namespace Admin;

use App\Models\Product;
use App\Models\User;
use App\Services\FileStorageService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class ProductsControllerTest extends TestCase {
    use RefreshDatabase;

    protected function setUp(): void {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make( \Spatie\Permission\PermissionRegistrar::class )->registerPermissions();
    }

    protected function afterRefreshingDatabase() {
        $this->seed();
    }

    public function test_allow_see_products_with_role_admin() {
        $products = Product::orderByDesc( 'id' )->paginate( 5 )->pluck( 'title' )->toArray();
        $response = $this->actingAs( $this->getUser() )->get( route( 'admin.products.index' ) );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'admin.products.index' );
        $response->assertSeeInOrder( $products );
    }

    public function test_do_not_allow_see_product_with_role_customer() {
        $response = $this->actingAs( $this->getUser( 'customer' ) )->get( route( 'admin.products.index' ) );
        $response->assertStatus( 302 );
    }

    public function test_create_product_with_valid_data() {
        $productsData = Product::factory()->make()->toArray();
        ;
        $productsData['thumbnail'] = UploadedFile::fake()->create($productsData['thumbnail']);
        $response = $this->actingAs( $this->getUser() )
                         ->post( route( 'admin.products.store' ), $productsData );

        $response->assertStatus( 302 );
        $response->assertRedirectToRoute( 'admin.products.index' );
        $this->assertDatabaseHas( 'products', [
            'title'     => $productsData['title'],
            'SKU'       => $productsData['SKU'],
            'price'     => $productsData['price'],
            'quantity'  => $productsData['quantity']
        ] );
    }

    public function test_create_product_with_invalid_data() {
        $data = [ 'title' => 'a' ];

        $response = $this->actingAs( $this->getUser() )
                         ->post( route( 'admin.products.store' ), $data );

        $response->assertStatus( 302 );
        $response->assertSessionHasErrors( [ 'title' ] );
    }

    protected function getUser( string $role = 'admin' ): User {
        return User::role( $role )->first();
    }
    protected function uploadFile($additionPath = '', $fileName = 'image.png'): string
    {
        $file = UploadedFile::fake()->create($fileName);
        return FileStorageService::upload($file, $additionPath);
    }
}
