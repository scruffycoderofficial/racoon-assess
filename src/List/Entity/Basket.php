<?php

declare(strict_types=1);

namespace RacoonAccess\List\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="shopping_list_baskets")
 * @ORM\Entity()
 */
class Basket
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=100)
     */
    private $code;

    /**
     * @var Collection|ListItem[]
     *
     * @ORM\OneToMany(targetEntity="ListItem")
     */
    private $listItem;

    /**
     * @return Collection|ListItem[]
     */
    public function getListItem(): array|Collection
    {
        return $this->listItem;
    }

    /**
     * @param Collection|Product[] $listItem
     * @return Basket
     */
    public function setListItem(array|Collection $listItem): Basket
    {
        $this->listItem = $listItem;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }
}
