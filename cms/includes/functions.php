<?php 

class CMS 
{
	
	function connection(){
		$connect = mysqli_connect('localhost','root','','cms');
		return $connect;
	}//connection end here

	function get_category(){
		$query = "select * from category";
		$result = mysqli_query($this->connection(), $query);
		return $result;
	}//get category function end here


	

}//class end


$object = new CMS;
?>