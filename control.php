<?php
include_once('./config/model.php');
class Control extends Model
{

  function __construct()
    {

            session_start();
            Model::__construct();
            $url = $_SERVER['PATH_INFO'];
  
            switch($url){
              
                case '/dashboard':
                  $product = $this->select('product');
                  include_once('index.php');
                  break;

                case '/logout':
                  unset($_SESSION['aid']);
                  unset($_SESSION['aname']);
                  echo "<script> alert('Logged Out SUccess!'); window.location='login'; </script>";
                  break;

                case '/login':
                  if(isset($_REQUEST['submit'])){
                    $username = $_REQUEST['email'];
                    $password = $_REQUEST['password'];

                    $where = array("email" => $username, "password" => $password);
                    $res = $this->select_where('admin', $where);
                    $check = $res->num_rows;

                    if($check == 1){
                      $data = $res -> fetch_object();
                      if($data -> status == "Unblock"){
                        $_SESSION['aid'] = $data->id;
                        $_SESSION['aname'] = $data->name;

                        echo "<script> alert('Login Success!');
                                      window.location='dashboard'; </script>";
                      }
                      else{
                        echo "<script> alert('You are BLocked !');
                                      window.location='login'; </script>";
                      }
                    }
                    else{
                      echo "<script> alert('Login Failed Wrong crendetial !');
                      window.location='login'; </script>";
                    }
                  }

                  include_once('login.php');
                  break;

                case '/add_product':

                  if (isset($_REQUEST['submit'])) {
                    $p_name = $_REQUEST['p_name'];
                    $p_img = $_FILES['p_img']['name'];
                    // image upload in project folder
                    $path = './upload/product/' . $p_img;
                    $tmp_file = $_FILES['p_img']['tmp_name'];
                    move_uploaded_file($tmp_file, $path);

                    $price = $_REQUEST['price'];
                    $description = $_REQUEST['description'];
                    $data = array(
                        "p_name" => $p_name, "p_img" => $p_img, "description" => $description, "price" => $price
                    );

                    $res = $this->insert('product', $data);
                    if ($res) {
                        echo "<script>
                                alert('Product Addes Successfully !');
                                window.location='dashboard';
                              </script>";
                    }
                }
                  include_once('add_product.php');
                  break;

                case '/edit_product':
                  if (isset($_REQUEST['eproduct'])) {
                    $id = $_REQUEST['eproduct'];

                    $where = array("p_id" => $id);
                    $res = $this->select_where('product', $where);
                    $fetch = $res->fetch_object();

                    if (isset($_REQUEST['save'])) {
                        $p_name = $_REQUEST['p_name'];
                        $price = $_REQUEST['price'];
                        $description = $_REQUEST['description'];
                        $status = $_REQUEST['status'];
                        if ($_FILES['p_img']['size'] > 0) {
                            // get old_img name
                            $old_img = $fetch->p_img;

                            $p_img = $_FILES['p_img']['name'];
                            $path = 'upload/product/' . $p_img;
                            $tmp_file = $_FILES['p_img']['tmp_name'];
                            move_uploaded_file($tmp_file, $path);
                           
                            $data = array("p_name" => $p_name, "p_img" => $p_img, "price" => $price, "description" => $description, "status" => $status);

                            $res = $this->update_where('product', $data, $where);
                            if ($res) {
                                unlink('upload/product/' . $old_img);
                                echo "<script>
                                      alert('Product Update Success !');
                                      window.location='dashboard';
                                    </script>";
                            }
                        } else {
                            $data = array("p_name" => $p_name, "price" => $price, "description" => $description, "status" => $status);
                            $res = $this->update_where('product', $data, $where);
                            if ($res) {
                                  echo "<script>
                                        alert('Product Update Success !');
                                        window.location='dashboard';
                                      </script>";
                            }
                        }
                    }
                }
                  include_once('edit.php');
                  break;

                case '/delte_product':
                  if (isset($_REQUEST['delete_p'])) {
                    $id = $_REQUEST['delete_p'];

                    $where = array("p_id" => $id);

                    $resdata = $this->select_where('product', $where);
                    $fetch = $resdata->fetch_object();
                    $del_img = $fetch->p_img;


                    $res = $this->delete_where('product', $where);
                    if ($res) {
                        unlink('upload/product/' . $del_img); // delete image from path
                        echo "
                            <script>
                            alert('Product deleted!');
                            window.location='dashboard';
                            </script>
                        ";
                    }
                }
                  break;

                default:
                  echo "<h1 style='color:red; text-align:center;'> Page not Found </h1>";
                  break;
                
            }
  }
    

}

$Obj = new Control;