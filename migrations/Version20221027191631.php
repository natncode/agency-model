<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027191631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity_topic (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(15) DEFAULT NULL, color VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_F62F176F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour (id INT AUTO_INCREMENT NOT NULL, thematic_id INT NOT NULL, duration_id INT NOT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, secundary_name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, map VARCHAR(255) DEFAULT NULL, main_image VARCHAR(255) DEFAULT NULL, catalog_image VARCHAR(255) DEFAULT NULL, usual_days_duration INT DEFAULT NULL, minimum_group_size INT DEFAULT NULL, maximum_group_size INT DEFAULT NULL, suggested_minimum_age INT DEFAULT NULL, suggested_maximum_age INT DEFAULT NULL, minimum_occupied_places_to_go INT DEFAULT NULL, minimum_quota INT DEFAULT NULL, departure_week_day VARCHAR(10) DEFAULT NULL, arrival_week_day VARCHAR(10) DEFAULT NULL, departure_time VARCHAR(10) DEFAULT NULL, departure_place VARCHAR(255) DEFAULT NULL, allow_custom_schedule TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6AD1F9692395FCED (thematic_id), INDEX IDX_6AD1F96937B987D8 (duration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE included_details (tour_id INT NOT NULL, tour_detail_id INT NOT NULL, INDEX IDX_CAD0659115ED8D43 (tour_id), INDEX IDX_CAD06591679A9DF4 (tour_detail_id), PRIMARY KEY(tour_id, tour_detail_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_included_details (tour_id INT NOT NULL, tour_detail_id INT NOT NULL, INDEX IDX_4522174415ED8D43 (tour_id), INDEX IDX_45221744679A9DF4 (tour_detail_id), PRIMARY KEY(tour_id, tour_detail_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extended_by (tour_id INT NOT NULL, region_id INT NOT NULL, INDEX IDX_2E56395115ED8D43 (tour_id), INDEX IDX_2E56395198260155 (region_id), PRIMARY KEY(tour_id, region_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_activity (id INT AUTO_INCREMENT NOT NULL, tour_id INT NOT NULL, topic_id INT DEFAULT NULL, description LONGTEXT NOT NULL, INDEX IDX_368B506915ED8D43 (tour_id), INDEX IDX_368B50691F55203D (topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_date (id INT AUTO_INCREMENT NOT NULL, tour_id INT NOT NULL, departure_date DATETIME NOT NULL, return_date DATETIME NOT NULL, notes LONGTEXT DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_8BAED75A15ED8D43 (tour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_detail (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_fare (id INT AUTO_INCREMENT NOT NULL, tour_date_id INT NOT NULL, lodging VARCHAR(255) NOT NULL, price INT NOT NULL, special_price INT DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_77FDB857F87DB3EA (tour_date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_highlight (id INT AUTO_INCREMENT NOT NULL, tour_id INT NOT NULL, topic_id INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_76D2467B15ED8D43 (tour_id), INDEX IDX_76D2467B1F55203D (topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_image (id INT AUTO_INCREMENT NOT NULL, tour_id INT NOT NULL, file VARCHAR(255) NOT NULL, visible TINYINT(1) NOT NULL, INDEX IDX_FE72147715ED8D43 (tour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F9692395FCED FOREIGN KEY (thematic_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F96937B987D8 FOREIGN KEY (duration_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE included_details ADD CONSTRAINT FK_CAD0659115ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE included_details ADD CONSTRAINT FK_CAD06591679A9DF4 FOREIGN KEY (tour_detail_id) REFERENCES tour_detail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE non_included_details ADD CONSTRAINT FK_4522174415ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE non_included_details ADD CONSTRAINT FK_45221744679A9DF4 FOREIGN KEY (tour_detail_id) REFERENCES tour_detail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE extended_by ADD CONSTRAINT FK_2E56395115ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE extended_by ADD CONSTRAINT FK_2E56395198260155 FOREIGN KEY (region_id) REFERENCES region (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tour_activity ADD CONSTRAINT FK_368B506915ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
        $this->addSql('ALTER TABLE tour_activity ADD CONSTRAINT FK_368B50691F55203D FOREIGN KEY (topic_id) REFERENCES activity_topic (id)');
        $this->addSql('ALTER TABLE tour_date ADD CONSTRAINT FK_8BAED75A15ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
        $this->addSql('ALTER TABLE tour_fare ADD CONSTRAINT FK_77FDB857F87DB3EA FOREIGN KEY (tour_date_id) REFERENCES tour_date (id)');
        $this->addSql('ALTER TABLE tour_highlight ADD CONSTRAINT FK_76D2467B15ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
        $this->addSql('ALTER TABLE tour_highlight ADD CONSTRAINT FK_76D2467B1F55203D FOREIGN KEY (topic_id) REFERENCES activity_topic (id)');
        $this->addSql('ALTER TABLE tour_image ADD CONSTRAINT FK_FE72147715ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tour_activity DROP FOREIGN KEY FK_368B50691F55203D');
        $this->addSql('ALTER TABLE tour_highlight DROP FOREIGN KEY FK_76D2467B1F55203D');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F9692395FCED');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F96937B987D8');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176F92F3E70');
        $this->addSql('ALTER TABLE extended_by DROP FOREIGN KEY FK_2E56395198260155');
        $this->addSql('ALTER TABLE included_details DROP FOREIGN KEY FK_CAD0659115ED8D43');
        $this->addSql('ALTER TABLE non_included_details DROP FOREIGN KEY FK_4522174415ED8D43');
        $this->addSql('ALTER TABLE extended_by DROP FOREIGN KEY FK_2E56395115ED8D43');
        $this->addSql('ALTER TABLE tour_activity DROP FOREIGN KEY FK_368B506915ED8D43');
        $this->addSql('ALTER TABLE tour_date DROP FOREIGN KEY FK_8BAED75A15ED8D43');
        $this->addSql('ALTER TABLE tour_highlight DROP FOREIGN KEY FK_76D2467B15ED8D43');
        $this->addSql('ALTER TABLE tour_image DROP FOREIGN KEY FK_FE72147715ED8D43');
        $this->addSql('ALTER TABLE tour_fare DROP FOREIGN KEY FK_77FDB857F87DB3EA');
        $this->addSql('ALTER TABLE included_details DROP FOREIGN KEY FK_CAD06591679A9DF4');
        $this->addSql('ALTER TABLE non_included_details DROP FOREIGN KEY FK_45221744679A9DF4');
        $this->addSql('DROP TABLE activity_topic');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE tour');
        $this->addSql('DROP TABLE included_details');
        $this->addSql('DROP TABLE non_included_details');
        $this->addSql('DROP TABLE extended_by');
        $this->addSql('DROP TABLE tour_activity');
        $this->addSql('DROP TABLE tour_date');
        $this->addSql('DROP TABLE tour_detail');
        $this->addSql('DROP TABLE tour_fare');
        $this->addSql('DROP TABLE tour_highlight');
        $this->addSql('DROP TABLE tour_image');
    }
}
