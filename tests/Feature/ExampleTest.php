<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_check_admin_page_if_user_not_signed(){
        $response = $this->get('/admin/user')->assertRedirect('/login');
    }
    public function test_only_admins_can_view_customers(){
        $user = User::factory()->create();

        $user->attachRole('customer');
        
        Auth::loginUsingId($user->id);
        $response= $this->get('profile.edit')->assertOk();
    }
}
