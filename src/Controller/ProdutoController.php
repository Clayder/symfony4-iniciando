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
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', "Produto foi salvo com sucesso!");
            return $this->redirectToRoute('produto');
        }
        return $this->render("produto/create.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("produto/editar/{id}", name="editar-produto")
     */
    public function updated(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $produto = $em->getRepository(Produto::class)->find($id);
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', "Produto foi atualizado com sucesso!");
            return $this->redirectToRoute('produto');
        }
        return $this->render("produto/updated.html.twig", [
            'produto' => $produto,
            'form' => $form->createView()
        ]);
    }
}
