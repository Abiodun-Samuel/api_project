<?php

namespace App\Http\Controllers\API;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Validator;

// use Illuminate\Http\Request;

class VideoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();

        return $this->sendResponse(VideoResource::collection($videos), 'videos retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        foreach ($input as $value) {
            $validator = Validator::make($value, [
                'videoId' => 'required',
                'title' => 'string',
                'description' => 'string',
                'thumnbnail' => 'string',
                'publishedTime' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $video = Video::create($value);
        }

        return $this->sendResponse(new VideoResource($video), 'Video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
