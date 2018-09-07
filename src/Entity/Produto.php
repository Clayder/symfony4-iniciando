<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $nome;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    private $preco;

    public function getId(): ?int
    {
        return $this->id;
    }
}
