<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\WeatherRequestDTO;
use App\Service\Weather\WeatherApiServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(WeatherApiServiceInterface $weatherApiService): Response
    {
        $weatherRequest = new WeatherRequestDTO();
        $weatherRequest->setLongitude('15.978');
        $weatherRequest->setLatitude('45.8144');
        $weatherRequest->setTimezone('Europe/Berlin');
        $weatherRequest->setForecastDays(1);
        $weatherRequest->setCurrent(['is_day', 'temperature_2m']);

        $test = $weatherApiService->getWeatherData($weatherRequest);

        return $this->render('home_page/home_page.html.twig');
    }
}
