<?php
	function total_price($cart)
	{
		$price = 0.0;
		if(is_array($cart))
		{
		  	foreach($cart as $serial => $qty)
			  {
		  		$medprice = getmedprice($serial);
		  		if($medprice)
				{
		  			$price += $medprice * $qty;
		  		}
		  	}
		}
		return $price;
	}

	function total_items($cart)
	{
		$items = 0;
		if(is_array($cart))
		{
			foreach($cart as $serial => $qty)
			{
				$items += $qty;
			}
		}
		return $items;
	}
?>