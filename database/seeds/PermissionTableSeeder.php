<?php

use Illuminate\Database\Seeder;
use \DB as DB;
use App\Services\RouteService;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->route_service         = new RouteService();
        $excluded_routes = $this->route_service->except;
        $routes          = \Route::getRoutes();
        $i = 1;
        foreach ($routes as $route) {
            if(!is_null($route->getName()) && !in_array($route->getName(), $excluded_routes) && $route->getMethods()[0]=='GET') {
                $id = DB::table('permissions')
                        ->insertGetId([
                            'name'       => $i,
                            'route'      => $route->getName(),
                            'created_at' => date('y-m-d-h-i-s',time())
                        ]);
                DB::table('user_permissions')
                  ->insert([
                        'user_id'       => 1,
                        'permission_id' => $id
                    ]);
                $i ++;
            }          
        }      
    }
}
