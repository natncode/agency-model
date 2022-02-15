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

        $categories = [
            [
                'name' => 'Parejas',
                'slug' => 'parejas',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
            [
                'name' => '4 días',
                'slug' => '4-dias',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
            [
                'name' => 'Excursión',
                'slug' => 'excursion',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
            [
                'name' => 'Fusión de sabores',
                'slug' => 'fusión-de-sabores',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
            [
                'name' => 'Festivales',
                'slug' => 'festivales',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
            [
                'name' => 'Más de 10 días',
                'slug' => 'mas-de-10-dias',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
            [
                'name' => 'Media baja',
                'slug' => 'media-baja',
                'icon' => self::ICON,
                'image' => $defaultImage,
                'color' => self::COLOR,
                'active' => true,
            ],
        ];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->setName($category['name']);
            $newCategory->setSlug($category['slug']);
            $newCategory->setIcon($category['icon']);
            $newCategory->setImage($category['image']);
            $newCategory->setColor($category['color']);
            $newCategory->setActive($category['active']);

            $manager->persist($newCategory);
        }

        $sumandoVoluntades = new Category();
        $sumandoVoluntades->setName('Sumando voluntades');
        $sumandoVoluntades->setSlug('sumando-voluntades');
        $sumandoVoluntades->setIcon(self::ICON);
        $sumandoVoluntades->setImage($defaultImage);
        $sumandoVoluntades->setColor(self::COLOR);
        $sumandoVoluntades->setActive(true);
        $manager->persist($sumandoVoluntades);

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
        
        $tourDate = new TourDate();
        $tourDate->setDepartureDate(new DateTimeImmutable());
        $tourDate->setReturnDate(new DateTimeImmutable());
        $tourDate->setNotes('Best option');
        $tourDate->setActive(true);

        $tourFare = new TourFare();
        $tourFare->setLodging('Bus');
        $tourFare->setPrice(1200000);
        $tourFare->setSpecialPrice(1100000);
        $tourFare->setActive(true);

        $tour->addRegion($zacatecas);
        $tour->addCategory($sumandoVoluntades);
        $tour->addIncludedDetail($anfitrionDeViaje);
        $tour->addNonIncludedDetail($accesosYActividades);
        $tour->addImage($tourImage);
        $tour->addActivity($nadoConBallenas);
        $tour->addDate($tourDate);
        $tour->addFare($tourFare);
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
