<?php

namespace App\Entity;

use App\Repository\OrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderDetailRepository::class)
 */
class OrderDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $DetailPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $DetailQuantity;

    /**
     * @ORM\Column(type="float")
     */
    private $DetailTotal;

    /**
     * @ORM\OneToOne(targetEntity=Order::class, inversedBy="orderDetail", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $OrderID;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, mappedBy="OrderDetail", cascade={"persist", "remove"})
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetailPrice(): ?float
    {
        return $this->DetailPrice;
    }

    public function setDetailPrice(float $DetailPrice): self
    {
        $this->DetailPrice = $DetailPrice;

        return $this;
    }

    public function getDetailQuantity(): ?int
    {
        return $this->DetailQuantity;
    }

    public function setDetailQuantity(int $DetailQuantity): self
    {
        $this->DetailQuantity = $DetailQuantity;

        return $this;
    }

    public function getDetailTotal(): ?float
    {
        return $this->DetailTotal;
    }

    public function setDetailTotal(float $DetailTotal): self
    {
        $this->DetailTotal = $DetailTotal;

        return $this;
    }

    public function getOrderID(): ?Order
    {
        return $this->OrderID;
    }

    public function setOrderID(Order $OrderID): self
    {
        $this->OrderID = $OrderID;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        // unset the owning side of the relation if necessary
        if ($product === null && $this->product !== null) {
            $this->product->setOrderDetail(null);
        }

        // set the owning side of the relation if necessary
        if ($product !== null && $product->getOrderDetail() !== $this) {
            $product->setOrderDetail($this);
        }

        $this->product = $product;

        return $this;
    }
}
