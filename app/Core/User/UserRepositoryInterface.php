<?php 
namespace App\Core\User;

interface UserRepositoryInterface
{
    public function login();
    public function getOrderUser($id);

}