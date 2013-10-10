<?php
/**
 * @Entity(repositoryClass="LicenseRepository") @Table(name="licence")
 */
class Licence
{
    /**
     * @Id
     * @ManyToOne(targetEntity="User", inversedBy="licences")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     * @var User
     */
    protected $user;

    /**
     * @Id
     * @ManyToOne(targetEntity="Product")
     * @var Product
     */
    protected $product;

    /**
     * @Column(type="float")
     * @var float
     */
    protected $price;

    /**
     * @param User $user
     * @param Product $product
     * @param float $price
     */
    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
	}

    /**
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
	}
}