<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class HashPasswords extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'auth:hash-passwords';
    protected $description = 'Sets a hashed password for every existing user.';
    protected $usage       = 'auth:hash-passwords [password]';

    public function run(array $params)
    {
        $plain = $params[0] ?? 'ChangeMe123!';
        $db    = \Config\Database::connect();

        foreach ($db->table('users')->get()->getResultArray() as $user) {
            $db->table('users')
               ->where('id', $user['id'])
               ->update(['password' => password_hash($plain, PASSWORD_DEFAULT)]);

            CLI::write("Hashed password set for {$user['username']}");
        }
    }
}