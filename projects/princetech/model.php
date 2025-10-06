<?php
class model{

    public $conn="";

    function __construct()
    {
                          //hostname uname pass dbname
       $this->conn=new mysqli('localhost','root','','princetech');
    }
    
    //single table Select Function
    function select($tbl){
        
    $sel="select * from $tbl";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }


    function select_single($tbl, $col){
        
    $sel="Select $col from $tbl";   // query
    $run = $this->conn->query($sel);


   
       
    }
        

     function select_where($tbl,$arr)
    {
        $sel="select * from $tbl where 1=1";  // query continue
        $col_arr = array_keys($arr); // array(0=>"email",1=>"password")
        $value_arr = array_values($arr);
        $i=0;
        foreach($arr as $c)
        {
           $sel.=" and $col_arr[$i]='$value_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($sel);   // query run
        return $run;
        
       

        $chk=$run->num_rows;  // login

        /*
         $fetch = $run->fetch_object() // if single data
        while ($fetch = $run->fetch_object()) {   // data fetch
            $arr[] = $fetch;
        }
        */ 
        
    }


     function select_orderby($tbl,$col){
    $sel="select * from $tbl ORDER BY $col";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

    function select_decending($tbl,$col){
    $sel="select * from $tbl ORDER By $col desc";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

    //double table Select Function
    function double_select($tbl1,$tbl2,$col,$on){
        // select * from categories join products on categories.id=product.cate_id
    $sel="select $tbl1.*,$tbl2.$col from $tbl1 join $tbl2 on $on";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

     //triple table Select Function
    function triple_select($tbl1,$tbl2,$tbl3,$col1,$col2,$on1,$on2){
        // select * from categories join products on categories.id=product.cate_id
      $sel="select $tbl1.*,$tbl2.$col1,$tbl3.$col2 from $tbl1 join $tbl2 on $on1 join $tbl3 on $on2;";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

    // insert Function
    function insert($tbl,$arr){
        
        $col_arr=array_keys($arr);  // array('0'=>"cate_name",'1'=>"cate_image");
        $col=implode(",",$col_arr); // cate_name,cate_image

        $value_arr=array_values($arr);  // array('0'=>"kids",'1'=>"kids.jpg");
        $value=implode("','",$value_arr); // 'kids','kids.jpg'


        // insert into categories (cate_name,cate_image) values ('kids','kids.jpg')
        $ins="insert into $tbl ($col) values ('$value')";   // query
        $run=$this->conn->query($ins);   // query run
        return $run;

    }


    // delete function
    function delete_where($tbl,$arr)
    {
        $sel="delete from $tbl where 1=1";  // query continue
        $col_arr = array_keys($arr); // array(0=>"email",1=>"password")
        $value_arr = array_values($arr);
        $i=0;
        foreach($arr as $c)
        {
           $sel.=" and $col_arr[$i]='$value_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($sel);   // query run
        return $run;
       
    }

    function update($tbl, $arr, $where)
    {
        $col_arr = array_keys($arr);  // array('0'=>"cate_name",'1'=>"cate_image");    
        $value_arr = array_values($arr);  // array('0'=>"kids",'1'=>"kids.jpg");
   
        // update customer set name='',email='' where id=5
		$upd = "update $tbl set";   // query
		$j=0;
		
		$count=count($arr);
		foreach($arr as $data)
		{
			if($count==$j+1)
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]'";
			}
			else
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]',";
				$j++;
			}	
		}
		
		$upd.=" where 1=1";
		
		$wcol_arr = array_keys($where);
        $wvalue_arr = array_values($where);
        $i=0;
        foreach($where as $c)
        {
           $upd.=" and $wcol_arr[$i]='$wvalue_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($upd);   // query run
        return $run;
    }
}

$obj=new model;
?>