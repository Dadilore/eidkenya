<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\PersonalDetails;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'superman:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Super Administrator';

    /**
     * Create a new command instance.
     *w
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

        if (! Role::inRandomOrder()->first()) {
            $this->error('Role and Abilities definitions have not been run.
            please update the role definitions first using  php artisan roles:update command');
            return;
        }

        $surname = $this->ask('Enter surname');
        $name = $this->ask('Enter first name');
        $sex = $this->ask('Enter gender (M/F)');
        $email = $this->ask('Enter email address');

       while(! $this->isValidEmail($email)){
           $this->error('Email is invalid');
           $email = $this->ask('Enter Email address again');
       }

       $password = $this->secret('Enter the admin\'s password');

       while (! $this->isRequiredLength($password)) {
           $this->error('Password must be more that eight characters');
           $password = $this->secret('Enter the admin\'s password');
       }

       $confirmPassword = $this->secret('Confirm the admin\'s password');
           
       while (! $this->isMatch($password, $confirmPassword)) {
           $this->error('Password and Confirm password do not match');

           $password = $this->secret('Enter new admin\'s password');

           while (! $this->isRequiredLength($password)) {
               $this->error('Password must be more that six characters');
               $password = $this->secret('Enter new admin\'s password');
           }

           $confirmPassword = $this->secret('Confirm the admin\'s password');
       }

       $user = new User();
       $user->name = $name;
       $user->surname = $surname;
       $user->sex = $sex;
       $user->email = $email;
       $user->email_verified_at = Carbon::now();
       $user->dob = Carbon::now();
       $user->password = Hash::make($password);
       $user->status = 'active';
       $user->role = 'admin';
       $user->save();


       $profile = PersonalDetails::create([
            'user_id' => $user->id
        ]);

       $role = Role::where('slug','super-admin')->first();
       $user->roles()->attach($role);

       $this->display($user);

    }

    /**
    * Dispaly the registered Admin details
    * 
    * @return table
    */

   private function display(User $admin) : void
   {
       $headers = ['Name', 'Email'];

       $fields = [
           'Name' => $admin->name,
           'Email' => $admin->email
       ];

       $this->info('Super admin created successfully');
       $this->table($headers, [$fields]);
   }

   /**
    * Check if email is valid
    *
    * @param string $email
    * @return boolean
    */
   private function isValidEmail(string $email) :bool
   {
       return filter_var($email, FILTER_VALIDATE_EMAIL);
   }

   /**
    * Check if password and confirm password matches.
    *
    * @param string $password
    * @param string $confirmPassword
    * @return bool
    */
   private function isMatch(string $password, string $confirmPassword) : bool
   {
       return $password === $confirmPassword;
   }

   /**
    * Checks if password is longer than eight characters.
    *
    * @param string $password
    * @return bool
    */
   private function isRequiredLength(string $password) : bool
   {
       return strlen($password) > 8;
   }

}