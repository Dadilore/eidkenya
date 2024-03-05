<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;
use App\Models\County;
use App\Models\SubCounty;

class UpdateSubCounties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sub_counties:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $db_counties = County::all();
        $config_counties = config('counties.counties');

        foreach($config_counties as $county){
            $db_county = County::where('name', $county['name'])->first();
            $id = $db_county->id;
            foreach($county['subcounties'] as $subcounty){
                SubCounty::updateOrCreate([
                    'name' => $subcounty['name'],],
                    [
                    'county_id' => $id,
                ]);
            }

        }
    }
}
