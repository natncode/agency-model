<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220219195205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity_topic (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(15) DEFAULT NULL, color VARCHAR(15) DEFAULT NULL)');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, active BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE country (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE region (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_F62F176F92F3E70 ON region (country_id)');
        $this->addSql('CREATE TABLE tour (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, uuid BLOB NOT NULL --(DC2Type:uuid)
        , name VARCHAR(255) NOT NULL, secundary_name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, description CLOB NOT NULL, map VARCHAR(255) DEFAULT NULL, main_image VARCHAR(255) DEFAULT NULL, usual_days_duration INTEGER DEFAULT NULL, minimum_group_size INTEGER DEFAULT NULL, maximum_group_size INTEGER DEFAULT NULL, suggested_minimum_age INTEGER DEFAULT NULL, suggested_maximum_age INTEGER DEFAULT NULL, minimum_occupied_places_to_go INTEGER DEFAULT NULL, minimum_quota INTEGER DEFAULT NULL, departure_week_day VARCHAR(10) DEFAULT NULL, arrival_week_day VARCHAR(10) DEFAULT NULL, departure_time VARCHAR(10) DEFAULT NULL, departure_place VARCHAR(255) DEFAULT NULL, allow_custom_schedule BOOLEAN NOT NULL, active BOOLEAN NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE extended_by (tour_id INTEGER NOT NULL, region_id INTEGER NOT NULL, PRIMARY KEY(tour_id, region_id))');
        $this->addSql('CREATE INDEX IDX_2E56395115ED8D43 ON extended_by (tour_id)');
        $this->addSql('CREATE INDEX IDX_2E56395198260155 ON extended_by (region_id)');
        $this->addSql('CREATE TABLE tour_category (tour_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(tour_id, category_id))');
        $this->addSql('CREATE INDEX IDX_9CB340F215ED8D43 ON tour_category (tour_id)');
        $this->addSql('CREATE INDEX IDX_9CB340F212469DE2 ON tour_category (category_id)');
        $this->addSql('CREATE TABLE included_details (tour_id INTEGER NOT NULL, tour_detail_id INTEGER NOT NULL, PRIMARY KEY(tour_id, tour_detail_id))');
        $this->addSql('CREATE INDEX IDX_CAD0659115ED8D43 ON included_details (tour_id)');
        $this->addSql('CREATE INDEX IDX_CAD06591679A9DF4 ON included_details (tour_detail_id)');
        $this->addSql('CREATE TABLE non_included_details (tour_id INTEGER NOT NULL, tour_detail_id INTEGER NOT NULL, PRIMARY KEY(tour_id, tour_detail_id))');
        $this->addSql('CREATE INDEX IDX_4522174415ED8D43 ON non_included_details (tour_id)');
        $this->addSql('CREATE INDEX IDX_45221744679A9DF4 ON non_included_details (tour_detail_id)');
        $this->addSql('CREATE TABLE tour_activity (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_id INTEGER NOT NULL, topic_id INTEGER DEFAULT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_368B506915ED8D43 ON tour_activity (tour_id)');
        $this->addSql('CREATE INDEX IDX_368B50691F55203D ON tour_activity (topic_id)');
        $this->addSql('CREATE TABLE tour_date (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_id INTEGER NOT NULL, departure_date DATETIME NOT NULL, return_date DATETIME NOT NULL, notes CLOB DEFAULT NULL, active BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_8BAED75A15ED8D43 ON tour_date (tour_id)');
        $this->addSql('CREATE TABLE tour_detail (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE tour_fare (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_date_id INTEGER NOT NULL, lodging VARCHAR(255) NOT NULL, price INTEGER NOT NULL, special_price INTEGER DEFAULT NULL, active BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_77FDB857F87DB3EA ON tour_fare (tour_date_id)');
        $this->addSql('CREATE TABLE tour_highlight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_id INTEGER NOT NULL, topic_id INTEGER NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_76D2467B15ED8D43 ON tour_highlight (tour_id)');
        $this->addSql('CREATE INDEX IDX_76D2467B1F55203D ON tour_highlight (topic_id)');
        $this->addSql('CREATE TABLE tour_image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_id INTEGER NOT NULL, file VARCHAR(255) NOT NULL, visible BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_FE72147715ED8D43 ON tour_image (tour_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE activity_topic');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE tour');
        $this->addSql('DROP TABLE extended_by');
        $this->addSql('DROP TABLE tour_category');
        $this->addSql('DROP TABLE included_details');
        $this->addSql('DROP TABLE non_included_details');
        $this->addSql('DROP TABLE tour_activity');
        $this->addSql('DROP TABLE tour_date');
        $this->addSql('DROP TABLE tour_detail');
        $this->addSql('DROP TABLE tour_fare');
        $this->addSql('DROP TABLE tour_highlight');
        $this->addSql('DROP TABLE tour_image');
    }
}
