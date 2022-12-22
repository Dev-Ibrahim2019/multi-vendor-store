<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function createWithAbilities (Request $request) {

        // any request make more than action(crate, update , ... ) -> put the operation into transaction
        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => $request->post('name'),
            ]);

            foreach ($request->post('abilities') as $ability) {
                RoleAbility::create([
                    'role_id' => $role->id,
                    'ability' => $ability,
                    'type' => 'allow',
                ]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::roleBack();
            throw $e;
        }


        return $role;
    }


    public function updateWithAbilities (Request $request) {
        DB::beginTransaction();
        try {
            $role = $this->update([
                'name' => $request->post('name'),
            ]);

            foreach ($request->post('abilities') as $ability) {
                RoleAbility::updateOrCreate([
                    'role_id' => $this->id,
                    'ability' => $ability,
                ], [
                    'type' => 'allow',
                ]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::roleBack();
            throw $e;
        }


        return $this;
    }
}
