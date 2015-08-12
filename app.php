<?php
    
    require_once __DIR__."/../vendor/autoload.php";
    
    require_once __DIR__."/../src/Anagram_wizard.php";
    
    $app = new Silex\Application();
    
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
    

    $app->get("/", function() use($app){
        return $app['twig']->render('anagram_input.twig');
    });
    

    $app->get("/results", function() use($app){
        $anagram = new Anagram;
        $list = $_GET['list'];
        $ana = $_GET['anagram'];

        $matching_words = $anagram->createAnagram($ana,$list);
        


    return $app['twig']->render('results.twig', array('anagrams' => $matching_words));
    });
    
    return $app;
?>