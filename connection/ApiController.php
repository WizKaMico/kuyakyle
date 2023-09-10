<?php
require_once "DBController.php";

class shopController extends DBController
{

    function getAllProduct()
    {
        $query = "SELECT * FROM tbl_product";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMealProduct()
    {
        $query = "SELECT * FROM tbl_product WHERE category = 'MEAL' AND status != 'OUT STOCK'";
        
        $productResult = $this->getDBResult($query);
        return $productResult;   
    }

    function getDrinkProduct()
    {
        $query = "SELECT * FROM tbl_product WHERE category = 'DRINKS' AND status != 'OUT STOCK'";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getExtraProduct()
    {
        $query = "SELECT * FROM tbl_product WHERE category = 'EXTRA' AND status != 'OUT STOCK'";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($member_id)
    {
        $query = "SELECT tbl_product.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM tbl_product, tbl_cart WHERE 
            tbl_product.id = tbl_cart.product_id AND tbl_cart.member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM tbl_product WHERE code=?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );
        
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($product_id, $member_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart($product_id, $quantity, $member_id)
    {
        $query = "INSERT INTO tbl_cart (product_id,quantity,member_id) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $this->insertDB($query, $params);
    }

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE tbl_cart SET  quantity = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function emptyCart($member_id)
    {
        $query = "DELETE FROM tbl_cart WHERE member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    
    function insertOrder($customer_detail, $member_id, $amount)
    {
        $query = "INSERT INTO tbl_order (customer_id, amount, name, order_status, purpose, order_at) VALUES (?, ?, ?, ?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $amount
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["name"]
            ),
            array(
                "param_type" => "s",
                "param_value" => "PENDING"
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["purpose"]
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d H:i:s")
            )
        );
        
        $order_id = $this->insertDB($query, $params);
        return $order_id;
    }
    
    function insertOrderItem($order, $product_id, $price, $quantity)
    {
        $query = "INSERT INTO tbl_order_item (order_id, product_id, item_price, quantity) VALUES (?, ?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order
            ),
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $price
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            )
            );
        
        $this->insertDB($query, $params);
    }
    
    function insertPayment($order, $payment_status, $payment_response)
    {
        $query = "INSERT INTO tbl_payment(order_id, payment_status, payment_response) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order
            ),
            array(
                "param_type" => "s",
                "param_value" => $payment_status
            ),
            array(
                "param_type" => "s",
                "param_value" => $payment_response
            )
        );
        
        $this->insertDB($query, $params);
    }
    
    function paymentStatusChange($order, $status) {
        $query = "UPDATE tbl_order SET  order_status = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "i",
                "param_value" => $order
            )
        );
        
        $this->updateDB($query, $params);
    }

    function userLogin($password, $uid)
    {
        $query = "SELECT * FROM tbl_users TU LEFT JOIN tbl_designation D ON TU.designation = D.id WHERE TU.password = ? AND TU.uid = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $password
            ),array(
                "param_type" => "s",
                "param_value" => $uid
            )
        );
        
        $userCredentials = $this->getDBResult($query, $params);
        return $userCredentials;
    }

    function userMailValidation($email, $uid, $code)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO tbl_user_security (uid, email, code, status, date_created) VALUES (?,?,?,?,?)";
   
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            ),
            array(
                "param_type" => "i",
                "param_value" => $code
            ),
            array(
                "param_type" => "s",
                "param_value" => 'UNUSED'
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );

        $this->insertDB($query, $params);
    
    }

    function saveTokenToDatabase($user_id, $token)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO remember_me_tokens (user_id,token,expiration_date)
        VALUES (?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "i",
                "param_value" => $user_id
            ),
            array(
                "param_type" => "s",
                "param_value" => $token
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d H:i:s', strtotime('+30 days'))
            )
        );
        $this->insertDB($query, $params);
    }

    function getUserDetails($session_id){
        $query = "SELECT * FROM tbl_users TU LEFT JOIN tbl_designation D ON TU.designation = D.id WHERE TU.user_id = ?";

        $params = array(
           
           array(
               "param_type" => "i",
               "param_value" => $session_id
           )
       );
       
       $userCredentials = $this->getDBResult($query, $params);
       return $userCredentials;

   }


     function userValidatesEmail($uid, $email, $code)
    {
        $query = "SELECT * FROM tbl_user_security TUS WHERE TUS.uid = ? AND TUS.email = ? AND TUS.code = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            ),array(
                "param_type" => "i",
                "param_value" => $code
            )
        );
        
        $userCredentials = $this->getDBResult($query, $params);
        return $userCredentials;
    }

    function userhasBeenValidated($uid, $email, $code)
    {
        $query = "UPDATE tbl_user_security TUS SET status = ? WHERE TUS.uid = ? AND TUS.email = ? AND TUS.code = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => 'USED'
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),array(
                "param_type" => "s",
                "param_value" => $email
            ),array(
                "param_type" => "i",
                "param_value" => $code
            )
        );
        
        $this->updateDB($query, $params);
    }

    function allTransactionList()
    {
        $query = "SELECT COUNT(*) as total_order, SUM(amount) as total_amount, DATE(order_at) as order_date
        FROM tbl_order
        GROUP BY order_date";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function allSalesList()
    {
        $query = "SELECT * FROM tbl_order";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }


    function allSalesTodayList()
    {
        $query = "SELECT
            O.id AS customer_id,
            O.customer_id AS member,
            O.amount,
            O.name,
            O.order_status,
            DATE(O.order_at) AS order_at,
            GROUP_CONCAT(
                CONCAT(P.code, ' - Price: ', I.item_price, ' - Quantity: ', I.quantity)
                ORDER BY I.id
                SEPARATOR ', '
            ) AS orderDetails
        FROM tbl_order O
        LEFT JOIN tbl_order_item I ON O.id = I.order_id
        LEFT JOIN tbl_product P ON I.product_id = P.id
        WHERE DATE(O.order_at) = CURDATE()
        GROUP BY O.id, O.customer_id, O.amount, O.name, O.order_status, DATE(O.order_at)";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function allTransactionListTake()
    {
        $query = "SELECT *
        FROM tbl_order
        WHERE DATE(order_at) = CURDATE() AND purpose = 'TAKE-OUT' AND order_status != 'COMPLETED'";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function allTransactionListDine()
    {
        $query = "SELECT *
        FROM tbl_order
        WHERE DATE(order_at) = CURDATE() AND purpose = 'DINE-IN' AND order_status != 'COMPLETED'";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function productCreate($name, $code, $category, $price, $photoPath)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO tbl_product (name, code, category, image, price) VALUES (?, ?, ?, ?, ?)";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $name
            ),
            array(
                "param_type" => "s",
                "param_value" => $code
            ),
            array(
                "param_type" => "s",
                "param_value" => $category
            ),
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "i",
                "param_value" => $price
            )
        );

        $this->insertDB($query, $params);
    }

    function updateProduct($status,$code)
    {
        $query = "UPDATE tbl_product SET status = ? WHERE code = ?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $status
            ),array(
                "param_type" => "s",
                "param_value" => $code
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateOrderStat($status, $payment, $amount, $change, $order_id)
    {
        $query = "UPDATE tbl_order SET order_status = ?, payments = ?, amounts = ?, changes = ? WHERE customer_id = ?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $status
            ),array(
                "param_type" => "s",
                "param_value" => $payment
            ),array(
                "param_type" => "i",
                "param_value" => $amount
            ),array(
                "param_type" => "i",
                "param_value" => $change
            ),array(
                "param_type" => "s",
                "param_value" => $order_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function getProductStat($codeArray)
    {
        // Create a comma-separated list of placeholders for the codes
        $placeholders = implode(",", array_fill(0, count($codeArray), "?"));
        
        // $query = "SELECT * FROM tbl_product tp LEFT JOIN tbl_order_item ti ON tp.id = ti.product_id WHERE tp.code IN ($placeholders)";
        $query = "SELECT name,code,SUM(quantity) as total, SUM(quantity * item_price) as profit FROM tbl_product tp LEFT JOIN tbl_order_item ti ON tp.id = ti.product_id WHERE tp.code IN ($placeholders) GROUP BY code,name";
        $params = array();
        
        foreach ($codeArray as $code) {
            $params[] = array(
                "param_type" => "s",
                "param_value" => $code
            );
        }
        
        $statResult = $this->getDBResult($query, $params);
        return $statResult;
    }


    function getProductSpecificStat($rcode)
    {
        $query = "SELECT * FROM tbl_order T LEFT JOIN tbl_order_item TI ON T.id = TI.order_id LEFT JOIN tbl_product TP ON TI.product_id = TP.id WHERE TP.code = ?"; 
    
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $rcode
            )
        );
    
        $statSpecificResult = $this->getDBResult($query, $params);
        return $statSpecificResult;
    
    }
    

 

}
