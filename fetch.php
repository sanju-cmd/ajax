<?php
	
	require '../init.php';
	$flag=$_REQUEST['flag'];

	switch ($flag) 
	{
		case 'wallet_transaction':
		
			$request=$_REQUEST;
			$col =array(
				0   =>  'id',
				1   =>  'txn_id',
				2   =>  'user_id',
				3   =>  'user_type',
				8   =>  'txn_type',
			);
			$source->Query("SELECT * FROM txn_tbl WHERE user_type='User'");
			$totalData=$source->CountRows();
			$totalFilter=$totalData;
			//Search
			$where=" WHERE user_type='User'";
			if(!empty($request['search']['value'])){
				$where.=" AND (id Like '".$request['search']['value']."%' ";
				$where.=" OR txn_id Like '".$request['search']['value']."%' ";
				$where.=" OR user_id Like '".$request['search']['value']."%' ";
				$where.=" OR user_type	 Like '".$request['search']['value']."%' ";
				$where.=" OR txn_type Like '".$request['search']['value']."%' ) ";
			}
			
			$sql=" $where ORDER BY id  desc  LIMIT ".$request['start']."  ,".$request['length']."  ";
			$source->Query("SELECT *,(SELECT name from tbl_user t where t.id=tx.user_id) as user_name FROM txn_tbl tx $sql ");
			$totalData=$source->CountRows();
			$data=array();
			$i=1;
			while($row=$source->Single()){
				
				$subdata=array();
				$subdata[]=$i++;
				$subdata[]=$row->txn_type;
				$subdata[]=$row->user_id;
				$subdata[]=$row->user_name;
				$subdata[]=$row->txn_id;
				$subdata[]=$row->amount;
				$subdata[]=$row->msg;
				
				$subdata[]=$row->date;
				$subdata[]=$row->time;
				$data[]=$subdata;
			}

			$json_data=array(
				"draw"              =>  intval($request['draw']),
				"recordsTotal"      =>  intval($totalData),
				"recordsFiltered"   =>  intval($totalFilter),
				"data"              =>  $data
			);

			echo json_encode($json_data);
		break;
		case 'commission_transaction':
		
			$request=$_REQUEST;
			$col =array(
				0   =>  'id',
				1   =>  'txn_id',
				2   =>  'user_id',
				3   =>  'user_type',
				8   =>  'txn_type',
			);
			$source->Query("SELECT * FROM txn_commission WHERE user_type='User'");
			$totalData=$source->CountRows();
			$totalFilter=$totalData;
			//Search
			$where=" WHERE user_type='User'";
			if(!empty($request['search']['value'])){
				$where.=" AND (id Like '".$request['search']['value']."%' ";
				$where.=" OR txn_id Like '".$request['search']['value']."%' ";
				$where.=" OR user_id Like '".$request['search']['value']."%' ";
				$where.=" OR user_type	 Like '".$request['search']['value']."%' ";
				$where.=" OR txn_type Like '".$request['search']['value']."%' ) ";
			}
			
			$sql=" $where ORDER BY id  desc  LIMIT ".$request['start']."  ,".$request['length']."  ";
			$source->Query("SELECT *,(SELECT name from tbl_user t where t.id=tx.user_id) as user_name FROM txn_commission tx $sql ");
			$totalData=$source->CountRows();
			$data=array();
			$i=1;
			while($row=$source->Single()){
				
				$subdata=array();
				$subdata[]=$i++;
				$subdata[]=$row->user_id;
				$subdata[]=$row->user_name;
				$subdata[]=$row->txn_id;
				$subdata[]=$row->amount;
				$subdata[]=$row->msg;
				
				$subdata[]=$row->date;
				$subdata[]=$row->time;
				$data[]=$subdata;
			}

			$json_data=array(
				"draw"              =>  intval($request['draw']),
				"recordsTotal"      =>  intval($totalData),
				"recordsFiltered"   =>  intval($totalFilter),
				"data"              =>  $data
			);

			echo json_encode($json_data);
	
			
			
		break;
		
		// case 'Turnover':
		
			// $request=$_REQUEST;
			// $col =array(
				// 0   =>  'id',
				// 1   =>  'txn_id',
				// 2   =>  'user_id',
				// 3   =>  'user_type',
				// 8   =>  'txn_type',
			// );
			// $date_from=$_POST['date_from'];
			// $date_to=$_POST['date_to'];
			 
			// if(!empty($date_from) and !empty($date_to)){
				
				// $date_from=date('M d, Y',strtotime($date_from));
				// $date_to=date('M d, Y',strtotime($date_to));
				// $source->Query("SELECT * FROM txn_commission WHERE user_type='Admin' and  `date` BETWEEN '$date_from' AND '$date_to'");
			// }
			// else
			// {
				// $source->Query("SELECT * FROM txn_commission WHERE user_type='Admin'  ");
			// }
			
			// $totalData=$source->CountRows();
			// $totalFilter=$totalData;
			//Search
			// $where=" WHERE user_type='Admin'";
			// if(!empty($request['search']['value'])){
				// $where.=" AND (id Like '".$request['search']['value']."%' ";
				// $where.=" OR txn_id Like '".$request['search']['value']."%' ";
				// $where.=" OR user_id Like '".$request['search']['value']."%' ";
				// $where.=" OR user_type	 Like '".$request['search']['value']."%' ";
				// $where.=" OR txn_type Like '".$request['search']['value']."%' ) ";
			// }
			
			
			 
			// if(!empty($date_from) and !empty($date_to)){
				
				// $date_from=date('M d, Y',strtotime($date_from));
				// $date_to=date('M d, Y',strtotime($date_to));
				// $where.=" and `date` BETWEEN '$date_from' AND '$date_to' ";
			// }
			
			
			// $sql=" $where ORDER BY id  desc  LIMIT ".$request['start']."  ,".$request['length']."  ";
			
			// $source->Query("SELECT *,(SELECT name FROM `tbl_category` c where c.id=p.category) as category,(SELECT image FROM `product_images` i where i.product_id=p.id limit 1) as images,(SELECT name FROM `tbl_brands` b where b.id=p.brand) as brand FROM `product` p where del_status='false' ORDER BY `id` DESC");
			// $source->Query1("SELECT * FROM `tbl_product_details` WHERE product_id=? ",[$values->id]);
			// $details=$source->SingleData();
			// $source->Query1("select * from tbl_unit where id='".$details->unit."'");
			// $unt=$source->SingleData();
											//var_dump($unt);
                                    
			// $totalData=$source->CountRows();
			// $data=array();
			// $i=1;
			// while($row=$source->Single()){
				 
				// $subdata=array(); 
				// $subdata[]=$i++;
				// $subdata[]=base64_decode($row->name);
				// $subdata[]=base64_decode($row->category); 
				//$subdata[]=$where; 
				// $subdata[]=$row->brand;
				// $subdata[]=$row->model;
				// $subdata[]=$row->quantity;
				// $subdata[]=$row->name;
				// $subdata[]=$row->stock;
				// $subdata[]="₹".$row->mrp;
				// $subdata[]="₹".$row->discount;
				// $subdata[]="₹".$row->price;
				
				// $subdata[]='<a href="javascript:void(0)" onclick="ViewOrder('.$row->id.')" >'.$row->order_id .'</a>';
				// $subdata[]=$row->sp_id;
				// $subdata[]= $row->user_name;
				// $subdata[]=$row->msg;
				
				// $subdata[]=$row->date;
				// $subdata[]=$row->time;
				// $data[]=$subdata;
			// }

			// $json_data=array(
				// "draw"              =>  intval($request['draw']),
				// "recordsTotal"      =>  intval($totalData),
				// "recordsFiltered"   =>  intval($totalFilter),
				// "data"              =>  $data
			// );

			// echo json_encode($json_data);
	
			
			
		// break;
		
	}
	
?>