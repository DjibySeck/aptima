<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626190152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut_agent (id INT AUTO_INCREMENT NOT NULL, statut_id INT NOT NULL, user_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_1476F3E3F6203804 (statut_id), INDEX IDX_1476F3E3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE statut_agent ADD CONSTRAINT FK_1476F3E3F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE statut_agent ADD CONSTRAINT FK_1476F3E3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE statut_agent DROP FOREIGN KEY FK_1476F3E3F6203804');
        $this->addSql('ALTER TABLE statut_agent DROP FOREIGN KEY FK_1476F3E3A76ED395');
        $this->addSql('DROP TABLE statut_agent');
    }
}
