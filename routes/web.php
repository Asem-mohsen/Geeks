<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TagsController;

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::controller(PostController::class)->group(function(){
    Route::get('/posts', 'index')->name('posts');
    Route::get('/posts-by-tag/{tag}', 'getPostsByTag')->name('posts-by-tag'); // tags to be used => $tags = ['entertainment', 'funny', 'technology', 'health', 'sports', 'travel', 'food', 'lifestyle'];
    Route::get('/list-tags-posts-cont', 'getNumberOfPostsTags')->name('list-tags-posts-cont');
    Route::get('/posts-atLeast-2Tags', 'getPostAtLeast2tags')->name('posts-atLeast-2Tags');
    Route::get('/getPostsByTags', 'getPostsByTags')->name('getPostsByTags');
    Route::get('/lastMonthPosts', 'lastMonthPosts')->name('lastMonthPosts');
    Route::get('/mostCommentsand3tags', 'mostCommentsand3tags')->name('mostCommentsand3tags');
});

Route::controller(UserContoller::class)->group(function(){
    Route::get('/users','index')->name('users');
    Route::get('/usersWithTag/{tag}','UsersByTag')->name('usersWithTag');
    Route::get('/topTagsByMostActiveUser','usedbyMostActive')->name('topTagsByMostActiveUser');
    Route::get('/totalPostsandComments','totalPostsandComments')->name('totalPostsandComments');
    Route::get('/postsWithcomments2differentUsers','postsWithcomments2differentUsers')->name('postsWithcomments2differentUsers');
    Route::get('/usersNeverPosted','usersNeverPosted')->name('usersNeverPosted');
    Route::get('/tagsMultiUsers','tagsMultiUsers')->name('tagsMultiUsers');
    Route::get('/userWithMostTags','userWithMostTags')->name('userWithMostTags');
    Route::get('/countPostsByStatus','countPostsByStatus')->name('countPostsByStatus');
    Route::get('/usersHighestAvgPosts','usersHighestAvgPosts')->name('usersHighestAvgPosts');
    Route::get('/usersPostsEachMonth','usersPostsEachMonth')->name('usersPostsEachMonth');
    Route::get('/postsLeastTagActiveUser','postsLeastTagActiveUser')->name('postsLeastTagActiveUser');
    Route::get('/authoredAndCommented/{tagName}','authoredAndCommented')->name('authoredAndCommented');
    Route::get('/mostPublishedPosts', 'mostPublishedPosts')->name('mostPublishedPosts');
    Route::get('/allUsersCommentedOthers','allUsersCommentedOthers')->name('allUsersCommentedOthers');
});

Route::controller(CommentsController::class)->group(function(){
    Route::get('/comments','index')->name('comments');
    Route::get('/topUsersComments','topUsersComments')->name('topUsersComments');
    Route::get('/noCommentsPosts','noCommentsPosts')->name('noCommentsPosts');
    Route::get('/avgCommentsUser','avgCommentsUser')->name('avgCommentsUser');
    Route::get('/tagsUniqueUsers','tagsUniqueUsers')->name('tagsUniqueUsers');
    Route::get('/selfCommented','selfCommented')->name('selfCommented');
    Route::get('/countCommentsOthers','countCommentsOthers')->name('countCommentsOthers');
});


Route::controller(TagsController::class)->group(function(){
    Route::get('/tags','index')->name('tags');
    Route::get('/tags-used-10Times','tagsUsedMore10')->name('tags-used-10Times');
    Route::get('/MostFrequentTag','MostFrequentTag')->name('MostFrequentTag');
    Route::get('/notUsedTags','getNotUsedTags')->name('notUsedTags');
    Route::get('/Ltags','Ltags')->name('Ltags');
});
