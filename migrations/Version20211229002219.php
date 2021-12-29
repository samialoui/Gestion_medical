<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229002219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hospitalisations ADD ordonnance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisations ADD CONSTRAINT FK_9DEE6022BF23B8F FOREIGN KEY (ordonnance_id) REFERENCES ordonnances (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DEE6022BF23B8F ON hospitalisations (ordonnance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hospitalisations DROP FOREIGN KEY FK_9DEE6022BF23B8F');
        $this->addSql('DROP INDEX UNIQ_9DEE6022BF23B8F ON hospitalisations');
        $this->addSql('ALTER TABLE hospitalisations DROP ordonnance_id');
    }
}
