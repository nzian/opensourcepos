<?php

namespace App\Models\Tokens;

use app\Libraries\Sale_lib;

use app\Models\Customer;

/**
 * Token_customer class
 *
 * @property sale_lib sale_lib
 *
 * @property customer customer
 *
 */
class Token_customer extends Token
{
	private $customer_info;

	public function __construct(string $customer_info = '')
	{
		parent::__construct();
		$this->customer_info = $customer_info;
		$this->sale_lib = new Sale_lib();
	}

	public function token_id(): string
	{
		return 'CU';
	}

	public function get_value(): string
	{
		//substitute customer info
		$customer_id = $this->sale_lib->get_customer();
		if($customer_id != -1 && empty($this->customer_info))	//TODO: Replace -1 with a Constant
		{
			$customer_info = $this->customer->get_info($customer_id);
			if($customer_info != '')
			{
				return trim($customer_info->first_name . ' ' . $customer_info->last_name);
			}
		}

		return $value;	//TODO: https://github.com/opensourcepos/opensourcepos/issues/3454
	}
}