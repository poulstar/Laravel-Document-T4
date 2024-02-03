<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Media;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        # First User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(1);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(1);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Second User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(2);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(2);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Third User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(3);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(3);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Fourth User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(4);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(4);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Fifth User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(5);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(5);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Sixth User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(6);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(6);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Seventh User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(7);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(7);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Eighth User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(8);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(8);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Ninth User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(9);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(9);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        # Tenth User

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/01.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/02.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/03.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/04.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/05.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/06.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/07.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/08.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/09.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############

        ############### START ###############
        $post = new Post([
            'title' => 'Lorem ipsum',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
            'location' => '0101000020E610000076C2F162DCA2424068CCCCCC0FD54840'
        ]);
        $post->user()->associate(10);
        $post->save();

        $media = new Media([
            'size' => 740000,
            'mime_type' => 'image/jpg',
            'url' => 'default-image/10.jpg'
        ]);
        $media->user()->associate(10);
        $media->save();

        $post = Post::find($post->id);
        $post->media()->sync($media, [ 'create_at' => Carbon::now() ]);
        $post->save();
        ############### END ###############
    }
}
