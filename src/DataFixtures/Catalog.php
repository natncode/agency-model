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

        $sumandoVoluntades = new Category();
        $sumandoVoluntades->setParent($tematica);
        $sumandoVoluntades->setName('Sumando voluntades');
        $sumandoVoluntades->setSlug('sumando-voluntades');
        $sumandoVoluntades->setIcon(self::ICON);
        $sumandoVoluntades->setImage($defaultImage);
        $sumandoVoluntades->setColor(self::COLOR);
        $sumandoVoluntades->setActive(true);
        $manager->persist($sumandoVoluntades);

        $cariciasDeLaNaturaleza = new Category();
        $cariciasDeLaNaturaleza->setParent($tematica);
        $cariciasDeLaNaturaleza->setName('Caricias de la naturaleza');
        $cariciasDeLaNaturaleza->setSlug('caricias-de-la-naturaleza');
        $cariciasDeLaNaturaleza->setIcon(self::ICON);
        $cariciasDeLaNaturaleza->setImage($defaultImage);
        $cariciasDeLaNaturaleza->setColor(self::COLOR);
        $cariciasDeLaNaturaleza->setActive(true);
        $manager->persist($cariciasDeLaNaturaleza);

        $circuitos360 = new Category();
        $circuitos360->setParent($tematica);
        $circuitos360->setName('Circuitos 360');
        $circuitos360->setSlug('circuitos-360');
        $circuitos360->setIcon(self::ICON);
        $circuitos360->setImage($defaultImage);
        $circuitos360->setColor(self::COLOR);
        $circuitos360->setActive(true);
        $manager->persist($circuitos360);

        $descubriendoRaices = new Category();
        $descubriendoRaices->setParent($tematica);
        $descubriendoRaices->setName('Descubriendo raíces');
        $descubriendoRaices->setSlug('descubriendo-raices');
        $descubriendoRaices->setIcon(self::ICON);
        $descubriendoRaices->setImage($defaultImage);
        $descubriendoRaices->setColor(self::COLOR);
        $descubriendoRaices->setActive(true);
        $manager->persist($descubriendoRaices);

        $excursiones = new Category();
        $excursiones->setParent($tematica);
        $excursiones->setName('Excursiones');
        $excursiones->setSlug('excursiones');
        $excursiones->setIcon(self::ICON);
        $excursiones->setImage($defaultImage);
        $excursiones->setColor(self::COLOR);
        $excursiones->setActive(true);
        $manager->persist($excursiones);

        $familias = new Category();
        $familias->setParent($tematica);
        $familias->setName('Familias');
        $familias->setSlug('familias');
        $familias->setIcon(self::ICON);
        $familias->setImage($defaultImage);
        $familias->setColor(self::COLOR);
        $familias->setActive(true);
        $manager->persist($familias);

        $parejas = new Category();
        $parejas->setParent($tematica);
        $parejas->setName('Parejas');
        $parejas->setSlug('parejas');
        $parejas->setIcon(self::ICON);
        $parejas->setImage($defaultImage);
        $parejas->setColor(self::COLOR);
        $parejas->setActive(true);
        $manager->persist($parejas);

        $playa = new Category();
        $playa->setParent($tematica);
        $playa->setName('Playa');
        $playa->setSlug('playa');
        $playa->setIcon(self::ICON);
        $playa->setImage($defaultImage);
        $playa->setColor(self::COLOR);
        $playa->setActive(true);
        $manager->persist($playa);

        $temporada = new Category();
        $temporada->setParent($tematica);
        $temporada->setName('Temporada');
        $temporada->setSlug('temporada');
        $temporada->setIcon(self::ICON);
        $temporada->setImage($defaultImage);
        $temporada->setColor(self::COLOR);
        $temporada->setActive(true);
        $manager->persist($temporada);

        $duracion = new Category();
        $duracion->setName('Duración');
        $duracion->setSlug('duracion');
        $duracion->setIcon(self::ICON);
        $duracion->setImage($defaultImage);
        $duracion->setColor(self::COLOR);
        $duracion->setActive(true);
        $manager->persist($duracion);

        $unDia = new Category();
        $unDia->setParent($duracion);
        $unDia->setName('1 día');
        $unDia->setSlug('1-dia');
        $unDia->setIcon(self::ICON);
        $unDia->setImage($defaultImage);
        $unDia->setColor(self::COLOR);
        $unDia->setActive(true);
        $manager->persist($unDia);

        $dosDias = new Category();
        $dosDias->setParent($duracion);
        $dosDias->setName('2 días');
        $dosDias->setSlug('2-dias');
        $dosDias->setIcon(self::ICON);
        $dosDias->setImage($defaultImage);
        $dosDias->setColor(self::COLOR);
        $dosDias->setActive(true);
        $manager->persist($dosDias);

        $tresDias = new Category();
        $tresDias->setParent($duracion);
        $tresDias->setName('3 días');
        $tresDias->setSlug('3-dias');
        $tresDias->setIcon(self::ICON);
        $tresDias->setImage($defaultImage);
        $tresDias->setColor(self::COLOR);
        $tresDias->setActive(true);
        $manager->persist($tresDias);

        $cuatroDias = new Category();
        $cuatroDias->setParent($duracion);
        $cuatroDias->setName('4 días');
        $cuatroDias->setSlug('4-dias');
        $cuatroDias->setIcon(self::ICON);
        $cuatroDias->setImage($defaultImage);
        $cuatroDias->setColor(self::COLOR);
        $cuatroDias->setActive(true);
        $manager->persist($cuatroDias);

        $cincoDias = new Category();
        $cincoDias->setParent($duracion);
        $cincoDias->setName('5 días');
        $cincoDias->setSlug('5-dias');
        $cincoDias->setIcon(self::ICON);
        $cincoDias->setImage($defaultImage);
        $cincoDias->setColor(self::COLOR);
        $cincoDias->setActive(true);
        $manager->persist($cincoDias);

        $nueveDias = new Category();
        $nueveDias->setParent($duracion);
        $nueveDias->setName('9 días');
        $nueveDias->setSlug('9-dias');
        $nueveDias->setIcon(self::ICON);
        $nueveDias->setImage($defaultImage);
        $nueveDias->setColor(self::COLOR);
        $nueveDias->setActive(true);
        $manager->persist($nueveDias);

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
