<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection , WithHeadings
{

    public function collection()
    {
        return Post::with('user' , 'tags')->get()->map(function($post){
            return [
                'PostID' =>$post->id,
                'Content'=>$post->body,
                'UserID'=> $post->user->id,
                'User Name'=> $post->user->name,
                'User Email'=>$post->user->email,
                'Tags'=>$post->tags->pluck('tag')->join(','),
                'count tags'=>$post->tags->count(),
                'created_at'=>$post->created_at->format('d-m-Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'PostID',
            'Content',
            'UserID',
            'User Name',
            'User Email',
            'Tags',
            'count tags',
            'created_at',
        ];
    }
}
