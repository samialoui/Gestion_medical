<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211222160430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBC8ABAEE');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBF531F4C5');
        $this->addSql('DROP TABLE hospitalisations');
        $this->addSql('DROP INDEX IDX_1ADAD7EBF531F4C5 ON patient');
        $this->addSql('DROP INDEX IDX_1ADAD7EBC8ABAEE ON patient');
        $this->addSql('ALTER TABLE patient DROP hospitalisation_id, DROP hospitalisations_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hospitalisations (id INT AUTO_INCREMENT NOT NULL, affections VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE patient ADD hospitalisation_id INT DEFAULT NULL, ADD hospitalisations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBC8ABAEE FOREIGN KEY (hospitalisations_id) REFERENCES hospitalisations (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBF531F4C5 FOREIGN KEY (hospitalisation_id) REFERENCES hospitalisations (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBF531F4C5 ON patient (hospitalisation_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBC8ABAEE ON patient (hospitalisations_id)');
    }
}
