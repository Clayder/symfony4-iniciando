<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 07/09/2018
 * Time: 12:09
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function world()
    {
        return new Response(
          "<html> Olá </html>"
        );
    }
}