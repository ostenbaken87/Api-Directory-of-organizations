<?php

namespace App\Dto\Activity;

class ActivityUpdateDto
{
    public function __construct(
        public readonly string $name,
        public readonly ?int $parent_id=null
    ){}
}
