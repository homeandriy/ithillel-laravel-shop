<?php


namespace Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardControllerTest extends TestCase {
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

    public function test_allow_see_dashboard_with_role_admin() {
        $response = $this->actingAs( $this->getUser() )->get( route( 'admin.dashboard' ) );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'admin.dashboard' );
    }

    public function test_do_not_allow_see_product_with_role_customer() {
        $response = $this->actingAs( $this->getUser( 'customer' ) )->get( route( 'admin.dashboard' ) );
        $response->assertStatus( 302 );
    }


    protected function getUser( string $role = 'admin' ): User {
        return User::role( $role )->first();
    }
}
