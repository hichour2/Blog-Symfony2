<?php
namespace Fose\FoseBundle\Twig;

class FoseExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'mafonction' => new \Twig_Function_Method($this, 'mafonction'),
        );
    }

    public function mafonction($datefr)
    {
if($datefr==("January")){
return "Jan";}
if($datefr==("April")){
return "Avr";}
if($datefr==("March  ")){
return "Mars";}
if($datefr==("May")){
return "Mai";}
if($datefr==("August")){
return "Aout";}
if($datefr==("February")){
return "fev";}
if($datefr==("June")){
return "Jui";}
if($datefr==("July")){
return "Juil";}
if($datefr==("September")){
return "Sep";}
if($datefr==("October")){
return "Oct";}
if($datefr==("November")){
return "Nov";}
if($datefr==("December")){
return "Dec";}

return $datefr;
    }

    public function getName()
    {
        return 'FoseExtension';
    }
}  