<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Product;
use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Model;

class ImageRepository implements Contracts\ImageRepositoryContract {

    public function attach( Model $model, string $relation, array $images = [], string $directory = null ): void {
        if ( ! method_exists( $model, $relation ) ) {
            throw new \Exception( $model::class . " does not have a {$relation} relation" );
        }

        if ( ! empty( $images ) ) {
            foreach ( $images as $image ) {
                // $product->images()
                /** @var Product $model */
                call_user_func( [ $model, $relation ] )->create( [
                    'path' => [
                        'image' => $image,
                        'directory' => $directory
                    ]
                ] );
            }
        }
    }

    public function detach( Model $model, string $relation ): void {
        if ( ! method_exists( $model, $relation ) ) {
            throw new \Exception( $model::class . " does not have a {$relation} relation" );
        }

        $count = $model->{$relation}->count();
        if ( $count > 0 ) {
            $model->{$relation}()->delete();

            /** @var Image $image */
            foreach ( $model->{$relation} as $image ) {
                FileStorageService::remove( $image->path );
            }
        }
    }
}
