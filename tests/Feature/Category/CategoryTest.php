<?php

use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->withoutExceptionHandling();
});

test('index returns a list of categories', function(){
    Category::factory()->count(3)->create();

    $response = $this->get(route('categories.index'));

    $response->assertInertia(fn ($page) => 
        $page->component('Category/Index')->has('categories', 3)
    );
});

test('create returns inertia view', function(){
    $response = $this->get(route('categories.create'));

    $response->assertInertia(fn ($page) => 
        $page->component('Category/Create')
    );
});