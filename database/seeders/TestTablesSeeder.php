<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Coupon;
use App\Models\Image;
use App\Models\Prize;
use App\Models\Program;
use App\Models\Record;
use App\Models\Sale;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@email.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->count(4)->create();

        for($i = 1; $i <= 10; $i++) {
            Condition::factory()->threshold($i)->create();
        }

        Prize::factory()->count(5)->create();

        Program::factory()->create([
            'name' => '泡沫小洗'
        ]);
        Program::factory()->create([
            'name' => '洗車兼打蠟'
        ]);
        Program::factory()->create([
            'name' => '年度除汙大清掃'
        ]);

        $user = User::first();
        Tool::factory()->count(3)->create([
            'user_id' => $user
        ]);

        $programs = Program::all();
        $tools = Tool::factory()->count(10)->create();
        $programs->each(function ($program)use($tools) {
            $rows = $tools->random(random_int(3,6));
            $rows->each(function ($row) use ($program) {
                $program->tools()->attach($row->id);
            });
        });

        $images = Image::factory()->count(10)->create();
        $sales = Sale::factory()->count(10)->create();
        $sales->each(function ($sale)use($images) {
            $rows = $images->random(random_int(1,5));
            $rows->each(function ($row) use ($sale) {
                $sale->images()->attach($row->id);
            });
        });

        Coupon::factory()->count(2)->user($user->id)->create();

        $records = Record::factory()->user($user->id)->count(2)->create();
        $records->each(function ($record) use ($tools, $programs) {
            $program = $programs->random();
            $record->update(['program_id' => $program->id]);
            $rows = $tools->random(random_int(3,6));
            $rows->each(function ($row) use ($record) {
                $record->tools()->attach($row->id);
            });
        });
    }
}
