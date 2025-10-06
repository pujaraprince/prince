<?php

include_once('model.php');   // 1 load model

class control extends model{   // 2 etends model for use of logic

    function __construct()
    {
        session_start(); 
        model::__construct();  // 3 call model __construct

         $path=$_SERVER['PATH_INFO'];
         
         switch($path){

            case '/index':
            $cate_arr=$this->select('categories');
            $ser_arr =$this->select('service');
            include_once('index.php');
            break;
            

            
            case '/about-us':
            include_once('aboutus.php');
            break;

            case '/portfolio':
            include_once('portfolio.php');
            break;

            case '/service':
            $cate_arr=$this->select('categories');
            $ser_arr =$this->select('service');
            include_once('services.php');
            break;

            case '/contact':
                 if (isset($_REQUEST['submit'])) {

                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $project = ($_REQUEST['project']);
                    $mobile = $_REQUEST['mobile'];
                    $message = $_REQUEST['message'];
                    
                  

                    $data = array("name" => $name, "email" => $email,"project" => $project,"mobile" => $mobile,"message" => $message);

                    $res = $this->insert('contactsus', $data);
                    if ($res) {
                        echo "<script>
                            alert('form submited Success!');
                           
                        </script>";
                    }
                    else
                    {
                        echo "Not succeess";
                    }
                } 
            include_once('contact.php');
            break;

            case '/blog':
            include_once('blog.php');
            break;

            case '/signup':

             if (isset($_REQUEST['submit'])) {

                    $cust_name = $_REQUEST['cust_name'];
                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']);
                    $mobile = $_REQUEST['mob'];
                    $address = $_REQUEST['address'];
                    $pincode = $_REQUEST['pincode'];

                    $image = $_FILES['image']['name'];

                    $path = 'assets/img/customers/' . $image;
                    $dup_img = $_FILES['image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);
                  

                    $data = array("cust_name" => $cust_name, "email" => $email,"password" => $password,"mob" => $mobile,"address" => $address,
                "pincode" => $pincode,"image" => $image);

                    $res = $this->insert('customers', $data);
                    if ($res) {
                        echo "<script>
                            alert('Signup Success!');
                            window.location='login';
                        </script>";
                    }
                    else
                    {
                        echo "Not succeess";
                    }
                }    

            include_once('signup.php');
            break;


            
            case '/login':
             if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']);
                    $data = array(
                        "email" => $email,
                        "password" => $password
                    );
                    $res=$this->select_where('customers',$data);
                    $chk=$res->num_rows; 
                    if($chk==1) // 1 means true & 0 false
                    {
                        $data=$res->fetch_object(); // data fetch single
						
						if($data->status=="Unblock")
						{
							
							//CREATE SESSION
							$_SESSION['u_name']=$data->cust_name;
							$_SESSION['u_email']=$data->email;
							$_SESSION['u_id']=$data->id;


							echo "<script>
								alert('Login Success!');
								window.location='index';
							</script>";
						}
						else
						{
							echo "<script>
                            alert('Login Failed due to Blocked Account so Contact us!');
                            window.location='login';
							</script>";
						}
                    }
                    else
                    {
                        echo "<script>
                            alert('Login Failed due to wrong credential!');
                            window.location='login';
                        </script>";
                    }
                }
            include_once('login.php');
            break;

            case '/user_logout':
                
                    unset($_SESSION['u_id']);
                    unset($_SESSION['u_name']);
                    unset($_SESSION['u_email']);

                    //session_destroy();
                     echo "<script>
                            alert('Logout Success!');
                            window.location='index';
                        </script>";
                break;

                case '/user-profile':
                $arr=array("id"=>$_SESSION['u_id']);
				$run=$this->select_where('customers',$arr);
				$fetch = $run->fetch_object(); 
				
                include_once('user_profile.php'); 
                break;

            case '/edit-profile':

				if (isset($_REQUEST['edit_customer'])) {
                    $id = $_REQUEST['edit_customer'];
                    $where = array("id" => $id);
                    $res = $this->select_where('customers', $where);
					$fetch = $res->fetch_object();
					
					 if (isset($_REQUEST['save'])) {

						$name = $_REQUEST['cust_name'];
						$email = $_REQUEST['email'];
						$mobile = $_REQUEST['mob'];
                        $address = $_REQUEST['address'];
                        $pincode = $_REQUEST['pincode'];
						

						if($_FILES['image']['size']>0)
						{
							// delete image
							$old_img=$fetch->image;
							unlink('assets/img/customers/' . $old_img);

							
							$image = $_FILES['image']['name'];
							$path = 'assets/img/customers/' . $image;
							$dup_img = $_FILES['image']['tmp_name'];
							move_uploaded_file($dup_img, $path);
							
							$data = array(
								"cust_name" => $name,
								"email" => $email,
								"mob" => $mobile,
								"address" => $address,
                                "pincode" => $pincode,
								"image" => $image
							);

							$res = $this->update('customers', $data, $where);
							if ($res) {
								echo "<script>
									alert('Updated Success!');
									window.location='user-profile';
								</script>";
							}
						}
						else
						{
							$data = array(
								"cust_name" => $name,
								"email" => $email,
								"mob" => $mobile,
								"address" => $address,
                                "pincode" => $pincode
							);

							$res = $this->update('customers', $data, $where);
							if ($res) {
								echo "<script>
									alert('Updated Success!');
									window.location='user-profile';
								</script>";
							}
						}
							
							
					}
					
                }
                    
                
				include_once('edit_profile.php');
                break;

                case '/view_service':
                $prod_arr =$this-> double_select('service','categories','cate_name','categories.id=service.cate_id');
            
				if (isset($_REQUEST['view_service'])) {
                  $id = $_REQUEST['view_service'];
                    $where = array("id" => $id);
                    $res = $this->select_where('service', $where);
                    $fetch=$res->fetch_object();
            }
                

            include_once('single_service.php');
            break;


            case '/blog-details':
            include_once('blog-details.php');
            break;

         }
    }

}

$obj=new control;
?>