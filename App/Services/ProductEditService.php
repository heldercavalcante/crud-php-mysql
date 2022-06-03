<?php

namespace App\Services;


class ProductEditService {
  private $productsRepository;
  private $uploadService;
  private $productsGetService;

  function __construct(\App\Repositories\IProductsRepository $productsRepository,UploadService $uploadService,\App\Services\ProductsGetService $productsGetService){
    $this->productsRepository = $productsRepository;
    $this->uploadService = $uploadService;
    $this->productsGetService = $productsGetService;
  }

  public function edit(int $id,string $imageName,string $imagePath,string $name,float $price,string $description) {
    if (empty($name)) {
      throw new \Exception("invalid product name");
    }

    if (empty($price)) {
      throw new \Exception("invalid product price");
    }

    if (!is_numeric($price)) {
      throw new \Exception("the price must be a number");
    }

    if ($price < 0) {
      throw new \Exception("the price must be zero or greater than zero");
    }

    if (empty($description)) {
      throw new \Exception("invalid product description");
    }

    $product = $this->productsGetService->get($id);
    $imageUri = $product->image;

    if($imageName) {
      $imageUri = $this->uploadService->upload($imageName,$imagePath,\App\Config\Config::getFullUploadDir(),\App\Config\Config::$UPLOAD_IMAGE_ALLOWED_EXTENSIONS);
    }

    $this->productsRepository->edit($id,$imageUri, $name, $price, $description);
  }
}