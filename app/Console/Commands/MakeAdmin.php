<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;



class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-admin {name} {email} {password}';

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
        $email = $this->argument('email');
        $name = $this->argument('name');
        $password = $this->argument('password');
        $user=new User();
        $user->name=$name;
        $user->email=$email;
        $user->password=bcrypt($password);
        $user->save();
        echo "user created";

        return Command::SUCCESS;
    }
}
