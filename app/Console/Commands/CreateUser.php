<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create 
                            {data* : name, email, password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

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
     * @return mixed
     */
    public function handle()
    {
        $data = $this->argument('data');
        $user = new User([
            'name' => $data[0],
            'email' => $data[1],
            'password' => Hash::make($data[2]),
        ]);
        if ($user) {
            $user->save();
            $this->info('User created');
        } else {
            $this->error('User not created, check input data and try again');
        }
    }
}
