<?php 
class Cart
{
    private $cart;
    private $count;

    //Khởi tạo ssesion giỏ hàng
    function __construct()
    {
        $this->cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
        $this->count= count($this->cart);
    }

    function __destruct()
    {
        $_SESSION['cart']=$this->cart;
    }

    //Thêm sản phẩm vào giỏ hàng
    function add($pro_id, $quantity = 1)
    {
        if (isset($this->cart[$pro_id])) 
            $this->cart[$pro_id] += $quantity;
        else 
            $this->cart[$pro_id] = $quantity;
    }

    //Xóa sản phẩm trong giỏ hàng
    function delete($pro_id)
    {  
        unset($this->cart[$pro_id]);
    }

    //Lấy thông tin sản phẩm trong giỏ hàng
    function get()
    {
        $dataCart = [];
        $pro = new Pro();
        foreach($this->cart as $id=>$qty)
        {
            $row = $pro->getById($id);
            if (Count($row)>0)
            {
                $row['quantity']= $qty;
                $dataCart[]=$row;
            }
        }
        return $dataCart;
    }
}