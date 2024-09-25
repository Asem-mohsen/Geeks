<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArrayManipulation;



Route::get('/export', [HomeController::class , 'export'])->name('export-excel');

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

Route::controller(ArrayManipulation::class)->group(function(){
    Route::get('/array-index','index')->name('array.index');
    Route::get('/renameKeyMethod','renameKeyMethod')->name('renaming');
    Route::get('/swap','swapMethod')->name('swap');
    Route::get('/removeKey','removeMethod')->name('removeKey');
    Route::get('/changeKeyCase','changeKeyCaseMethod')->name('changeKeyCase');
    Route::get('/sortByKeys','sortByKeys')->name('sortByKeys');
    Route::get('/mergeAssociative','mergeAssociative')->name('mergeAssociative');
    Route::get('/missingKeys','missingKeys')->name('missingKeys');
    Route::get('/reorder','reorder')->name('reorder');
    Route::get('/replacekeysNew','replacekeysNew')->name('replacekeysNew');
    Route::get('/groupValues','groupValues')->name('groupValues');
    Route::get('/extractSubset','extractSubset')->name('extractSubset');
    Route::get('/addPrefixSuffixToKeys','addPrefixSuffixToKeys')->name('addPrefixSuffixToKeys');
    Route::get('/createAssociativeArray','createAssociativeArray')->name('createAssociativeArray');
    Route::get('/renameKeysWithMapping','renameKeysWithMapping')->name('renameKeysWithMapping');
    Route::get('/findDuplicateKeys','findDuplicateKeys')->name('findDuplicateKeys');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
