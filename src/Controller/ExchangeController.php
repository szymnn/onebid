<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\NoPrivateNetworkHttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeController extends AbstractController
{
    /**
     * @Route("/", name="app_exchange")
     */
    public function index(): Response
    {
        return $this->render('exchange/index.html.twig', [
            'controller_name' => 'ExchangeController',
        ]);
    }
    /**
     * @Route ("/getExchangeData", name="app_getExchangeData")
     */
    public function getExchangeData( Request $request):JsonResponse{
        $client = new NoPrivateNetworkHttpClient(HttpClient::create());
        $time = new \DateTime();
        $from = $client->request('GET', 'https://api.frankfurter.app/'.$request->query->get('date_from').'?base=PLN&symbols=EUR,USD,GBP,CZK');
        $today = $client->request('GET', 'https://api.frankfurter.app/'.$time->format('Y-m-d').'?base=PLN&symbols=EUR,USD,GBP,CZK');
        $from = $from->toArray()['rates'];
        $today = $today->toArray()['rates'];

        $result=array();
        foreach($from as $key=>$date_from ){
            foreach($today as $k=>$date_now){
               if($k == $key) {
                   $percentage = round(100 - $date_from / $date_now * 100,3);
                   array_push($result,[$k=>array('past'=>$date_from,'now'=>$date_now,'precentage'=>$percentage)]);
               }

            }

        }
        dd($result);


        dd($from,$today,$request->query->get('date_from'));

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExchangeController.php',
        ]);
    }

}
