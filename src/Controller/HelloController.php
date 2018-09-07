<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 07/09/2018
 * Time: 12:09
 */

namespace App\Controller;


use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends Controller
{
    /**
     * @return Response
     *
     * @Route("hello-world")
     */
    public function world()
    {
        return new Response(
          "<html> Olá 2 </html>"
        );
    }

    /**
     * @return Response
     *
     * @Route("mostrar-mensagem")
     */
    public function mensagem(){
        return $this->render("hello/mensagem.html.twig", ['mensagem' => "OI"]);
    }

    /**
     * @return Response
     *
     * @Route("produto")
     */
    public function produto(){
        $em = $this->getDoctrine()->getManager();

        $produto = new Produto();
        $produto->setNome("Livro");
        $produto->setPreco(13.4);

        $em->persist($produto);
        $em->flush();

        return new Response("O produto ".$produto->getId(). " foi criado");
    }

}