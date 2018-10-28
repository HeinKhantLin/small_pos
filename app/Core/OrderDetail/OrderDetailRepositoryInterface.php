<?php 
namespace App\Core\OrderDetail;

interface OrderDetailRepositoryInterface
{
    public function getOrderDetail($id);
    public function getExtra($id);

}