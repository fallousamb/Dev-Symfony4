<?php
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;


class PropertySearch {
    /**
     * @var string|null
     */
    private $title;

    /**
     * @var int|null
     */
    private $maxPrice;
    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;
    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     */
    public function setMaxPrice(int $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     */
    public function setMinSurface(int $minSurface): void
    {
        $this->minSurface = $minSurface;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


}