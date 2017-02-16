<?php

namespace App\Api\Transformer;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
	public function transform(Post $post)
	{
	    return [
                'name' => $post->name,
                'created_at' => $post->created_at->format('Y-m-d'),
	    ];
	}
}
