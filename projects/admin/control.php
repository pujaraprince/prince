<?php

include_once('../princetech/model.php');  // 1 load model
  
class control extends model{   // 2 etends model for use of logic

    function __construct()
    {
        session_start();
        model::__construct();  // 3 call model __construct

        $path=$_SERVER['PATH_INFO'];

        switch($path){

            

             case '/admin-login':
                 if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $pass=$_REQUEST['password'];

                    $password = md5($pass);
                    $data = array(
                        "email" => $email,
                        "password" => $password
                    );

                    $res=$this->select_where('admin',$data);
                    $chk=$res->num_rows; 
                    if($chk==1) // 1 means true & 0 false
                    {
                         $data=$res->fetch_object(); // data fetch single
                        //CREATE SESSION
                        $_SESSION['a_name']=$data->name;
                        $_SESSION['a_email']=$data->email;
                        $_SESSION['a_id']=$data->id;

                        if(isset($_REQUEST['rem']))
						{
							setcookie('cookie_email',$email,time()+60);
							setcookie('cookie_pass',$pass,time()+60);
						}

                        echo "<script>
                            alert('Login Success!');
                            window.location='dashboard';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                            alert('Login Failed!');
                            window.location='admin-login';
                        </script>";
                    }
                }    
                include_once('admin_login.php');
                break;
            
            case '/dashboard':
            include_once('dashboard.php');    
            break;

            case '/add_categories':
                
              if (isset($_REQUEST['submit'])) {

                   $cate_name=$_REQUEST['cate_name'];
                   $cate_description=$_REQUEST['cate_description'];
                   $cate_image=$_FILES['cate_image']['name'];

                   $path='assets/images/categories/'.$cate_image;
                   $dup_img=$_FILES['cate_image']['tmp_name']; 
                   move_uploaded_file($dup_img,$path);

                   $data=array("cate_name"=>$cate_name,"cate_description"=>$cate_description,"cate_image"=>$cate_image);

                   $res=$this->insert('categories',$data);
                   if($res)
                   {
                        echo "<script>
                            alert('Category Added Success!');
                        </script>";
                   }
                }   
            include_once('add_categories.php');    
            break;

            case '/manage_categories':
                $cate_arr=$this->select('categories');        
                include_once('manage_categories.php');    
            break;

            case '/add_service':
             $cate_arr = $this->select('categories');
             if (isset($_REQUEST['submit'])) {

                    $ser_name = $_REQUEST['ser_name'];
                    $cate_id = $_REQUEST['cate_id'];
                    $description = $_REQUEST['description'];
                    $price = $_REQUEST['price'];

                    $image = $_FILES['image']['name'];

                    $path = 'assets/images/products/' .$image;
                    $dup_img = $_FILES['image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);

                    $data = array("ser_name" => $ser_name, "image" => $image, "cate_id" => $cate_id,
                     "description" => $description, "price" => $price);

                    $res = $this->insert('service', $data);
                    if ($res) {
                        echo "<script>
                            alert('Service Added Success!');
                        </script>";
                    }
                }
           


            include_once('add_service.php');    
            break;
            
            case '/manage_service':
            $prod_arr =$this-> double_select('service','categories','cate_name','categories.id=service.cate_id');     
            include_once('manage_service.php');    
            break;

            case '/manage_cart':
            $cart_arr =$this->triple_select('cart','customers','service','cust_name','ser_name','customers.id=cart.cust_id','service.id=cart.ser_id');
            //$cart_arr=$this->select('cart');     
            include_once('manage_cart.php');    
            break;

            case '/contact':
            $cont_arr = $this->select_orderby('contactsus','name');   
            include_once('contact.php');    
            break;

            case '/manage_customer':
            $cust_arr=$this->select('customers'); 
            include_once('manage_customer.php');    
            break;

            case '/order':
            $order_arr =$this->triple_select('orders','customers','service','cust_name','ser_name','customers.id=orders.cus_id','service.id=orders.serv_id');    
            //$cust_arr=$this->select('orders');     
            include_once('order.php');    
            break;

            case '/feedbacks':
            $feed_arr =$this->triple_select('feedbacks','customers','service','cust_name','ser_name','customers.id=feedbacks.cus_id','service.id=feedbacks.serv_id');    
            //$cust_arr=$this->select('feedbacks');      
            include_once('feedbacks.php');    
            break;

            case '/admin_account':
            include_once('admin_account.php');    
            break;

            case '/admin_logout':
                
                    unset($_SESSION['a_id']);
                    unset($_SESSION['a_name']);
                    unset($_SESSION['a_email']);

                    //session_destroy();
                     echo "<script>
                            alert('Logout Success!');
                            window.location='admin-login';
                        </script>";
                break;

            case '/delete':

                if (isset($_REQUEST['dtl_contact'])) {

                $id = $_REQUEST['dtl_contact'];
                $where=array("id"=>$id);
                $res=$this->delete_where('contactsus',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='contact';
                           
                        </script>";
                }
            
                };

                if (isset($_REQUEST['dtl_order'])) {

                $id = $_REQUEST['dtl_order'];
                $where=array("id"=>$id);
                $res=$this->delete_where('orders',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='order';
                           
                        </script>";
                }
            
                };

                if (isset($_REQUEST['dtl_category'])) {
                $id = $_REQUEST['dtl_category'];
                $where=array("id"=>$id);
                $res=$this->delete_where('categories',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='manage_categories';
                           
                        </script>";
                }
            
                }

                if (isset($_REQUEST['dtl_customer'])) {
                $id = $_REQUEST['dtl_customer'];
                $where=array("id"=>$id);
                $res=$this->delete_where('customers',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='manage_customer';
                           
                        </script>";
                }
            
                }

                if (isset($_REQUEST['dtl_service'])) {
                $id = $_REQUEST['dtl_service'];
                $where=array("id"=>$id);
                $res=$this->delete_where('service',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='manage_service';
                           
                        </script>";
                }
            
                }

                if (isset($_REQUEST['dtl_cart'])) {
                $id = $_REQUEST['dtl_cart'];
                $where=array("id"=>$id);
                $res=$this->delete_where('cart',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='manage_cart';
                           
                        </script>";
                }
            
                }


                if (isset($_REQUEST['dtl_feedback'])) {
                $id = $_REQUEST['dtl_feedback'];
                $where=array("id"=>$id);
                $res=$this->delete_where('feedbacks',$where);
                
                if($res)
                {
                     echo "<script>
                            alert('delete Success!');
                             window.location='feedbacks';
                           
                        </script>";
                }
            
                }

             break;

             case '/edit_categories':

				 if (isset($_REQUEST['edit_cate'])) {
                    $id = $_REQUEST['edit_cate'];
                    $where = array("id" => $id);
                    $res = $this->select_where('categories', $where);
                    $fetch=$res->fetch_object();
					
					 if (isset($_REQUEST['submit'])) {

						$cate_name = $_REQUEST['cate_name'];
                        $cate_description = $_REQUEST['cate_description'];
						
						if($_FILES['cate_image']['size']>0)
						{
							
							unlink('assets/images/categories/' . $fetch->cate_image);
							
							$cate_image = $_FILES['cate_image']['name'];
							$path = 'assets/images/categories/' . $cate_image;
							$dup_img = $_FILES['cate_image']['tmp_name'];
							move_uploaded_file($dup_img, $path);

							$data = array("cate_name" => $cate_name, "cate_description" => $cate_description, "cate_image" => $cate_image);

							$res = $this->update('categories', $data, $where);
							if ($res) {
								echo "<script>
									alert('categories Updated Success!');
									window.location='manage_categories';
								</script>";
							}
						}
						else
						{
							 $data = array("cate_name" => $cate_name, "cate_description" => $cate_description);

							$res = $this->update('categories', $data, $where);
							if ($res) {
								echo "<script>
									alert('categories Updated Success!');
									window.location='manage_categories';
								</script>";
							}
						}
						
                }
					
                }
                
				include_once('edit_categories.php');
                break;

                case '/edit_service':
                 
              
                $cate_arr = $this->select('categories');
                $cate_arr1 =$this->select_single('categories', 'cate_name');
                
               

				 if (isset($_REQUEST['edit_service'])) {
                    $id = $_REQUEST['edit_service'];
                    $where = array("id" => $id);
                    $res = $this->select_where('service', $where);
                    $fetch=$res->fetch_object();
                    $wherer= array("id" => $id);
        
					
					 if (isset($_REQUEST['submit'])) {

					$ser_name = $_REQUEST['ser_name'];
                    $cate_id = $_REQUEST['cate_id'];
                    $description = $_REQUEST['description'];
                    $price = $_REQUEST['price'];
						
						if($_FILES['image']['size']>0)
						{
							
							unlink('assets/images/products/' . $fetch->image);
							
							$image = $_FILES['image']['name'];
							$path = 'assets/images/products/' . $image;
							$dup_img = $_FILES['image']['tmp_name'];
							move_uploaded_file($dup_img, $path);

							$data = array("ser_name" => $ser_name, "description" => $description, "price" => $price,"image" => $image);

							$res = $this->update('service', $data, $where);
							if ($res) {
								echo "<script>
									alert('service Updated Success!');
									window.location='manage_service';
								</script>";
							}
						}
						else
						{
						$data = array("ser_name" => $ser_name, "description" => $description, "price" => $price);

							$res = $this->update('service', $data, $where);
							if ($res) {
								echo "<script>
									alert('service Updated Success!');
									window.location='manage_service';
								</script>";
							}
						}
						
                }
					
                }
                
				include_once('edit_service.php');
                break;


                case '/edit_customer':
              
				 if (isset($_REQUEST['edit_customer'])) {
                    $id = $_REQUEST['edit_customer'];
                    $where = array("id" => $id);
                    $res = $this->select_where('customers', $where);
                    $fetch=$res->fetch_object();
					
					 if (isset($_REQUEST['submit'])) {

					$cust_name = $_REQUEST['cust_name'];
                    $email = $_REQUEST['email'];
                    $mobile = $_REQUEST['mob'];
                    $address= $_REQUEST['address'];
                    $pincode= $_REQUEST['pincode'];
						
						if($_FILES['image']['size']>0)
						{
							
							unlink('../princetech/assets/img/customers/' . $fetch->image);
							
							$image = $_FILES['image']['name'];
							$path = '../princetech/assets/img/customers/' . $image;
							$dup_img = $_FILES['image']['tmp_name'];
							move_uploaded_file($dup_img, $path);

							$data = array("cust_name" =>$cust_name, "email" => $email, "mob" => $mobile, "address" => $address, "pincode" =>$pincode,"image" => $image);

							$res = $this->update('customers', $data, $where);
							if ($res) {
								echo "<script>
									alert('customer Updated Success!');
									window.location='manage_customer';
								</script>";
							}
						}
						else
						{
						$data = array("cust_name" => $cust_name, "email" => $email, "mob" => $mobile, "address" => $address, "pincode" =>$pincode);

							$res = $this->update('customers', $data, $where);
							if ($res) {
								echo "<script>
									alert('customer Updated Success!');
									window.location='manage_customer';
								</script>";
							}
						}
						
                }
					
                }
                
				include_once('edit_customer.php');
                break;

                
              case '/edit_contact':
              
				 if (isset($_REQUEST['edit_contact'])) {
                    $id = $_REQUEST['edit_contact'];
                    $where = array("id" => $id);
                    $res = $this->select_where('contactsus', $where);
                    $fetch=$res->fetch_object();
					
					 if (isset($_REQUEST['submit'])) {

					$name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $mobile = $_REQUEST['mobile'];
                    $project= $_REQUEST['project'];
                    $message= $_REQUEST['message'];
						
					
					$data = array("name" => $name, "email" => $email, "mobile" => $mobile, "project" => $project, "message" =>$message);

					$res = $this->update('contactsus', $data, $where);
						if ($res) {
								echo "<script>
									alert('contact Updated Success!');
									window.location='contact'
								</script>";
							}
						
						
                }
					
                }
                
				include_once('edit_contact.php');
                break;

                case '/status':
                if (isset($_REQUEST['status_customer'])) {
					
                    $id = $_REQUEST['status_customer'];
                    $where = array("id" => $id);
                    $res = $this->select_where('customers', $where);
					$fetch=$res->fetch_object();
					
					//echo $fetch->status;
						
					if($fetch->status=="Unblock")
					{
						$arr=array("status"=>"Block");
						$res=$this->update('customers', $arr, $where);
						if ($res) {
							
							unset($_SESSION['u_id']);
							unset($_SESSION['u_name']);
							unset($_SESSION['u_email']);
							echo "<script>
								alert('Customer Blocked Success!');
								window.location='manage_customer';
							</script>";
						}
					}
					else
					{
						$arr=array("status"=>"Unblock");
						$res=$this->update('customers', $arr, $where);
						if ($res) {
							echo "<script>
								alert('Customer Unblock Success!');
								window.location='manage_customer';
							</script>";
						}
					}
					
					
                }

                
                break;
                

        }
    }
}

$obj=new control;
?>