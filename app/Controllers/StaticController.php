<?php

namespace ToDoProject\Controllers;



class StaticController extends AbstractController{

    private $templateVariables=[];

    public function staticcontrol($staticID=null){



        if ($staticID=='about') {

            $template = '/about.html.twig';
            return $this->render($template, $this->templateVariables);
        }
               else if ($staticID=='contacts') {

                   $template = '/contactform.html.twig';
                   return $this->render($template, $this-> templateVariables);
               }
                else if ($staticID=='useful') {

                    $template = '/onesimplepage.html.twig';
                    return $this->render($template, $this->templateVariables);
                }
                else {

                    header('HTTP/1.1 404 Not Found');
                }

        }



}