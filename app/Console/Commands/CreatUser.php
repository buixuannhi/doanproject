<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreatUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create account user';

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
    public function handle(User $user)
    {
        $name = 'admin' . random_int(0, 100);
        $email = 'admin' . random_int(0, 100) . '@gmail.com';
        $pass = bcrypt(123456);

        $user->fill([
            'name' => $name,
            'email' => $email,
            'password' => $pass,
        ])->save();

        echo 'tên đăng nhập là:' . $name . '    email đăng nhập là:' . $email . '   password : 123456';
    }
}
