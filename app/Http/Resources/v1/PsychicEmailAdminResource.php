<?php

namespace App\Http\Resources\v1;

use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\GenericResourceCollection;
use App\Http\Resources\v1\ReviewAdminResourceCollection;

class PsychicEmailAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {      
       $profile = $this->userProfile()->first();
        return [
            'id' => $this->id,
            'profile' => new PsychicAdminProfileResource($profile),
            'categories'=> new GenericResourceCollection($this->categories()->get(), ['name']),
            'reviews' => new GenericResourceCollection($this->reviews()->get(), ['id', 'title', 'text', 'rating']),
            // 'url' => route('specialtie.ptofile', $profile->profile_link),
            // 'users' => $this->users
        ];
    }
}
