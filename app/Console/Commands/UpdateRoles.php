<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class UpdateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command updates all roles with their respective departments and abilities as defined in the roles config file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $roles = config('roles.roles');
        
            foreach ($roles as $role) {
                Role::updateOrCreate(
                    ['name' => $role['name']],
                    []
                );
            }

            return $this->info('You have successfully updated your roles.');

        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}