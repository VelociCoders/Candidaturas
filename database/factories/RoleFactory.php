<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
			'superadmin' => $this->faker->name,
			'regional' => $this->faker->name,
			'provincial' => $this->faker->name,
			'local' => $this->faker->name,
		
        ];
    }
}
