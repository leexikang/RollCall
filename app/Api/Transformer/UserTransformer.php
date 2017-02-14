<?php

namespace App\Api\Transformer;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
	    return [
                'name' => $user->id,
                'email' => $user->email,
	    ];
	}
}
