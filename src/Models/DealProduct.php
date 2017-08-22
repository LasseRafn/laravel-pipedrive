<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class DealProduct extends Model
{
	// todo fix ->find(X) not working (unknown method) I think it needs to be ?id=X instead of adding /id to url
	protected $entity   = 'deals/:dealid/products';

	protected $modelClass = self::class;

	public $id;
	public $product_id;
	public $item_price;
	public $quantity;
	public $discount_percentage;
	public $duration;
	public $product_variation_id;
	public $comments;
	public $enabled_flag;

}