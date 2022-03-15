<?php

declare(strict_types=1);

namespace DC\Model\DataFixtures;

use DC\Model\Entity\ActivityTopic;
use DC\Model\Entity\Category;
use DC\Model\Entity\Country;
use DC\Model\Entity\Region;
use DC\Model\Entity\Tour;
use DC\Model\Entity\TourDetail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;
use DC\Model\Entity\TourActivity;
use DC\Model\Entity\TourDate;
use DC\Model\Entity\TourFare;
use DC\Model\Entity\TourHighlight;
use DC\Model\Entity\TourImage;
use Symfony\Component\Uid\Uuid;

class Catalog extends Fixture
{
    private const ICON = '&#xe903;';
    private const COLOR = 'ff5733';

    public function load(ObjectManager $manager): void
    {
        $defaultImage = __DIR__ . '/../../tmp/dc_image.jpg';

        $activityTopicsNames = ['Aventura', 'Conocimiento', 'Alimentación'];
        foreach ($activityTopicsNames as $topicName) {
            $activityTopic = new ActivityTopic();
            $activityTopic->setName($topicName);
            $activityTopic->setIcon(self::ICON);
            $activityTopic->setColor(self::COLOR);

            $manager->persist($activityTopic);
        }
        $manager->flush();

        $tematica = new Category();
        $tematica->setName('Temática');
        $tematica->setSlug('tematica');
        $tematica->setIcon(self::ICON);
        $tematica->setImage($defaultImage);
        $tematica->setColor(self::COLOR);
        $tematica->setActive(true);
        $manager->persist($tematica);

        $duracion = new Category();
        $duracion->setName('Duración');
        $duracion->setSlug('duracion');
        $duracion->setIcon(self::ICON);
        $duracion->setImage($defaultImage);
        $duracion->setColor(self::COLOR);
        $duracion->setActive(true);
        $manager->persist($duracion);

        $sumandoVoluntades = new Category();
        $sumandoVoluntades->setParent($tematica);
        $sumandoVoluntades->setName('Sumando voluntades');
        $sumandoVoluntades->setSlug('sumando-voluntades');
        $sumandoVoluntades->setIcon(self::ICON);
        $sumandoVoluntades->setImage($defaultImage);
        $sumandoVoluntades->setColor(self::COLOR);
        $sumandoVoluntades->setActive(true);
        $manager->persist($sumandoVoluntades);

        $cuatroDias = new Category();
        $cuatroDias->setParent($duracion);
        $cuatroDias->setName('4 Días');
        $cuatroDias->setSlug('4-dias');
        $cuatroDias->setIcon(self::ICON);
        $cuatroDias->setImage($defaultImage);
        $cuatroDias->setColor(self::COLOR);
        $cuatroDias->setActive(true);
        $manager->persist($cuatroDias);

        $manager->flush();

        $country = new Country();
        $country->setName('México');
        $country->setSlug('mexico');
        $manager->persist($country);

        $manager->flush();

        $regionsNames = [
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Ciudad de México',
            'Coahuila',
            'Colima',
            'Durango',
            'Estado de México',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'Michoacán',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz',
            'Yucatán',
        ];

        foreach ($regionsNames as $regionName) {
            $region = new Region();
            $region->setName($regionName);
            $region->setCountry($country);

            $manager->persist($region);
        }

        $zacatecas = new Region();
        $zacatecas->setName('Zacatecas');
        $zacatecas->setCountry($country);
        $manager->persist($zacatecas);

        $manager->flush();

        $tourDetails = [
            [
                'name' => 'Traslado',
                'description' => 'traslado',
                'icon' => self::ICON,
            ],
            [
                'name' => 'Alojamiento',
                'description' => 'alojamiento',
                'icon' => self::ICON,
            ],
            [
                'name' => 'Seguro de viaje',
                'description' => 'seguro-de-viaje',
                'icon' => self::ICON,
            ],
            [
                'name' => 'Coordinador de viaje',
                'description' => 'coordinador-de-viaje',
                'icon' => self::ICON,
            ],
            [
                'name' => 'Asistencia al viajero',
                'description' => 'asistencia-al-viajero',
                'icon' => self::ICON,
            ],
        ];
        foreach ($tourDetails as $detail) {
            $newDetail = new TourDetail();
            $newDetail->setName($detail['name']);
            $newDetail->setDescription($detail['description']);
            $newDetail->setIcon($detail['icon']);

            $manager->persist($newDetail);
        }

        $anfitrionDeViaje = new TourDetail();
        $anfitrionDeViaje->setName('Anfitrión de viaje');
        $anfitrionDeViaje->setDescription('anfitrion-de-viaje');
        $anfitrionDeViaje->setIcon(self::ICON);
        $manager->persist($anfitrionDeViaje);

        $accesosYActividades = new TourDetail();
        $accesosYActividades->setName('Accesos y actividades');
        $accesosYActividades->setDescription('No pagamos entradas');
        $accesosYActividades->setIcon(self::ICON);
        $manager->persist($accesosYActividades);

        $manager->flush();

        $tour = new Tour();
        $tour->setUuid(Uuid::v4());
        $tour->setName('La eterna primavera en Cuernavaca');
        $tour->setSlug('la-eterna-primavera-en-cuernavaca');
        $tour->setSecundaryName('amonos-recio');
        $tour->setDescription('Es el mejor viaje que podrás adquirir con nosotros, piénsalo: tú, yo, un arból de papaya ;)');
        $tour->setMap('');
        $tour->setMainImage('https://via.placeholder.com/150C/O%20https://placeholder.com/');
        $tour->setCatalogImage('https://via.placeholder.com/150C/O%20https://placeholder.com/');
        $tour->setUsualDaysDuration(5);
        $tour->setMinimumGroupSize(5);
        $tour->setMaximumGroupSize(5);
        $tour->setSuggestedMinimumAge(5);
        $tour->setSuggestedMaximumAge(5);
        $tour->setMinimumOccupiedPlacesToGo(5);
        $tour->setMinimumQuota(5);
        $tour->setDepartureWeekDay('Domingo');
        $tour->setArrivalWeekDay('Miércoles');
        $tour->setDepartureTime('5pm');
        $tour->setDeparturePlace('Mi cantón');
        $tour->setAllowCustomSchedule(false);
        $tour->setActive(true);
        $tour->setCreatedAt(new DateTimeImmutable());
        $tour->setUpdatedAt(new DateTimeImmutable());

        $tourImage = new TourImage();
        $tourImage->setFile('https://via.placeholder.com/150C/O%20https://placeholder.com/');
        $tourImage->setVisible(true);

        $nadoConBallenas = new TourActivity();
        $nadoConBallenas->setDescription('Nadaremos con ballenas');
        
        $tourFare1 = new TourFare();
        $tourFare1->setLodging('Hab. Sencilla');
        $tourFare1->setPrice(1200000);
        $tourFare1->setSpecialPrice(1100000);
        $tourFare1->setActive(true);

        $tourFare2 = new TourFare();
        $tourFare2->setLodging('Hab. Doble');
        $tourFare2->setPrice(1200000);
        $tourFare2->setSpecialPrice(1100000);
        $tourFare2->setActive(true);
        
        $tourFare3 = new TourFare();
        $tourFare3->setLodging('Hab. Triple');
        $tourFare3->setPrice(1200000);
        $tourFare3->setSpecialPrice(1100000);
        $tourFare3->setActive(true);

        $tourFare4 = new TourFare();
        $tourFare4->setLodging('Hab. Cuádruple');
        $tourFare4->setPrice(1200000);
        $tourFare4->setSpecialPrice(1100000);
        $tourFare4->setActive(true);

        $tourDate = new TourDate();
        $tourDate->setDepartureDate(new DateTimeImmutable());
        $tourDate->setReturnDate(new DateTimeImmutable());
        $tourDate->setNotes('Best option');
        $tourDate->setActive(true);
        $tourDate->addFare($tourFare1);
        $tourDate->addFare($tourFare2);
        $tourDate->addFare($tourFare3);
        $tourDate->addFare($tourFare4);

        $tour->addRegion($zacatecas);
        $tour->setThematic($sumandoVoluntades);
        $tour->setDuration($cuatroDias);
        $tour->addIncludedDetail($anfitrionDeViaje);
        $tour->addNonIncludedDetail($accesosYActividades);
        $tour->addImage($tourImage);
        $tour->addActivity($nadoConBallenas);
        $tour->addDate($tourDate);
        $manager->persist($tour);
        $manager->flush();

        $highlightTopic = new ActivityTopic();
        $highlightTopic->setName('Raíces profundas');
        $highlightTopic->setIcon('48');
        $highlightTopic->setColor('#f46ce8');

        $tourHighlight = new TourHighlight();
        $tourHighlight->setDescription('Conoce tus raices');
        $tourHighlight->setTopic($highlightTopic);
        $tourHighlight->setTour($tour);

        $manager->persist($highlightTopic);
        $manager->persist($tourHighlight);
        $manager->flush();

        $manager->flush();
    }
}
