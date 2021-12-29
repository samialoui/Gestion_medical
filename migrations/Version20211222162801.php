<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211222162801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hospitalisations ADD antecedent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisations ADD CONSTRAINT FK_9DEE602E53D136E FOREIGN KEY (antecedent_id) REFERENCES antecedents (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DEE602E53D136E ON hospitalisations (antecedent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hospitalisations DROP FOREIGN KEY FK_9DEE602E53D136E');
        $this->addSql('DROP INDEX UNIQ_9DEE602E53D136E ON hospitalisations');
        $this->addSql('ALTER TABLE hospitalisations DROP antecedent_id');
    }
}
