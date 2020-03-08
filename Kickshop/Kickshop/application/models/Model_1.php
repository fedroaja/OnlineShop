<?php 
class Model_1 extends CI_Model
{
	
	function get_product(){
		$query = $this->db->query("SELECT * FROM barang");
		return $query->result_array();
	}
	function get_product_home(){
		return $this->db->select('*')->from('barang')->where('B_stock >',0)->order_by('ID_Barang','desc')->limit(10)->get()->result_array();
	}
	function get_product_detail($id){
		$query = $this->db->query("SELECT * FROM barang WHERE ID_Barang = '".$id."'");
		return $query->result_array();
	}
	function get_cart($id){
		$query = $this->db->query("SELECT * FROM cart,admin,barang WHERE cart.ID_User=admin.id AND cart.ID_Barang=barang.ID_Barang AND cart.ID_User='".$id['id']."' AND cart.done='0'");
		return $query->result_array();
	}
	function update_cart($data,$id){
    $this->db->where('C_index',$id);
    $this->db->update('cart',array('C_Jumlah' => $data));
 }
	function get_order(){
		$q = $this->db->query("SELECT * FROM orderbarang,admin,barang WHERE orderbarang.ID_User = admin.id AND orderbarang.ID_Barang=barang.ID_Barang order by ID_Order DESC");
		return $q->result_array();
	}
	function update_data_barang($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function delete_data_barang($id){
		$this->db->where('ID_Barang',$id);
		$this->db->delete('barang');
	}
	function insert_data_barang($data,$table){
		$this->db->insert($table,$data);
	}
	function insert_cart($table,$data){
		$query = $this->db->query("SELECT * FROM cart WHERE `ID_User`='".$data['ID_User']."' AND `ID_Barang`='".$data['ID_Barang']."' AND `done`='0'");
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data['C_Jumlah'] = $data['C_Jumlah'] + $row['C_Jumlah'];
				$this->db->where('C_index',$row['C_index']);
				$this->db->update($table,array('C_Jumlah' => $data['C_Jumlah']));
			}
		}else{
			$this->db->insert($table,$data);
		}
	}
	function delete_cart($id){
		$this->db->where('C_index',$id);
		$this->db->delete('cart');
	}
	function done_cart($id,$adrs){
		$quy = $this->db->query("SELECT ID_Order FROM orderbarang ORDER BY ID_Order DESC LIMIT 1");
		$num;

		if($quy->num_rows() > 0){
			foreach ($quy->result_array() as $row) {
				$num = (int)substr($row['ID_Order'],1);
			}
			$num += 1;
		}else{
			$num = 1;
		}
		$O_I = "O".str_pad( $num, 4, "0", STR_PAD_LEFT );
		$flag = 0;
		$res= "Transaksi gagal! minimal pembelian 1 produk!";
		$temp="";
		$query = $this->db->query("SELECT * FROM cart as c,barang as b WHERE c.ID_Barang=b.ID_Barang AND `ID_User`='".$id."' AND `done`='0'");
		foreach ($query->result_array() as $val) {
			if($val['B_stock']>0){
				$flag=1;
			}
			else{
				$flag=0;
				$temp = $val['B_name'];
			}
		}
		if($query->num_rows() > 0){
			if($flag=1)
			{
				foreach ($query->result_array() as $row) {
				
					$qty = $row['C_Jumlah'];
				$stk = $row['B_stock'];
				$tot = $stk - $qty;
				if($tot>=0){
				$this->db->insert('orderbarang',array(
					'ID_Order' 	=> $O_I,
					'ID_User' 	=> $id,
					'ID_Barang' => $row['ID_Barang'],
					'O_harga'	=> $row['harga'],
					'O_jumlah'	=> $row['C_Jumlah'],
					'O_tgl'		=> date("Y-m-d"),
					'O_address' => $adrs
				));
				$this->db->where('C_index',$row['C_index']);
				$this->db->update('cart',array('done' => '1'));
				$this->db->where('ID_Barang',$row['ID_Barang']);
				$this->db->update('barang',array('B_stock'=>$tot));
					$res = "Transaction Succes";
				}else{
					$res = "Maaf Stock ".$temp. " Sudah Habis Mohon Mengubah Pesanan anda!" ;
				}
			}
				
			}else{
				$res = "Maaf Stock ".$temp. " Sudah Habis Mohon Mengubah Pesanan anda!" ;
			}
			
		}
		return $res;
	}
	function filter_data_barang($minPrice,$maxPrice,$brand,$color,$search,$genre){
		$query = $this->make_query($minPrice,$maxPrice,$brand,$color,$search,$genre);
		$data = $this->db->query($query);
		$output = "";
		$x = 0;
		if($data->num_rows() > 0){
			foreach ($data->result_array() as $row) {
				  $ID = $row['ID_Barang'];
          		  $Brand = $row['B_Brand'];
          		  $Name = $row['B_name'];
          		  $Color = $row['B_color'];
          		  $Poto = $row['B_photo'];
          		  $Category = $row['B_category'];
          		  $Price = $row['B_price'];
          		  $sep = "'";
				$output .='

         		<div class="card flex-fill produk" id="'.$ID.'">
         		<img src="assets/foto/'.$Poto.'" class="gambar"><br><br>
         		<div class="card-body">
         		'.$Name.'<br><br>
         		<div id="icolor" class="color'.$x.'">'.$Color.'</div>
         		Rp '.nominal($Price).'<br><br><br>
         		</div></div><script>var ArrWarna = $(".color'.$x.'").text().split("_");
         		if(ArrWarna.length == 1){
					$.each(ArrWarna,function(i,d){
					$(".color'.$x.'").html("<span class='.$sep.'warna clr"+i+" "+d+"'.$sep.'></span>")
				})
				}else{
					$.each(ArrWarna,function(i,d){
						if(i==0){
							$(".color'.$x.'").html("<span class='.$sep.'warna clr"+i+" "+ArrWarna[i]+"'.$sep.'></span>")
						}else{
							$(".color'.$x.'").append("<span class='.$sep.'warna clr"+i+" "+ArrWarna[i]+"'.$sep.'></span>")
						}
					})
				}

 		</script>
 		'; 
         		$x++;
			}
		}else{
			$output = '<h1>Product Not Found</h1>';
		}
		return $output;
	}
	function make_query($minPrice,$maxPrice,$brand,$color,$search,$genre){
		$query = "
		SELECT * FROM barang 
		WHERE B_stock > 0
		";

		if(isset($genre)){
			$query .= "
			 AND B_category LIKE '%".trim($genre)."%'
			";
		}
		if(isset($search)){
			$query .= "
			 AND B_name LIKE '".$search."%'
			";
		}

		if(isset($minPrice,$maxPrice) && !empty($minPrice) && !empty($maxPrice)){
			$query .= "
			 AND B_price BETWEEN '".$minPrice."' AND '".$maxPrice."'
			 ";
		}
		if(isset($brand)){
			$brand_filter = implode("','", $brand);
			$query .= "
			 AND B_Brand IN ('".$brand_filter."')
			";
		}
		if(isset($color)){
			$color_filter = implode("_", $color);
			$query .= "
			 AND B_color LIKE '%".$color_filter."%'
			";
		}

		return $query;
	}

}
