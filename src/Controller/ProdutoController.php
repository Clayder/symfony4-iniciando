<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    /**
     * @Route("/produto", name="produto")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $produtos = $em->getRepository(Produto::class)->findAll();
        return $this->render('produto/index.html.twig', [
            'controller_name' => 'ProdutoController',
            'produtos' => $produtos
        ]);
    }

    /**
     * @param Request $request
     *
     * @Route("/produto/cadastrar", name="cadastrar-produto")
     */
    public function create(Request $request){
        $produto = new Produto();
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);
        return $this->render("produto/create.html.twig",[
            'form' => $form->createView()
        ]);
    }
}
