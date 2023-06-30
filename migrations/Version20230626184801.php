<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626184801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, etat VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE depot_sauvage');
        $this->addSql('DROP TABLE reseau_incendie');
        $this->addSql('DROP TABLE centre_tri');
        $this->addSql('DROP TABLE dechetterie');
        $this->addSql('ALTER TABLE centre ADD dtype VARCHAR(255) NOT NULL, ADD tri_lieu VARCHAR(255) DEFAULT NULL, ADD tri_heure_am_debut DOUBLE PRECISION DEFAULT NULL, ADD tri_heure_am_fin DOUBLE PRECISION DEFAULT NULL, ADD tri_heure_pm_debut DOUBLE PRECISION DEFAULT NULL, ADD tri_heure_pm_fin DOUBLE PRECISION DEFAULT NULL, ADD dech_nom VARCHAR(100) DEFAULT NULL, ADD dech_tel INT DEFAULT NULL, ADD dech_heure_am_debut TIME DEFAULT NULL, ADD dech_heure_am_fin TIME DEFAULT NULL, ADD dech_heure_pm_debut TIME DEFAULT NULL, ADD dech_heure_pm_fin TIME DEFAULT NULL, ADD depot_description VARCHAR(255) DEFAULT NULL, ADD depot_latitude DOUBLE PRECISION DEFAULT NULL, ADD depot_longitude DOUBLE PRECISION DEFAULT NULL, ADD incendie_num_borne INT DEFAULT NULL, ADD incendie_latitude DOUBLE PRECISION DEFAULT NULL, ADD incendie_longitude DOUBLE PRECISION DEFAULT NULL, ADD incendie_description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE depot_sauvage (id INT AUTO_INCREMENT NOT NULL, depot_description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, depot_latitude DOUBLE PRECISION DEFAULT NULL, depot_longitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reseau_incendie (id INT AUTO_INCREMENT NOT NULL, incendie_num_borne INT NOT NULL, incendie_latitude DOUBLE PRECISION DEFAULT NULL, incendie_longitude DOUBLE PRECISION DEFAULT NULL, incendie_description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE centre_tri (id INT AUTO_INCREMENT NOT NULL, tri_lieu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tri_heure_am_debut DOUBLE PRECISION NOT NULL, tri_heure_am_fin DOUBLE PRECISION NOT NULL, tri_heure_pm_debut DOUBLE PRECISION NOT NULL, tri_heure_pm_fin DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dechetterie (id INT AUTO_INCREMENT NOT NULL, dech_nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, dech_tel INT DEFAULT NULL, dech_heure_am_debut TIME NOT NULL, dech_heure_am_fin TIME NOT NULL, dech_heure_pm_debut TIME NOT NULL, dech_heure_pm_fin TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE statut');
        $this->addSql('ALTER TABLE centre DROP dtype, DROP tri_lieu, DROP tri_heure_am_debut, DROP tri_heure_am_fin, DROP tri_heure_pm_debut, DROP tri_heure_pm_fin, DROP dech_nom, DROP dech_tel, DROP dech_heure_am_debut, DROP dech_heure_am_fin, DROP dech_heure_pm_debut, DROP dech_heure_pm_fin, DROP depot_description, DROP depot_latitude, DROP depot_longitude, DROP incendie_num_borne, DROP incendie_latitude, DROP incendie_longitude, DROP incendie_description');
    }
}
