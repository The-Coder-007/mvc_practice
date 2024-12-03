<?php

class Model{

    public $conn = "";

    function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'crud_task');
    }
    function select($tbl)
    {

        $sel = "select * from $tbl";
        $run = $this->conn->query($sel);
        while ($data = $run->fetch_object()) {

            $arr[] = $data;
        }

        if(!empty($arr))
		{
			return $arr;
		}
    }

    function insert($tbl, $arr)
    {
        $col_arr = array_keys($arr);
        $col = implode(",", $col_arr);

        $value_arr = array_values($arr);
        $value = implode("','", $value_arr);

        $ins = "insert into $tbl ($col) values ('$value')";   //'raj','raj#@gmail '
        $run = $this->conn->query($ins);
        return $run;
    }

    function select_where($tbl, $where)
    
    {
        $col_v = array_keys($where);
        $value_w = array_values($where);

        $sel = "select * from $tbl where 1=1"; // 1=1 means query continue
        $i = 0;
        foreach ($where as $value) {
            $sel .= " and $col_v[$i]='$value_w[$i]'";
            $i++;
        }
        $run = $this->conn->query($sel);
        return $run;
    }

    function delete_where($tbl,$where)
	{
		$col_w=array_keys($where);
		$value_w=array_values($where);
		
		$del="delete from $tbl where 1=1"; // 1=1 means query continue
		$i=0;
		foreach($where as $w)
		{
			$del.=" and $col_w[$i]='$value_w[$i]'";
			$i++;
		}
		$run=$this->conn->query($del);
		return $run;
	}

    function update_where($tbl,$data,$where)
	{
		// print_r($tbl);die;
		$upd="update $tbl set"; // 1=1 means query continue
		
		$col_d=array_keys($data);
		$value_d=array_values($data);
		$j=0;
		
		$count=count($data);
		foreach($data as $d)
		{
			if($count==$j+1)
			{
				$upd.=" $col_d[$j]='$value_d[$j]'";
			}
			else
			{
				$upd.=" $col_d[$j]='$value_d[$j]' , ";
				$j++;
			}
		}
	
		$upd.=" where 1=1";
		$col_w=array_keys($where);
		$value_w=array_values($where);
		$i=0;
		foreach($where as $w)
		{
			 $upd.=" and $col_w[$i]='$value_w[$i]'";
			$i++;
		}
		$run=$this->conn->query($upd);
		return $run;
	}
}

$Obj = new Model;

?>