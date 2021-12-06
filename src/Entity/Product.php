<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ProductName;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductQuantity;

    /**
     * @ORM\Column(type="float")
     */
    private $ProductPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ProductImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ProductDescription;

    /**
     * @ORM\OneToOne(targetEntity=OrderDetail::class, inversedBy="product", cascade={"persist", "remove"})
     */
    private $OrderDetail;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="Product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->ProductName;
    }

    public function setProductName(string $ProductName): self
    {
        $this->ProductName = $ProductName;

        return $this;
    }

    public function getProductQuantity(): ?int
    {
        return $this->ProductQuantity;
    }

    public function setProductQuantity(int $ProductQuantity): self
    {
        $this->ProductQuantity = $ProductQuantity;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->ProductPrice;
    }

    public function setProductPrice(float $ProductPrice): self
    {
        $this->ProductPrice = $ProductPrice;

        return $this;
    }

    public function getProductImage(): ?string
    {
        return $this->ProductImage;
    }

    public function setProductImage(string $ProductImage): self
    {
        $this->ProductImage = $ProductImage;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->ProductDescription;
    }

    public function setProductDescription(?string $ProductDescription): self
    {
        $this->ProductDescription = $ProductDescription;

        return $this;
    }

    public function getOrderDetail(): ?OrderDetail
    {
        return $this->OrderDetail;
    }

    public function setOrderDetail(?OrderDetail $OrderDetail): self
    {
        $this->OrderDetail = $OrderDetail;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
